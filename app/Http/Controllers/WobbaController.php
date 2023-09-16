<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetRateRuleRequest;
use App\Http\Requests\RateRequest;
use App\Services\WobbaService;

class WobbaController extends Controller
{
    private $woobaService;
    private $access;

    public function __construct(WobbaService $woobaService)
    {
        $this->woobaService = $woobaService;
        $this->woobaService->autenticar();
        $this->access = [
            'Login' => env('LOGIN_WCF'),
            'Senha' => env('SENHA_WCF'),
            'Token' => $this->woobaService->getToken(),
        ];
    }

    /*  public function iniciarEmission(StartEmissionRequest $request)
     {
         $input = $request->validated();
         $access = [
             "Login" => env('LOGIN_WCF'),
             "Senha" => env('SENHA_WCF'),
             "Token" => $this->woobaService->getToken()
         ];
         $body = array_merge($input, $access);

         $result = $this->woobaService->iniciarEmissao($body);
     } */

    public function obterRegraDaTarifa(GetRateRuleRequest $request)
    {
        $input = $request->validated();
        $access = [
            'Login' => env('LOGIN_WCF'),
            'Senha' => env('SENHA_WCF'),
            'Token' => $this->woobaService->getToken(),
        ];
        $body = array_merge($input, $access);

        $result = $this->woobaService->obterRegraDaTarifa($body);
        dd($result);
    }

    public function tarifar(RateRequest $request)
    {
        $input = $request->validated();
        $access = [
            'Login' => env('LOGIN_WCF'),
            'Senha' => env('SENHA_WCF'),
            'Token' => $this->woobaService->getToken(),
        ];
        $body = array_merge($input, $access);

        $result = $this->woobaService->tarifar($body);
        dd($result);
    }
}
