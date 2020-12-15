<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRestPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $link ;

    public function __construct($link )
    {
        $this->link =$link;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('AhmedSalah20103020@gmail.com')->subject('resetting your password')->view('guest.forgetPassword.message',[
            'link'=>$this->link ,

        ]) ;
    }
}
