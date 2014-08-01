<?php 

//add_filter( 'post_gallery', 'mb_post_gallery', 10, 2 );

function mb_post_gallery( $output, $attr) {
  global $post, $wp_locale;

  static $instance = 0;
  $instance++;

  // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
  if ( isset( $attr['orderby'] ) ) {
      $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
      if ( !$attr['orderby'] )
          unset( $attr['orderby'] );
  }

  extract(shortcode_atts(array(
      'order'      => 'ASC',
      'orderby'    => 'menu_order ID',
      'id'         => $post->ID,
      'itemtag'    => 'dl',
      'icontag'    => 'dt',
      'captiontag' => 'dd',
      'columns'    => 3,
      'size'       => 'thumbnail',
      'include'    => '',
      'exclude'    => ''
  ), $attr));

  $id = intval($id);
  if ( 'RAND' == $order )
      $orderby = 'none';

  if ( !empty($include) ) {
      $include = preg_replace( '/[^0-9,]+/', '', $include );
      $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

      $attachments = array();
      foreach ( $_attachments as $key => $val ) {
          $attachments[$val->ID] = $_attachments[$key];
      }
  } elseif ( !empty($exclude) ) {
      $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
      $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
      $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }

  if ( empty($attachments) )
      return '';

  if ( is_feed() ) {
      $output = "\n";
      foreach ( $attachments as $att_id => $attachment )
          $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
      return $output;
  }
  $colums = 4;
  if(isset($attr['columns'])) {
    $colums = $attr['columns'];
  }

  $rel = "gallery-".$instance;

  $output = "<div class='image-gallery holder image-gallery-columns-". $colums ."'>\n";
  $size = "small-not-cropped";
  // crop 
  if($colums <= 5) {
    $size = "gallery-small";
  }
  if($colums <= 4) {
    $size = "gallery-medium";
  }
  if($colums <= 2) {
    $size = "post-medium";
  }
  if($colums <= 1) {
    $size = "large";
    $output .= "<ul class='slides'>";
  }

  foreach ( $attachments as $id => $attachment ) {
      $link = wp_get_attachment_image_src($id, 'full' );
      $image = wp_get_attachment_image( $id, $size );
      $image_info = wp_get_attachment_image_src($id, $size );
      $caption = "";
      if ( $captiontag && trim($attachment->post_excerpt) ) {
          $caption = wptexturize($attachment->post_excerpt);
      }
      if($colums == 1) {
        $output .= "
            <li><div>
                $image
                <p>$caption</p>
            </div></li>";
      } else {
        $output .= "
            <figure style='width:$image_info[1]px'>
                <a href='$link[0]' rel='$rel' title='$caption'>$image</a>
                <p>$caption</p>
            </figure>";
      }
      
  }
  if($colums <= 1) {
    $output .= "</ul>";
  }
  $output .= "</div>\n";

  return $output;
}