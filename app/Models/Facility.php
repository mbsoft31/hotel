<?php

namespace App\Models;

use Booking\Casts\Options;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @codeCoverageIgnore
 * Class Facility
 * @package App\Models
 */
class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "options",
    ];

    protected $casts = [
        "options" => "array"
    ];

    /**
     * returns a BelongsToMany relationship between hotel and its facilities
     *
     * @return BelongsToMany
     */
    public function hotels(): BelongsToMany
    {
        return $this->belongsToMany(related: Hotel::class);
    }

}
