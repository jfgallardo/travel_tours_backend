<?php

namespace App\Http\Controllers;

use App\Services\SendEmailService;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{

    function __construct(private SendEmailService $sendEmailService)
    {
    }


    function transfer(Request $request)
    {
        $value = $request['value'];

        $this->sendEmailService->sendDataForTransfer($value);
        return response()->json([
            'send' => true
        ]);
    }
}
