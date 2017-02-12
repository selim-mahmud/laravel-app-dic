<?php

Route::get('/', array('as' => 'home', 'uses' => 'PageController@home'));
Route::get('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@getLearnerRegistration'));
Route::post('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@postLearnerRegistration'));
Route::get('register-as-school', array('as' => 'register-as-school', 'uses' => 'UserController@getSchoolRegistration'));
Route::post('register-as-school', array('as' => 'register-as-school', 'uses' => 'UserController@postSchoolRegistration'));
Route::get('login', array('as' => 'login', 'uses' => 'UserController@getLogin'));
Route::post('login', array('as' => 'login', 'uses' => 'UserController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));



