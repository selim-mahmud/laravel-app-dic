<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\AccountActivationLink;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAccountActivationEmail
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        $key = str_random(40);
        $user->activation_key = $key;
        if($user->save()){
            $activationLink = config('dic.account_activation_base_link').$key;
            Mail::to($user->email)->queue(new AccountActivationLink($user, $activationLink));
        }
    }
}
