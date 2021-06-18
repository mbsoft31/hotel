<?php

namespace Tests\Feature;

use App\Actions\Booking\Hotel\CreateHotel;
use App\Models\Hotel;
use App\Models\User;
use App\Views\Hotel\CreateForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanCreateHotelTest()
    {
        //$user = User::first();
        $admin = User::factory()->create([
            "name" => "Admin",
            "email" => "admin@mail.com",
            "password" => Hash::make("admin"),
        ]);
        $this->actingAs($admin);
        $data = [
            "name" => "Hotel one",
            "description" => "bla bla hotel",
            "address" => "hotel one street, Souk Ahras",
            "country" => "Algeria",
            "state" => "Souk Ahras",
        ];

        $hotel = (new CreateHotel)->create($data);

        $this->assertTrue(Hotel::whereName('Hotel one')->exists());
        $this->assertEquals($user->id, $hotel->user->id);
    }

    private function testCreateHotelFormTest()
    {
        $this->actingAs(User::first());

        Livewire::test(CreateForm::class)
            ->set('name', 'Hotel one')
            ->set('address', 'hotel one street, Souk Ahras')
            ->call('create');

        $this->assertTrue(Hotel::whereName('Hotel one')->exists());
    }
}
