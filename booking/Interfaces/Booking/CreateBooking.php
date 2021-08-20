<?php


namespace Booking\Interfaces\Booking;


use Booking\Models\Hotel;
use Booking\Models\Room;
use Booking\Models\User;

interface CreateBooking
{

    public function create(User $user, Hotel $hotel, array $rooms, array $inputs = []);

}
