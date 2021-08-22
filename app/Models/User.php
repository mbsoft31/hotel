<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static findOrFail(mixed $user_id)
 * @method static whereNotIn(string $string, array $toArray)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasOne
     */
    public function receptionist(): HasOne
    {
        return $this->hasOne(Receptionist::class);
    }

    /**
     * @return HasOne
     */
    public function guest(): HasOne
    {
        return $this->hasOne(Guest::class);
    }

    public function getFullNameAttribute()
    {
        return $this->hasRole("receptionist") ? $this->receptionist->name : ($this->hasRole("guest") ? $this->guest->name : $this->name);
    }
}
