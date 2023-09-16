<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AsaasService
{
    public function createClientAsaas(array $data): mixed
    {
        $response = Http::withHeaders($this->getHeaders())->post('https://sandbox.asaas.com/api/v3/customers', $data);

        return $response->json();
    }

    public function listCustomerByCpf(string $cpfCnpj): mixed
    {
        $response = Http::withHeaders($this->getHeaders())->get('https://sandbox.asaas.com/api/v3/customers?cpfCnpj=' . $cpfCnpj);

        return $response->json();
    }

    public function createNewCharge(array $data) : mixed
    {
        $response = Http::withHeaders($this->getHeaders())->post('https://sandbox.asaas.com/api/v3/payments', $data);

        return $response->json();
    }

    private function getHeaders()
    {
        return [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'access_token' => env('TOKEN_ASAAS'),
        ];
    }
}
