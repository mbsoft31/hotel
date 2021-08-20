<?php

namespace App\Http\Livewire\Receptionist;

use App\Models\Hotel;
use App\Models\Receptionist;
use App\Models\Room;
use App\Models\RoomType;
use Booking\Interfaces\Room\UpdateRoom;
use Livewire\Component;

class UpdateRoomPricingForm extends Component
{

    public Hotel $hotel;
    public Receptionist $receptionist;
    public Room $room;

    public $state;

    public function save(UpdateRoom $updater)
    {
        $updater->update($this->room, $this->state);

        $this->emit('saved');
        $this->emit('roomUpdated');
    }

    public function mount()
    {
        $this->state = $this->room->withoutRelations()->toArray();
    }

    public function render()
    {
        return view('receptionist.room.update-room-pricing-form',[
            "roomTypes" => RoomType::all(),
            "currencies" => [
                "EUR" => "Euro",
                "DZD" => "Algerian Dinars",
                "USD" => "US Dolars",
                "TND" => "Tunisian Dinars",
            ],
            "discountTypes" => [
                "amount" => "Fixed amount",
                "percentage" => "Percentage",
            ],
        ]);
    }
}
