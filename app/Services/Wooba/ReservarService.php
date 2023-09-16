<?php

namespace App\Services\Wooba;

use Illuminate\Support\Facades\Http;

class ReservarService
{
    public function __construct(private AutenticarWoobaService $auth)
    {
        $auth->autenticar();
    }

    public function reservar(array $data)
    {
        $body = array_merge($data, $this->auth->accessToWooba());
        $response = Http::retry(3, 100)->withHeaders($this->auth->getHeaders())->post(env('RESERVAR'), $body);

        return $response->json();
    }
}
