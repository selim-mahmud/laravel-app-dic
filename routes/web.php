<?php

Route::get('/', array('as' => 'home', 'uses' => 'PageController@home'));
Route::get('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@getLearnerRegistration'));
Route::post('register-as-learner', array('as' => 'register_as_learner', 'uses' => 'UserController@postLearnerRegistration'));



