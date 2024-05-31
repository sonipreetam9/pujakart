<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->otp = $data['otp'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['name']=$this->name;
        $data['otp']= $this->otp;

        return $this->view('mail.reset',$data);
    }
}
