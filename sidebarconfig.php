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
            "title" => "Proverb",
            "key" => "",
            "filters" => [""=>""]
        ],[
            "title" => "By Topic",
            "key" => "!taxonomy",
            "taxonomy" => "proverb_topic"
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
            "title" => "By Grammar Topic",
            "key" => "!taxonomy",
            "taxonomy" => "learner_topic"
        ],[
            "title" => "By Difficulty",
            "key" => "Difficulty",
            "filters" => [
                "1" => "First Semester",
                "2" => "Second Semester",
                "3" => "Third Semester",
                "4" => "Fourth Semester"
            ]
        ]
    ],
];

?>