<?php


namespace Booking\Interfaces\Room;


use App\Models\Hotel;
use Illuminate\Validation\ValidationException;

interface CreateRoom
{

    /**
     * @param Hotel $hotel
     * @param array $inputs
     * @return mixed
     * @throws ValidationException
     */
    public function create(Hotel $hotel, array $inputs = []): mixed;

}
