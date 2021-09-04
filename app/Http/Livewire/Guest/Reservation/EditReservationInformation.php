<?php

namespace App\Http\Livewire\Guest\Reservation;

use App\Models\Reservation;
use Carbon\CarbonImmutable;
use Livewire\Component;

class EditReservationInformation extends Component
{

    public Reservation $reservation;

    public $state;

    public function mount()
    {
        $state = $this->reservation->withoutRelations()->only(["start","end", "nights"]);
        $this->state = [
            "start" => CarbonImmutable::parse($state["start"])->format('Y-m-d'),
            "end" => CarbonImmutable::parse($state["end"])->format('Y-m-d'),
            "nights" => $state["nights"],
        ];
    }

    public function save()
    {
        dd($this->state);
    }

    public function render()
    {
        return view('livewire.guest.reservation.edit-reservation-information');
    }
}
