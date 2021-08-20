<?php

declare(strict_types=1);


namespace Booking\Actions\Room;


use App\Models\Hotel;
use Booking\Interfaces\Room\CreateRoom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateRoomAction implements CreateRoom
{

    protected array $rules = [
        "name" => ['required', 'string', 'max:191'],
        "description" => ['nullable', 'string'],
        "room_type_id" => ['required', 'integer', 'exists:room_types,id'],
        "rooms_count" => ['required', 'integer'],
    ];

    /**
     * @param Hotel $hotel
     * @param array $inputs
     * @return mixed
     * @throws ValidationException
     */
    public function create(Hotel $hotel, array $inputs = []): mixed
    {
        $data = $this->validate($inputs);

        return $hotel->rooms()->create($data);
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
