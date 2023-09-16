<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\Pagarme\PagarmeService;

class PagarmeController extends Controller
{
    public function __construct(private PagarmeService $pagarmeService)
    {
    }

    public function transaction(TransactionRequest $transactionRequest)
    {
        $payload = $transactionRequest->validated();

        $result = $this->pagarmeService->Transaction($payload);

        return response()->json($result);
    }

    public function allTransactions()
    {
        $result = $this->pagarmeService->allTransactions();

        return response()->json($result);
    }
}
