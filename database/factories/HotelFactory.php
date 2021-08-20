<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attributes = [
            "name" => $this->faker->sentence(),
            "stars" => $this->faker->numberBetween(1, 5),
            "description" => $this->faker->sentence(20),
            "country" => $this->faker->countryCode(),
            "city" => $this->faker->city(),
            "zipcode" => $this->faker->numberBetween(10000, 99999),
            "contact_name" => $this->faker->name(),
            "contact_phone" => $this->faker->e164PhoneNumber(),
            "photos" => $this->photos(),
        ];
        return array_merge($attributes, [
            "address" => $this->faker->streetName . ', ' . $attributes["country"] . ', ' . $attributes["city"] . ' - ' . $attributes["zipcode"],
        ]);
    }

    private function photos() {
        $photo_count = $this->faker->numberBetween(3, 10);
        $photos = [];
        for( $i = 0; $i < $photo_count; $i = $i + 1 )
        {
            $photos[] = $this->faker->imageUrl();
        }
        return $photos;
    }

}
