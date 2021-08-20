<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hotel;
use App\Models\Receptionist;
use Livewire\Component;

class UpdateHotelReceptionists extends Component
{

    public $hotel;
    public $state;

    protected $listeners = [
        "receptionistDeleted" => '$refresh',
        "receptionistCreated" => '$refresh',
    ];

    public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;
        $this->state = [];
    }

    public function removeReceptionist(Receptionist $receptionist)
    {
        $this->hotel->receptionists()->detach($receptionist);

        $this->emit("receptionistDeleted");
    }

    public function render()
    {
        return view('admin.hotel.update-hotel-receptionists', [
            "hotel" => $this->hotel,
            "receptionists" => $this->hotel->receptionists,
        ]);
    }
}
