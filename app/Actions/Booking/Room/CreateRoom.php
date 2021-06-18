<?php

namespace App\Actions\Booking\Room;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateRoom
{

    protected $rules = [
        "number" => "required|integer",
        "phone" => "required|string",
        "hotel_id" => "required",
        "bed_count" => "nullable|integer",
        "description" => "nullable|string",
        "floor_number" => "nullable|integer",
        // "type_id" => "required",
        "image" => "nullable|url",
    ];

    /**
     * @param array $inputs
     * @return Room|null
     * @throws ValidationException
     */
    public function create(array $inputs): ?Room
    {
        if ( ! Auth::check() ) return null;

        if ( ! Auth::user()->hasPermissionTo('create room') ) return null;

        $validated_inputs = Validator::make($inputs, $this->rules)->validate();

        $validated_inputs = array_merge( $validated_inputs, [ "user_id" => Auth::id(), ] );

        return Room::create( $validated_inputs );
    }
}
