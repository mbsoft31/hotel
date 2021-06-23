<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Hotel $hotel
     * @return Application|Factory|View|Response
     */
    public function index(Hotel $hotel)
    {
        return view("room.index", [
            "hotel" => $hotel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Hotel $hotel)
    {
        return view('room.create', [
            "hotel" => $hotel,
            "types" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, Hotel $hotel)
    {
        //dd($request->all());
        $inputs = $request->all();
        $rules = [
            "number" => ["required", "integer"],
            "phone" => ["required",],
            "bed_count" => ["required",],
            "floor_number" => ["required",],
            "description" => ["nullable",],
            "image" => ["nullable"],
            "type_id" => ["required", "integer", "exists:categories,id"],
        ];

        $validator = Validator::make($inputs, $rules);

        $validated_inputs = $validator->validate();

        $validated_inputs = array_merge($validated_inputs, [
            "user_id"=> Auth::id(),
            "hotel_id" => $hotel->id,
        ]);

        $room = Room::create($validated_inputs);

        return redirect()->route("room.index", $hotel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Hotel $hotel
     * @param Room $room
     * @return Application|Factory|View|Response
     */
    public function edit(Request $request, Hotel $hotel, Room $room)
    {
        return view("room.edit", [
            "hotel" => $hotel,
            "room" => $room,
            "types" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Hotel $hotel
     * @param Room $room
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Hotel $hotel, Room $room)
    {
        $inputs = $request->all();
        $rules = [
            "number" => ["required", "integer"],
            "phone" => ["required",],
            "bed_count" => ["required",],
            "floor_number" => ["required",],
            "description" => ["nullable",],
            "image" => ["nullable"],
            "type_id" => ["required", "integer", "exists:categories,id"],
        ];

        $validator = Validator::make($inputs, $rules);

        $validated_inputs = $validator->validate();

        $validated_inputs = array_merge($validated_inputs, [
            "user_id"=> Auth::id(),
            "hotel_id" => $hotel->id,
        ]);

        if (isset($room)) {
            $room->update($validated_inputs);
        }

        return redirect()->route("room.index", $hotel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if ( ! Auth::user()->hasRole("receptionist") ) abort(403, "You're not receptionist");
    }
}
