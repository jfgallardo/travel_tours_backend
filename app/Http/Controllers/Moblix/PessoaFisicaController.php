<?php

namespace App\Http\Controllers\Moblix;

use App\Http\Controllers\Controller;
use App\Http\Requests\Moblix\GetPessoaRequest;
use App\Http\Requests\Moblix\GravarPfRequest;
use App\Http\Resources\GetPessoaResource;
use App\Http\Resources\GravarPfResource;
use App\Services\Moblix\PessoaFisicaService;

class PessoaFisicaController extends Controller
{
    public function __construct(private PessoaFisicaService $pfService)
    {
    }

    public function gravar(GravarPfRequest $request)
    {
        $input = $request->validated();
        $result = $this->pfService->GravarPf($input);

        return new GravarPfResource($result);
    }

    public function getPessoa(GetPessoaRequest $request)
    {
        $input = $request->validated();
        $result = $this->pfService->GetPessoa($input);

        return new GetPessoaResource($result);
    }
}
