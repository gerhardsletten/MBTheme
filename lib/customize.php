<?php 

add_action ('admin_menu', 'mb_admin_menu');

function mb_admin_menu() {
    // add the Customize link to the admin menu
    add_theme_page( 'Tilpass mal', 'Tilpass mal', 'edit_theme_options', 'customize.php' );
}

add_action('customize_register', 'mb_customize');

function mb_customize($wp_customize) {

    $wp_customize->add_section( 'mb_site_settings', array(
      'title'          => 'Theme settings',
      'priority'       => 35,
    ) );

    $wp_customize->add_setting( 'mb_footer_text', array(
      'default'        => '',
    ) );

    $wp_customize->add_control( 'mb_footer_text', array(
      'label'   => 'Footer text',
      'section' => 'mb_site_settings',
      'type'    => 'text',
    ) );

    $wp_customize->add_section( 'mb_share_settings', array(
      'title'          => 'Share settings',
      'priority'       => 35,
    ) );

    $wp_customize->add_setting( 'mb_facebook_url', array(
      'default'        => '',
    ) );

    $wp_customize->add_control( 'mb_facebook_url', array(
      'label'   => 'Facebook url',
      'section' => 'mb_share_settings',
      'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'mb_linkedin_url', array(
      'default'        => '',
    ) );

    $wp_customize->add_control( 'mb_linkedin_url', array(
      'label'   => 'Linkedin url',
      'section' => 'mb_share_settings',
      'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'mb_twitter_url', array(
      'default'        => '',
    ) );

    $wp_customize->add_control( 'mb_twitter_url', array(
      'label'   => 'Twitter url',
      'section' => 'mb_share_settings',
      'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'mb_instagram_url', array(
      'default'        => '',
    ) );

    $wp_customize->add_control( 'mb_instagram_url', array(
      'label'   => 'Instagram url',
      'section' => 'mb_share_settings',
      'type'    => 'text',
    ) );
}
