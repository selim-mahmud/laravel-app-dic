<?php

use App\School;

Route::get('/', array('as' => 'home', 'uses' => 'PageController@home'));
Route::get('contact-us', 'PageController@contactUs');
Route::post('contact-us', 'PageController@sendContactUs');
Route::post('contact-us-footer', 'PageController@sendContactUsFooter');
Route::post('subscribe', 'PageController@subscribe');
Route::get('about-us', 'PageController@aboutUs');
Route::get('privacy-policy', 'PageController@privacyPolicy');
Route::get('blog', 'BlogController@getPublishedPosts');
Route::get('blog/categories', 'BlogController@getCategories');
Route::get('blog/{slug}', 'BlogController@getSinglePost');
Route::get('blog/categories/{category}', 'BlogController@getCategoryPost');
Route::get('facebook-auth', array('as' => 'facebook-register', 'uses' => 'UserController@facebookAuth'));
Route::get('facebook-callback', array('as' => 'facebook-callback', 'uses' => 'UserController@facebookCallback'));
Route::get('password-reset', array('as' => 'password-reset', 'uses' => 'UserController@getPasswordReset'));
Route::post('password-reset', array('as' => 'password-reset', 'uses' => 'UserController@postPasswordReset'));
Route::get('new-password/{key}', array('as' => 'new-password', 'uses' => 'UserController@getNewPassword'));
Route::post('new-password', array('as' => 'new-password', 'uses' => 'UserController@postNewPassword'));
Route::get('account-activate/{key}', array('as' => 'new-password', 'uses' => 'UserController@getAccountActivate'));
Route::get('instructors/{state}', 'InstructorDisplayController@getStateInstructor');
Route::get('driving-schools/{school}', 'InstructorDisplayController@getSingleSchool');
Route::get('search-driving-schools', 'InstructorDisplayController@searchPostcode');

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
    Route::get('learner/reviews', 'ReviewController@getLernerReview');
    Route::post('learner/reviews', 'ReviewController@reviewStore');
    Route::get('learner/messages', array('as' => 'learner-messages', function(){
        return view('learner.learner_dashboard');
    }));
});

Route::group(['middleware' => ['permission:school_profile_operation']], function () { //only for school_manager
    Route::post('school/profile/change-photo', array('as' => 'change-photo', 'uses' => 'SchoolProfileController@postChangePhoto'));
    Route::post('school/profile/change-name', array('as' => 'change-name', 'uses' => 'SchoolProfileController@postChangeName'));
    Route::post('school/profile/change-school-name', array('as' => 'change-school-name', 'uses' => 'SchoolProfileController@postchangeSchoolName'));
    Route::post('school/profile/change-eamil', array('as' => 'change-eamil', 'uses' => 'SchoolProfileController@postChangeEmail'));
    Route::post('school/profile/change-password', array('as' => 'change-password', 'uses' => 'SchoolProfileController@postChangePassword'));
    Route::post('school/profile/change-short-description', 'SchoolProfileController@postChangeShortDescription');
    Route::post('school/profile/change-long-description', 'SchoolProfileController@postChangeLongDescription');
    Route::post('school/profile/change-website', 'SchoolProfileController@postChangeWebsite');
    Route::post('school/profile/change-facebook', 'SchoolProfileController@postChangeFacebook');
    Route::post('school/profile/change-twitter', 'SchoolProfileController@postChangeTwitter');
    Route::resource('school/instructors', 'InstructorController');
    Route::get('school/services', 'SchoolServiceController@index');
    Route::post('school/services', 'SchoolServiceController@store');
    Route::get('school/services/delete/{schoolId}/{serviceId}', 'SchoolServiceController@delete');
    Route::get('school/medias', 'SchoolMediaController@index');
    Route::post('school/medias', 'SchoolMediaController@store');
    Route::get('school/medias/delete/{schoolMediaId}', 'SchoolMediaController@delete');
    Route::resource('school/contacts', 'SchoolContactController');
    Route::get('school/service-area', 'SchoolServiceAreaController@index');
    Route::get('school/service-area/get-postcodes/{state_id}', 'SchoolServiceAreaController@getPostcodes');
    Route::post('school/service-area/save-service-area', 'SchoolServiceAreaController@saveServiceArea');
    Route::get('school/service-area/delete/{area_id}', 'SchoolServiceAreaController@deleteServiceArea');
});

Route::group(['middleware' => ['permission:instructor_profile_operation']], function () { //for both school_manager and instructor
    Route::get('school', array('as' => 'school', 'uses' => 'UserController@getSchoolProfile'));
    Route::get('school/reviews', 'ReviewController@getSchoolReview');
});

Route::group(['prefix' => 'staff', 'middleware' => ['permission:all_admin_operation']], function () {
    Route::get('/', 'StaffProfileController@index');
    Route::post('change-photo', 'StaffProfileController@postChangePhoto');
    Route::post('change-name', 'StaffProfileController@postChangeName');
    Route::post('change-display-name', 'StaffProfileController@postChangeDisplayName');
    Route::post('change-eamil', 'StaffProfileController@postChangeEmail');
    Route::post('change-password', 'StaffProfileController@postChangePassword');
    Route::get('reviews', 'StaffReviewController@index');
    Route::get('reviews/approved', 'StaffReviewController@approvedReviews');
    Route::get('reviews/approving', 'StaffReviewController@approvingReviews');
    Route::get('reviews/rejected', 'StaffReviewController@rejectedReviews');
    Route::get('reviews/approve/{id}', 'StaffReviewController@approve');
    Route::get('reviews/reject/{id}', 'StaffReviewController@reject');
    Route::get('users', 'StaffUserController@index');
    Route::get('schools', 'StaffSchoolController@index');
    Route::get('schools/shadow/{id}', 'StaffSchoolController@shadow');
    Route::resource('posts', 'StaffPostController');
});

Route::get('test', function(){
    $records = DB::table('raw')->get();
    foreach ($records as $record){
        $stateName = $record->state;
        $state = DB::table('states')->where('name', $stateName)->get();
        DB::table('postcodes')->insert(
            ['country_id' => 1, 'state_id' => $state[0]->id, 'city_id' => 0,
                'postcode' => $record->post_code, 'suburb' => $record->suburb,
                'lat' => $record->lat, 'lon' => $record->lon]
        );
    }
});

// CMS Content "catch all" Route
Route::get('{path1}/{path2?}', 'CmsController@index')
    ->where('path1', '[A-Za-z0-9\-]+') // first component of path MUST only consist of one or more a-z A-Z 0-9 and "-"
    ->name('cms-content');






