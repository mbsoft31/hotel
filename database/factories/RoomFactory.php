<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "hotel_id" => Hotel::factory(),
            "room_type_id" => RoomType::factory(),
            "name" => $this->faker->numberBetween(100, 999),
            "description" => $this->faker->sentence(nbWords: 15),
            "floor_number" => rand(min: 0, max: 8),
            "rooms_count" => rand(min: 1, max: 12),
            // "photos" => $this->randomImagesArray(),
            "no_smoking" => rand(1,10) % 2 == 0,
            "room_size" => 0,
            "room_size_measure_unit" => $this->faker->randomElement(["sq_meter", "sq_feet"]),
            "room_price_x_person" => $this->faker->randomFloat(nbMaxDecimals: 2, min: 1000, max: 10000),
            "room_price_currency" => $this->faker->randomElement(["DZD", "TND", "USD", "EUR"]),
            "discount_available" => false,
            "room_discount_x_person" => 0,
            "room_discount_x_person_type" => $this->faker->randomElement(["percentage", "amount"]),
            "metas" => [],
        ];
    }

    protected function randomImagesArray()
    {
        $count = rand(min: 1, max: 6);
        $images = [];
        for($i = 0; $i < $count; $i = $i +1)
            $images[] = $this->faker->imageUrl();
        return $images;
    }
}
