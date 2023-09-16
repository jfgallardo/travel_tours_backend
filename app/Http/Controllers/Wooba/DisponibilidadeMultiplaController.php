<?php

namespace App\Http\Controllers\Wooba;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisponibilidadeMultiplaRequest;
use App\Http\Resources\DisponibilidadeCollection;
use App\Services\Wooba\DisponibilidadeMultiplaService;

class DisponibilidadeMultiplaController extends Controller
{
    public function __construct(private DisponibilidadeMultiplaService $disponibilidadeMultiplaService)
    {
    }

    public function disponibilidadeMultipla(DisponibilidadeMultiplaRequest $request)
    {
        $input = $request->validated();
        $result = $this->disponibilidadeMultiplaService->disponibilidadeMultipla($input);

        return new DisponibilidadeCollection($result);
    }
}
