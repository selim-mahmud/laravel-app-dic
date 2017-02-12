<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAsEmailRequest;
use App\Http\Requests\RegistrationAsLearnerRequest;
use App\Http\Requests\RegistrationAsSchoolRequest;
use App\Services\LoginService;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    /**
     * @var RegistrationService $registrationService
     */
    protected $registrationService;

    /**
     * @var LoginService $loginService
     */
    protected $loginService;

    /**
     * UserController constructor.
     * @param RegistrationService $registrationService
     * @param LoginService $loginService
     */
    public function __construct(RegistrationService $registrationService, LoginService $loginService)
    {
        $this->registrationService = $registrationService;
        $this->loginService = $loginService;
        $this->middleware('guest', ['only' => ['getLearnerRegistration', 'postLearnerRegistration',
            'getSchoolRegistration', 'postSchoolRegistration', 'getLogin', 'postLogin']]);
        $this->middleware('auth', ['only' => ['logout']]);
    }

    /**
     * display learner's registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLearnerRegistration()
    {
        return view('user.register_as_learner');
    }

    /**
     * process learner registration form
     *
     * @param RegistrationAsLearnerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLearnerRegistration(RegistrationAsLearnerRequest $request)
    {
        $inputs = $request->all();
        $response = $this->registrationService->registerAsLearner($inputs);
        if ($response) {
            return redirect('login')->with('alert-success', config('dic-message.registration_success'));
        }
        return redirect()->back()->with('alert-danger', config('dic-message.registration_fail'));
    }

    /**
     * display school's registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSchoolRegistration()
    {
        return view('user.register_as_school');
    }

    /**
     * process school registration form
     *
     * @param RegistrationAsLearnerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSchoolRegistration(RegistrationAsSchoolRequest $request)
    {
        $inputs = $request->all();
        $response = $this->registrationService->registerAsSchool($inputs);
        if ($response) {
            return redirect('login')->with('alert-success', config('dic-message.registration_success'));
        }
        return redirect()->back()->with('alert-danger', config('dic-message.registration_fail'));
    }

    public function getLogin()
    {
        return view('user.login');
    }

    /**
     * logged in user using email
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function postLogin(LoginAsEmailRequest $request)
    {
        $inputs = $request->all();
        list($response, $userType) = $this->loginService->loginByEmail($inputs);
        if($response){
            if($userType === config('dic.learner_user_type_name')){
                return "You are logged in as learner";
            }
            if($userType === config('dic.school_user_type_name')){
                return "You are logged in as school";
            }
        }
        return redirect()->back()->with('alert-danger', config('dic-message.email_login_fail'));
    }

    /**
     * logout user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('alert-success', config('dic-message.logout_success'));
    }

    /**
     * /* function to register using fb
     * /*
     * /* @param $user_type string
     * /*
     * /* @return
     */
    public function facebookRegister()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * /* function to login using fb
     * /*
     * /* @return
     */
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * /* function to login using fb
     * /*
     * /* @return
     */
    public function facebookCallback()
    {

        try {

            $facebook_User = \Socialite::driver('facebook')->user();
            $previous_path = session()->get('previous_path');

            if (trim($previous_path[0]) == 'register-as-learner') { // register as learner

                $facebook_User->user_role = 'learner';
                $authUser = $this->findOrCreateUser($facebook_User);

                if ($authUser) {
                    return redirect('login')->with('alert-success', 'You have successfully registered. Please use facebook to login now.');
                } else {
                    return redirect('register-as-learner')->with('alert-warning', 'Something went wrong. Please try again later.');
                }

            } else if (trim($previous_path[0]) == 'register-as-school') { //register as school

                $facebook_User->user_role = 'manager';
                $authUser = $this->findOrCreateUser($facebook_User);
                if ($authUser) {
                    return redirect('login')->with('alert-success', 'You have successfully registered. Please use facebook to login now.');
                } else {
                    return redirect('register-as-school')->with('alert-warning', 'Something went wrong. Please try again later.');
                }

            } else if (trim($previous_path[0]) == 'login') { //login

                $authUser = $this->findOrCreateUser($facebook_User);

                if ($authUser == 'not_registered') {
                    return redirect('login')->with('alert-warning', 'Please register using facebook before you login.');
                }

                Auth::login($authUser, true);
                $user = Auth::user();

                if ($user) {
                    if ($user->school_id) {
                        return redirect()->route('school_profile', $user->school_id);
                    } else {
                        return redirect()->route('learner_profile', $user->user_id);
                    }
                } else {
                    dd('Something went wrong. Try again later.');
                }

            } else {
                dd('Something went wrong. Try again later.');
            }
        } catch (Exception $e) {
            dd('Something went wrong. Try again later.');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        //
        try {
            /*
             * registration_type = 1 means register as school
             */
            if ($request->registration_type == 1) {
                DB::beginTransaction();
                $new_user = ([
                    'role_id' => 2,
                    'name' => $request->name,
                    'display_name' => General::getDisplayName($request->name),
                    'facebook_id' => 0,
                    'email' => $request->email,
                    'pass_key' => bcrypt($request->password),
                    'is_active' => 0,
                ]);

                $new_school = School::create([
                    'name' => $request->school_name,
                ]);

                $user = User::create($new_user);
                $user->update(['school_id' => $new_school->school_id]);

                $contact_email = ContactEmail::create([
                    'email' => $user->email,
                    'owner_id' => $user->user_id,
                ]);

                $this->activationService->sendActivationMail($user);

                DB::commit();

                $display_message = 'Hello ' . $user->display_name . ' , your school account has been created. Activation link is send to your email.';
                return redirect('/login')->with('alert-success', $display_message);
            } /*
             * registration_type == 2 means register as learner
             */
            elseif ($request->registration_type == 2) {

                DB::beginTransaction();
                $new_user = ([
                    'role_id' => 4,
                    'name' => $request->name,
                    'display_name' => General::getDisplayName($request->name),
                    'facebook_id' => 0,
                    'school_id' => 0,
                    'email' => $request->email,
                    'pass_key' => bcrypt($request->password),
                    'is_active' => 0,
                ]);

                $user = User::create($new_user);

                $contact_email = ContactEmail::create([
                    'email' => $user->email,
                    'owner_id' => $user->user_id,
                ]);

                $this->activationService->sendActivationMail($user);

                DB::commit();

                $display_message = 'Hello ' . $user->display_name . ' , your account has been created. Activation link is send to your email.';
                return redirect('/login')->with('alert-success', $display_message);
            }

        } catch (Exception $e) {
            DB::rollback();
            return redirect('register-as-school')->with('alert-warning', 'Something went wrong. Please try again later.' . '<br>' . $e);
        }
    }


    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        if (isset($facebookUser->user_role)) {
            $user_role = Role::where('role_title', $facebookUser->user_role)->first();
        } else {

            return 'not_registered';

        }

        if ($facebookUser->user_role == 'learner') { // register as learner
            DB::beginTransaction();
            // insert into user table
            $authUser = User::create([
                'role_id' => $user_role->role_id,
                'name' => $facebookUser->name,
                'display_name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'is_active' => 0
            ]);

            // insert into contact_email tabel
            ContactEmail::create([
                'owner_type' => 'learner',
                'owner_id' => $authUser->user_id,
                'email' => $facebookUser->email
            ]);

            // insert into media table
            Media::create([
                'owner_type' => 'learner',
                'media_type' => 'image',
                'image_type' => 'avatar',
                'owner_id' => $authUser->user_id,
                'url' => $facebookUser->avatar
            ]);

            DB::commit();
        }

        if ($facebookUser->user_role == 'manager') { // register as school

            DB::beginTransaction();

            // insert into user table
            $authUser = User::create([
                'role_id' => $user_role->role_id,
                'name' => $facebookUser->name,
                'display_name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'is_active' => 0
            ]);

            // insert into contact_email tabel
            ContactEmail::create([
                'owner_type' => 'school',
                'owner_id' => $authUser->user_id,
                'email' => $facebookUser->email
            ]);

            // insert into media table
            Media::create([
                'owner_type' => 'school',
                'media_type' => 'image',
                'image_type' => 'avatar',
                'owner_id' => $authUser->user_id,
                'url' => $facebookUser->avatar
            ]);

            // insert into school table
            $school = School::create([
                'name' => $facebookUser->name,
                'display_name' => $facebookUser->nickname
            ]);

            //update user table with school_id
            $user = User::find($authUser->user_id);
            $user->school_id = $school->school_id;
            $user->save();

            DB::commit();
        }

        if ($authUser) {
            return $authUser;
        } else {
            return false;
        }


    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->logout();

            $display_message = 'Hello ' . $user->display_name . ' , account activation was successful. Please login to continue.';
            return redirect('/login')->with('alert-success', $display_message);
        } else {
            $display_message = 'Invalid Activation Link';
            return redirect('/login')->with('alert-warning', $display_message);
        }
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();

            return back()->with('alert-warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }
}
