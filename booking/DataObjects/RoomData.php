<?php

declare(strict_types=1);


namespace Booking\DataObjects;


use Spatie\DataTransferObject\DataTransferObject;

class RoomData extends DataTransferObject
{
    public int $hotel_id;
    public int $room_type_id;
    public string $name;
    public string $description;
    public int $floor_number;
    public int $rooms_count;
    public array $photos;
    public bool $no_smoking;
    public float $room_size;
    public string $room_size_measure_unit;
    public float $room_price_x_person;
    public string $room_price_currency;
    public bool $discount_available;
    public float $room_discount_x_person;
    public string $room_discount_x_person_type;
    public array $metas;
}
