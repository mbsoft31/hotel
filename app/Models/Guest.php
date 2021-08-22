<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "first_name",
        "last_name",
        "gender",
        "birthdate",
        "birth_place",
        "CID",
        "CID_type",
        "metas",
    ];

    protected $casts = [
        "metas" => "array"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }
}
