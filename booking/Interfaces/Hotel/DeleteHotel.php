<?php


namespace Booking\Interfaces\Hotel;


use App\Models\Hotel;

interface DeleteHotel
{

    public function delete(Hotel $hotel);

}
