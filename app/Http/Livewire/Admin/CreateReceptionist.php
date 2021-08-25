<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateReceptionist extends Component
{
    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        return view("admin.receptionist.create", [
            "users" => User::all(),
        ]);
    }
}
