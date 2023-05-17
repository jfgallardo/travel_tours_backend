<?php

namespace App\Services\Moblix;

use Illuminate\Support\Facades\Http;


class ListarService
{
    function __construct(private AuthService $authService)
    {
        $authService->autenticar();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->authService->getToken()
        ];
        $this->authService->setHeaders($headers);
    }

    public function listar(array $data)
    {
        $response = Http::withHeaders($this->authService->getHeaders())->post(env('LISTAR_MOBLIX'), $data);
        return $response->json();
    }
}
