<?php
/**
 * Set theme colors for third party services.
 *
 * @package Glowline
 */

function glowline_wpcom_setup() {

	global $themecolors;

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
