<?php 

/* Load styles and scripts */

// remove header links
//add_action('init', 'tjnz_head_cleanup');
function tjnz_head_cleanup() {
   remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds
   remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds
   remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link
   remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer
   remove_action( 'wp_head', 'index_rel_link' );                           // index link
   remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link
   remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link
   remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts
   remove_action( 'wp_head', 'wp_generator' );                             // WP version
   if (!is_admin()) {
       wp_deregister_script('jquery');                                     // De-Register jQuery
       wp_register_script('jquery', '', '', '', true);                     // Register as 'empty', because we manually insert our script in header.php
   }
}

// remove WP version from RSS
add_filter('the_generator', 'tjnz_rss_version');
function tjnz_rss_version() { return ''; }

function mb_scripts_styles() {
  global $wp_styles;
  $version = '1.0.1';
  
  if (WP_ENV === 'development') {
    wp_enqueue_style( 'app-style', get_template_directory_uri() . '/assets/dist/bundle.css',false,$version );
    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/dist/bundle.js', array('jquery'), $version, false );
  } else {
    wp_enqueue_style( 'app-style', get_template_directory_uri() . '/assets/dist/bundle.min.css',false,$version );
    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/dist/bundle.min.js', array('jquery'), $version, false );
  }

  // WP API
  //wp_localize_script( 'app', 'WP_API_Settings', array( 'root' => esc_url_raw( get_json_url() ), 'nonce' => wp_create_nonce( 'wp_json' ) ) );
}
add_action( 'wp_enqueue_scripts', 'mb_scripts_styles' );

