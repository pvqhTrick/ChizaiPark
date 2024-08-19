<?php
/**
 * THEME DEFINE
 */


// THEME URL
define( 'THEME_URL', get_stylesheet_directory_uri() );

// THEME DISK SRC
define( 'THEME_PATH', get_stylesheet_directory() );

// HOME URL
define( 'HOME_URL', get_home_url() );

// THEME NAME
define( 'THEME_NAME', 'chizaipark-theme' );

// NO IMAGE ID
define( 'NOIMAGE_ID', 275 );

// REGISTER NEW IMAGES SIZE
define( 'THEME_NEW_IMAGES_SIZE', array(
	'talen-thumbnail' => array(
		'width' => 280,
		'height' => 453,
		'crop' => true,
	),
	'talen-top-thumbnail' => array(
		'width' => 290,
		'height' => 290,
		'crop' => true,
	),
) );
