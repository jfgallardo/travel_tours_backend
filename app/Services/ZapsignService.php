<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZapsignService
{
    public function createDocumentUpload(array $data): mixed
    {
        $response = Http::withHeaders($this->getHeaders())->post('https://api.zapsign.com.br/api/v1/docs/', $data);

        return $response->json();
    }

    public function batchSignAPI(array $data) : mixed
    {
        $response = Http::withHeaders($this->getHeaders())->post('https://api.zapsign.com.br/api/v1/sign/', $data);

        return $response->json();
    }

    private function getHeaders()
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('TOKEN_ZAPSIGN'),
        ];
    }
}
