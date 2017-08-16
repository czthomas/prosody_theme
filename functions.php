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

remove_filter('the_content', 'wpautop');

// Code for adding bulk action to process metadata
if (class_exists('Seravo_Custom_Bulk_Action')) {
  $bulk_action = new Seravo_Custom_Bulk_Action(array('post_type' => 'prosody_poem'));

  $bulk_action->register_bulk_action(array(
    'menu_text' => 'Update Posts',
    'admin_notice' => 'Posts Updated',
    'callback' => function($post_ids) {
        foreach ($post_ids as $post_id) {
          global $post;
          $post = get_post($post_id);
          prosody_xml_transform($post);
        }
        return true;
      }
  ));

  $bulk_action->init();
} else {
  function bulk_action_dependency_notice() {
      ?>
      <div class="error notice">
          <p><?php _e( 'This plugin requires the <a href="https://wordpress.org/plugins/custom-bulk-actions/" target="_blank"> Seravo Custom Bulk Action</a> plugin to function properly.', 'prosody_textdomain' ); ?></p>
      </div>
      <?php
  }
  add_action( 'admin_notices', 'bulk_action_dependency_notice' );
}