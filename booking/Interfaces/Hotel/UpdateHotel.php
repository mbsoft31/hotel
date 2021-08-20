<?php


namespace Booking\Interfaces\Hotel;


use App\Models\Hotel;
use Illuminate\Validation\ValidationException;

interface UpdateHotel
{

    /**
     * @param Hotel $hotel
     * @param array $inputs
     * @return bool
     * @throws ValidationException
     */
    public function update(Hotel $hotel, array $inputs = []): bool;

    /**
     * @param Hotel $hotel
     * @param array $facilities
     * @return array
     */
    public function updateFacilities(Hotel $hotel, array $facilities = []): array;

}
