<?php  /**  * @package Glowline  */
 /**
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @param
 * @return mixed|string
 */

// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// Grid thumbnail functions
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
function glowline_grid_thumb( $glowline_grid_layout, true===$thumb_crop ) {
	if ( $thumb_crop ) {
		switch ( $glowline_grid_layout ) {
			case 'two-grid-layout':
				the_post_thumbnail('glowline-custom-two-grid-thumb');
				break;

			case 'three-grid-layout':
				the_post_thumbnail('glowline-custom-three-grid-thumb');
				break;

			case 'four-grid-layout':
				the_post_thumbnail('glowline-custom-four-grid-thumb');
				break;

			case 'five-grid-layout':
				the_post_thumbnail('glowline-custom-five-grid-thumb');
				break;
		}
	}
}
