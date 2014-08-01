<?php 

@ini_set( 'upload_max_filesize' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );

function mb_add_upload_mimes($mimes=array()) {
    $mimes['kml']='application/vnd.google-earth.kml+xml';
    $mimes['kmz']='application/vnd.google-earth.kmz';
    return $mimes;
}
add_filter("upload_mimes","mb_add_upload_mimes");