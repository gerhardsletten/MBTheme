<?php

function mb_widgets_init() {

  register_sidebar( array(
    'name' => 'Primary widget area',
    'id' => 'primary-widget-area',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => 'Secondary widget area',
    'id' => 'secondary-widget-area',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  
}
add_action( 'widgets_init', 'mb_widgets_init' );