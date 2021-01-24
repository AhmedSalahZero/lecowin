<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\newUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendUserRegisteredNotificationToAdmin
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
        User::where('id',1)->first()->notify(new newUserRegistered($event->user));
    }
}
