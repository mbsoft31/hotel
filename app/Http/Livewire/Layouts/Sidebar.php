<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Sidebar extends Component
{

    protected $listeners = ["loggedIn" => '$refresh'];

    public function render()
    {
        return view('layouts.sidebar');
    }
}
