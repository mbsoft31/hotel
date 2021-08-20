<?php

declare(strict_types=1);


namespace Booking\DataObjects;


use Spatie\DataTransferObject\DataTransferObject;

class BedTypeData extends DataTransferObject
{
    public string $name;
    public string $size;
    public int $capacity;
}
