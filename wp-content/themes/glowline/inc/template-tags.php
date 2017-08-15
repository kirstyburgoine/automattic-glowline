<?php
/**
 * Custom template tags for this theme
 *
 * @package Glowline
 */

// ----------------------------------------------------------------------
// Prints HTML with meta information for the current post-date/time to
// replace Glowline's custom.
// ----------------------------------------------------------------------
if ( ! function_exists( 'glowline_posted_on' ) ) :
	/**

	 */
	function glowline_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="post-meta">' . $posted_on . '</span>';
	}
endif;


// ----------------------------------------------------------------------
// Prints HTML with meta information for the categories. Posted in
// seperate function as the_title() splits these in content.php
// the_title() is needed to output differently in different places so
// simpler to keeo seperate
// ----------------------------------------------------------------------
if ( ! function_exists( 'glowline_posted_in' ) ) :

	function glowline_posted_in() {

		// Get the title of the current category
		$current_category = single_cat_title("", false);
		// Get the ID of the current category
		$category_id = get_cat_ID( $current_category );
		// Get the URL of this category too
		$category_link = get_category_link( $category_id );

		if ( true == $current_category ) :
			$posted_in = sprintf(
				'<a href="' . esc_url( $category_link ) . '" title="' . esc_attr($current_category) .'">' . esc_html($current_category) .'</a>'
			);
		else :
			$posted_in = the_category(', ');
		endif;

		echo '<span class="post-category">' . $posted_in . '</span>';

	}
endif;

// ----------------------------------------------------------------------
// Comments and auth card combined into one used in content.php
// ----------------------------------------------------------------------

if ( ! function_exists( 'glowline_content_bottom_meta' ) ) :

	function glowline_content_bottom_meta() {

		echo '<footer class="standard-bottom-meta">';
		// ----------------------------------------------------------------------
		// Prints Number of comments
		// ----------------------------------------------------------------------
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="post-comment">';
				comments_popup_link(
					sprintf(
						__('Leave a Comment','glowline'), __('1 Comment','glowline'), __('% Comments','glowline')
					)
				);
			echo '</span>';
		}


		// ----------------------------------------------------------------------
		// Specific styling for brief Author card - main vcard still added to
		// single via jetpack
		// ----------------------------------------------------------------------
		if ( ! is_single() && ( glowline_userpic() || get_author_posts_link() ) ) {
			echo '<div class="post-share"><ul class="single-social-icon">';

				if ( glowline_userpic() ) {
					echo '<li><span class="post-author-pic">' . glowline_userpic() . '</span></li>';
				};

				echo '<li><span class="post-author">' . the_author_posts_link() . '</span></li>';
			echo '</ul></div>';
		}

		echo '</footer>';

	}
endif;


function glowline_userpic(){
	// ----------------------------------------------------------------------
	// Gets the author pic used above
	// ----------------------------------------------------------------------
	$address = get_the_author_meta('user_email');
	$nicname = get_the_author_meta('user_nicename');
	$pic = get_avatar( $address, 30, '', $nicname);
	return $pic;

}

?>
