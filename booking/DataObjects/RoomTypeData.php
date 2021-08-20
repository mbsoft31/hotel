<?php

declare(strict_types=1);


namespace Booking\DataObjects;


use Spatie\DataTransferObject\DataTransferObject;

class RoomTypeData extends DataTransferObject
{
    public string $name;
    public ?string $description;
}
