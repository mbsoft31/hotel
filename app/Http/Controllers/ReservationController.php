<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response|string
     */
    public function index()
    {
        if (Auth::user()->hasRole("guest")){

            return view("guest.reservation.index", [
                "reservations" => Auth::user()?->guest?->reservations ?? [],
            ]);

        }

        if (Auth::user()->hasRole("receptionist")){
            return view("receptionist.reservation.index", [
                "reservations" => Auth::user()?->receptionist?->reservations ?? [],
            ]);
        }

        return 'receptonist index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Reservation $reservation
     * @return Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reservation $reservation
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Reservation $reservation
     * @return Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reservation $reservation
     * @return Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back();
    }

    public function checkIn(Reservation $reservation)
    {
        $reservation->check();
        return back();
    }

    public function accept(Reservation $reservation)
    {
        $reservation->accept();
        return back();
    }

    public function passed(Reservation $reservation)
    {
        $reservation->pass();
        return back();
    }
}
