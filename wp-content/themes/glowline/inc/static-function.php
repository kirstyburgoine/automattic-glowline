<?php  /**  * @package Glowline  */
 /**
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @param
 * @return mixed|string
 */

// ----------------------------------------------------------------------
// Grid thumbnail functions
// TODO: Not sure this is needed now?
// ----------------------------------------------------------------------
function glowline_grid_thumb( $glowline_grid_layout, $thumb_crop=true ) {
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

			case 'five-grid-layout':
				the_post_thumbnail( 'glowline-custom-five-grid-thumb' );
				break;
		}
	}
}

// ----------------------------------------------------------------------
// Determines what layout has been selected and builds classes based on that
// ----------------------------------------------------------------------
// Needed as even if masonry is enabled it can't be used on standard layouts
function glowline_grid_classes( $glowline_grid_layout, $glowline_masonry_layout ) {

	if ( 'masonry-enabled' === $glowline_masonry_layout && 'standard-layout' !== $glowline_grid_layout ) {
		echo $glowline_grid_layout . ' masonry-enabled';
	} else {
		echo $glowline_grid_layout;
	}

}
