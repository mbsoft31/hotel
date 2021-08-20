<?php

namespace App\Http\Livewire\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AcceptAction extends Component
{
    public Reservation $reservation;

    public function accept()
    {
        dd("accept");
        $this->reservation->accept();
    }

    public function mount(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function render()
    {
        if ( ! Auth::user()->can("accept reservation") || $this->reservation->state != "pending" )
            return '';
        return view("receptionist.reservation.accept-action");
    }
}
