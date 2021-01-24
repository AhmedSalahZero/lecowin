<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\newFinanceAdded;
use App\Notifications\newNetWorkerAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendNewFinanceAdded
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function handle($event)
    {
        foreach ($event->notifiable_id as $notifiableId )
        {
            $user = User::where('id',$notifiableId)->first() ;
            $user->notify(new newFinanceAdded($event->message_en[$notifiableId],$event->message_ar[$notifiableId]));
        }
    }
}
