<?php

namespace App\Actions\Booking\Room;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateCategory
{
    /**
     * @param array $inputs
     * @return Category|null
     * @throws ValidationException
     */
    public function create(array $inputs)
    {
        if ( ! Auth::check() ) return null;

        if ( ! Auth::user()->hasPermissionTo('create category') ) return null;

        $validated_inputs = Validator::make($inputs, [
            "name" => "required|string|min:3|unique:categories,id",
            "description" => "nullable|string",
        ])->validate();

        return Category::create($inputs);
    }
}
