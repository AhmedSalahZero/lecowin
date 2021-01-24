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

class adminSendNotification implements ShouldBroadcast
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

    public function __construct($message_en,$message_ar)
    {
        $this->notifiable_id = [0]; // 0 is the id for the account for the user that will receive all public notifications ;
        $this->message_en = [
            0 =>$message_en
        ];
        $this->message_ar = [
            0 =>$message_ar
        ];
        $this->type = 'public_notification';

    }
    public function broadcastOn():array
    {
        return ['new-public-notification-channel'];
    }
    public function broadcastAs():string
    {
        return 'new-public-notification';
    }
}
