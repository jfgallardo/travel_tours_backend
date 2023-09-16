<?php

namespace App\Http\Controllers\Moblix;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFlightRequest;
use App\Http\Resources\MoblixCollection;
use App\Services\Moblix\FlightSearchService;

class SearchFlightController extends Controller
{
    public function __construct(private FlightSearchService $searchService)
    {
    }

    public function queryFlight(SearchFlightRequest $request)
    {

        $input = $request->validated();
        $result = $this->searchService->flightSearch($input);

        return new MoblixCollection($result);

    }
}
