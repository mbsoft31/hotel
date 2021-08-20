<?php

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\User;
use Booking\DataObjects\HotelData;
use Booking\Interfaces\Hotel\CreateHotel;
use Booking\Interfaces\Hotel\DeleteHotel;
use Booking\Interfaces\Hotel\UpdateHotel;

test(description: 'can visit admin hotel index route', closure: function() {
    $this->get( route("admin.hotel.index") )->assertOk();
});

test(description: 'can visit admin hotel create route', closure: function() {
    $this->get( route("admin.hotel.create") )->assertOk();
});

test(description: 'can visit admin hotel show route', closure: function() {
    $hotel = Hotel::factory()->create();
    $this->get( route("admin.hotel.show", $hotel) )
        ->assertOk()
        ->assertSee('show hotel ' . $hotel->name);
});

test(description: 'can visit admin hotel edit route', closure: function() {
    $hotel = Hotel::factory()->create();
    $this->get( route("admin.hotel.edit", $hotel) )
        ->assertOk();
});

it(description: 'can create an hotel', closure:  function () {

    $hotelData = new HotelData(Hotel::factory()->raw());

    $hotel = $this->app->make(CreateHotel::class)->create($hotelData->all());

    expect(
        value: Hotel::whereName($hotelData->name)->exists()
    )->toBeTrue();

    expect(
        value: $hotel->photos,
    )->toHaveCount(
        count: count($hotelData->photos),
    );

});

it(description: 'admin can create hotel route', closure: function () {
    $admin = User::factory()->create();
    // $admin->assignRole('admin');
    $this->actingAs($admin);
    $hotelData = new HotelData(Hotel::factory()->raw());

    $this->followingRedirects()
        ->post('/admin/hotel/store', $hotelData->toArray())
        ->assertOk();
    $this->assertTrue(Hotel::whereName($hotelData->name)->exists());
});

it(description: 'can update an hotel informations', closure: function () {

    $hotelData = new HotelData(Hotel::factory()->raw());
    $hotel = Hotel::create($hotelData->toArray());

    $newData = new HotelData(Hotel::factory()->raw());
    $this->app->make(UpdateHotel::class)->update($hotel, $newData->only("name", "address")->toArray());

    expect(
        value: Hotel::whereName($hotelData->name)->exists()
    )->toBeFalse();

    expect(
        value: Hotel::whereName($newData->name)->exists()
    )->toBeTrue();

});

it(description: 'can update an hotel facilities', closure: function () {

    $hotelData = new HotelData(Hotel::factory()->raw());
    $hotel = Hotel::create($hotelData->toArray());

    $newFacilities = [1, 5, 7];
    $this->app->make(UpdateHotel::class)->updateFacilities($hotel, $newFacilities);

    expect(
        value: $hotel->facilities()->count()
    )->toBe(
        expected: count($newFacilities)
    );

});

it(description: 'can delete an hotel', closure: function () {
    $hotelData = new HotelData(Hotel::factory()->raw());
    $hotel = Hotel::create($hotelData->toArray());

    $deleted = $this->app->make(DeleteHotel::class)->delete($hotel);

    expect(
        value: Hotel::whereName($hotelData->name)->exists()
    )->toBeFalse();
});

it(description: 'admin can delete hotel route', closure: function () {
    $admin = User::factory()->create();
    // $admin->assignRole('admin');
    $this->actingAs($admin);

    $hotel = Hotel::factory()->create();
    $name = $hotel->name;

    $this->followingRedirects()
        ->post( route("admin.hotel.destroy", $hotel) )
        ->assertOk();
    $this->assertFalse(Hotel::whereName($name)->exists());
});

it(description: 'admin can update hotel route', closure: function() {
    $admin = User::factory()->create();
    // $admin->assignRole('admin');
    $this->actingAs($admin);

    $hotel = Hotel::factory()->create();
    $name = $hotel->name;

    $this->post( route("admin.hotel.update", $hotel), [
        "name" => "Hotel updated"
    ])->assertOk();

    $this->assertFalse(Hotel::whereName($name)->exists());
    $this->assertTrue(Hotel::whereName("Hotel updated")->exists());
});
