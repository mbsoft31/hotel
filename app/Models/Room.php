<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;

/**
 * @method static findOrFail(int $id)
 */
class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        "hotel_id",
        "room_type_id",
        "name",
        "description",
        "floor_number",
        "rooms_count",
        "photos",
        "no_smoking",
        "room_size",
        "room_size_measure_unit",
        "room_price_x_person",
        "room_price_currency",
        "discount_available",
        "room_discount_x_person",
        "room_discount_x_person_type",
        "metas",
    ];

    protected $casts = [
        "no_smoking" => "bool",
        "photos" => "array",
        "metas" => "array",
    ];

    /**
     * @codeCoverageIgnore
     * @return BelongsTo
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * @codeCoverageIgnore
     * @return BelongsTo
     */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    /**
     * @codeCoverageIgnore
     * @return BelongsToMany
     */
    public function bedTypes(): BelongsToMany
    {
        return $this->belongsToMany(BedType::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function scopeWhereStars(Builder $query, $stars)
    {
        $query
            ->addSelect("hotels.stars")
            ->from("")
            ->whereRaw("`hotels`.`id` = `rooms`.`id`")
            ->where("`hotels`.`stars`", "=", $stars);
    }

    public function scopeAvailableFor($query, $start, $end, $persons, $stars=0)
    {
        $query
            ->addSelect("hotels.id as hot_id", "hotels.stars", "capacities.capacity" ,"rooms.*")
            ->fromRaw("`rooms`, `hotels`, ( SELECT `bed_type_room`.`room_id` AS `room_id`, SUM(`bed_types`.`capacity`) AS `capacity` FROM `rooms` `t`, `bed_types` INNER JOIN `bed_type_room` ON `bed_types`.`id` = `bed_type_room`.`bed_type_id` WHERE `bed_type_room`.`room_id` = `t`.`id` GROUP BY `t`.`id` ) `capacities`")
            ->whereRaw("`rooms`.`id` = `capacities`.`room_id`")
            ->whereRaw("`hotels`.`id` = `rooms`.`hotel_id`");

        if ($stars > 0)
            $query->where("hotels.stars", "=", $stars);

        $query
            ->whereRaw("`capacities`.`capacity` >= $persons")
            ->whereNotIn("rooms.id", function ($query) use($start, $end){
                $query->selectRaw("`rooms`.id as room_id")
                    ->fromRaw("`reservations`, `rooms`")
                    //->join("reservations", "reservations.id", "=", "r.id")
                    ->whereRaw("`reservations`.`room_id` = room_id")
                    ->whereNotIn("reservations.id", function ($query) use($start, $end){
                        $query->select(["id"])
                            ->from("reservations")
                            ->where(function ($query) use($start, $end){
                                $query
                                    ->where(function ($query) use($start){
                                        $query->where("reservations.start", "<=", $start)
                                            ->where("reservations.end", ">", $start);
                                    })
                                    ->orWhere(function ($query) use($end){
                                        $query->where("reservations.start", "<=", $end)
                                            ->where("reservations.end", ">", $end);
                                    });
                            })
                            ->orWhere(function ($query) use($start, $end){
                                $query->where(function ($query) use($start, $end){
                                    $query->where("reservations.start", ">" , $start)
                                        ->where("reservations.end", "<", $end);
                                });
                            });
                    });
            });
    }

}
