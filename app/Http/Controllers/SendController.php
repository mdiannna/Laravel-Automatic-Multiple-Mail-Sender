<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mail1;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
{
   
    /**
     * Display the template
     *
     * @return \Illuminate\Http\Response
     */
    public function viewTemplate()
    {
        return view('mail.template');
    }

    /**
     * Send the template message to mails specified int the $mails variable
     * 
     * Note: the message will be sent SEPARATELY to each email
     * 
     * If you wish to send the message to all addresses in the same mail, just use
     * Mail::to($mails)->send(new Mail1());
     * (use it just once!)
     *
     * 
     */
    public function sendTemplateMail() {
      
        $mails = [ 
            "testemail@test.test",
        ];

        foreach ($mails as $mail) {
            try {
                Mail::to($mail)->send(new TemplateMail());
            } catch(\Exception $e){
                \Log::info("Exception:");
                \Log::info($mail);
                \Log::info($e);
            }
        }
       
        dd("Yaaaay! Mails were sent!!!");
        // return vier('your_view');
    }
}
