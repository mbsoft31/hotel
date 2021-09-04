<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Livewire\Admin\CreateReceptionist;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix("/admin")->middleware(["auth", "role:admin"])->name("admin.")->group( function () {

    Route::get("/hotel", [HotelController::class, "index"])
        ->name("hotel.index");
    Route::get("/hotel/create", [HotelController::class, "create"])
        ->name("hotel.create")
        ->middleware(["can:create hotel"]);
    Route::post("/hotel/store", [HotelController::class, "store"])
        ->name("hotel.store")
        ->middleware(["can:store hotel"]);
    Route::get("/hotel/{hotel}", [HotelController::class, "show"])
        ->name("hotel.show");
    Route::get("/hotel/{hotel}/edit", [HotelController::class, "edit"])
        ->name("hotel.edit")
        ->middleware(["can:edit hotel"]);
    Route::post("/hotel/{hotel}/update", [HotelController::class, "update"])
        ->name("hotel.update")
        ->middleware(["can:update hotel"]);
    Route::post("/hotel/{hotel}/destroy", [HotelController::class, "destroy"])
        ->name("hotel.destroy")
        ->middleware(["can:destroy hotel"]);

    Route::get("receptionist", [ReceptionistController::class, "index"])
        ->name("receptionist.index");
    Route::get("receptionist/create", [ReceptionistController::class, "create"])
        ->name("receptionist.create")
        ->middleware(["can:create receptionist"]);
    Route::post("receptionist/store", [ReceptionistController::class, "store"])
        ->name("receptionist.store")
        ->middleware(["can:store receptionist"]);
    Route::get("receptionist/{receptionist}/show", [ReceptionistController::class, "show"])
        ->name("receptionist.show");
    Route::get("receptionist/{receptionist}/edit", [ReceptionistController::class, "edit"])
        ->name("receptionist.edit")
        ->middleware(["can:edit receptionist"]);
    Route::post("receptionist/{receptionist}/destroy", [ReceptionistController::class, "destroy"])
        ->name("receptionist.destroy")
        ->middleware(["can:destroy receptionist"]);
});

Route::prefix("/receptionist")->middleware(["auth", "role:receptionist"])->name("receptionist.")->group( function () {

    Route::get("room", function (){
        $hotel = Auth::user()->receptionist->hotel()->firstOrFail();
        return view("receptionist.room.index", array_merge(compact("hotel", ), [
            "receptionist" => Auth::user()->receptionist,
            "rooms" => $hotel->rooms,
        ]));
    })->name("room.index");

    Route::get("room/create", [\App\Http\Controllers\RoomController::class, "create"])
        ->name("room.create");

    Route::get("room/{room}", function () { return 'room show'; })
        ->name("room.show");

    Route::get("room/{room}/edit", [\App\Http\Controllers\RoomController::class, "edit"])
        ->name("room.edit");

    Route::post("room/{room}/destroy", [\App\Http\Controllers\RoomController::class, "destroy"])
        ->name("room.destroy");

    Route::get("client", function (){})
        ->name("client.index");

    Route::get("/reservation", function () {
        $receptionist = Auth::user()->receptionist;
        $hotel = $receptionist->hotel->first();
        return view("receptionist.reservation.index", array_merge(compact("hotel", "receptionist"), [
            "reservations" => $hotel->reservations ?? [],
        ]));
    })
        ->name("reservation.index");

    Route::get("/reservation/{reservation}/accept", [\App\Http\Controllers\ReservationController::class, "accept"])
        ->name("reservation.accept");
    Route::get("/reservation/{reservation}/checkIn", [\App\Http\Controllers\ReservationController::class, "checkIn"])
        ->name("reservation.checkIn");
    Route::get("/reservation/{reservation}/passed", [\App\Http\Controllers\ReservationController::class, "passed"])
        ->name("reservation.passed");

});

Route::prefix("/guest")->middleware(["auth", "role:guest"])->name("guest.")->group( function () {

    Route::get("/reservation", [\App\Http\Controllers\ReservationController::class, "index"])
        ->name("reservation.index");

    Route::get("/reservation/{reservation}/destroy", [\App\Http\Controllers\ReservationController::class, "destroy"])
        ->name("reservation.destroy");

});
