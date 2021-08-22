<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Navbar extends Component
{

    protected $listeners = ["loggedIn" => '$refresh'];

    public function render()
    {
        return view('layouts.navbar');
    }
}
