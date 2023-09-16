<?php

namespace App\Http\Controllers\Moblix;

use App\Http\Controllers\Controller;
use App\Http\Requests\Moblix\ListarRequest;
use App\Http\Resources\ListarResource;
use App\Services\Moblix\ListarService;

class ListarController extends Controller
{
    public function __construct(private ListarService $listarService)
    {
    }

    public function listar(ListarRequest $request)
    {
        $input = $request->validated();
        $result = $this->listarService->listar($input);

        return new ListarResource($result);
    }
}
