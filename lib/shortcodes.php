<?php 

// Shortcodes 

add_shortcode( 'title', 'shorttag_title' );
  
function shorttag_title( $atts, $content ) {
  $content = do_shortcode( shortcode_unautop( $content ) );
  if ( '</p>' == substr( $content, 0, 4 )
  and '<p>' == substr( $content, strlen( $content ) - 3 ) )
      $content = substr( $content, 4, strlen( $content ) - 7 );

  $out = sprintf("<h2 class='docorated'><span>%s</span></h2>",$content);
  if($atts['subtitle']) {
    $out .= sprintf("<strong class='subtitle'>%s</strong>",$atts['subtitle']);
  }
  return $out;
}

add_shortcode( 'left', 'shorttag_left' );
function shorttag_left( $atts, $content ) {
  $content = do_shortcode( shortcode_unautop( $content ) );
  if ( '</p>' == substr( $content, 0, 4 )
  and '<p>' == substr( $content, strlen( $content ) - 3 ) )
      $content = substr( $content, 4, strlen( $content ) - 7 );
  $out = sprintf("<aside class='alignleft'>%s</aside>",$content);
  return $out;
}

add_shortcode( 'right', 'shorttag_right' );
function shorttag_right( $atts, $content ) {
  $content = do_shortcode( shortcode_unautop( $content ) );
  if ( '</p>' == substr( $content, 0, 4 )
  and '<p>' == substr( $content, strlen( $content ) - 3 ) )
      $content = substr( $content, 4, strlen( $content ) - 7 );
  $out = sprintf("<aside class='alignright'>%s</aside>",$content);
  return $out;
}

add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  $idStarts = strpos($url, "?v=");
  if($idStarts === FALSE)
    $idStarts = strpos($url, "&v=");
  if($idStarts) {
    $idStarts +=3;
    $youtube_id = substr($url, $idStarts, 11);
    $title = "";
    $size = 'normal';
    if( isset($attr['title']) ) {
      $title = sprintf("<strong>%s</strong><br />",$attr['title']);
    }
    if( isset($attr['size']) && $attr['size'] == 'full' ) {
      return sprintf("<div class='wp-caption-video aligncenter'><a rel='youtube' href='%s' class='lightbox lightbox-img'><img src='http://i1.ytimg.com/vi/%s/sddefault.jpg' /></a><p>%s<a href='%s' rel='youtube' class='lightbox'>Se video</a> eller <a href='%s' rel='external'>vis på Youtube</a></p></div>",$url,$youtube_id,$title,$url,$url);
    } else {
      return sprintf("<div class='video aligncenter'><a rel='youtube' href='%s' class='lightbox lightbox-img'><img src='http://i1.ytimg.com/vi/%s/default.jpg' /></a> <p>%s<a href='%s' rel='youtube' class='lightbox'>Se video</a> eller <a href='%s' rel='external'>vis på Youtube</a></p></div>",$url,$youtube_id,$title,$url,$url);
    }
    
  } else {
    return $html;
  }
  
}