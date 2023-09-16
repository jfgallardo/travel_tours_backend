<?php

namespace App\Http\Controllers\Moblix;

use App\Http\Controllers\Controller;
use App\Http\Requests\Moblix\GravarRequest;
use App\Services\Moblix\GravarService;

class GravarController extends Controller
{
    public function __construct(private GravarService $gravarService)
    {
    }

    public function gravar(GravarRequest $request)
    {
        $input = $request->validated();

        $ida = $input['ida'];
        $volta = $input['volta'] ?? null;

        $result_ida = $this->gravarService->Gravar($ida);
        $result_volta = ($volta !== null) ? $this->gravarService->Gravar($volta) : null;

        if (empty($result_ida['Data']) || ($volta && empty($result_volta['Data']))) {
            return response()->json([
                'message' => 'Error guardando los datos',
                'error' => true,
                'gravarIda' => $result_ida,
                'gravarVolta' => $result_volta,
            ], 500);
        }

        return response()->json([
            'message' => 'Datos guardados correctamente',
            'error' => false,
            'gravarIda' => $result_ida,
            'gravarVolta' => $result_volta,
        ]);
    }

    public function detalhesPedido(string $order)
    {
        $result = $this->gravarService->detalhesPedido($order);

        return response()->json($result);
    }
}
