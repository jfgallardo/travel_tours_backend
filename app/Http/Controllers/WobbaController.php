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
        return new WobbaCollection($result);

    }
    
}
