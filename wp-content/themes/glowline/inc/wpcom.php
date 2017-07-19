<?php
if ( ! isset( $themecolors ) ) {
$themecolors = array(
'bg' => 'ffffff',
'text' => '424242',
'link' => 'bdb76b',
'border' => 'dddddd',
'url' => 'bdb76b',
);
}


function glowline_wpcom_setup() {
	global $themecolors;
	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => '',
			'border' => '',
			'text'   => '',
			'link'   => '',
			'url'    => '',
		);
	}
}
add_action( 'after_setup_theme', 'glowline_wpcom_setup' );