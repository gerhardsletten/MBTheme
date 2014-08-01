<?php 

/* Load styles and scripts */

function mb_scripts_styles() {
  global $wp_styles;

  
  if (WP_ENV === 'development') {
    wp_enqueue_style( 'mb-style', get_template_directory_uri() . '/assets/css/base.css',false,null );
    wp_enqueue_style( 'mb-wordpress', get_template_directory_uri() . '/assets/css/wordpress.css',false,null );
    wp_enqueue_style( 'mb-custom', get_template_directory_uri() . '/assets/css/custom.css',false,null );

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.js', array(), null, false);

    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery'), false, true );
  } else {
    wp_enqueue_style( 'mb-style', get_template_directory_uri() . '/assets/dist/main.css',false,null );
    
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/dist/modernizr.js', array( 'jquery'), false, false );

    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/dist/main.min.js', array( 'jquery'), false, true );
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  /*
  wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/vendors/jquery.flexslider-min.js', array( 'jquery' ), false, true );

  wp_enqueue_script( 'app', get_template_directory_uri() . 'assets/js/app.js', array( 'jquery','flexslider'), false, true );

  wp_localize_script( 'app', 'MBTheme', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'mb-nonce' ),
    )
  );


  $query_args = array(
    'family' => 'Open+Sans:300italic,700italic,300,700'
  );
  wp_enqueue_style( 'mb-fonts', add_query_arg( $query_args, "http://fonts.googleapis.com/css" ), array(), null );
  */
  
  
}
add_action( 'wp_enqueue_scripts', 'mb_scripts_styles' );

/**
 * Google Analytics snippet from HTML5 Boilerplate
 */
function mb_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'mb_google_analytics', 20);
}