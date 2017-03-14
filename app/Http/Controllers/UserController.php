<?php

namespace App\Http\Controllers;

use App\Contracts\ActivityLoggerContract;
use App\Events\FacebookRegistered;
use App\Helpers\Dic;
use App\Http\Requests\LoginAsEmailRequest;
use App\Http\Requests\RegistrationAsLearnerRequest;
use App\Http\Requests\RegistrationAsSchoolRequest;
use App\Services\LoginService;
use App\Services\RegistrationService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Event;

class UserController extends Controller
{
    /**
     * @var $registrationService RegistrationService
     */
    protected $registrationService;

    /**
     * @var $loginService LoginService
     */
    protected $loginService;

    /**
     * @var $dic Dic
     */
    protected $dic;

    /**
     * @var $user User
     */
    protected $user;

    /**
     * @var ActivityLoggerContract
     */
    protected $activityLogger;

    /**
     * @var Request
     */
    protected $request;

    /**
     * UserController constructor.
     * @param RegistrationService $registrationService
     * @param LoginService $loginService
     * @param Dic $dic
     * @param User $user
     * @param ActivityLoggerContract $activityLogger
     */
    public function __construct(RegistrationService $registrationService, LoginService $loginService,
                                Dic $dic, User $user, ActivityLoggerContract $activityLogger,
                                Request $request
                )
    {
        $this->registrationService = $registrationService;
        $this->loginService = $loginService;
        $this->dic = $dic;
        $this->user = $user;
        $this->activityLogger = $activityLogger;
        $this->request = $request;
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
        session()->put('previous_path', $this->dic->getUrlPath());
        $this->activityLogger->basicActivitySave(
            'learner_registration_page',
            'Someone accessed learner registration form page.',
            ['ip' => $this->request->ip()]
            );
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
        $user = $this->registrationService->registerAsLearner($inputs);
        if ($user) {
            $user->assignRole(config('dic.default_learner_role_name'));
            //send welcome and activation email
            Event::fire(new UserRegistered($user->id));
            $this->activityLogger->basicActivitySave(
                'learner_registration_success',
                config('dic-message.registration_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('login')->with('alert-success', config('dic-message.registration_success'));
        }
        $this->activityLogger->basicActivitySave(
            'learner_registration_fail',
            config('dic-message.general_fail'),
            ['ip' => $this->request->ip()]
        );
        return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * display school's registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSchoolRegistration()
    {
        session()->put('previous_path', $this->dic->getUrlPath());
        $this->activityLogger->basicActivitySave(
            'school_registration_page',
            'Someone accessed school registration form page.',
            ['ip' => $this->request->ip()]
        );
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
        $user = $this->registrationService->registerAsSchool($inputs);
        if ($user) {
            $user->assignRole(config('dic.default_school_role_name'));
            //send welcome and activation email
            Event::fire(new UserRegistered($user->id));
            $this->activityLogger->basicActivitySave(
                'school_registration_success',
                config('dic-message.registration_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('login')->with('alert-success', config('dic-message.registration_success'));
        }
        $this->activityLogger->basicActivitySave(
            'school_registration_fail',
            config('dic-message.general_fail'),
            ['ip' => $this->request->ip()]
        );
        return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
    }

    public function getLogin()
    {
        session()->put('previous_path', $this->dic->getUrlPath());
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
        if ($response) {
            if ($userType === config('dic.learner_user_type_name')) {
                $this->activityLogger->basicActivitySave(
                    'learner_email_login_success',
                    'successfully logged in by learner',
                    ['ip' => $this->request->ip()]
                );
                return redirect('learner')->with('alert-success', config('dic-message.login_success'));
            }
            if ($userType === config('dic.school_user_type_name')) {
                $this->activityLogger->basicActivitySave(
                    'school_email_login_success',
                    'successfully logged in by school',
                    ['ip' => $this->request->ip()]
                );
                return redirect('school')->with('alert-success', config('dic-message.login_success'));
            }
        }
        $this->activityLogger->basicActivitySave(
            'email_login_fail',
            config('dic-message.email_login_fail'),
            ['ip' => $this->request->ip()]
        );
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
     * @return mixed
     */
    public function facebookAuth()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function facebookCallback()
    {
        $facebook_User = Socialite::driver('facebook')->user();
        $previousPath = session()->get('previous_path');
        if (trim($previousPath[0]) == 'register-as-learner') { // register as learner
            $facebook_User->user_role = config('dic.learner_user_type_name');
            $authUser = $this->registrationService->findOrCreateUser($facebook_User);
            if ($authUser) {
                $authUser->assignRole(config('dic.default_learner_role_name'));
                Event::fire(new FacebookRegistered($authUser->id));
                return redirect('login')->with('alert-success', config('dic-message.facebook_registration_success'));
            } else {
                return redirect('register-as-learner')->with('alert-warning', config('dic-message.general_fail'));
            }
        } else if (trim($previousPath[0]) == 'register-as-school') { //register as school
            $facebook_User->user_role = config('dic.school_user_type_name');
            $authUser = $this->registrationService->findOrCreateUser($facebook_User);
            if ($authUser) {
                $authUser->assignRole(config('dic.default_school_role_name'));
                Event::fire(new FacebookRegistered($authUser->id));
                return redirect('login')->with('alert-success', config('dic-message.facebook_registration_success'));
            } else {
                return redirect('register-as-school')->with('alert-warning', config('dic-message.general_fail'));
            }
        } else if (trim($previousPath[0]) == 'login') { //login
            $authUser = $this->registrationService->findOrCreateUser($facebook_User);
            if ($authUser == 'not_registered') {
                return redirect('login')->with('alert-warning', config('dic-message.facebook_login_not_found'));
            }
            Auth::login($authUser, true);
            $user = Auth::user();
            if ($user) {
                if ($user->user_type == config('dic.school_user_type_name')) {
                    return redirect('school')->with('alert-success', config('dic-message.login_success'));
                } else {
                    return redirect('learner')->with('alert-success', config('dic-message.login_success'));
                }
            } else {
                return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
            }
        } else {
            return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
        }
    }

    /**
     * display reset link send form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPasswordReset()
    {
        return view('user.password_reset');
    }

    /**
     * process reset link form
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postPasswordReset(User $user)
    {
        $this->validate($this->request, [
            'email' => 'required|email',
        ]);

        $email = $this->request->get('email');
        if ($user->isEmailExists($email)) {
            if ($this->loginService->sendPasswordResetLink($email)) {
                return redirect()->back()->with('alert-success', config('dic-message.reset_link_success'));
            }
            return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
        }
        return redirect()->back()->with('alert-danger', config('dic-message.reset_link_fail'));
    }

    /**
     * display set new password form
     *
     * @param $key
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNewPassword($key){
        $customBreadcrumb = '<ol class="breadcrumb"><li><a href="/">Home</a></li><li>New Password</li></ol>';
        return view('user.new_password', compact('key', 'customBreadcrumb'));
    }

    /**
     * process set new password form
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postNewPassword(){
        $this->validate($this->request, [
            'password' => 'required|between:6,15|regex:/^[ A-Za-z0-9!@#$%&_-]*$/',
            'confirm_password' => 'required|same:password',
        ]);
        if($user = $this->user->getResetKeyUser($this->request->get('key'))){
            $user = $user->firstOrFail();
            $user->pass_key = Hash::make($this->request->get('password'));
            if($user->save()){
                $user->reset_key = '';
                $user->save();
                $this->activityLogger->basicActivitySave(
                    'password_reset_success',
                    config('dic-message.password_reset_success'),
                    ['ip' => $this->request->ip()]
                );
                return redirect('login')->with('alert-success', config('dic-message.password_reset_success'));
            }
        }
        $this->activityLogger->basicActivitySave(
            'password_reset_fail',
            config('dic-message.general_fail'),
            ['ip' => $this->request->ip()]
        );
        return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * account activation page
     *
     * @param $key
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getAccountActivate($key){
        if($user = $this->user->getActivationKeyUser($key)){
            $user = $user->firstOrFail();
            $user->status = 'active';
            $user->activation_key = '';
            if($user->save()){
                $this->activityLogger->basicActivitySave(
                    'account_activation_success',
                    config('dic-message.account_activation_success'),
                    ['ip' => $this->request->ip()]
                );
                return redirect('login')->with('alert-success', config('dic-message.account_activation_success'));
            }
        }
        $this->activityLogger->basicActivitySave(
            'account_activation_fail',
            config('dic-message.general_fail'),
            ['ip' => $this->request->ip()]
        );
        return redirect('login')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * display learner profile page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLearnerDashboard()
    {
        return view('learner.learner_dashboard');
    }

    /**
     * display school profile page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSchoolProfile()
    {
        return view('school.school_profile');
    }
}
