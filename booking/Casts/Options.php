<?php

declare(strict_types=1);


namespace Booking\Casts;


use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class Options
{

    public static function fromArray(array $optionsArray): array
    {
        /** @var Collection $options */
        $options = collect();
        foreach ($optionsArray as $item)
        {
            $options->push(new Option(
                $item["key"],
                $item["label"],
                $item["type"] ?? "string",
                $item["items"] ?? []
            ));
        }
        return $options->toArray();
    }
}

