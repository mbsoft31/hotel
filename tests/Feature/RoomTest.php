<?php

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Booking\DataObjects\RoomData;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


it(description: 'can create an hotel', closure:  function () {

    try {
        $room = new RoomData(Room::factory()
            ->for(
                factory: Hotel::factory()
            )
            ->for(
                factory: RoomType::factory()
            )
            ->raw()
        );
    } catch (UnknownProperties $e) {
    }

});
