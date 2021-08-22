<?php

namespace App\Http\Livewire\Reservation;

use App\Models\Reservation;
use Livewire\Component;

class PassAction extends Component
{

    public Reservation $reservation;

    public function mount(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function render()
    {
        return view('receptionist.reservation.pass-action');
    }
}
