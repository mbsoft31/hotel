<?php

namespace App\Actions\Booking\Hotel;

use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateHotel
{

    protected $rules = [
        "name" => "required|string",
        "description" => "nullable|string",
        "country" => "nullable|string",
        "state" => "nullable|string",
    ];

    /**
     * @param array $inputs
     * @return Hotel|null
     * @throws ValidationException
     */
    public function create(array $inputs): ?Hotel
    {
        if ( ! Auth::check() ) return null; // checks if the user is authenticated

        if ( ! Auth::user()->hasPermissionTo('create hotel') ) return null; // checks if the user has permission to create hotel

        $validated_data = Validator::make($inputs, $this->rules)->validate();

        $validated_data = array_merge( $validated_data, [ "user_id" => Auth::id() ] );

        return Hotel::create($validated_data);
    }
}
