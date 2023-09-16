<?php

namespace App\Services;

use App\Models\Passenger;
use App\Models\User;

class PassengerService
{
    public function getPassengers()
    {
        return Passenger::all();
    }

    public function createPassenger(array $payload = null)
    {
        return Passenger::create($payload);
    }

    public function updatePassenger(array $payload, int $id)
    {

        $passenger = Passenger::find($id);

        return $passenger->update($payload);
    }

    public function deletePassenger(int $id)
    {

        $passenger = Passenger::find($id);

        return $passenger->delete();
    }

    public function getPassengersByUser(int $id)
    {
        return User::find($id)->passengers;
    }
}
