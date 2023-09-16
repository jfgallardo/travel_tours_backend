<?php

namespace App\Services\Wooba;

use Illuminate\Support\Facades\Http;

class RegraDaTarifaService
{
    public function __construct(private AutenticarWoobaService $auth)
    {
        $auth->autenticar();
    }

    public function obterRegraDaTarifa(array $data)
    {
        $body = array_merge($data, $this->auth->accessToWooba());
        $response = Http::retry(3, 100)->withHeaders($this->auth->getHeaders())->post(env('OBTER_REGRA_DA_TARIFA'), $body);

        return $response->json();
    }
}
