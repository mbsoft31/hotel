<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class RoomTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomType::class;

    protected array $types = [
        "Single",
        "Double",
        "Twin",
        "Twin/Double",
        "Triple",
        "Quad",
        "Family",
        "Studio",
        "Dorm Room",
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(["name" => "mixed|string", "description" => "string"])]
    public function definition(): array
    {
        return [
            "name" => $this->types[rand(0, count($this->types)-1)],
            "description" => $this->faker->sentence(nbWords: 15, variableNbWords: true),
        ];
    }
}
