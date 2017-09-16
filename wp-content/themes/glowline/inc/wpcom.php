<?php
/**
 * Set theme colors for third party services.
 *
 * @package Glowline
 */

/**
 * Set theme colors
 */
function glowline_wpcom_setup() {

	global $themecolors;

	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => 'FFFFFF',
			'border' => 'DDDDDD',
			'text'   => '5A5A5A',
			'link'   => 'bdb76b',
			'url'    => 'bdb76b',
		);
	}
}

add_action( 'after_setup_theme', 'glowline_wpcom_setup' );
