<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    function GetDataWidget($cep)
    {
        $url = "https://portal.kangu.com.br/tms/transporte/estabelecimentos/" . $cep;
        $token = "ffeefcd187af0d6ec30d72cfccccebbc1c706ec49258cc067fb9c63820c566d4";

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'token' => $token
        ])->get($url);

        return json_decode($response);
    }
}
