<?php

use App\Http\Livewire\Hotel\Search;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view("home-page");
});

Route::get('/profile', function () {
    return view("profile.show", [
        "user" => Auth::user()
    ]);
})->middleware("auth")->name("profile");

Route::get("/dashboard", function () {
    if (Auth::user()->hasRole("admin"))
        return redirect()->route("admin.hotel.index");
    if (Auth::user()->hasRole("receptionist"))
        return redirect()->route("receptionist.room.index");

    return redirect("/");
})->middleware("auth")->name("dashboard");

Route::get('/search-hotel', Search::class)->name("hotel.search");

Route::get("/hotel/{hotel}", function (Hotel $hotel) {
    return view("static.hotel.show", compact("hotel"));
})->name("hotel.show");

Route::get("/find-room", function () {
    return view("static.find-room");
})->name("room.search");
