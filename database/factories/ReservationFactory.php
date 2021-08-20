<?php

namespace Database\Factories;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attributes = [
            "start" => $this->faker->dateTimeBetween("today", "2021-12-01"),
            "nights" => rand(1,5),
            "room_id" => Room::all()->random(1)->first()->id,
            "guest_id" => Guest::factory(),
            "state" => "accepted",
        ];
        return array_merge( $attributes, [
            "end" => Carbon::make($attributes["start"])->toImmutable()->addDays($attributes["nights"]),
        ]);
    }
}
