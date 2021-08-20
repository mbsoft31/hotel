<?php

declare(strict_types=1);


namespace App\View\Components;


use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainLayout extends Component
{

    /**
     * @return View|Factory|Htmlable|Closure|string|Application
     */
    public function render(): View|Factory|Htmlable|Closure|string|Application
    {
        return view("layouts.main");
    }
}
