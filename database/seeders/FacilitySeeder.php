<?php

namespace Database\Seeders;

use App\Models\Facility;
use Booking\DataObjects\FacilityData;
use Illuminate\Database\Seeder;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws UnknownProperties
     */
    public function run()
    {
        $all_facilities = require( database_path( path: "seeders/facilities.php") );

        foreach ($all_facilities as $facility) {
            $facilityData = new FacilityData($facility);
            Facility::create($facilityData->toArray());
        }

    }
}
