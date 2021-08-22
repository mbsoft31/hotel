<?php

namespace App\Http\Livewire\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckInAction extends Component
{
    protected $listeners = ["saved" => '$refresh'];

    public function mount(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    public function render()
    {
        return view("receptionist.reservation.check-in-action", [
            "reservation" => $this->model,
        ]);
    }
}
