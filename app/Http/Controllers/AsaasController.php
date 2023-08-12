<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsaasClientRequest;
use App\Services\AsaasService;
use Illuminate\Http\Request;

class AsaasController extends Controller
{
    function __construct(private AsaasService $assasService)
    {
    }

    public function newCharge(AsaasClientRequest $asaasClient)
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
            'billingType' => 'PIX',
            'customer' => $cliente['id'],
            'dueDate' => date("Y-m-d"),
            'description' => 'Pagamento de reserva de voo',
            'value' => $valueOfPix
        ];

        $payment = $this->assasService->createNewCharge($charge);
        return response()->json($payment);
    }
}