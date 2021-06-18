<?php

namespace App\Actions\Booking\Hotel;

use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateHotel
{

    protected $rules = [
        "name" => "required|string",
        "description" => "nullable|string",
        "country" => "nullable|string",
        "state" => "nullable|string",
        "address" => "nullable|string",
    ];

    /**
     * @param Hotel $hotel
     * @param array $inputs
     * @return mixed
     * @throws ValidationException
     */
    public function update(Hotel $hotel, array $inputs)
    {
        if ( ! Auth::check() ) return "not auth"; // checks if the user is authenticated

        //if ( ! Auth::user()->hasPermissionTo('update hotel') ) return "no permission"; // checks if the user has permission to create hotel

        $validated_data = Validator::make($inputs, $this->rules)->validate();

        $hotel->name = $validated_data["name"];

        if (isset($validated_data["description"]))
            $hotel->description = $validated_data["description"];

        if (isset($validated_data["address"]))
            $hotel->address = $validated_data["address"];

        if (isset($validated_data["country"]))
            $hotel->country = $validated_data["country"];

        if (isset($validated_data["state"]))
            $hotel->state = $validated_data["state"];

        //$validated_data = array_merge( $validated_data, [ "user_id" => Auth::id() ] );

        //dump("hotel updated", $hotel);

        return $hotel->save();
    }
}
