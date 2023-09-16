<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZapSign\BatchSignApiRequest;
use App\Services\ZapsignService;

class ZapsignController extends Controller
{
    public function __construct(private ZapsignService $zapsignService)
    {
    }

    public function createDocumentUpload()
    {
    }

    public function batchSignAPI(BatchSignApiRequest $request)
    {
        $input = $request->validated();
        $documents = $this->zapsignService->batchSignAPI($input);

        return response()->json($documents);
    }
}
