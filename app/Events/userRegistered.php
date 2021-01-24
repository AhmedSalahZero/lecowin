<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class userRegistered implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user ;
    public $message_en ;
    public $message_ar ;
    public $notifiable_id ;
    public function __construct($user)
    {
        $this->message_ar= [$user->getTheAdmin()->id =>$user->first_name .' ' .$user->last_name . ' قام بالتسجيل عضو جديد'];
        $this->message_en= [$user->getTheAdmin()->id =>$user->first_name .' ' .$user->last_name . ' registered'];
        $this->notifiable_id =[$user->getTheAdmin()->id] ;
        $this->user = $user ;

    }
    public function broadcastOn():array
    {
        return ['user-registered-channel'];
    }
    public function broadcastAs():string
    {
        return 'user-registered';
    }

}
