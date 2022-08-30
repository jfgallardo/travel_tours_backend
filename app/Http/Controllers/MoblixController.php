<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoblixQueryRequest;
use App\Http\Resources\MoblixCollection;
use App\Services\MoblixService;
use Illuminate\Http\Request;

class MoblixController extends Controller
{
    private $moblixService;

    public function __construct(MoblixService $moblixService)
    {
        $this->moblixService = $moblixService;
        $this->moblixService->autenticar();
    }

    public function queryFlight(MoblixQueryRequest $request)
    {

        $input = $request->validated();

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->moblixService->getToken()
        ];

        $this->moblixService->setHeaders($headers);

        $result = $this->moblixService->queryFlight($input);
        return new MoblixCollection($result);

    }
}