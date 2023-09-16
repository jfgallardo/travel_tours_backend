<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePassengerRequest;
use App\Http\Requests\UpdatePassengerRequest;
use App\Http\Resources\PassengerResource;
use App\Services\PassengerService;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function __construct(private PassengerService $passengerService)
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passenger = $this->passengerService->getPassengers();

        return PassengerResource::collection($passenger);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePassengerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePassengerRequest $request)
    {
        $payload = $request->validated();
        $passenger = $this->passengerService->createPassenger($payload);

        return new PassengerResource($passenger);
    }

    /**
     * Update Passenger.
     *
     * @param UpdatePassengerRequest $request
     * @param int $id
     * @return void
     */
    public function updatePassenger(UpdatePassengerRequest $request, int $id)
    {
        $payload = $request->validated();
        $editItemFlag = $this->passengerService->updatePassenger($payload, $id);

        return response()->json([
            'isEdit' => $editItemFlag,
        ]);

    }

    /**
     * Delete Passenger.
     *
     * @param int $id
     * @return void
     */
    public function deletePassenger(int $id)
    {
        $deleteItemFlag = $this->passengerService->deletePassenger($id);

        return response()->json([
            'isDelete' => $deleteItemFlag,
        ]);
    }

    public function getByIdUser(Request $request)
    {
        $userId = $request->query()['user'];
        $passengers = $this->passengerService->getPassengersByUser($userId);

        return PassengerResource::collection($passengers);
    }
}
