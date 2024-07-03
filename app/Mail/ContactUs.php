<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $email, $message)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // This is what the recepieint will see when they receive the email
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Contact Us | Message from ' . $this->fullname)
                    ->markdown('test-mail') // This is the view file for the email, you can design the mail in this page
                    ->with([
                        'fullname' => $this->fullname,
                        'email' => $this->email,
                        'message' => $this->message,
                    ]);
    }
}
