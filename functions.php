<?php

function prosody_register_nav_menu() {
  register_nav_menu('main_nav',__( 'Primary Navigation Menu' ));
}
add_action( 'init', 'prosody_register_nav_menu' );

// Enqeue js
function prosody_add_utility ()
{
    wp_enqueue_script(
        'utility',
        get_template_directory_uri() . '/js/utility.js',
        array(),
        null,
        true
        );
}

add_action('wp_enqueue_scripts', 'prosody_add_utility');
