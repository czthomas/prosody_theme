<?php

/*
    sidebar_filters maps categories to a list of filtering methods

    schema:
        category slug => [
            "title" => filter method display name,
            "key" => WP_Query meta_key, if any
                (or "!author" to engage special case for author sorting),
            "filters" => [
                WP_Query meta_value => display name,
                ...
            ]
        ],
        ...
*/

$sidebar_filters = [
    "poem" => [
        [
            "title" => "By Title",
            "key" => "",
            "filters" => [ ""=>"" ]
        ],[
            "title" => "By Difficulty",
            "key" => "Difficulty",
            "filters" => [
                "1" => "Beginning",
                "2" => "Intermediate",
                "3" => "Advanced"
            ]
        ],[
            "title" => "By Type",
            "key" => "Type",
            "filters" => [
                ""                 => "",
                "ballad"           => "Ballad",
                "elegy"            => "Elegy",
                "ode"              => "Ode",
                "onegin_stanza"    => "Onegin Stanza",
                "sonnet"           => "Sonnet",
                "blank_verse"      => "Blank verse (Белый стих)", 
                "free_verse"       => "Free verse (Свободный стих)",
                "free_verse_rhyme" => "Free verse with rhyme (Вольный стих)",
                "syllabic_verse"   => "Syllabic verse"
            ]
        ],[
            "title" => "By Author",
            "key" => "!author"
        ]
    ],

    "proverb" => [
        [
            "title" => "By Topic",
            "key" => "",
            "filters" => [ ""=>"" ]
        ]
    ],

    "prose" => [
        [
            "title" => "By Title",
            "key" => "",
            "filters" => [ ""=>"" ]
        ],[
            "title" => "By Author",
            "key" => "!author"
        ]
    ],

    "beginners" => [
        [
            "title" => "By Title",
            "key" => "",
            "filters" => [ ""=>"" ]
        ],[
            "title" => "By Module",
            "key" => "module",
            "filters" => [
                "1" => "Module 1",
                "2" => "Module 2",
                "3" => "Module 3",
                "4" => "Module 4",
                "5" => "Module 5",
            ]
        ]
    ],
];

?>