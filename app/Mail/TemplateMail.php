<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mail1 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        // You can change the subject here
        $subject = env('MAIL_DEFAULT_SUBJECT', "");
        // You can change the sender email here
        $senderEmail = env('MAIL_DEFAULT_SENDER', "");
        
        return $this->subject($subject)->from($senderEmail)->view('mail.template');
    }
}
