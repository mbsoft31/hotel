<?php

namespace App\Http\Livewire\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckInAction extends Component
{
    public Reservation $reservation;

    protected $listeners = ["saved" => '$refresh'];

    public function check()
    {
        $this->reservation->check();

        $this->emit("saved");
    }

    public function render()
    {
        if ( ! Auth::user()->can("check reservation") || $this->reservation->state != "accepted" )
            return '';
        else
            return view("receptionist.reservation.check-in-action");
    }
}
