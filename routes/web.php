<?php

Route::get('/', array('as' => 'home', 'uses' => 'PageController@home'));
Route::get('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@getLearnerRegistration'));
Route::post('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@postLearnerRegistration'));
Route::get('login', array('as' => 'login', 'uses' => 'UserController@getLogin'));
Route::post('login', array('as' => 'login', 'uses' => 'UserController@postLogin'));



