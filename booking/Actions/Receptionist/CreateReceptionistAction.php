<?php

declare(strict_types=1);

namespace Booking\Actions\Receptionist;

use App\Models\Receptionist;
use App\Models\User;
use Booking\Interfaces\Receptionist\CreateReceptionist;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class CreateReceptionistAction implements CreateReceptionist
{

    protected array $rules = [

        "existing_user" => ["required", "boolean"],
        //"user_id" => ["required_if:existing_user,true", "integer", "exists:users,id"],

        "first_name" => ['required', 'string'],
        "last_name" => ['required', 'string'],
        "birthdate" => ['required', 'date'],
        "birth_place" => ['required', 'string'],
        "metas" => ['array'],
    ];

    /**
     * @param array $inputs
     * @return Receptionist|null
     * @throws ValidationException
     */
    public function create(array $inputs = []) : ?Receptionist
    {
        $data = $this->validate($inputs);

        if ( ! isset($data["user_id"]) && ! $data["existing_user"] )
        {
            $user = User::create([
                'name' => $data["name"],
                'email' => $data["email"],
                'password' => Hash::make($data["password"]),
                "email_verified_at" => Carbon::now(),
            ]);

            event(new Registered($user));
        }else if ( isset($data["user_id"]) )
        {
            $user = User::findOrFail($data["user_id"]);
        }

        if ( ! $user->hasRole("receptionist"))
        {
            $user->assignRole("receptionist");
        }

        $data["user_id"] = $user->id;

        return Receptionist::create($data);
    }

    /**
     * @param array $inputs
     * @return array
     * @throws ValidationException
     */
    protected function validate(array $inputs = []): array
    {
        return Validator::make($inputs, $this->rules())->validate();
    }

    /**
     * validation rules
     * @return array
     */
    public function rules(): array
    {
        return array_merge($this->rules, [
            "name" => [ "exclude_if:existing_user,true", "required", "string", "max:255", ],
            "email" => [ "exclude_if:existing_user,true", "required", "string", "email", "max:255", "unique:users" ],
            "password" => [ "exclude_if:existing_user,true", "required", Password::defaults() ],
        ]);
    }
}
