<?php

return [
    'learner_user_type_name' => 'learner',
    'school_user_type_name' => 'school',
    'staff_user_type_name' => 'staff',
    'email_login_name' => 'email',
    'facebook_login_name' => 'facebook',
    'password_reset_base_link' => env('APP_URL').'new-password/',
    'account_activation_base_link' => env('APP_URL').'account-activate/',
    'default_learner_role_name' => 'learner',
    'learner_permission_name1' => 'learner_profile_operation',
    'default_school_role_name' => 'school_manager',
    'school_manager_permission_name1' => 'school_profile_operation',
    'school_manager_permission_name2' => 'instructor_profile_operation',
    'default_instructor_role_name' => 'instructor',
    'instructor_permission_name1' => 'instructor_profile_operation',
    'default_learner_profile_photo' => 'img/theme/default_avatar.jpg',
    'default_avatar_path' => 'user-contents/images/avatar',
    'instructor_avatar_path' => 'user-contents/images/school/instructor',
    'school_media_path' => 'user-contents/images/school/media',
];