<?php


namespace Booking\Interfaces\Receptionist;

use Illuminate\Validation\ValidationException;

interface CreateReceptionist
{

    /**
     * @param array $inputs
     * @return mixed
     * @throws ValidationException
     */
    public function create(array $inputs = []): mixed;

}
