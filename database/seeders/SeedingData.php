<?php

return [
    "permissions" => [
        ['name' => 'create hotel'],
        ['name' => 'update hotel'],
        ['name' => 'destroy hotel'],
        ['name' => 'create room'],
        ['name' => 'update room'],
        ['name' => 'destroy room'],
        ['name' => 'create category'],
        ['name' => 'update category'],
        ['name' => 'create booking'],
        ['name' => 'update booking'],
        ['name' => 'accept booking'],
        ['name' => 'reject booking'],
    ],
    "roles" => [
        "admin" => ['create hotel', 'update hotel', 'destroy hotel', 'create room', 'update room', 'create category', 'update category'],
        "receptionist" => ['create room', 'update room', 'destroy room', 'create booking','update booking','accept booking','reject booking'],
        "guest" => ['create booking','update booking'],
    ],
    "users" => [
        [
            "name" => "admin",
            "email" => "admin@mail.com",
            "password" => "admin1234",
            "roles" => ["admin"],
            "permissions" => [],
        ],
        [
            "name" => "admin hotel 1",
            "email" => "admin1@mail.com",
            "password" => "admin1",
            "roles" => ["receptionist"],
            "permissions" => [],
        ],
        [
            "name" => "receptionist hotel 1",
            "email" => "receptionist@mail.com",
            "password" => "receptionist",
            "roles" => ["receptionist"],
            "permissions" => [],
        ],
    ],
    "Hotels" => [
        1 => [
            "name" => "Les deux palmiers",
            "description" => "bla bla 3 star hotel",
            "country" => "Algeria",
            "state" => "Tizi Ouezou",
            "address" => "Hotel Les deux palmiers, Dhraa Benkhada, Tizi Ouezou",
            "admin" => "admin@mail.com",
            "rooms" => [
                1 => [
                    "number" => 1,
                    "floor_number" => 1,
                    "bed_count" => 2,
                    "description" => "a special room bla bla ....",
                    "phone" => "101",
                    "photo_path" => "/images/1/1/1.jpg",
                ],
                2 => [
                    "number" => 2,
                    "floor_number" => 1,
                    "bed_count" => 4,
                    "description" => "a special room bla bla ....",
                    "phone" => "102",
                    "photo_path" => "/images/1/1/2.jpg",
                ],
            ],
        ],
        2 => [
            "name" => "Hotel two",
            "description" => "Hotel two description bla bla bla",
            "country" => "USA",
            "state" => "Los Angeles",
            "address" => "Hotel two street, LA, USA",
            "admin" => "admin1@mail.com",
            "rooms" => [
                1 => [
                    "number" => 1,
                    "floor_number" => 1,
                    "bed_count" => 2,
                    "description" => "a special room bla bla ....",
                    "phone" => "101",
                    "photo_path" => "/images/1/2/1.jpg",
                ],
                2 => [
                    "number" => 2,
                    "floor_number" => 1,
                    "bed_count" => 4,
                    "description" => "a special room bla bla ....",
                    "phone" => "102",
                    "photo_path" => "/images/1/2/2.jpg",
                ],
            ],
        ],
        3 => [
            "name" => "Hotel three",
            "description" => "Hotel two description bla bla bla",
            "country" => "USA",
            "state" => "Los Angeles",
            "address" => "Hotel two street, LA, USA",
            "admin" => "receptionist@mail.com",
            "rooms" => [
                1 => [
                    "number" => 1,
                    "floor_number" => 1,
                    "bed_count" => 2,
                    "description" => "a special room bla bla ....",
                    "phone" => "101",
                    "photo_path" => "/images/1/2/1.jpg",
                ],
                2 => [
                    "number" => 2,
                    "floor_number" => 1,
                    "bed_count" => 4,
                    "description" => "a special room bla bla ....",
                    "phone" => "102",
                    "photo_path" => "/images/1/2/2.jpg",
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
