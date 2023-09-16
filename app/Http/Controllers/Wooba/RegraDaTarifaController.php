<?php

namespace App\Http\Controllers\Wooba;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegraDaTarifaRequest;
use App\Http\Resources\RegraDaTarifaCollection;
use App\Services\Wooba\RegraDaTarifaService;

class RegraDaTarifaController extends Controller
{
    public function __construct(private RegraDaTarifaService $regra)
    {
    }

    public function obterRegraDaTarifa(RegraDaTarifaRequest $request)
    {
        $input = $request->validated();
        $result = $this->regra->obterRegraDaTarifa($input);

        return new RegraDaTarifaCollection($result);
    }
}
