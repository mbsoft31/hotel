<?php

namespace App\Http\Livewire\Receptionist;

use App\Http\Livewire\Admin\UpdateHotelRooms;
use App\Models\Hotel;
use App\Models\Receptionist;
use App\Models\RoomType;
use Booking\Interfaces\Room\CreateRoom;
use Livewire\Component;

class CreateRoomForm extends Component
{

    public Hotel $hotel;
    public Receptionist $receptionist;

    public $state;

    public function save(CreateRoom $creator)
    {
        $creator->create($this->hotel, $this->state);

        $this->emit('roomCreated');

        return redirect()->route("receptionist.room.edit");
    }

    public function mount()
    {
        $this->state = [
            "room_type_id" => "",
            "name" => "",
            "description" => "",
            "rooms_count" => "",
        ];
    }

    public function render()
    {
        return view('receptionist.room.create-room-form', [
            "roomTypes" => RoomType::all(),
        ]);
    }
}
