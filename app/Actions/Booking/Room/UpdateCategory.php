<?php

namespace App\Actions\Booking\Room;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateCategory
{
    /**
     * @param Category $category
     * @param array $inputs
     * @return bool|null
     * @throws ValidationException
     */
    public function update(Category $category, array $inputs): ?bool
    {
        if ( ! Auth::check() ) return false;

        if ( is_null($category) ) return false;

        if ( ! Auth::user()->hasPermissionTo('update category') ) return null;

        $validated_inputs = Validator::make($inputs, [
            "name" => "required|string|min:3",
            "description" => "nullable|string",
        ])->validate();

        $category->name = $validated_inputs['name'];

        if ( isset($validated_inputs['description']) )
            $category->description = $validated_inputs['description'];

        return $category->save();
    }
}
