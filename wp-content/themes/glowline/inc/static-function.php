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
function glowline_grid_thumb($glowline_grid_layout, $thumb_crop=true){
	if ( $thumb_crop ) :
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
	endif;
}



// ----------------------------------------------------------------------
// Custom header menu
// ----------------------------------------------------------------------
add_action( 'after_setup_theme', 'glowline_register_theme_menu' );

function glowline_register_theme_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'glowline' ) );
}




// ----------------------------------------------------------------------
// hexa to rgba convert
// ----------------------------------------------------------------------
function glowline_hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if( empty($color) ) {
		return $default;
	}
	//Sanitize $color if "#" is provided
	if ( '#' == $color[0] ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if ( 6 == strlen($color) ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( 3 == strlen( $color ) ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb =  array_map('hexdec', $hex);

	//Check if opacity is set(rgba or rgb)
	if ( $opacity ) {

		if ( 1 < abs($opacity) ) {
			$opacity = 1.0;
		}
		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	} else {
		$output = 'rgb('.implode(",",$rgb).')';
	}

	//Return rgb(a) color string
	return $output;
}

?>
