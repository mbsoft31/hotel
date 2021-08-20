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

    public bool $existing_user = true;

    public string $first_name;
    public string $last_name;
    public Carbon $birthdate;
    public string $birth_place;
    public array $metas;

    public int $user_id;
    public string $name;
    public string $email;
    public string $password;

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
