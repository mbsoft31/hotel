<?php

return [
    "permissions" => [
        ['name' => 'create hotel'],
        ['name' => 'create room'],
        ['name' => 'update room'],
        ['name' => 'create category'],
        ['name' => 'update category'],
    ],
    "roles" => [
        "admin" => ['create hotel', 'create room', 'update room', 'create category', 'update category'],
        "guest" => [],
    ],
    "users" => [
        [
            "username" => "admin",
            "email" => "admin@mail.com",
            "password" => "admin",
            "roles" => ["admin"],
            "permissions" => [],
        ],
        [
            "username" => "admin hotel 1",
            "email" => "admin1@mail.com",
            "password" => "admin1",
            "roles" => ["admin"],
            "permissions" => [],
        ],
    ],
    "Hotels" => [
        1 => [
            "name" => "Hotel one",
            "address" => "Hotel Les deux palmiers, Dhraa Benkhada, Tizi Ouezou",
            "description" => "Hotel Les deux palmiers description bla bla bla",
            "admin" => "admin@mail.com",
            "rooms" => [
                1 => [
                    "number" => 1,
                    "floor_number" => 1,
                    "bed_count" => 2,
                    "description" => "a special room bla bla ....",
                    "phone" => "101",
                    "image" => null,
                ],
                2 => [
                    "number" => 2,
                    "floor_number" => 1,
                    "bed_count" => 4,
                    "description" => "a special room bla bla ....",
                    "phone" => "102",
                    "image" => null,
                ],
            ],
        ],
        2 => [
            "name" => "Hotel two",
            "address" => "Hotel two street, LA, USA",
            "description" => "Hotel two description bla bla bla",
            "admin" => "admin1@mail.com",
            "rooms" => [
                1 => [
                    "number" => 1,
                    "floor_number" => 1,
                    "bed_count" => 2,
                    "description" => "a special room bla bla ....",
                    "phone" => "101",
                    "image" => null,
                ],
                2 => [
                    "number" => 2,
                    "floor_number" => 1,
                    "bed_count" => 4,
                    "description" => "a special room bla bla ....",
                    "phone" => "102",
                    "image" => null,
                ],
            ],
        ],
    ],
    "room_types" => [
        [
            "name" => "Single",
            "description" => "A room assigned to one person. May have one or more beds.",
        ],
        [
            "name" => "Double",
            "description" => "A room assigned to two people. May have one or more beds.",
        ],
        [
            "name" => "Triple",
            "description" => "A room assigned to three people. May have two or more beds.",
        ],
        [
            "name" => "Quad",
            "description" => "A room assigned to four people. May have two or more beds.",
        ],
        [
            "name" => "Queen",
            "description" => "A room with a queen-sized bed. May be occupied by one or more people.",
        ],
        [
            "name" => "King",
            "description" => "A room with a king-sized bed. May be occupied by one or more people.",
        ],
        [
            "name" => "Twin",
            "description" => "A room with two beds. May be occupied by one or more people.",
        ],
        [
            "name" => "Studio",
            "description" => "A room with a studio bed – a couch that can be converted into a bed. May also have an additional bed",
        ],
        [
            "name" => "Master Suite",
            "description" => "A parlour or living room connected to one or more bedrooms."
        ],
        [
            "name" => "Mini-Suite or Junior Suite",
            "description" => "A single room with a bed and sitting area. Sometimes the sleeping area is in a bedroom separate from the parlour or living room."
        ],
    ]
];
