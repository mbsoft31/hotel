<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateHotelPhotos extends Component
{

    use WithFileUploads;

    public $hotel;

    public $photos = [];

    public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:5024', // 1MB Max
        ]);

        foreach ($this->photos as $photo) {
            $photo->store('public/' . $this->hotel->photos_path);
        }

        $pics[] = $this->hotel->photos;
    }

    public function delete($photo)
    {
        Storage::disk("local")->delete("public/" . $photo);
    }

    public function render()
    {
        return view('admin.hotel.update-hotel-photos', [
            "images" => $this->hotel->photos,
        ]);
    }
}
