<?php

namespace App\Providers;

use App\Events\adminSendNotification;
use App\Events\financeAdded;
use App\Events\newAchievement;
use App\Events\newNetWorkerAdded;
use App\Events\UserEnteredHisCredential;
use App\Events\userRegistered;
use App\Events\userSentMoneyToAdmin;
use App\Events\userSentMoneyToUser;
use App\Listeners\adminSendNotificationListener;
use App\Listeners\sendNewFinanceAdded;
use App\Listeners\sendNewNetworkerAdded;
use App\Listeners\sendPublicNotification;
use App\Listeners\sendUserRegisteredNotificationToAdmin;
use App\Listeners\storeVerificationCodeListener;
use App\Listeners\userSentMoneyListener;
use App\Listeners\userSentMoneyToAdminListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Listeners\SendVerificationCodeToUserEmail;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        userRegistered::class => [
            sendUserRegisteredNotificationToAdmin::class
        ],
        newNetWorkerAdded::class => [
            sendNewNetworkerAdded::class
        ],
        financeAdded::class => [
            sendNewFinanceAdded::class
        ],
        userSentMoneyToUser::class => [
            userSentMoneyListener::class
        ],
        userSentMoneyToAdmin::class => [
            userSentMoneyToAdminListener::class
        ],
        adminSendNotification::class=>[
            adminSendNotificationListener::class
        ],
        newAchievement::class=>[
            sendPublicNotification::class
        ],

        UserEnteredHisCredential::class=>[
            SendVerificationCodeToUserEmail::class,
            storeVerificationCodeListener::class
        ]


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
