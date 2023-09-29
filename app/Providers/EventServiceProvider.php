<?php

namespace App\Providers;

use App\Events\ForgotPassword;
use App\Events\SendDataTransfer;
use App\Events\UserRegistered;
use App\Listeners\SendDataTransferNotification;
use App\Listeners\SendForgotPasswordNotification;
use App\Listeners\SendWelcomeNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        UserRegistered::class => [
            SendWelcomeNotification::class,
        ],
        ForgotPassword::class => [
            SendForgotPasswordNotification::class,
        ],
        SendDataTransfer::class => [
            SendDataTransferNotification::class
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
