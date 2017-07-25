<?php  /**  * @package Glowline  */
 /**
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @param
 * @return mixed|string
 */

// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// Main grid layout function
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

			case 'list-layout':
				the_post_thumbnail('glowline-custom-list-thumb');
				break;

			case 'boxed-layout':
				the_post_thumbnail('glowline-custom-boxed-thumb');
				break;
		}
	endif;
}



// ----------------------------------------------------------------------
// Optional Custom Logo
// ----------------------------------------------------------------------
if ( ! function_exists( 'glowline_the_custom_logo' ) ) :
	/**
	 * Does nothing if the custom logo is not available.
	 */
	function glowline_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;



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



// ----------------------------------------------------------------------
// Number of comments
// ----------------------------------------------------------------------
function glowline_comment_number(){ ?>
<span class="post-comment"><?php comments_popup_link(__('Leave a Comment','glowline'), __('1 Comment','glowline'), __('% Comments','glowline')); ?></span>
<?php }



// ----------------------------------------------------------------------
// Specific styling for  Author card
// ----------------------------------------------------------------------
// Decided to leave in as suits style of theme - May need removing later
function glowline_userpic(){
	$address = get_the_author_meta('user_email');
	$nicname = get_the_author_meta('user_nicename');
	$pic = get_avatar( $address, 30, '', $nicname);
	return $pic;
}

function glowline_share_text(){ ?>
	<ul class="single-social-icon">
		<li><span class="post-author-pic"> <?php echo glowline_userpic(); ?></span></li>
		<li><span class="post-author"><?php the_author_posts_link(); ?></span></li>
	</ul>
<?php } ?>