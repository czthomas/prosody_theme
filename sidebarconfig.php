<?php

/*
    sidebar_filters maps categories to a list of filtering methods

    schema:
        category slug => [
            "title" => filter method display name,
            "by"  => WP_Query meta_key, if any, or special case:
                !author   - collates by author
                !taxonomy - collates along specified custom taxonomy
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
            "by"  => "",
            "filters" => [ ""=>"" ]
        ],[
            "title" => "By Difficulty",
            "by"  => "Difficulty",
            "filters" => [
                "1" => "Beginning",
                "2" => "Intermediate",
                "3" => "Advanced"
            ]
        ],[
            "title" => "By Type",
            "by"  => "Type",
            "filters" => [
                "ballad"           => "Ballad",
                "childlit"         => "Children's literature",
                "elegy"            => "Elegy",
                "fairytale"        => "Fairy tale",
                "ode"              => "Ode",
                "onegin_stanza"    => "Onegin stanza",
                "sonnet"           => "Sonnet",
                "blank_verse"      => "Blank verse (Белый стих)", 
                "free_verse"       => "Free verse (Свободный стих)",
                "free_verse_rhyme" => "Free verse with rhyme (Вольный стих)",
                "syllabic_verse"   => "Syllabic verse",
                "none"             => ""
            ]
        ],[
            "title" => "By Author",
            "by"  => "!author"
        ]
    ],

    "proverb" => [
        [
            "title" => "Proverb",
            "by"  => "",
            "filters" => [""=>""]
        ],[
            "title" => "By Topic",
            "by"  => "!taxonomy",
            "taxonomy" => "proverb_topic"
        ]
    ],

    "prose" => [
        [
            "title" => "By Title",
            "by"  => "",
            "filters" => [ ""=>"" ]
        ],[
            "title" => "By Author",
            "by"  => "!author"
        ]
    ],

    "beginners" => [
        [
            "title" => "By Title",
            "by"  => "",
            "filters" => [ ""=>"" ]
        ],[
            "title" => "By Topic",
            "by"  => "!taxonomy",
            "taxonomy" => "learner_topic"
        ],[
            "title" => "By Difficulty",
            "by"  => "Difficulty",
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