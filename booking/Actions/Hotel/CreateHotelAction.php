<?php

declare(strict_types=1);

namespace Booking\Actions\Hotel;

use App\Models\Hotel;
use Booking\Interfaces\Hotel\CreateHotel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateHotelAction implements CreateHotel
{

    protected array $rules = [
        "name" => ['required', 'string', 'max:191', 'unique:hotels,name'],
        "stars" => ['required', 'integer', 'min:0', 'max:6'],
        "description" => ['nullable', 'string'],
        "address" => ['required', 'string', 'max:255'],
        "country" => ['required', 'string'],
        "city" => ['required', 'string'],
        "zipcode" => ['required', 'integer', 'min:10000', 'max:99999'],
        "contact_name" => ['required', 'string'],
        "contact_phone" => ['required', 'string', "min:10", 'max:15'],
        "photos" => ['array'],
    ];

    /**
     * @param array $inputs
     * @return Hotel|null
     * @throws ValidationException
     */
    public function create(array $inputs = []) : ?Hotel
    {
        $data = $this->validate($inputs);

        return Hotel::create($data);
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
}
