<?php

namespace App\View\Components\Hotel;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{

    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        return view('pages.find-hotel', [
            "hotels" => Hotel::orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->paginate(2),
        ])->layout("layouts.guest");
    }
}
