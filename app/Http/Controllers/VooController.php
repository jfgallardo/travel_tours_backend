<?php

namespace App\Http\Controllers;

use App\Http\Requests\VooRequest;
use App\Services\VooService;

class VooController extends Controller
{
    public function __construct(private VooService $vooService)
    {
    }

    public function roundTrip(VooRequest $request)
    {
        $input = $request->validated();
        $result = $this->vooService->roundTripAll($input);

        if (array_key_exists('Error', $result)) {
            return response([
               'error_message' => $result['Error']['Message'],
            ], 404);
        }

        return response()->json($result);
    }
}
