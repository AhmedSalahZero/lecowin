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

class newAchievement implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $notifiable_id ;
    public $message_en;
    public $message_ar;
    public $type ;

    public function __construct($user,$level,$levelNetWorkers)
    {
        $this->notifiable_id = [0]; // 0 is the id for the account for the user that will receive all public notifications ;
        $this->message_en = [
            0 =>$user->first_name . ' ' . $user->last_name . ' '. ' has Completed '.$levelNetWorkers . ' Networkers In The Level '. $level,
        ];
        $this->message_ar = [
            0 =>$user->first_name . ' ' . $user->last_name . ' '. ' اكمل '.$levelNetWorkers . ' من الاعضاء في المستوي '. $level,
        ];
        $this->type = 'achievement';

    }
    public function broadcastOn():array
    {
        return ['new-achievement-channel'];
    }
    public function broadcastAs():string
    {
        return 'new-achievement';
    }
}
