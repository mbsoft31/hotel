<?php

namespace Database\Seeders;

use App\Models\BedType;
use Booking\DataObjects\BedTypeData;
use Illuminate\Database\Seeder;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws UnknownProperties
     */
    public function run()
    {
        $all_types = require( database_path( path: "seeders/bed_type.php") );

        foreach ($all_types as $bed_type) {
            $bedTypeData = new BedTypeData($bed_type);
            BedType::create($bedTypeData->toArray());
        }
    }
}
