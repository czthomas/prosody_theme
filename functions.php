<?php

function prosody_register_nav_menu() {
  register_nav_menu('main_nav',__( 'Primary Navigation Menu' ));
}
add_action( 'init', 'prosody_register_nav_menu' );
