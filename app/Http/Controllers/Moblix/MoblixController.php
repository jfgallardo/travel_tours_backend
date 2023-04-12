<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelAutoCompletelRequest;
use App\Http\Requests\HotelInformationMoblixRequest;
use App\Http\Requests\HotelSearchMoblixRequest;
use App\Http\Requests\MoblixQueryRequest;
use App\Http\Resources\HotelCompleteCollection;
use App\Http\Resources\MoblixCollection;
use App\Services\MoblixService;

class MoblixController extends Controller
{
    private $moblixService;

    public function __construct(MoblixService $moblixService)
    {
        $this->moblixService = $moblixService;
        $this->moblixService->autenticar();

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->moblixService->getToken()
        ];
        $this->moblixService->setHeaders($headers);
    }

    public function queryFlight(MoblixQueryRequest $request)
    {

        $input = $request->validated();
        $result = $this->moblixService->queryFlight($input);
        return new MoblixCollection($result);

    }

    public function hotelAutoComplete(HotelAutoCompletelRequest $request)
    {

        $input = $request->validated();
        $result = $this->moblixService->hotelAutoComplete($input);
        return new HotelCompleteCollection($result);

    }

    public function hotelAvailable(HotelSearchMoblixRequest $request)
    {
        $input = $request->validated();
        return $this->moblixService->hotelAvailable($input);

    }

    public function hotelInformation(HotelInformationMoblixRequest $request)
    {
        $input = $request->validated();
        return $this->moblixService->hotelInformation($input);
    }

    public function searchByIatabyCityAndAirport($keyword)
    {
        return $this->moblixService->searchByIatabyCityAndAirport($keyword);
    }
}