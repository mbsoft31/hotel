<?php


namespace Booking\Interfaces\Booking;


use Booking\Models\Booking;

interface UpdateBooking
{

    public function update(Booking $booking, array $inputs);

    public function updateBookingRooms(Booking $booking, array $rooms);

}
