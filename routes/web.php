<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('home-page');
});

Route::get('/search', function () {
    //return view('welcome');
    return view('find-hotel', [
        "hotels" => \App\Models\Hotel::all(),
    ]);
})->name("hotel.search");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('/admin')->middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::get("hotel", [HotelController::class, 'index'])->name("hotel.index");
    Route::get("hotel/create", [HotelController::class, 'create'])->name("hotel.create");
    Route::post("hotel/store", [HotelController::class, 'store'])->name("hotel.store");
    Route::get("hotel/{hotel}/edit", [HotelController::class, 'edit'])->name("hotel.edit");
    Route::post("hotel/{hotel}/update", [HotelController::class, 'update'])->name("hotel.update");
    Route::get("hotel/{hotel}/destroy", [HotelController::class, 'destroy'])->name("hotel.destroy");

    Route::get("hotel/{hotel}/room", [RoomController::class, 'index'])->name("room.index");
    Route::get("hotel/{hotel}/room/create", [RoomController::class, 'create'])->name("room.create");
    Route::post("hotel/{hotel}/room", [RoomController::class, 'store'])->name("room.store");
    Route::get("hotel/{hotel}/room/{room}/edit", [RoomController::class, 'edit'])->name("room.edit");
    Route::post("hotel/{hotel}/room/{room}/update", [RoomController::class, 'update'])->name("room.update");
    Route::get("hotel/{hotel}/room/{room}/destroy", [RoomController::class, 'destroy'])->name("room.destroy");

    Route::get("hotel/{hotel}/room/{room}/booking", [BookingController::class, "index"])->name("booking.index");

});

Route::get("/hotel/{hotel}", [HotelController::class, "show"])->name("hotel.show");
