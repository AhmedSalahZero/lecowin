<?php

namespace App\Listeners;


use App\Mail\SendVerificationCodeMail;
use App\Models\VerificationUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendVerificationCodeToUserEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        mail::to($event->email)->send(new SendVerificationCodeMail($event->verificationCode));
    }
}
