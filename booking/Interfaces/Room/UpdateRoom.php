<?php


namespace Booking\Interfaces\Room;



use App\Models\Room;

interface UpdateRoom
{

    /**
     * @param Room $room
     * @param array $inputs
     * @return mixed
     */
    public function update(Room $room, array $inputs = []): mixed;

}
