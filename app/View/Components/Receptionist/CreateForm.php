<?php

declare(strict_types=1);


namespace App\View\Components\Receptionist;


use App\Models\User;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateForm extends Component
{

    public bool $existing_user = false;

    /**
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view("components.receptionist.create", [
            "users" => User::all(),
        ]);
    }
}
