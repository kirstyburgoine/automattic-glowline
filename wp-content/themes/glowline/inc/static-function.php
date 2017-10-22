<?php
 /**
  * Functions for custom layout options.
  *
  * @package Glowline
  */

/**
 * Changes the thumbnail image based on which layout is selected.
 *
 * @param string  $glowline_grid_layout defines which layout is selected.
 * @param boolean $thumb_crop crop image.
 */
function glowline_grid_thumb( $glowline_grid_layout, $thumb_crop = true ) {
	if ( $thumb_crop ) {
		switch ( $glowline_grid_layout ) {
			case 'two-grid-layout':
				the_post_thumbnail( 'glowline-custom-two-grid-thumb' );
				break;

			case 'three-grid-layout':
				the_post_thumbnail( 'glowline-custom-three-grid-thumb' );
				break;

			case 'four-grid-layout':
				the_post_thumbnail( 'glowline-custom-four-grid-thumb' );
				break;
		}
	}
}

/**
 * Determines what layout has been selected and builds classes based on that.
 * Needed as even if masonry is enabled it can't be used on standard layouts.
 *
 * @param string $glowline_grid_layout defines which layout is selected.
 */
function glowline_grid_classes( $glowline_grid_layout ) {

	if ( 'standard-layout' !== $glowline_grid_layout ) {
		echo esc_attr( $glowline_grid_layout ) . ' masonry-enabled';
	} else {
		echo esc_attr( $glowline_grid_layout );
	}
}

/**
 * Determines whether a sidebar exists and if not adds classes to make the page full width.
 */
function glowline_fullwidth() {
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		echo esc_attr( ' not-fullwidth' );
	}
	else {
		echo esc_attr( ' fullwidth' );
	}
}
