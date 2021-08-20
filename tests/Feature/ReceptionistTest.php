<?php

use App\Models\Receptionist;
use App\Models\User;
use Booking\DataObjects\ReceptionistData;
use Booking\Interfaces\Receptionist\CreateReceptionist;

test(description: 'can visit admin hotel index route', closure: function() {
    $this->get( route("admin.hotel.index") )->assertOk();
});

test(description: 'can visit admin receptionist create route', closure: function() {
    $this->get( route("admin.receptionist.create") )->assertOk();
});

test(description: 'can visit admin receptionist show route', closure: function() {
    $receptionist = Receptionist::factory()->create();
    $this->get( route("admin.receptionist.show", $receptionist) )
        ->assertOk()
        ->assertSee('show receptionist ' . $receptionist->name);
});

test(description: 'can visit admin receptionist edit route', closure: function() {
    $receptionist = Receptionist::factory()->create();
    $this->get( route("admin.receptionist.edit", $receptionist) )
        ->assertOk()
        ->assertSee('edit receptionist ' . $receptionist->name);
});

it(description: 'can create a receptionist with an existing user', closure:  function () {

    $receptionistData = array_merge(
        [
            "existing_user" => true,
        ],
        Receptionist::factory()->raw()
    );

    $receptionist = $this->app->make(CreateReceptionist::class)->create($receptionistData);

    expect(
        value: Receptionist::whereFirstName($receptionistData["first_name"])->exists()
    )->toBeTrue();
});

it(description: 'can create a receptionist with a new user', closure:  function () {

    $receptionistData = array_merge(
        [
            "existing_user" => false,
        ],
        User::factory()->raw(),
        Receptionist::factory()->raw()
    );

    $receptionist = $this->app->make(CreateReceptionist::class)->create($receptionistData);

    expect(
        value: Receptionist::whereFirstName($receptionistData["first_name"])->exists()
    )->toBeTrue();
});

test(description: 'admin can create a receptionist with an existing user', closure:  function () {

    $receptionistData = array_merge(
        [
            "existing_user" => true,
        ],
        Receptionist::factory()->raw()
    );

    $this->followingRedirects()
        ->post(route("admin.receptionist.store"), $receptionistData)
        ->assertOk();
    $this->assertTrue(Receptionist::whereFirstName($receptionistData["first_name"])->exists());
});

test(description: 'admin can create a receptionist with a new user', closure:  function () {

    $receptionistData = array_merge(
        [
            "existing_user" => false,
        ],
        User::factory()->raw(),
        Receptionist::factory()->raw()
    );

    $this->followingRedirects()
        ->post(route("admin.receptionist.store"), $receptionistData)
        ->assertOk();
    $this->assertTrue(Receptionist::whereFirstName($receptionistData["first_name"])->exists());
});

it(description: 'admin can delete receptionist route', closure: function () {
    $admin = User::factory()->create();
    // $admin->assignRole('admin');
    $this->actingAs($admin);

    $receptionist = Receptionist::factory()->create();
    $name = $receptionist->first_name;

    $this->followingRedirects()
        ->post( route("admin.receptionist.destroy", $receptionist) )
        ->assertOk();
    $this->assertFalse(Receptionist::whereFirstName($name)->exists());
});
