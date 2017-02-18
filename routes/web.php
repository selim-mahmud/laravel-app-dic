<?php

Route::get('/', array('as' => 'home', 'uses' => 'PageController@home'));
Route::get('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@getLearnerRegistration'));
Route::post('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@postLearnerRegistration'));
Route::get('register-as-school', array('as' => 'register-as-school', 'uses' => 'UserController@getSchoolRegistration'));
Route::post('register-as-school', array('as' => 'register-as-school', 'uses' => 'UserController@postSchoolRegistration'));
Route::get('login', array('as' => 'login', 'uses' => 'UserController@getLogin'));
Route::post('login', array('as' => 'login', 'uses' => 'UserController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
Route::get('facebook-auth', array('as' => 'facebook-register', 'uses' => 'UserController@facebookAuth'));
Route::get('facebook-callback', array('as' => 'facebook-callback', 'uses' => 'UserController@facebookCallback'));
Route::get('password-reset', array('as' => 'password-reset', 'uses' => 'UserController@getPasswordReset'));
Route::post('password-reset', array('as' => 'password-reset', 'uses' => 'UserController@postPasswordReset'));
Route::get('new-password/{key}', array('as' => 'new-password', 'uses' => 'UserController@getNewPassword'));
Route::post('new-password', array('as' => 'new-password', 'uses' => 'UserController@postNewPassword'));
Route::get('account-activate/{key}', array('as' => 'new-password', 'uses' => 'UserController@getAccountActivate'));
Route::get('learner-profile', array('as' => 'learner-profile', 'uses' => 'UserController@getLearnerProfile'));
Route::get('school-profile', array('as' => 'school-profile', 'uses' => 'UserController@getSchoolProfile'));

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Route::get('role', function(){
    $user = User::find(13);
    $user->assignRole('learner');
});



