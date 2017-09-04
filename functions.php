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
        'prosody-jquery',
        '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        array(),
        null,
        false
        );

    wp_enqueue_script(
        'prosody-jquery-ui',
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js',
        array('prosody-jquery'),
        null,
        false
        );

    if ( is_front_page() ) {
      wp_enqueue_script(
          'prosody-jquery-cycle',
          get_template_directory_uri(). '/js/jquery.cycle.js',
          array('prosody-jquery'),
          null,
          false
          );
    }

    wp_enqueue_script(
        'popup',
        get_template_directory_uri() . '/js/popup.js',
        array('prosody-jquery', 'prosody-jquery-ui'),
        null,
        true
        );

    wp_enqueue_script(
        'utility',
        get_template_directory_uri() . '/js/utility.js',
        array('prosody-jquery', 'prosody-jquery-ui'),
        null,
        true
        );
}

add_action('wp_enqueue_scripts', 'prosody_queue_scripts');
