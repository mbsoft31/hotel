<?php


namespace Booking\Interfaces\Room;


use App\Models\Room;

interface DeleteRoom
{

    /**
     * @param Room $room
     * @return mixed
     */
    public function delete(Room $room): mixed;

}
