<?php

return [
    'learner_user_type_name' => 'learner',
    'school_user_type_name' => 'school',
    'email_login_name' => 'email',
    'facebook_login_name' => 'facebook',
    'password_reset_base_link' => env('APP_URL').'new-password/',
    'account_activation_base_link' => env('APP_URL').'account-activate/',
    'default_learner_role_name' => 'learner',
    'default_school_role_name' => 'school_manager',
];