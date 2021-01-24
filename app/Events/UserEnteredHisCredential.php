<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserEnteredHisCredential
{
    // use Dispatchable, InteractsWithSockets, SerializesModels;
    public $email ;
    public $token ;
    public $verificationCode ;
    public function __construct($userEmail,$token , $verificationCode)
    {
        $this->email = $userEmail ;
        $this->token = $token ;
        $this->verificationCode=$verificationCode;
    }



}
