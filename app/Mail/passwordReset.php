<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class passwordReset extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var $user User
     */
    public $user;

    /**
     * The unique activation key.
     *
     * @var $activationKey
     */
    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $resetLink
     */
    public function __construct(User $user, string $resetLink)
    {
        $this->user = $user;
        $this->resetLink = $resetLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.account.password_reset');
    }
}
