<?php

namespace App\Http\Livewire\Receptionist;

use App\Models\BedType;
use App\Models\Hotel;
use App\Models\Receptionist;
use App\Models\Room;
use Booking\Interfaces\Room\UpdateRoom;
use Livewire\Component;

class UpdateRoomBedsForm extends Component
{

    public Hotel $hotel;
    public Receptionist $receptionist;
    public Room $room;

    public $bed;

    protected $listeners = [
        "roomUpdated" => '$refresh',
    ];

    public function save(UpdateRoom $updater)
    {
        $this->emit('saved');
        $this->emit('roomUpdated');
    }

    public function attach(BedType $bedType)
    {
        if (is_null($this->bed))
            return;

        $this->room->bedTypes()->attach($this->bed);
        $this->bed = BedType::first()->id;
        $this->emit('saved');
        $this->emit('roomUpdated');
    }

    public function detach(BedType $bedType)
    {
        $this->room->bedTypes()->detach($bedType);
        $this->emit('saved');
        $this->emit('roomUpdated');
    }

    public function mount()
    {
        $this->state = $this->room->withoutRelations()->toArray();
        $this->bed = BedType::first()->id;
    }

    public function render()
    {
        return view('receptionist.room.update-room-beds-form', [
            "beds" => $this->room->bedTypes,
            "bedTypes" => BedType::all(),
        ]);
    }
}
