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

function prosody_direction_widget ()
{
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'prosody_dashboard_help');
}

function prosody_dashboard_help ()
{
  echo '<h3>Upload process</h3>
<p>Prosody requires both the Prosody theme and the Prosody plugin. Both must be activated.</p>
<p>In Prosody, every poem is an instance of the prosody_poem custom post type. To add a poem, either in the Dashboard or through the admin bar that floats at the top of the page when signed in, create a new Poem.</p>
<p>Fill in the title, then skip down to the "Original Document" field. Paste the xml for the poem in this field. When you save or publish the poem, it will automatically generate the post content for the poem.</p>
<p>Fill in the "Author," "Difficulty," and "Type" fields.</p>
<p>If the poem has any resources associated with it, add them in the "Resources" field. For media files, use the built-in "Add Media" button of the WYSIWYG editor.</p>
<p>Hit "Publish."</p>
<p>The home page of the site shows whichever poem has the category "Featured." If this category does not exist in your WP install, simple create it when creating a poem.</p>
';
}

add_action('wp_dashboard_setup', 'prosody_direction_widget');
