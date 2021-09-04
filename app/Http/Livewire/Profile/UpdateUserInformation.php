<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateUserInformation extends Component
{

    public User $user;

    public $state;

    public function mount()
    {
        $this->state = $this->user->withoutRelations()->only(["name", "email"]);
    }

    public function save()
    {
        $data = Validator::make($this->state, [
            "name" => ['required', 'string', 'max:255'],
            "email" => ['required', 'string', 'email', 'max:255', Rule::when($this->state['email'] != $this->user->email, 'unique:users')],
        ])->validate();

        $this->user->update($this->state);

        $this->emit("saved");

    }

    public function render()
    {
        return view("profile.update-user-information");
    }
}
