<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * @method static whereName(string $name)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 */
class Hotel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "photos" => 'array',
        "facilities" => 'array',
    ];

    /**
     * returns a BelongsToMany relationship between hotel and its facilities
     *
     * @return BelongsToMany
     */
    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(related: Facility::class);
    }

    /**
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    /**
     * @return BelongsToMany
     */
    public function receptionists(): BelongsToMany
    {
        return $this->belongsToMany(Receptionist::class);
    }

    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Room::class);
    }

    public function getPhotosPathAttribute()
    {
        return "/hotel/" . $this->id;
    }

    public function getPhotosAttribute()
    {
        $pics = Storage::disk('local')->allFiles('public/' . $this->photos_path);
        foreach ($pics as $k => $v)
        {
            $nv = str_replace("public/", "", $v);
            $pics[$k] = $nv;
        }
        return $pics;
    }
}
