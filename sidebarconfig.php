<?php

/*
    sidebar_filters maps categories to a list of filtering methods

    schema:
        category slug => array(
            "title" => filter method display name,
            "by"  => WP_Query meta_key, if any, or special case:
                !author   - collates by author
                !taxonomy - collates along specified custom taxonomy
            "filters" => array(
                WP_Query meta_value => display name,
                ...
            )
        ),
        ...
*/

$sidebar_filters = array(
    "poem" => array(
        array(
            "title" => "By Title",
            "by"  => "",
            "filters" => array( ""=>"" )
        ),array(
            "title" => "By Difficulty",
            "by"  => "Difficulty",
            "filters" => array(
                "1" => "Beginning",
                "2" => "Intermediate",
                "3" => "Advanced"
            )
        ),array(
            "title" => "By Type",
            "by"  => "Type",
            "filters" => array(
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
            )
        ),array(
            "title" => "By Author",
            "by"  => "!author"
        )
    ),

    "proverb" => array(
        array(
            "title" => "Proverb",
            "by"  => "",
            "filters" => array(""=>"")
        ),array(
            "title" => "By Topic",
            "by"  => "!taxonomy",
            "taxonomy" => "proverb_topic"
        )
    ),

    "prose" => array(
        array(
            "title" => "By Title",
            "by"  => "",
            "filters" => array( ""=>"" )
        ),array(
            "title" => "By Author",
            "by"  => "!author"
        )
    ),

    "beginners" => array(
        array(
            "title" => "By Title",
            "by"  => "",
            "filters" => array( ""=>"" )
        ),array(
            "title" => "By Topic",
            "by"  => "!taxonomy",
            "taxonomy" => "learner_topic"
        ),array(
            "title" => "By Difficulty",
            "by"  => "Difficulty",
            "filters" => array(
                "1" => "First Semester",
                "2" => "Second Semester",
                "3" => "Third Semester",
                "4" => "Fourth Semester"
            )
        )
    ),
);

?>