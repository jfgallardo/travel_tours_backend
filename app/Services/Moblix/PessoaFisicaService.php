<?php

namespace App\Services\Moblix;

use Illuminate\Support\Facades\Http;

class PessoaFisicaService
{
    public function __construct(private AuthService $authService)
    {
        $authService->autenticar();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->authService->getToken(),
        ];
        $this->authService->setHeaders($headers);
    }

    public function GravarPf(array $data)
    {
        $response = Http::withHeaders($this->authService->getHeaders())->post(env('GRAVAR_PF_PORTAL'), $data);

        return $response->json();
    }

    public function GetPessoa(array $data)
    {
        $response = Http::withHeaders($this->authService->getHeaders())->post(env('PESSOA_PEGAR'), $data);

        return $response->json();
    }
}
