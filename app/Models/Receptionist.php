<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @codeCoverageIgnore
 * @method static create(array $data)
 * @method static whereFirstName($name)
 * @method static findOrFail(int $id)
 */
class Receptionist extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "first_name",
        "last_name",
        "birthdate",
        "birth_place",
        "metas",
    ];

    protected $casts = [
        "metas" => "array"
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function hotel(): BelongsToMany
    {
        return $this->belongsToMany(Hotel::class)->limit(1);
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

}
