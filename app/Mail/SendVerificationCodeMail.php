<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendVerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $verificationCode;

    public function __construct($verificationCode)
    {
        $this->verificationCode=$verificationCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('AhmedSalah20103020@gmail.com')->subject(trans('lang.Your Verification Code At Lecowin'))->view('guest.verifyEmail.message',[
            'verificationCode'=>$this->verificationCode ,

        ]) ;

    }
}
