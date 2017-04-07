<?php

namespace App\Listeners;

use App\Events\FacebookRegistered;
use App\Mail\LearnerRegistrationWelcome;
use App\Mail\SchoolRegistrationWelcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailFacebook implements ShouldQueue
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
     * @param  FacebookRegistered $event
     * @return void
     */
    public function handle(FacebookRegistered $event)
    {
        $user = $event->user;
        if ($user->user_type === config('dic.learner_user_type_name')) {
            Mail::to($user->email)->send(new LearnerRegistrationWelcome($user));
        }else{
            Mail::to($user->email)->send(new SchoolRegistrationWelcome($user));
        }
    }
}
