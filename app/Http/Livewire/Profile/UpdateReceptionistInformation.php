<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UpdateReceptionistInformation extends Component
{
    public User $user;

    public $state;

    public function mount()
    {
        $this->state = $this->user->receptionist->withoutRelations()->toArray();
    }

    public function save()
    {
        $data = Validator::make($this->state, [
            //"gender" => ['required', 'string'],
            "first_name" => ['required', 'string'],
            "last_name" => ['required', 'string'],
            "birthdate" => ['required', 'date'],
            "birth_place" => ['required', 'string'],
            "metas" => ['array'],
        ])->validate();

        $this->user->receptionist->update($this->state);

        $this->emit("saved");

    }

    public function render()
    {
        return view("profile.update-receptionist-information");
    }
}
