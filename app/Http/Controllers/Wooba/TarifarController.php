<?php

namespace App\Http\Controllers\Wooba;

use App\Http\Controllers\Controller;
use App\Http\Requests\TarifarRequest;
use App\Http\Resources\TarifarCollection;
use App\Services\Wooba\TarifarService;

class TarifarController extends Controller
{
    
    public function __construct(private TarifarService $tarifa){}    

    public function tarifar(TarifarRequest $request)
    {
        $input = $request->validated();
        $result = $this->tarifa->tarifar($input);
       
        return new TarifarCollection($result);
    }
}