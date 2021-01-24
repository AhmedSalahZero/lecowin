<?php

namespace App\Listeners;

use App\Models\VerificationUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class storeVerificationCodeListener
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
        VerificationUser::create([
            'token'=>$event->token,
            'code'=>$event->verificationCode ,
            'email'=>$event->email ,
        ]);


    }
}
