<?php 

/* Turn off comments */

function mb_default_comments_off( $data ) {
    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
        //$data['ping_status'] = 0;
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'mb_default_comments_off' );