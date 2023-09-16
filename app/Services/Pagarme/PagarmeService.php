<?php

namespace App\Services\Pagarme;

use PagarMe;

class PagarmeService
{
    public function ClientPagarMe()
    {
        return new PagarMe\Client(env('PAGAR_ME_KEY'));
    }

    public function Transaction($body)
    {
        $transaction = $this->ClientPagarMe()->transactions()->create($body);

        return $transaction;
    }

    public function allTransactions()
    {

        $transfers = $this->ClientPagarMe()->transfers()->getList();

        return $transfers;
    }
}
