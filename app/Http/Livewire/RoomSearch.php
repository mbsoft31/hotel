<?php

namespace App\Http\Livewire;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\PDO\Connection;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use function Livewire\str;

class RoomSearch extends Component
{
    use WithPagination;

    public array $state;

    public $search;
    public $country;
    public $city;

    public $start;
    public $end;
    public $nights = 1;
    public $persons = 1;

    public $stars = 0;

    protected $rooms;

    protected $query;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'nights' => ['except' => 1],
        'stars' => ['except' => 0],
        'start',
        'end',
        "persons" => ['except' => 1],
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

    public function mount()
    {
        $this->fill([
            "start" => Carbon::today()->format("Y-m-d"),
            "nights" => 1,
            "end" => Carbon::today()->addDays(1)->format("Y-m-d"),
        ]);
    }

    public function render()
    {
        $this->rooms = $this->rooms = Room::with("hotel")
            ->where("hotels.name", 'like', "%$this->search%")
            ->availableFor($this->start, $this->end, $this->persons, $this->stars)->paginate(4);
        return view('livewire.room-search', [
            "rooms" => $this->rooms,
        ]);
    }
}
