<?php

namespace App\Http\Controllers;

use App\Services\AeroportoService;
use Illuminate\Http\Request;

class AeroportoController extends Controller
{
    private $airportService;

    public function __construct(AeroportoService $airportService)
    {
        $this->airportService = $airportService;
    }

    public function searchByIatabyCityAndAirport($keyword)
    {
        $airport = $this->airportService->searchByIatabyCityAndAirport($keyword);

        return response()->json($airport);
    }
}
