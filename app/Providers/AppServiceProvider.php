<?php

namespace App\Providers;

use App\Models\Guest;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(125);
        /*$guest = Guest::find(10)->user;
        Auth::attempt(["email" => $guest->email, "password" => "password"]);*/
    }
}
