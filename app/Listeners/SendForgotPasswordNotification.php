<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordNotification
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
     * @param  \App\Events\ForgotPassword  $event
     * @return void
     */
    public function handle(ForgotPassword $event)
    {
        Mail::to($event->user->email)->send(new ForgotPasswordMail($event->user, $event->token));
    }
}
