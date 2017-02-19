<?php

Route::get('/', array('as' => 'home', 'uses' => 'PageController@home'));
Route::get('facebook-auth', array('as' => 'facebook-register', 'uses' => 'UserController@facebookAuth'));
Route::get('facebook-callback', array('as' => 'facebook-callback', 'uses' => 'UserController@facebookCallback'));
Route::get('password-reset', array('as' => 'password-reset', 'uses' => 'UserController@getPasswordReset'));
Route::post('password-reset', array('as' => 'password-reset', 'uses' => 'UserController@postPasswordReset'));
Route::get('new-password/{key}', array('as' => 'new-password', 'uses' => 'UserController@getNewPassword'));
Route::post('new-password', array('as' => 'new-password', 'uses' => 'UserController@postNewPassword'));
Route::get('account-activate/{key}', array('as' => 'new-password', 'uses' => 'UserController@getAccountActivate'));

Route::group(['middleware' => ['guest']], function () { //for guests only
    Route::get('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@getLearnerRegistration'));
    Route::post('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@postLearnerRegistration'));
    Route::get('register-as-school', array('as' => 'register-as-school', 'uses' => 'UserController@getSchoolRegistration'));
    Route::post('register-as-school', array('as' => 'register-as-school', 'uses' => 'UserController@postSchoolRegistration'));
    Route::get('login', array('as' => 'login', 'uses' => 'UserController@getLogin'));
    Route::post('login', array('as' => 'login', 'uses' => 'UserController@postLogin'));
});

Route::group(['middleware' => ['auth']], function () { //for all logged in users
    Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
});

Route::group(['middleware' => ['permission:learner_profile_operation']], function () { //only for learner role
    Route::get('learner', array('as' => 'learner-dashboard', 'uses' => 'UserController@getLearnerDashboard'));
    Route::get('learner/messages', array('as' => 'learner-messages', function(){
        return view('learner.learner_dashboard');
    }));
});

Route::group(['middleware' => ['permission:school_profile_operation']], function () { //only for school_manager
});

Route::group(['middleware' => ['permission:instructor_profile_operation']], function () { //for both school_manager and instructor
    Route::get('school-dashboard', array('as' => 'school-dashboard', 'uses' => 'UserController@getSchoolDashboard'));
});

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Route::get('role', function(){
    $user = User::find(13);
    $user->assignRole('learner');
});



