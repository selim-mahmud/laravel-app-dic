<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\LearnerRegistrationWelcome;
use App\Mail\SchoolRegistrationWelcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        if ($user->user_type === config('dic.learner_user_type_name')) {
            Mail::to($user->email)->queue(new LearnerRegistrationWelcome($user));
        }else{
            Mail::to($user->email)->queue(new SchoolRegistrationWelcome($user));
        }
    }
}
