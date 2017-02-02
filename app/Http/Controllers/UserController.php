<?php

namespace App\Http\Controllers;

use App\Helpers\ActivationService;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\ContactEmail;
use App\Media;
use App\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\CountValidator\Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Helpers\General;

class UserController extends Controller{

    protected $activationService;

    public function __construct(ActivationService $activationService){
        //$this->middleware('guest', ['only' => ['registerAsSchool', 'registerAsLearner', 'login', 'facebookRegister', 'facebookCallback', 'findOrCreateUser']]);
        $this->activationService = $activationService;
    }

    /**
    /* function to display and process register as instructor form
    /*
    /* @param
    /*
    /* @return view
    */
    public function registerAsSchool(Request $request){
        session()->put('previous_path', General::currentPath());
    }

    public function userLocation(){
        $geoip = geoip();
        $location = $geoip->getLocation();

        dd($location->country);
    }

    /**
    /* function to display and process register as learner form
    /*
    /* @param
    /*
    /* @return view
    */
    public function registerAsLearner(){
        session()->put('previous_path', General::currentPath());
        return view('user.register_as_learner');
    }

    /**
    /* function to display and process login form
    /*
    /* @return view
    */
    public function login(){
        session()->put('previous_path', General::currentPath());
        return view('user.login');
    }

    /**
    /* function to display and process login form
    /*
    /* @return view
     */

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);

        if(User::isAvailable($request->email)){
           return redirect()->back()->with('alert-danger', 'Invalid Email address. No account found with given email address.');
        }

        if(!User::isActive($request->email)){
            auth()->logout();
           return redirect()->back()->with('alert-warning', 'The account is not active. Click the link below to resend the activation link');
        }


        if(Auth::attempt(['email'=>$request->email, 'password' => $request->password, 'is_active' => 1])){
            return "Logged in with email";
        }else{
            return "Sorry Can't Logged In";
        }

    }

    /**
     * method to logout.
     *
     * @return view
     */
    public function logout(){
        Auth::logout();
        return redirect('login')->with('alert-success', 'You have successfully Logged out.');
    }

    /**
    /* function to register using fb
    /*
    /* @param $user_type string
    /*
    /* @return
    */
    public function facebookRegister(){
        return Socialite::driver('facebook')->redirect();
    }

    /**
    /* function to login using fb
    /*
    /* @return
    */
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
    /* function to login using fb
    /*
    /* @return
    */
    public function facebookCallback(){

         try {

            $facebook_User = \Socialite::driver('facebook')->user();
            $previous_path = session()->get('previous_path');

            if(trim($previous_path[0]) == 'register-as-learner'){ // register as learner

                $facebook_User->user_role = 'learner';
                $authUser = $this->findOrCreateUser($facebook_User);

                if($authUser){
                    return redirect('login')->with('alert-success', 'You have successfully registered. Please use facebook to login now.');
                }else{
                    return redirect('register-as-learner')->with('alert-warning', 'Something went wrong. Please try again later.');
                }

            }else if(trim($previous_path[0]) == 'register-as-school'){ //register as school

                $facebook_User->user_role = 'manager';
                $authUser = $this->findOrCreateUser($facebook_User);
                if($authUser){
                    return redirect('login')->with('alert-success', 'You have successfully registered. Please use facebook to login now.');
                }else{
                    return redirect('register-as-school')->with('alert-warning', 'Something went wrong. Please try again later.');
                }

            }else if(trim($previous_path[0]) == 'login'){ //login

                $authUser = $this->findOrCreateUser($facebook_User);

                if($authUser == 'not_registered'){
                    return redirect('login')->with('alert-warning', 'Please register using facebook before you login.');
                }

                Auth::login($authUser, true);
                $user = Auth::user();

                if($user){
                    if($user->school_id){
                        return redirect()->route('school_profile', $user->school_id);
                    }else{
                        return redirect()->route('learner_profile', $user->user_id);
                    }
                }else{
                    dd('Something went wrong. Try again later.');
                }

            }else{
                dd('Something went wrong. Try again later.');
            }
        } catch (Exception $e) {
            dd('Something went wrong. Try again later.');
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for register as school
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.register_as_school');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        //
        try{
            /*
             * registration_type = 1 means register as school
             */
            if($request->registration_type == 1){
                DB::beginTransaction();
                $new_user =([
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

                $user=User::create($new_user);
                $user->update(['school_id'=> $new_school->school_id]);

                $contact_email=ContactEmail::create([
                    'email'=>$user->email,
                    'owner_id'=>$user->user_id,
                ]);

                $this->activationService->sendActivationMail($user);

                DB::commit();

                $display_message='Hello ' . $user->display_name . ' , your school account has been created. Activation link is send to your email.';
                return redirect('/login')->with('alert-success',$display_message );
            }
            /*
             * registration_type == 2 means register as learner
             */
            elseif($request->registration_type == 2){

                DB::beginTransaction();
                $new_user =([
                    'role_id' => 4,
                    'name' => $request->name,
                    'display_name' => General::getDisplayName($request->name),
                    'facebook_id' => 0,
                    'school_id'=>0,
                    'email' => $request->email,
                    'pass_key' => bcrypt($request->password),
                    'is_active' => 0,
                ]);

                $user=User::create($new_user);

                $contact_email=ContactEmail::create([
                    'email'=>$user->email,
                    'owner_id'=>$user->user_id,
                ]);

                $this->activationService->sendActivationMail($user);

                DB::commit();

                $display_message='Hello ' . $user->display_name . ' , your account has been created. Activation link is send to your email.';
                return redirect('/login')->with('alert-success',$display_message );
            }

        }catch(Exception $e){
            DB::rollback();
            return redirect('register-as-school')->with('alert-warning', 'Something went wrong. Please try again later.' .'<br>' . $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
 
        if ($authUser){
            return $authUser;
        }

        if(isset($facebookUser->user_role)){
            $user_role = Role::where('role_title', $facebookUser->user_role)->first();
        }else{

            return 'not_registered';
            
        }

        if($facebookUser->user_role == 'learner'){ // register as learner
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

        if($facebookUser->user_role == 'manager'){ // register as school

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
 
        if ($authUser){
            return $authUser;
        }else{
            return false;
        }




    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->logout();

            $display_message='Hello ' . $user->display_name . ' , account activation was successful. Please login to continue.';
            return redirect('/login')->with('alert-success',$display_message );
        }else{
            $display_message='Invalid Activation Link';
            return redirect('/login')->with('alert-warning',$display_message );
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
