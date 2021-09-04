<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class UpdateUserPassword extends Component
{

    public User $user;

    public $state = [];

    public function save()
    {
        if ( ! ( isset($this->state['old_password']) ) ){
            $this->getErrorBag()->add("old_password", "old password is required");
            return;
        }

        if ( !Hash::check($this->state['old_password'], $this->user->password)) {
            $this->getErrorBag()->add("old_password", "password does not match our records");
            return;
        }

        $data = Validator::make($this->state, [
            'password' => ['required', 'confirmed', Password::required()],
        ])->validate();

        $this->user->password = Hash::make($this->state['password']);
        $this->user->save();
        $this->user->refresh();

        $this->emit("saved");
    }

    public function render()
    {
        return view("profile.update-user-password");
    }
}
