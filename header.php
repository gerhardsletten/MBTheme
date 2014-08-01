<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no" />
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/assets/images/favicon.ico" />

	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-templateurl="<?php bloginfo('stylesheet_directory'); ?>" data-baseurl="<?php bloginfo('wpurl') ?>">
	<div id="wrap">
		<header id="header">
			<div class="content-holder holder">
				<strong class="logo"><a href="<?php echo home_url( '/' ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></strong>
				<nav class="main-menu">
					<?php wp_nav_menu( array('theme_location' => 'primary','depth'=>1,'container'=>'' ) ); ?>
				</nav>
			</div>
		</header>
		<div id="main">
