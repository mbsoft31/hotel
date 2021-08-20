<?php

namespace Database\Factories;

use App\Models\Receptionist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ReceptionistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receptionist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(["user_id" => "\Illuminate\Database\Eloquent\Factories\Factory", "first_name" => "string", "last_name" => "string", "birthdate" => "\Carbon\Carbon", "birth_place" => "string", "metas" => "array"])]
    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "birthdate" => Carbon::now()->subYears(rand(min: 18, max: 50)),
            "birth_place" => $this->faker->city(),
            "metas" => [],
        ];
    }
}
