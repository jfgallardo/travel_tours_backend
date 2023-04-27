<?php

namespace App\Http\Controllers;

use App\Http\Requests\VooRequest;
use App\Http\Resources\MoblixCollection;
use App\Services\VooService;
use Illuminate\Http\Request;

class VooController extends Controller
{

    function __construct(private VooService $vooService)
    {
    }

    public function roundTrip(VooRequest $request)
    {
        $filter = $request->query()['filter'] ?? 'ValorTotal';
        $input = $request->validated();
        $result = $this->vooService->roundTripAll($input, $filter);

        if (array_key_exists('Error', $result)) {
         return response([
            "error_message" => $result['Error']['Message']
         ], 404);   
        }

        return response()->json($result);
    }
}
