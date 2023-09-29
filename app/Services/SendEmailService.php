<?php

namespace App\Services;

use App\Events\SendDataTransfer;

class SendEmailService
{
    function sendDataForTransfer(float $value)
    {
        $body = [
            'email' => auth()->user()->email,
            'value' => $value
        ];

        event(new SendDataTransfer($body));
    }
}
