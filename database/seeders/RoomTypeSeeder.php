<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Booking\DataObjects\RoomTypeData;
use Illuminate\Database\Seeder;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws UnknownProperties
     */
    public function run()
    {
        $all_types = require( database_path( path: "seeders/room_types.php") );

        foreach ($all_types as $room_type => $value) {
            $roomTypeData = new RoomTypeData(["name" => $room_type]);
            RoomType::create($roomTypeData->toArray());
        }
    }
}
