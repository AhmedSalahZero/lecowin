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

class userSentMoneyToAdmin implements ShouldBroadcast
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
    public function __construct($sender,$adminPercentage,$discountPercentage)
    {

        $this->notifiable_id = [$sender->getTheAdmin()->id , $sender->id ];
        $this->message_ar = [
            $sender->getTheAdmin()->id =>$sender->first_name . ' ' . $sender->last_name.'لقد استلمت ' . $adminPercentage .' جنية مصريا'. ' من '  ,
            $sender->id =>  ' لقد ارسلت '  . $adminPercentage .'جنيها مصريا كنسبة '.$discountPercentage.'بالمئة لمدير الموقع نتيجة لاخر تحويلة مالية قمت بها' ,
        ];
        $this->message_en = [
            $sender->getTheAdmin()->id =>'You Received ' . $adminPercentage .' EGP'. ' From ' . $sender->first_name . ' ' . $sender->last_name ,
            $sender->id =>  ' You Sent '  . $adminPercentage .' EGP To The Admin As' .  $discountPercentage . ' % percentage From Your Last Transaction ' ,
        ];
    }
    public function broadcastOn():array
    {
        return ['user-sent-money-to-admin-channel'];
    }
    public function broadcastAs():string
    {
        return 'user-sent-money-to-admin-Added';
    }
}
