<?php


it("can cast array to Option", function (){
    $optionsArray = [
        [
            "key" => "paid",
            "label" => "Paid",
            "type" => "bool",
        ],
        [
            "key" => "paid",
            "label" => "Paid",
            "type" => "bool",
        ],
    ];

    $options = collect(\Booking\Casts\Options::fromArray($optionsArray));

    $option = $options->first();

    dd($options->toArray());
});
