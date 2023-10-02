<?php

namespace App\Services;

class ExternalApiService
{
    function GetDataWidget(int $cep)
    {

        $token = 'ffeefcd187af0d6ec30d72cfccccebbc1c706ec49258cc067fb9c63820c566d4';

        $curlHandler = curl_init();
        curl_setopt_array($curlHandler, [
            CURLOPT_URL =>
            'https://portal.kangu.com.br/tms/transporte/estabelecimentos/' . $cep,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                'Content-Type:application/x-www-form-urlencoded',
                'token: ' . $token,
            )
        ]);
        $response = curl_exec($curlHandler);
        curl_close($curlHandler);
        return json_decode($response);
    }
}
