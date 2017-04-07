<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ContactUsFormSubmit
 *
 * @package App\Mail
 */
class ContactUsFormSubmit extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;


    /**
     * Create a new message instance.
     *
     * @param array $formData
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_us');
    }
}