<?php

namespace App\Actions\Booking\Room;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class UpdateRoom
{

    public function update(Room $room, array $inputs): ?bool
    {
        if ( ! Auth::check() ) return false;

        if ( is_null($room) ) return false;

        if ( Auth::id() != $room->user_id) return false;

        if ( ! Auth::user()->hasPermissionTo('update room') ) return null;

        $room->update($inputs);
        return true;
    }
}
