<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountActivationLink extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The url to activate an account
     *
     * @var string
     */
    public $activationLink;

    /**
     * user model
     *
     * @var User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $activationLink)
    {
        $this->user = $user;
        $this->activationLink = $activationLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.account.account_activation');
    }
}
