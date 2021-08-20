<?php

namespace Database\Seeders;

use App\Models\BedType;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Receptionist;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

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

        $beds = BedType::all();
        $rooms = RoomType::all();

        $receptionists = Receptionist::all();
        $receptionist_index = 1;

        $guests = Guest::all();
        $guest_index = 1;

        Hotel::factory()
            ->count(10)
            ->has(
                Room::factory()
                    ->count( 10 )
                    ->state([
                        "rooms_count" => rand(1, 4),
                        "room_type_id" => $rooms->random()->first()->id,
                    ])
                    ->afterCreating(function ($model) use ($beds, &$guests){
                        $model->bedTypes()->attach($beds->random(rand(1, 2)));
                        $count = $model->rooms_count;
                        if ($guests->count() - 4 >= 0)
                        {
                            Reservation::factory()->createMany([
                                [
                                    "room_id" => $model->id,
                                    "guest_id" => $guests->pop()->id
                                ],
                                [
                                    "room_id" => $model->id,
                                    "guest_id" => $guests->pop()->id
                                ],
                                [
                                    "room_id" => $model->id,
                                    "guest_id" => $guests->pop()->id
                                ],
                                [
                                    "room_id" => $model->id,
                                    "guest_id" => $guests->pop()->id
                                ],
                            ]);
                        }
                    })
            )
            ->afterCreating(function ($model) use (&$receptionists){
                $model->receptionists()->attach($receptionists->pop());
                // set photos folder
            })
            ->create();

        /*Hotel::factory()
            ->count(100)
            ->has(
                Room::factory()
                    ->count( 10 )
                    ->has(
                        Reservation::factory()->count(2)
                    )
                    ->state([
                        "room_type_id" => RoomType::factory(),
                    ])
                    ->afterCreating(function ($model) use ($beds){
                        $model->bedTypes()->attach($beds->random(rand(1, 2)));
                    })
            )
            ->has(
                Receptionist::factory()->count(1)->afterCreating(function ($model) {
                    $model->user->assignRole("receptionist");
                })
            )
            ->create();*/

        Receptionist::factory()->count(5)->afterCreating(function ($model) {
            $model->user->assignRole("receptionist");
        })->create();
    }
}
