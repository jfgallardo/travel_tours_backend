<?php

namespace App\Services\Wooba;

use Illuminate\Support\Facades\Http;

class TarifarService
{
    public function __construct(private AutenticarWoobaService $auth)
    {
        $auth->autenticar();
    }

    public function tarifar(array $data)
    {
        $body = array_merge($data, $this->auth->accessToWooba());
        $response = Http::retry(3, 100)->withHeaders($this->auth->getHeaders())->post(env('TARIFAR'), $body);

        return $response->json();
    }
}
