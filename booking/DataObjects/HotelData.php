<?php

declare(strict_types=1);

namespace Booking\DataObjects;

use Spatie\DataTransferObject\DataTransferObject;

class HotelData extends DataTransferObject
{
    public string $name;
    public int $stars;
    public string $description;
    public string $address;
    public string $country;
    public string $city;
    public int $zipcode;
    public string $contact_name;
    public string $contact_phone;
    /** @var string[] $photos */
    public array $photos;
}
