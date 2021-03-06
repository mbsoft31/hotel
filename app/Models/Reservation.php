<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "metas" => "array"
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function scopeOverlapping($query, $from, $to)
    {
        return $query->past('start', $to, false)->future('end', $from, false);
    }

    public function accept()
    {
        $this->state = "accepted";
        return $this->save();
    }

    public function check()
    {
        $this->state = "checked";
        return $this->save();
    }

    public function pass()
    {
        $this->state = "passed";
        return $this->save();
    }
}
