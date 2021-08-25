<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\Permission;
use App\Models\Receptionist;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(["name" => "admin"]);
        $receptionistRole = Role::create(["name" => "receptionist"]);
        $guestRole = Role::create(["name" => "guest"]);

        Permission::create(["name" => "create hotel"]);
        Permission::create(["name" => "store hotel"]);
        Permission::create(["name" => "edit hotel"]);
        Permission::create(["name" => "update hotel"]);
        Permission::create(["name" => "destroy hotel"]);

        Permission::create(["name" => "create receptionist"]);
        Permission::create(["name" => "store receptionist"]);
        Permission::create(["name" => "edit receptionist"]);
        Permission::create(["name" => "update receptionist"]);
        Permission::create(["name" => "destroy receptionist"]);

        Permission::create(["name" => "accept reservation"]);
        Permission::create(["name" => "check reservation"]);
        Permission::create(["name" => "pass reservation"]);
        Permission::create(["name" => "deny reservation"]);
        Permission::create(["name" => "destroy reservation"]);

        $adminRole->givePermissionTo("create hotel");
        $adminRole->givePermissionTo("store hotel");
        $adminRole->givePermissionTo("edit hotel");
        $adminRole->givePermissionTo("update hotel");
        $adminRole->givePermissionTo("destroy hotel");

        $adminRole->givePermissionTo("create receptionist");
        $adminRole->givePermissionTo("store receptionist");
        $adminRole->givePermissionTo("edit receptionist");
        $adminRole->givePermissionTo("update receptionist");
        $adminRole->givePermissionTo("destroy receptionist");


        $receptionistRole->givePermissionTo("edit hotel");
        $receptionistRole->givePermissionTo("update hotel");

        $receptionistRole->givePermissionTo("accept reservation");
        $receptionistRole->givePermissionTo("check reservation");
        $receptionistRole->givePermissionTo("pass reservation");
        $receptionistRole->givePermissionTo("deny reservation");
        $receptionistRole->givePermissionTo("destroy reservation");

        $admin = User::factory()->afterCreating(function ($model) {
            $model->assignRole("admin");
        })->create([
            "email" => "admin@mail.com",
            "password" => Hash::make("admin1234"),
        ]);

        /*Receptionist::factory()
            ->count(10)
            ->afterCreating(function ($model) {
                $model->user->assignRole("receptionist");
                $model->user->password = Hash::make("password");
                $model->user->save();
            })->create();*/

        /*Guest::factory()
            ->count(10)
            ->afterCreating(function ($model) {
                $model->user->assignRole("guest");
                $model->user->password = Hash::make("password");
                $model->user->save();
            })->create();*/
    }
}
