<?php

namespace App\Http\Controllers\Wooba;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisponibilidadeRequest;
use App\Http\Resources\DisponibilidadeCollection;
use App\Services\Wooba\DisponibilidadeService;
use Illuminate\Support\Facades\Redis;

class DisponibilidadeController extends Controller
{

    public function __construct(private DisponibilidadeService $disponibilidade){}


    public function disponibilidade(DisponibilidadeRequest $request)
    {
        $input = $request->validated();
        $result = $this->disponibilidade->disponibilidade($input);
    
        return new DisponibilidadeCollection($result);
    }

    public function findViagenRedis($id)
    {
        return Redis::get($id);
    }

}
