<?php

declare(strict_types=1);


namespace Booking\DataObjects;


use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class ReceptionistData extends DataTransferObject
{
    public int $user_id;
    public string $first_name;
    public string $last_name;
    public Carbon $birthdate;
    public string $birth_place;
    public array $metas;
}
