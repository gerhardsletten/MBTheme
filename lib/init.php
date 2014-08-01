<?php 


/* Add new image sizes */

function mb_theme_image_sizes( $image_sizes ) {
  // get the custom image sizes
  global $_wp_additional_image_sizes;
  // if there are none, just return the built-in sizes
  if ( empty( $_wp_additional_image_sizes ) )
    return $image_sizes;
  // add all the custom sizes to the built-in sizes
  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
    // and capitalise the first letter of each word
    if ( !isset($image_sizes[$id]) )
      $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
  }
  return $image_sizes;
}

/* Theme setup */

function mb_setup_theme() {
	add_theme_support( 'automatic-feed-links' );
	register_nav_menu( 'primary', "Hovedmeny" );
  add_theme_support( 'post-thumbnails' );
  //set_post_thumbnail_size( 70, 70, true );
  add_image_size( 'custom-size', 90, 90, true);
  add_filter( 'image_size_names_choose', 'mb_theme_image_sizes' );
}

add_action( 'after_setup_theme', 'mb_setup_theme' );