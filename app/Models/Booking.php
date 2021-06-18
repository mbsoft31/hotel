<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accept()
    {
        if ($this->isPending())
            $this->status = "accepted";
        return $this->save();
    }

    public function reject()
    {
        $this->status = "rejected";
        return $this->save();
    }

    public function isAccepted()
    {
        return $this->status == "accepted";
    }

    public function isRejected()
    {
        return $this->status == "rejected";
    }

    public function isPending()
    {
        return $this->status == "pending";
    }

}
