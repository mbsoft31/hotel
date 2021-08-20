<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hotel;
use App\Models\Receptionist;
use App\Models\Room;
use Booking\Interfaces\Room\DeleteRoom;
use Livewire\Component;

class UpdateHotelRooms extends Component
{

    public $hotel;
    public $state;

    protected $listeners = [
        'roomDeleted' => '$refresh',
        'roomCreated' => '$refresh',
    ];

    public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;
        $this->state = [];
    }

    public function removeRoom(DeleteRoom $destroyer, Room $room)
    {
        $destroyer->delete($room);
        $this->emit('roomDeleted');
    }

    public function render()
    {
        return view('admin.hotel.update-hotel-rooms', [
            "hotel" => $this->hotel,
            "rooms" => $this->hotel->rooms,
        ]);
    }
}
