<?php

namespace App\Http\Controllers\Moblix;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFlightRequest;
use App\Services\Moblix\FlightSearchService;
use App\Http\Resources\MoblixCollection;

class SearchFlightController extends Controller
{
    function __construct(private FlightSearchService $searchService) {}


    public function queryFlight(SearchFlightRequest $request)
    {

        $input = $request->validated();
        $result = $this->searchService->flightSearch($input);
        return new MoblixCollection($result);

    }
}
