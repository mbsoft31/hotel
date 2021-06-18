<?php

namespace Database\Seeders;

use App\Actions\Booking\Hotel\CreateHotel;
use App\Actions\Booking\Room\CreateCategory;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = require("SeedingData.php");

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = $data["permissions"];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $roles = $data["roles"];
        foreach ($roles as $role_name => $permissions) {
            $role = Role::create(["name" => $role_name]);
            $role->givePermissionTo($permissions);
        }

        $users = $data["users"];
        foreach ($users as $user){
            $user = collect($user);

            $model = User::factory()->create(
                $user->only(["name", "email", "password"])
                    ->merge([
                        "password" => Hash::make($user->get("password"))
                    ])
                    ->toArray()
            );

            $roles = $user->only(["roles"]);
            foreach ($roles as $role)
                $model->assignRole($role);

            $permissions = $user->only(["permissions"]);
            $model->givePermissionTo($permissions);
        }

        $room_types = $data["room_types"];

        foreach ($room_types as $type) {
            Category::create($type);
        }

        $hotels = $data["Hotels"];

        foreach ($hotels as $hotel)
        {
            $hotel = collect($hotel);
            $model = Hotel::create(
                $hotel
                    ->only(["name", "description", "country", "state", "address",])
                    ->merge([
                        "user_id" => User::whereEmail($hotel->get("admin"))->first()->id
                    ])->toArray()
            );

            $rooms = $hotel->get("rooms");

            foreach ($rooms as $room)
            {
                $model_room = Room::create(
                    collect($room)->merge([
                        "hotel_id" => $model->id,
                        "user_id" => $model->user_id,
                        "type_id" => 1,
                    ])->toArray()
                );
            }
        }

    }
}
