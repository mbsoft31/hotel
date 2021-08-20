<?php


namespace Booking\Interfaces\Booking;


use Booking\Models\Booking;

interface AcceptBooking
{

    public function accept(Booking $booking);

}
