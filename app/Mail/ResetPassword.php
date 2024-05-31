<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->name = $data['name'];
        $this->otp = $data['otp'];
    }

    /**
     * Get the message envelope.
     */
   public function build()
    {
        $data['name']=$this->name;
        $data['otp']= $this->otp;

        return $this->view('mail.reset',$data);
    }
}
