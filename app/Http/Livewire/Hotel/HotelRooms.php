<?php

namespace App\Http\Livewire\Hotel;

use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Booking\Interfaces\Receptionist\CreateReceptionist;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class HotelRooms extends Component
{

    public Hotel $hotel;

    public $show = "reservation_informations";
    public $error = null;

    public array $state = [];

    public $start;
    public $end;
    public int $nights = 1;
    public int $persons = 1;
    public int $rooms_count = 1;
    public $total_capacity = 0;
    public $selected = [];

    //protected $rooms;
    protected $selected_rooms;

    protected $listeners = ["loggedIn" => '$refresh'];

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

    public function login()
    {
        $data = Validator::make($this->state, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ])->validate();

        if (Auth::attempt($this->state))
        {
            $this->emit("loggedIn");
        }
    }

    public function createGuest()
    {

        $data = Validator::make($this->state, [
            "existing_user" => ["required", "bool"],
            "user_id" => ["required_if:existing_user,true", "integer", "exists:users,id"],
            "gender" => ['required', 'string'],
            "CID" => ['required', 'string'],
            "CID_type" => ['required', 'string'],
            "first_name" => ['required', 'string'],
            "last_name" => ['required', 'string'],
            "birthdate" => ['required', 'date'],
            "birth_place" => ['required', 'string'],
            "metas" => ['array'],
        ])->validate();

        if ( ! isset($data["user_id"]) || ! $data["existing_user"] )
        {
            $user = User::create([
                'name' => $data["name"],
                'email' => $data["email"],
                'password' => Hash::make($data["password"]),
                "email_verified_at" => Carbon::now(),
            ]);

            event(new Registered($user));
        }else {
            $user = User::findOrFail($data["user_id"]);
        }

        // TODO: assign role receptionist to user

        $data["user_id"] = $user->id;

        Guest::create(collect($data)->except("existing_user")->toArray());
        $user->assignRole("guest");

        if ( ! Auth::check() && Auth::attempt(["email" => $user->email, "password" => $user->password]))
        {
            $this->emit("loggedIn");
        }
    }

    public function makeReservation()
    {
        if ( ! isset($this->selected) && count($this->selected) <= 0)
        {
            $this->show = 'rooms_informations';
            $this->setError("You have not selected any rooms yet!");
        }

        if ( ! Auth::check() )
        {
            $this->show = 'guest_informations';
            $this->setError("You are not authenticated please login or create a new account!");
        }

        if ( ! Auth::user()->hasRole("guest") )
        {
            $this->show = 'guest_informations';
            $this->setError("You don't have guest profile yet! please fill in the form an hit save.");
        }

        if ( ! Auth::user()->hasRole("guest") )
        {
            $this->show = 'guest_informations';
            $this->setError("You don't have guest profile yet! please fill in the form an hit save.");
        }

        $rooms = collect($this->selected)->pluck("id");

        $reservation = Reservation::create([
            "start" => $this->start,
            "nights" => $this->nights,
            "rooms_count" => $rooms->count(),
            "end" => $this->end,
            "room_id" => $rooms->first(),
            "guest_id" => Auth::user()->guest->id,
        ]);

        $reservation->rooms()->attach($rooms->toArray());

        return redirect()->route("guest.reservation.index");
    }

    public function setError($message = null)
    {
        $this->error = $message;
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

        if (Auth::check()) {
            $this->state["existing_user"] = true;
            $this->state["user_id"] = Auth::id();
        }

        $this->start = CarbonImmutable::today()->format('Y-m-d');
        $this->end = CarbonImmutable::today()->addDays($this->nights)->format('Y-m-d');
    }

    public function render()
    {

        return view('static.hotel.rooms', [
            "rooms" => $this->query()->whereNotIn("id", collect($this->selected)->pluck("id")->toArray())->get(),
            "selected_rooms_models" => (isset($this->selected) && count($this->selected) > 0) ? Room::find( collect($this->selected)->pluck("id")->toArray()): collect(),
        ]);
    }

    public function query()
    {

        $start = $this->start;
        $end = $this->end;

        $rooms = $this->hotel->rooms;

        $reservations = Reservation::query()
            ->with("rooms")
            ->whereIn('id',
                Reservation::query()
                    ->whereIn(
                        "room_id", $rooms->pluck('id')->toArray()
                    )
                    ->overlapping( $start, $end)
                    ->get(['id'])
                    ->pluck('id')
                    ->toArray()
            )
            ->get()->pluck('id')->toArray();

        $reserved_rooms = DB::table("reservation_room")
            ->select(["room_id"])
            ->whereIn('reservation_id', $reservations)
            ->get()
            ->pluck("room_id")
            ->toArray();

        // dd($rooms, $start->format("Y-m-d"), $end->format("Y-m-d"), $reservations, $reserved_rooms);

        return $this->hotel->rooms()->whereNotIn("rooms.id", $reserved_rooms);
    }
}
