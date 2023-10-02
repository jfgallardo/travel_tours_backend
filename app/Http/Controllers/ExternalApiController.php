<?php

namespace App\Http\Controllers;

use App\Services\ExternalApiService;
use Illuminate\Http\Request;

class ExternalApiController extends Controller
{
    function __construct(private ExternalApiService $externalApiService)
    {
    }

    function getDataWidget(int $cep)
    {
        $result = $this->externalApiService->GetDataWidget($cep);
        return response()->json($result);
    }
}
