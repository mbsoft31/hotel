<?php

namespace App\Http\Controllers;

use App\Actions\Booking\Hotel\CreateHotel;
use App\Actions\Booking\Hotel\UpdateHotel;
use App\Models\Hotel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if (Auth::user()->hasRole("admin"))
            return view("hotel.index", [
                "hotels" => Hotel::all(),
            ]);

        return view("hotel.index", [
            "hotels" => Hotel::where("user_id", Auth::id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        if ( ! Auth::user()->hasRole("admin") ) abort(403, "You're not admin");

        return view("hotel.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ( ! Auth::user()->hasRole("admin") ) abort(403, "You're not admin");

        $hotel = (new CreateHotel())->create($request->all());

        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show(Hotel $hotel)
    {
        return view("hotel.show", [
            "hotel" => $hotel,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        if ( ! Auth::user()->hasRole("admin") ) abort(403, "You're not admin");
        return view("hotel.edit", [
            "hotel" => Hotel::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Hotel $hotel
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function update(Request $request, Hotel $hotel)
    {
        if ( ! Auth::user()->hasRole("admin") ) abort(403, "You're not admin");
        try {
            $updated = (new UpdateHotel())->update($hotel, $request->all());
        } catch (ValidationException $e) {
            return back()->withErrors();
        }


        if ($updated) {
            // flash the session
        }

        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|Response
     */
    public function destroy(Hotel $hotel)
    {
        if ( ! Auth::user()->hasRole("admin") ) abort(403, "You're not admin");
        $hotel->delete();
        return redirect()->route('hotel.index');
    }
}
