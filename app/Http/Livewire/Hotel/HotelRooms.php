<?php

namespace App\Http\Livewire\Hotel;

use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HotelRooms extends Component
{

    public Hotel $hotel;

    public array $state;

    public $start;
    public $end;
    public int $nights = 3;
    public int $persons = 1;
    public int $rooms_count = 1;
    public $total_capacity = 0;
    public $selected = [];

    protected $rooms;
    protected $selected_rooms;

    protected $queryString = [
        "start" => ["except" => ''],
        "nights" => ["except" => 1],
        "persons" => ["except" => 1],
        "selected",
        "rooms_count" => ["except" => 1],
    ];

    public function updated($name, $value)
    {
        if ($name == "nights")
        {
            $this->end = Carbon::createFromFormat("Y-m-d", $this->start)->addDays($value)->format("Y-m-d");
        }

        if ($name == "search")
        {
            $this->page = 1;
        }

        if ($name == "start")
        {
            $this->end = Carbon::createFromFormat("Y-m-d", $value)
                ->addDays($this->nights)->format("Y-m-d");
        }

        if ($name == "end")
        {
            $this->nights = Carbon::createFromFormat("Y-m-d", $value)
                ->diff(Carbon::createFromFormat("Y-m-d", $this->start))->days;
        }
    }

    public function selectRoom($room)
    {
        if (Arr::has($this->selected, $room["id"]))
            return;
        $this->selected[$room["id"]] = $room;
        $this->total_capacity = collect($this->selected)->pluck("capacity")->sum();
    }

    public function removeRoom($room)
    {
        if ( ! Arr::has($this->selected, $room["id"]))
            return;
        unset($this->selected[$room["id"]]);
        $this->total_capacity = collect($this->selected)->pluck("capacity")->sum();
    }

    public function mount(Request $request)
    {
        $this->fill($request->all());
        if ($request->has("room")) {
            $room = Room::find($request->room);
            $this->selectRoom(["id" => $room->id, "capacity" => $room->capacity]);
        }
        $this->total_capacity = collect($this->selected)->pluck("capacity")->sum();

        $user = Auth::user();

        if (Auth::check() && $user->hasRole("guest")) {
            $this->geust_exists = true;
            $this->state = $user->guest?->withoutRelations()?->toArray() ?? [];
        }
    }

    public function render()
    {
        $query = $this->hotel->rooms();

        $this->rooms = $query->availableFor($this->start, $this->end, $this->persons)->paginate();

        $this->rooms = $this->rooms->whereNotIn("id", collect($this->selected)->pluck("id")->toArray());

        return view('static.hotel.rooms', [
            "rooms" => $this->rooms,
            "selected_rooms_models" => (isset($this->selected) && count($this->selected) > 0) ? Room::find( collect($this->selected)->pluck("id")->toArray()): collect(),
        ]);
    }
}
