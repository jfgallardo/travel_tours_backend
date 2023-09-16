<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService
{
    public function createNewPayment(array $array) : Payment
    {
        $payment = Payment::create($array);

        return $payment;
    }
}
