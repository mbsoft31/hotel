<?php

namespace App\Http\Livewire\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AcceptAction extends Component
{
    public Reservation $reservation;

    public function mount(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function render()
    {
        return view("receptionist.reservation.accept-action");
    }
}
