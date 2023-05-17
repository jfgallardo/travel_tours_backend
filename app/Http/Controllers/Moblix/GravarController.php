<?php

namespace App\Http\Controllers\Moblix;

use App\Http\Controllers\Controller;
use App\Http\Requests\Moblix\GravarRequest;
use App\Http\Resources\GravarResource;
use App\Services\Moblix\GravarService;
use Illuminate\Http\Request;

class GravarController extends Controller
{

    function __construct(private GravarService $gravarService) {}

    public function gravar(GravarRequest $request)
    {
        $input = $request->validated();
        $result = $this->gravarService->gravar($input);
        
        return new GravarResource($result);
    }
}
