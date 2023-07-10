<?php

namespace App\Services\Moblix;

use App\Services\Pagarme\PagarmeService;
use Illuminate\Support\Facades\Http;

class GravarService
{
    /**
     * @param AuthService $authService
     * @param PagarmeService $pagarmeService
     */
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
        //$wasPayed = $this->pagarmeService->Transaction();
        $record = Http::withHeaders($this->authService->getHeaders())->post(env('GRAVAR_MOBLIX'), $data);

        return [
            'wasPayed' => '$wasPayed',
            'record' => $record->json()
        ];
    }
}
