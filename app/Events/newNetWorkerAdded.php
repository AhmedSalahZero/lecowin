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

class newNetWorkerAdded implements ShouldBroadcast
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

    public function __construct($user,$networker , $level)
    {



        $this->notifiable_id = [$user->getTheAdmin()->id , $user->id , $networker->id ];
        $this->message_en = [
            $user->getTheAdmin()->id =>$networker->first_name . ' ' . $networker->last_name . ' has added to ' . $user->first_name . ' ' . $user->last_name . ' netowrk at level ' . $level,
            $user->id =>$networker->first_name . ' ' . $networker->last_name . ' '. ' has added to your network at level '.$level ,
            $networker->id => 'you added to ' . $user->first_name . ' ' . $user->last_name  . ' network '
        ];
        $this->message_ar = [
            $user->getTheAdmin()->id =>$networker->first_name . ' ' . $networker->last_name . ' اُضيف الي شبكة' . $user->first_name . ' ' . $user->last_name . ' في المستوي ' . $level,
            $user->id =>$networker->first_name . ' ' . $networker->last_name . ' '. 'اُضيف الي شبكتك في المستوي '.$level ,
            $networker->id => 'لقد اٌضفت الي شبكة ' . $user->first_name . ' ' . $user->last_name
        ];

    }
    public function broadcastOn():array
    {
        return ['new-NetWorker-Added-channel'];
    }
    public function broadcastAs():string
    {
        return 'new-NetWorker-Added';
    }

}
