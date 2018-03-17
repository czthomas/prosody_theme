<?php

function prosody_register_nav_menu() {
  register_nav_menu('main_nav',__( 'Primary Navigation Menu' ));
}
add_action( 'init', 'prosody_register_nav_menu' );

// Enqeue js and css
function prosody_queue_scripts ()
{

    wp_enqueue_style(
        'normalize',
        get_template_directory_uri() . '/css/normalize.css',
        array(),
        null,
        false
        );

    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/css/bootstrap.min.css',
        array(),
        null,
        false
        );

    wp_enqueue_style(
        'jquery-ui-css',
        get_template_directory_uri() . '/css/jquery-ui.css',
        array(),
        null,
        false
        );

    wp_enqueue_style(
        'screen',
        get_template_directory_uri() . '/css/screen.css',
        array('normalize', 'bootstrap', 'jquery-ui-css'),
        null,
        false
        );

    wp_enqueue_script(
        'popup',
        get_template_directory_uri() . '/js/popup.js',
        array('jquery-core', 'jquery-ui-core'),
        null,
        true
        );

    wp_enqueue_script(
        'utility',
        get_template_directory_uri() . '/js/utility.js',
        array('jquery-core', 'jquery-ui-core', 'jquery-ui-accordion', 'jquery-ui-tabs'),
        null,
        true
        );
}

add_action('wp_enqueue_scripts', 'prosody_queue_scripts');
