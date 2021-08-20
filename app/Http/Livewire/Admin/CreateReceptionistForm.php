<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Booking\Interfaces\Receptionist\CreateReceptionist as CreateReceptionistAlias;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CreateReceptionistForm extends Component
{

    public bool $existing_user = true;

    public $state;

    public function mount()
    {
        $this->state = [
            "first_name" => "",
            "last_name" => "",
            "birthdate" => "",
            "birth_place" => "",
            "meta" => [],
            "user_id" => null,
            "existing_user" => false,
            "name" => "",
            "email" => "",
            "password"=> "",
        ];
    }

    /**
     * @throws ValidationException
     */
    public function save(CreateReceptionistAlias $creator)
    {
        $creator->create(array_merge($this->state, [
            "existing_user" => $this->existing_user,
        ]));


        return redirect()->route("admin.receptionist.index");
    }

    /**
     * @return Collection
     */
    public function nonReceptionistUsers(): Collection
    {
        return User::whereNotIn(
            'id',
            DB::table('receptionists')
                ->select(["user_id" => 'id'])
                ->get()
                ->pluck("id")
                ->toArray()
        )->get();
    }

    public function render()
    {
        return view('admin.receptionist.create-receptionist-form', [
            "users" => $this->nonReceptionistUsers(),
        ]);
    }
}
