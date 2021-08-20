<?php

namespace Database\Factories;

use App\Models\BedType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BedTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BedType::class;

    protected array $types = [
        [
            "name" => "Twin bed(s)",
            "size" => "90-130 cm wide",
            "capacity" => 1,
        ],
        [
            "name" => "Full bed(s)",
            "size" => "131-150 cm wide",
            "capacity" => 2,
        ],
        [
            "name" => "Queen bed(s)",
            "size" => "151-180 cm wide",
            "capacity" => 2,
        ],
        [
            "name" => "King bed(s)",
            "size" => "181-210 cm wide",
            "capacity" => 2,
        ],
        [
            "name" => "Bunk bed",
            "size" => "Variable size",
            "capacity" => 1,
        ],
        [
            "name" => "Sofa bed",
            "size" => "Variable size",
            "capacity" => 1,
        ],
        [
            "name" => "Futon bed(s) ",
            "size" => "Variable size",
            "capacity" => 1,
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return $this->types[ rand(0,  max: count( $this->types )-1 ) ];
    }
}
