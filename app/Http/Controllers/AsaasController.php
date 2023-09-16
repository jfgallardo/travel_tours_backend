<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsaasClientRequest;
use App\Services\AsaasService;
use App\Services\PaymentService;

class AsaasController extends Controller
{
    public function __construct(private AsaasService $assasService, private PaymentService $paymentService)
    {
    }

    public function newCharge(AsaasClientRequest $asaasClient, string $type)
    {
        $input = $asaasClient->validated();
        $cpfCnpj = $input['cpfCnpj'];
        $valueOfPix = $input['value'];
        $cliente = null;

        $verifyCpfCnpj = $this->assasService->listCustomerByCpf($cpfCnpj);

        if (isset($verifyCpfCnpj['data'])) {
            unset($input['value']);
            $cliente = $this->assasService->createClientAsaas($input);
        } else {
            $cliente = $verifyCpfCnpj['data'];
        }

        $charge = [
            'billingType' => strtoupper($type),
            'customer' => $cliente['id'],
            'dueDate' => date('Y-m-d'),
            'description' => 'Pagamento de reserva de voo',
            'value' => $valueOfPix,
        ];

        $payment = $this->assasService->createNewCharge($charge);

        $paymentLocal = [
            'user_id' => auth()->user()->id,
            'payment_id' => $payment['id'],
            'customer' => $payment['customer'],
            'description' => $payment['description'],
            'billingType' => $payment['billingType'],
            'status' => $payment['status'],
        ];

        $this->paymentService->createNewPayment($paymentLocal);

        return response()->json($payment);
    }
}
