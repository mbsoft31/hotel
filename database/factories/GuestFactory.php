<?php

namespace Database\Factories;

use App\Models\Guest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::factory(),
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "gender" => $this->faker->randomElement(["male", "female"]),
            "CID" => $this->faker->uuid(),
            "CID_type" => $this->faker->randomElement(["national_id", "passport"]),
            "birthdate" => Carbon::now()->subYears(rand(min: 18, max: 50)),
            "birth_place" => $this->faker->city(),
            "metas" => [],
        ];
    }
}
