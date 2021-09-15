<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MarquetingMail extends Mailable
{
    use Queueable, SerializesModels;


    public  $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bodymail)
    {
        //
        $this->body=$bodymail;
    }

    public function setSubject($subj){
        $this->subject($subj);      
     
     }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendemail');
    }
}
