<?php

namespace Tests\Feature;

use App\Actions\Booking\Hotel\CreateHotel;
use App\Actions\Booking\Room\CreateCategory;
use App\Actions\Booking\Room\CreateRoom;
use App\Models\Category;
use App\Models\Room;
use App\Models\User;
use App\Views\Room\CategoryForm;
use App\Views\Room\RoomForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Tests\TestCase;

class RoomTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private function testUserCanCreateRoomTest()
    {
        $user = User::first();
        $this->actingAs($user);
        $hotel = (new CreateHotel)->create( [
            "name" => "Hotel one",
            "address" => "hotel one street, Souk Ahras",
        ]);
        $data = [
            "number" => 10,
            "floor_number" => 1,
            "bed_count" => 2,
            "phone" => "110",
            "description" => "bla bla room",
            "hotel_id" => $hotel->id,
        ];
        try {
            $room = (new CreateRoom)->create($data);
        } catch (ValidationException $e) {
            dd($e->validator->errors());
        }

        $this->assertTrue(Room::wherePhone('110')->exists());
        $this->assertEquals($user->id, $hotel->user->id);
        $this->assertEquals($hotel->id, $room->hotel->id);
    }

    private function testCreateRoomFormTest()
    {
        $this->actingAs(User::first());
        $hotel = (new CreateHotel)->create( [
            "name" => "Hotel one",
            "address" => "hotel one street, Souk Ahras",
        ]);

        Livewire::test(RoomForm::class)
            ->set('number', 1)
            ->set('bed_count', 1)
            ->set('floor_number', 0)
            ->set('phone', '01')
            ->call('create');

        $this->assertTrue(Room::whereNumber(1)->exists());
    }

    private function testUpdateRoomFormTest()
    {
        $this->actingAs(User::first());
        $hotel = (new CreateHotel)->create( [
            "name" => "Hotel one",
            "address" => "hotel one street, Souk Ahras",
        ]);
        $data = [
            "number" => 10,
            "floor_number" => 1,
            "bed_count" => 2,
            "phone" => "110",
            "description" => "bla bla room",
            "hotel_id" => $hotel->id,
        ];
        $room = (new CreateRoom)->create($data);

        Livewire::test(RoomForm::class, ["room" => $room])
            ->set('phone', '101')
            ->call('update');

        $this->assertTrue(Room::whereNumber(10)->exists());
        $this->assertEquals('101', Room::whereNumber(10)->first()->phone);
    }

    private function testUserCanCreateCategoryTest()
    {
        $user = User::first();
        $this->actingAs($user);
        $data = [
            "name" => "suite",
            "description" => "bla bla category",
        ];
        $room = (new CreateCategory)->create($data);

        $this->assertTrue(Category::whereName('suite')->exists());
    }

    private function testCreateCategoryFormTest()
    {
        $this->actingAs(User::first());

        Livewire::test(CategoryForm::class)
            ->set('name', 'suite')
            ->set('description', 'bla bla category')
            ->call('create');

        $this->assertTrue(Category::whereName('suite')->exists());
    }

}
