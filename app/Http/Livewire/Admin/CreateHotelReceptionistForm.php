<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hotel;
use App\Models\Receptionist;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateHotelReceptionistForm extends Component
{
    public $hotel;
    public $state;

    public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;
        $this->state = [
            "receptionist_id" => Receptionist::all() ?? null,
        ];
    }

    public function save()
    {
        $this->hotel->receptionists()->attach($this->state["receptionist_id"]);

        $this->state = [
            "receptionist_id" => Receptionist::all() ?? null,
        ];

        $this->emitTo(UpdateHotelReceptionists::class, 'receptionistCreated');
    }

    public function saveNew(CreateReceptionist $creator)
    {
        $this->receptionist = $creator->create($this->hotel, $this->state);

        $this->hotel->receptionists()->attach($this->receptionist);

        $this->emitTo(UpdateHotelReceptionists::class, 'receptionistCreated');
    }

    public function render()
    {
        return view('admin.hotel.create-hotel-receptionist-form', [
            "receptionists" => Receptionist::all(),
        ]);
    }
}
