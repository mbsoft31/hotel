<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hotel;
use App\Models\RoomType;
use Booking\Interfaces\Room\CreateRoom;
use Livewire\Component;

class CreateHotelRoomForm extends Component
{

    public Hotel $hotel;
    public $roomTypes;

    public $state;

    public function mount()
    {
        $this->roomTypes = RoomType::all();
        $this->state = [
            "room_type_id" => "",
            "name" => "",
            "description" => "",
            "rooms_count" => "",
        ];
    }

    public function save(CreateRoom $creator)
    {
        $creator->create($this->hotel, $this->state);

        $this->emitTo(UpdateHotelRooms::class,'roomCreated');
    }

    public function render()
    {
        return view('admin.hotel.create-hotel-room-form');
    }
}
