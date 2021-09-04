<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
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

    public $stars = 0;

    protected $hotels;

    protected $query;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'country' => ['except' => ''],
        'city' => ['except' => ''],
    ];

    public function updated($name, $value)
    {
        if ( ($name == "search") || ($name == "country") || ($name == "city"))
        {
            $this->page = 1;
        }
    }

    public function mount()
    {
    }

    public function render()
    {
        /*$this->rooms = Room::with("hotel")
            ->where("hotels.name", 'like', "%$this->search%")
            ->availableFor($this->start, $this->end, $this->persons, $this->stars)->paginate(4);*/

        $this->hotels = Hotel::query();

        if (isset($this->stars) && !is_null($this->stars) && $this->stars != 0)
            $this->hotels
                ->where("stars", "$this->stars");

        if (isset($this->search) && !is_null($this->search) && $this->search != '')
            $this->hotels
                ->where("name", 'like', "%$this->search%")
                ->orWhere("address", 'like', "%$this->search%");

        /*if (isset($this->country) && !is_null($this->country) && $this->country != '')
        $this->hotels
            ->where("country", 'like', "%$this->country%");*/

        if (isset($this->city) && !is_null($this->city) && $this->city != '')
            $this->hotels
                ->where("city", 'like', "%$this->city%");

        $this->hotels = $this->hotels->get();

        return view('livewire.room-search', [
            "hotels" => $this->hotels,
        ]);
    }
}
