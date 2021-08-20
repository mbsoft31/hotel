<?php


namespace Booking\Interfaces\Hotel;


use Booking\Models\Hotel;
use Booking\Models\Room;
use Booking\Models\User;
use Illuminate\Validation\ValidationException;

interface CreateHotel
{

    /**
     * @param array $inputs
     * @return mixed
     * @throws ValidationException
     */
    public function create(array $inputs = []);

}
