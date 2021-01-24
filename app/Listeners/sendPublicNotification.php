<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\newNetWorkerAdded;
use App\Notifications\publicNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendPublicNotification
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
            $user = User::where('id',0)->first() ;
            $user->notify(new publicNotification($event->message_en[0],$event->message_ar[0],$event->type));

    }
}
