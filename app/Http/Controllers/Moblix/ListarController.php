<?php

namespace App\Http\Controllers\Moblix;

use App\Http\Controllers\Controller;
use App\Http\Requests\Moblix\ListarRequest;
use App\Http\Resources\ListarResource;
use App\Services\Moblix\ListarService;
use Illuminate\Http\Request;

class ListarController extends Controller
{
    function __construct(private ListarService $listarService){}

    public function listar(ListarRequest $request)
    {
        $input = $request->validated();
        $result = $this->listarService->listar($input);
        
        return new ListarResource($result);
    }
}
