<?php

namespace App\Http\Controllers;

use App\Helpers\Dic;
use App\Http\Requests\LoginAsEmailRequest;
use App\Http\Requests\RegistrationAsLearnerRequest;
use App\Http\Requests\RegistrationAsSchoolRequest;
use App\School;
use App\Services\LoginService;
use App\Services\RegistrationService;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

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
     * @var $dic Dic
     */
    protected $dic;

    /**
     * UserController constructor.
     * @param RegistrationService $registrationService
     * @param LoginService $loginService
     */
    public function __construct(RegistrationService $registrationService, LoginService $loginService, Dic $dic)
    {
        $this->registrationService = $registrationService;
        $this->loginService = $loginService;
        $this->dic = $dic;
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
                return "You are logged in as learner";
            }
            if ($userType === config('dic.school_user_type_name')) {
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
                return redirect('login')->with('alert-success', config('dic-message.facebook_registration_success'));
            } else {
                return redirect('register-as-learner')->with('alert-warning', config('dic-message.general_fail'));
            }
        } else if (trim($previousPath[0]) == 'register-as-school') { //register as school
            $facebook_User->user_role = config('dic.school_user_type_name');
            $authUser = $this->registrationService->findOrCreateUser($facebook_User);
            if ($authUser) {
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
                    return redirect()->route('school-profile', $user->school_id);
                } else {
                    return redirect()->route('learner-profile', $user->id);
                }
            } else {
                return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
            }

        } else {
            return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
        }
    }

    public function getLearnerProfile()
    {
        return 'This is learner profile';
    }

    public function getSchoolProfile()
    {
        return 'This is school profile';
    }

}
