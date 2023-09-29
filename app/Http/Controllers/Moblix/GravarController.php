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

        $result = $this->gravarService->Gravar($input);

        if (empty($result['Data'])) {
            return response()->json([
                'message' => 'Error guardando los datos',
                'error' => true,
                'gravar_result' => $result,
            ], 500);
        }

        return response()->json([
            'message' => 'Datos guardados correctamente',
            'error' => false,
            'data' => $result
        ]);
    }

    public function detalhesPedido(string $order)
    {
        $result = $this->gravarService->detalhesPedido($order);

        return response()->json($result);
    }
}
