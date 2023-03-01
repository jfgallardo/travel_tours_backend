<?php

namespace App\Http\Controllers\Wooba;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservarRequest;
use App\Services\Wooba\ReservarService;

class ReservarController extends Controller
{

    function __construct(private ReservarService $reservarService){}

    public function reservar(ReservarRequest $request)
    {
        # code...
    }
}
