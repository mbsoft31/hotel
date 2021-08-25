<?php

namespace App\Http\Livewire\Admin;

use App\Models\Receptionist;
use Exception;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Nette\Schema\ValidationException;

class EditReceptionistForm extends Component
{

    public $receptionist;
    public $state;

    public function mount(Receptionist $receptionist)
    {
        $this->receptionist = $receptionist->id;
        $this->state = [
            "first_name" => "",
            "last_name" => "",
            "birthdate" => "",
            "birth_place" => "",
            "meta" => [],
            /*"user_id" => null,
            "name" => "",
            "email" => "",
            "password"=> "",*/
        ];

        $this->state = array_merge($this->state, $receptionist->withoutRelations()->toArray());
        //$this->state = array_merge($this->state, $receptionist->user->withoutRelations()->toArray());
    }

    public function save()
    {
        try {
            $data = Validator::make($this->state, [
                "first_name" => ['required', 'string'],
                "last_name" => ['required', 'string'],
                "birthdate" => ['required', 'date'],
                "birth_place" => ['required', 'string'],
            ])->validate();

            Receptionist::findOrFail($this->receptionist)->update($data);
        }catch(Exception $exception)
        {
            dd($exception);
        }

        $this->emit("saved");
        return redirect()->route("admin.receptionist.index");
    }

    public function render()
    {
        return view('admin.receptionist.edit-receptionist-form');
    }
}
