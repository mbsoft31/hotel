<?php

namespace Booking\Casts;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Option implements Arrayable, Jsonable
{
    public function __construct(
        public string $key,
        public string $label,
        public string $type = "string",
        public array $items = [],
    ){}


    public function toArray(): array
    {
        return [
            "key" => $this->key,
            "label" => $this->label,
            "type" => $this->type,
            "items" => $this->items ?? [],
        ];
    }

    public function toJson($options = 0): array
    {
        return $this->toArray();
    }
}
