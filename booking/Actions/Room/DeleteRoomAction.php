<?php

declare(strict_types=1);


namespace Booking\Actions\Room;


use App\Models\Room;
use Booking\Interfaces\Room\DeleteRoom;

class DeleteRoomAction implements DeleteRoom
{

    public function delete(Room $room): mixed
    {
        return $room->delete();
    }
}
