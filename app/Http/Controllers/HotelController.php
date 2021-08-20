<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Receptionist;
use App\Models\Room;
use App\Models\RoomType;
use Booking\Interfaces\Hotel\CreateHotel;
use Booking\Interfaces\Hotel\DeleteHotel;
use Booking\Interfaces\Hotel\UpdateHotel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
            $hotels = Hotel::all();
        else if (Auth::user()->hasRole("receptionist"))
            $hotels = Receptionist::whereUserId(Auth::id())->first()->hotels;
        return view('admin.hotel.index', [
            "hotels" => $hotels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.hotel.create', [
            "countries" => ["DZ", "TN", "USA"],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, CreateHotel $creator)
    {
        $hotel = $creator->create($request->all());
        return redirect()->route("admin.hotel.index");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return \response('show hotel ' . Hotel::findOrFail($id)->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
    {
        return view('admin.hotel.edit' , [ "hotel" => Hotel::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @param UpdateHotel $updater
     * @return JsonResponse
     */
    public function update(Request $request, int $id, UpdateHotel $updater): JsonResponse
    {
        $hotel = $updater->update(Hotel::findOrFail($id), $request->all());
        return response()->json($hotel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param DeleteHotel $destroyer
     * @return RedirectResponse
     */
    public function destroy(int $id, DeleteHotel $destroyer): RedirectResponse
    {
        $destroyer->delete(Hotel::findOrFail($id));
        return redirect()->route("admin.hotel.index");
    }
}
