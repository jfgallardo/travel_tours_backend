<?php

namespace App\Http\Controllers;

use App\Http\Requests\WobbaQueryRequest;
use App\Http\Resources\WobbaCollection;
use App\Services\WobbaService;
use Illuminate\Http\Request;

class WobbaController extends Controller
{
    private $woobaService;

    public function __construct(WobbaService $woobaService)
    {
        $this->woobaService = $woobaService;
        $this->woobaService->autenticar();
    }

    public function disponibilidade(WobbaQueryRequest $request)
    {
        $input = $request->validated();

        $access = [
            "Login" => env('LOGIN_WCF'),
            "Senha" => env('SENHA_WCF'),
            "Token" => $this->woobaService->getToken()
        ];

        $body = array_merge($input, $access);

        $result = $this->woobaService->disponibilidade($body);
        $ofertasXtrecho = $this->ofertaDesde($result);
        return new WobbaCollection(array_merge($result, $ofertasXtrecho));
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
