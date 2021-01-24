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

class userSentMoneyToUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $notifiable_id ;
    public $message_en ;
    public $message_ar ;
    public function __construct($sender , $Receiver,$receiverPercentage )
    {
        $this->notifiable_id = [1 ,$sender->id ,$Receiver->id ];
        $this->message_en = [
            1=>$sender->first_name . ' ' . $sender->last_name . ' Sent ' . $receiverPercentage . ' EGP To ' . $Receiver->first_name . ' ' . $Receiver->last_name,
            $sender->id =>  ' You Sent '  . $receiverPercentage .' EGP To '. $Receiver->first_name . ' ' . $Receiver->last_name ,
            $Receiver->id=>$sender->first_name . ' ' . $sender->last_name .' Sent You ' . $receiverPercentage .' EGP '
        ];
        $this->message_ar = [
            1=> $Receiver->first_name . ' ' . $Receiver->last_name . ' ارسل  ' . $receiverPercentage . ' جنية مصري الي ' . $sender->first_name . ' ' . $sender->last_name,
            $sender->id =>  $Receiver->first_name . ' ' . $Receiver->last_name . 'لقد قمت بارسال '  . $receiverPercentage .' جنية مصري الي  ' ,
            $Receiver->id=>$sender->first_name . ' ' . $sender->last_name .' ارسل اليك ' . $receiverPercentage .' جنية مصري '
        ];

    }
    public function broadcastOn():array
    {
        return ['user-sent-money-to-user-channel'];
    }
    public function broadcastAs():string
    {
        return 'user-sent-money-to-user';
    }
}
