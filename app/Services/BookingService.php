<?php

namespace App\Services;

use App\Models\Booking;

class BookingService
{
    /**
     * @param array $data
     * @return Booking
     */
    public function createBooking(array $data) : Booking
    {
        $booking = Booking::create($data);

        return $booking;
    }

    /**
     * @return mixed
     */
    public function allBooking() : mixed
    {
        return Booking::all();
    }
}
