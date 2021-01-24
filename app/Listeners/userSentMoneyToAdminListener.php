<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\newMoneySentToAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class userSentMoneyToAdminListener
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
        foreach ($event->notifiable_id as $notifiableId )
        {
            $user = User::where('id',$notifiableId)->first() ;
            $user->notify(new newMoneySentToAdmin($event->message_en[$notifiableId],$event->message_ar[$notifiableId]));
        }

    }
}
