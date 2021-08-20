<?php


namespace Booking\Interfaces\Booking;


use Booking\Models\Booking;

interface DeleteBooking
{

    public function delete(Booking $booking);

}
