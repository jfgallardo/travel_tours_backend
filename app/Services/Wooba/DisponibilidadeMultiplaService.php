<?php

namespace App\Services\Wooba;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class DisponibilidadeMultiplaService
{
    public function __construct(private AutenticarWoobaService $auth)
    {
       $auth->autenticar();
    }

    public function disponibilidadeMultipla(array $data)
    {
        $body = array_merge($data, $this->auth->accessToWooba());
        $response = Http::retry(3, 100)->withHeaders($this->auth->getHeaders())->post(env('DISPONIBILIDADE'), $body);
        $dataJson = $response->json();
        foreach ($dataJson["ViagensTrecho1"] as $value) {
            Redis::set($value["Id"], json_encode($value));
            Redis::expire($value["Id"], 1800);
        }
        if ($dataJson["ViagensTrecho2"]) {
            foreach ($dataJson["ViagensTrecho2"] as $value) {
                Redis::set($value["Id"], json_encode($value));
                Redis::expire($value["Id"], 1800);
            }
        }

        $ofertasXtrecho = $this->ofertaDesde($dataJson);
        return array_merge($dataJson, $ofertasXtrecho);
    }

    private function ofertaDesde(array $result)
    {
        $trechoOne = $this->menorOferta($result['ViagensTrecho1']);
        $trechoTwo = $result['ViagensTrecho2'] ? $this->menorOferta($result['ViagensTrecho2']) : null;

        return [
            'ofertasDesde' => [
                'trechoOneOferta' => $trechoOne,
                'trechoTwoOferta' => $trechoTwo,
            ],
        ];
    }

    private function menorOferta(array $trecho = null)
    {
        $offersCompany = [];

        foreach ($trecho as $value) {
            array_push($offersCompany, [
                'offers' => $value['Preco']['PrecoAdulto']['ValorTarifa'],
                'company' => $value['CiaMandatoria']['CodigoIata'],
            ]);
        }

        return $offersCompany;
    }
}
