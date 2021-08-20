<?php

declare(strict_types=1);


namespace Booking\Actions\Room;


use App\Models\Room;
use Booking\Interfaces\Room\UpdateRoom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateRoomAction implements UpdateRoom
{

    protected array $rules = [
        "name" => ['required', 'string', 'max:191'],
        "description" => ['nullable', 'string'],
        "room_type_id" => ['required', 'integer', 'exists:room_types,id'],
        "rooms_count" => ['required', 'integer'],
        "floor_number" => ["integer"],
        "no_smoking" => ["boolean"],
        "room_size" => ["numeric"],
        "room_size_measure_unit" => ["in:sq_meter,sq_foot"],
        "room_price_x_person" => ["numeric"],
        "room_price_currency" => ["in:DZD,USD,TND,EUR"],
        "discount_available" => ["boolean"],
        "room_discount_x_person" => ["numeric"],
        "room_discount_x_person_type" => ["in:amount,percentage"],
        "metas" => ["array"],
    ];

    /**
     * @param Room $room
     * @param array $inputs
     * @return mixed
     * @throws ValidationException
     */
    public function update(Room $room, array $inputs = []): mixed
    {
        $data = $this->validate($inputs);

        return $room->update($inputs);
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
