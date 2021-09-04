<?php

namespace Database\Seeders;

use App\Models\BedType;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Receptionist;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call( class: RoleSeeder::class );
        $this->call( class: FacilitySeeder::class );
        $this->call( class: RoomTypeSeeder::class );
        $this->call( class: BedTypeSeeder::class );

        $admin = User::factory()->afterCreating(function ($model) {
            $model->assignRole("admin");
        })->create([
            "email" => "admin@mail.com",
            "password" => Hash::make("admin1234"),
        ]);
    }
}
