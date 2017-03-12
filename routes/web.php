<?php

use App\School;

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
    Route::get('learner', array('as' => 'learner', 'uses' => 'UserController@getLearnerDashboard'));
    Route::post('learner/change-photo', array('as' => 'change-photo', 'uses' => 'LearnerProfileController@postChangePhoto'));
    Route::post('learner/change-name', array('as' => 'change-name', 'uses' => 'LearnerProfileController@postChangeName'));
    Route::post('learner/change-display-name', array('as' => 'change-display-name', 'uses' => 'LearnerProfileController@postChangeDisplayName'));
    Route::post('learner/change-eamil', array('as' => 'change-email', 'uses' => 'LearnerProfileController@postChangeEmail'));
    Route::post('learner/change-password', array('as' => 'change-password', 'uses' => 'LearnerProfileController@postChangePassword'));
    Route::get('learner/messages', array('as' => 'learner-messages', function(){
        return view('learner.learner_dashboard');
    }));
});

Route::group(['middleware' => ['permission:school_profile_operation']], function () { //only for school_manager
    Route::get('school/profile', array('as' => 'school-profile', 'uses' => 'SchoolProfileController@getSchoolProfile'));
    Route::post('school/profile/change-photo', array('as' => 'change-photo', 'uses' => 'SchoolProfileController@postChangePhoto'));
    Route::post('school/profile/change-name', array('as' => 'change-name', 'uses' => 'SchoolProfileController@postChangeName'));
    Route::post('school/profile/change-school-name', array('as' => 'change-school-name', 'uses' => 'SchoolProfileController@postchangeSchoolName'));
    Route::post('school/profile/change-eamil', array('as' => 'change-eamil', 'uses' => 'SchoolProfileController@postChangeEmail'));
    Route::post('school/profile/change-password', array('as' => 'change-password', 'uses' => 'SchoolProfileController@postChangePassword'));
    Route::resource('school/instructors', 'InstructorController');
    Route::get('school/services', 'SchoolServiceController@index');
    Route::post('school/services', 'SchoolServiceController@store');
    Route::get('school/services/delete/{schoolId}/{serviceId}', 'SchoolServiceController@delete');
    Route::get('school/medias', 'SchoolMediaController@index');
    Route::post('school/medias', 'SchoolMediaController@store');
    Route::get('school/medias/delete/{schoolMediaId}', 'SchoolMediaController@delete');
});

Route::group(['middleware' => ['permission:instructor_profile_operation']], function () { //for both school_manager and instructor
    Route::get('school', array('as' => 'school', 'uses' => 'UserController@getSchoolDashboard'));
});

Route::get('test', function(){
    $instructors = School::find(Auth::user()->school_id)->instructors;

    dd($instructors->pluck('id')->all());
});




