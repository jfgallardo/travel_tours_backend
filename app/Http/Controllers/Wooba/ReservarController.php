<?php

namespace App\Http\Controllers\Wooba;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservarRequest;
use App\Http\Resources\ReservarCollection;
use App\Services\Wooba\ReservarService;

class ReservarController extends Controller
{
    public function __construct(private ReservarService $reservarService)
    {
    }

    public function reservar(ReservarRequest $request)
    {

        $input = $request->validated();
        $result = $this->reservarService->reservar($input);

        return new ReservarCollection($result);
    }
}
