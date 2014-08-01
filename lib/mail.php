<?php

add_filter( 'wp_mail_from', 'my_mail_from' );
function my_mail_from( $email )
{
    return get_option( 'admin_email' );
}

add_filter( 'wp_mail_from_name', 'my_mail_from_name' );
function my_mail_from_name( $name )
{
    return get_option( 'blogname' );
}