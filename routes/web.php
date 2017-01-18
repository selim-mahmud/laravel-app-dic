<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

Route::get('/', array('as'=>'home', 'uses'=>'PageController@home'));
Route::match(['get', 'post'], 'register-as-learner', array('as'=>'register_as_learner', 'uses'=>'UserController@registerAsLearner'));
/*Route::match(['get', 'post'], 'register-as-school', array('as'=>'register_as_school', 'uses'=>'UserController@registerAsSchool'));*/
Route::resource('register-as-school', 'UserController');
Route::get('login', array('as'=>'login', 'uses'=>'UserController@login'));
Route::post('login', array('as'=>'login', 'uses'=>'UserController@postLogin'));
Route::get('user/activation/{token}',['as'=>'user.activate','uses'=> 'UserController@activateUser']);
Route::get('facebook-register', array('as'=>'facebook_register', 'uses'=>'UserController@facebookRegister'));
Route::get('facebook-login', array('as'=>'facebook_login', 'uses'=>'UserController@facebookLogin'));
Route::get('facebook-callback', array('as'=>'facebook_callback', 'uses'=>'UserController@facebookCallback'));


Route::group(['middleware' => ['auth']], function () {
    Route::get('school-profile/{id}', array('as'=>'school_profile', 'uses'=>'SchoolProfileController@getProfile'));
    Route::get('learner-profile', array('as'=>'learner_profile', 'uses'=>'LearnerProfileController@getProfile'));
    Route::get('logout', array('as'=>'logout', 'uses'=>'UserController@logout'));
});




Route::get('pages', function () {
    
    return view('welcome');
});

Route::get('home_page', function () {
    return view('pages.home');
});

Route::get('instructors_list_page', function () {
    return view('pages.instructors_list');
});

Route::get('instructor_single_page', function () {
    return view('pages.instructor_single');
});



Route::get('register_as_instructor_page', function () {
    return view('pages.register_as_instructor');
});

Route::get('register_as_learner_page', function () {
    return view('pages.register_as_learner');
});

Route::get('contact_page', function () {
    return view('pages.contact');
});

Route::get('blog_list_page', function () {
    return view('pages.blog_list');
});

Route::get('blog_single_page', function () {
    return view('pages.blog_single');
});

Route::get('404_page', function () {
    return view('pages.404');
});

Route::get('admin_page', ['as' =>'control.page', 'uses' => function() {
    return view('admin.index');
}]);

Route::get('send_email', ['as' =>'control.sendEmail', 'uses' => function() {



    $data = [
        'activation_link'=> "http://www.google.com",
    ];

    Mail::send('emails.activation_link', $data, function($message){
        $message->to('comolroy@gmail.com')
                ->subject('Sample Subject')
                ->sender('comolroy@gmail.com', 'Driving Instructors Catalog');
    });

    return "Sending Email";
}]);



/*
 * Used control keyword instead of admin
 */

Route::resource('control/users', 'AdminUsersController');



Route::get('test', function () {
    // $user = App\User::find(1);

    // dd($user->role()->first()->role_title);

});


