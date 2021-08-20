<?php

declare(strict_types=1);

namespace Booking\Actions\Hotel;


use App\Models\Hotel;
use Booking\Interfaces\Hotel\UpdateHotel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateHotelAction implements UpdateHotel
{

    protected array $rules = [
        "name" => ['string', 'max:191'],
        "stars" => ['integer', 'min:0', 'max:6'],
        "description" => ['string'],
        "address" => ['string', 'max:255'],
        "country" => ['string'],
        "city" => ['string'],
        "zipcode" => ['integer', 'min:10000', 'max:99999'],
        "contact_name" => ['string'],
        "contact_phone" => ['string', "min:10", 'max:13'],
        "photos" => ['array'],
        "facilities" => ['array'],
    ];

    /**
     * @param Hotel $hotel
     * @param array $inputs
     * @return bool
     * @throws ValidationException
     */
    public function update(Hotel $hotel, array $inputs = []): bool
    {
        $data = $this->validate($inputs);

        return $hotel->update($data);
    }

    /**
     * @param array $inputs
     * @return array
     * @throws ValidationException
     */
    protected function validate(array $inputs = []): array
    {
        return Validator::make($inputs, $this->rules)->validate();
    }

    /**
     * @param Hotel $hotel
     * @param array $facilities
     * @return array
     */
    public function updateFacilities(Hotel $hotel, array $facilities = []): array
    {
        return $hotel->facilities()->sync($facilities);
    }
}
