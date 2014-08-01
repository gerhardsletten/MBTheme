<?php 

function mb_ajax_example() {
  $nonce = $_POST['nonce'];
  if ( ! wp_verify_nonce( $nonce, 'faktafyk-nonce' ) )
    die ( 'Busted!');

  $return = array();
  if(isset($_POST['data'])) {
    $return = array(
      'type' => 'success',
      'message' => 'Message'
      );
  } else {
    $return = array(
      'type' => 'error',
      'message' => 'Error'
      );
  }

  header('Content-type: application/json');
  echo json_encode($return);
  exit();
}

add_action('wp_ajax_mb_ajax_example', 'mb_ajax_example');
add_action('wp_ajax_nopriv_mb_ajax_example', 'mb_ajax_example');