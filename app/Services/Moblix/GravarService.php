<?php

namespace App\Services\Moblix;

use App\Services\Pagarme\PagarmeService;
use Illuminate\Support\Facades\Http;

class GravarService
{
    function __construct(private AuthService $authService, private PagarmeService $pagarmeService)
    {
        $authService->autenticar();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->authService->getToken()
        ];
        $this->authService->setHeaders($headers);
    }

    public function Gravar(array $data)
    {
        //llamar a pagarmeService y ver si funciona GetCustomers()
        $this->pagarmeService->Transaction();
        //$response = Http::withHeaders($this->authService->getHeaders())->post(env('GRAVAR_MOBLIX'), $data);
        //return $response->json();
    }
}
