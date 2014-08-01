<?php

/*
function mb_custom_types() {

  register_post_type( 'tekst',
    array(
      'labels' => array(
        'name' => 'Tekster',
        'menu_name' => 'Tekster'
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array(
        'title',
        'thumbnail',
        'editor',
        'comments',
        'revisions'
      ),
      'exclude_from_search' => false,
      'capability_type' => 'post'
    )
  );

  register_taxonomy('genre',array('tekst'), array(
    'hierarchical' => true,
    'labels' => array(
      'name' => 'Sjanger',
      'singular_name' => 'Sjanger',
      'search_items' => 'Søk sjanger',
      'all_items' => 'Alle sjanger',
      'parent_item' => 'Overliggende sjanger',
      'parent_item_colon' => 'Overliggende sjanger:',
      'edit_item' => 'Endre sjanger', 
      'update_item' => 'Oppdater sjanger',
      'add_new_item' => 'Opprett ny sjanger',
      'new_item_name' => 'Ny sjanger',
      'menu_name' => 'Sjanger'
      ),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'sjanger' ),
  ));

  add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'mb_custom_types' );
*/