<?php

namespace App\Listeners;

use App\Events\SendDataTransfer;
use App\Mail\SendDataTransferMail;
use Illuminate\Support\Facades\Mail;

class SendDataTransferNotification
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
     * @param  \App\Events\SendDataTransfer  $event
     * @return void
     */
    public function handle(SendDataTransfer $event)
    {
        Mail::to($event->body['email'])->send(new SendDataTransferMail($event->body['value']));
    }
}
