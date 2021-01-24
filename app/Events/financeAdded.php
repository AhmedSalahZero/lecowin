<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class financeAdded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user ;
    public $notifiable_id ;
    public $message_en ;
    public $message_ar ;
    public function __construct($user,$amount)
    {
        $this->user = $user ;
        $this->notifiable_id = [$user->getTheAdmin()->id , $user->id  ];
        $this->message_en = [
               $user->getTheAdmin()->id =>$user->first_name . ' ' . $user->last_name . ' has received ' . $amount . ' EGP '  ,
               $user->id => 'you received ' .$amount . ' EGP ' ,
            ];
        $this->message_ar = [
            $user->getTheAdmin()->id =>$user->first_name . ' ' . $user->last_name . ' استلم ' . $amount . ' جنية مصري '  ,
            $user->id => 'لقد استلمت ' .$amount . ' جنية مصري ' ,
        ];

    }
    public function broadcastOn():array
    {
        return ['new-finance-Added-channel'];
    }
    public function broadcastAs():string
    {
        return 'new-finance-Added';
    }

}
