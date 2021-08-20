<?php


namespace Booking\Actions\Hotel;


use App\Models\Hotel;
use Booking\Interfaces\Hotel\DeleteHotel;
use Illuminate\Support\Facades\Auth;

class DeleteHotelAction implements DeleteHotel
{

    /**
     * @param Hotel $hotel
     * @return bool
     */
    public function delete(Hotel $hotel): bool
    {
        return $hotel->delete();
    }
}
