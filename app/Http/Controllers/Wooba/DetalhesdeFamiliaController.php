<?php

namespace App\Http\Controllers\Wooba;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetalhesdeFamiliaRequest;
use App\Http\Resources\DetalhesdeFamiliaCollection;
use App\Services\Wooba\DetalhesdeFamiliaService;

class DetalhesdeFamiliaController extends Controller
{
    public function __construct(private DetalhesdeFamiliaService $detalhes)
    {
    }

    public function detalhesDeFamilia(DetalhesdeFamiliaRequest $request)
    {
        $input = $request->validated();
        $result = $this->detalhes->detalhesDeFamilia($input);

        return new DetalhesdeFamiliaCollection($result);
    }
}
