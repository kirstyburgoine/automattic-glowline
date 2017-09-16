<?php
/**
 * Custom template tags for this theme.
 *
 * @package Glowline
 */

if ( ! function_exists( 'glowline_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function glowline_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		if ( is_sticky() ) :
			echo '<span class="sticky-post">Sticky Post</span>';
		else :
			echo _e( $posted_on );
		endif;
	}
}


if ( ! function_exists( 'glowline_posted_in' ) ) {
	/**
	 * Prints HTML with meta information for the categories. Posted in seperate function as the_title() splits these in content.php.
	 * the_title() is needed to output differently in different places so simpler to keep seperate.
	 */
	function glowline_posted_in() {

		echo '<span class="post-category">' . get_the_category_list( ', ' ) . '</span>';

	}
}


if ( ! function_exists( 'glowline_content_bottom_meta' ) ) {
	/**
	 * Comments and auth card combined into one. Used in content.php.
	 */
	function glowline_content_bottom_meta() {

		echo '<footer class="standard-bottom-meta">';
		// Prints Number of comments.
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="post-comment">';
				comments_popup_link(
					sprintf(
						__( 'Leave a Comment','glowline' ), __( '1 Comment','glowline' ), __( '% Comments','glowline' )
					)
				);
			echo '</span>';
		}

		// Specific styling for brief Author card - main vcard still added to single via jetpack.
		if ( ! is_single() && ( glowline_userpic() || get_author_posts_link() ) ) {
			echo '<div class="post-share"><ul class="single-social-icon">';

			if ( glowline_userpic() ) {
				echo '<li><span class="post-author-pic">' . esc_html( glowline_userpic() ) . '</span></li>';
			};

				echo '<li><span class="post-author">' . the_author_posts_link() . '</span></li>';
			echo '</ul></div>';
		}

		echo '</footer>';

	}
}

/**
 * Gets the author pic used above.
 */
function glowline_userpic() {

	$address = get_the_author_meta( 'user_email' );
	$nicename = get_the_author_meta( 'user_nicename' );
	$pic = get_avatar( $address, 30, '', $nicename );
	return esc_html( $pic );

}


if ( ! function_exists( 'glowline_single_bottom_meta' ) ) {
	/**
	 * Tags, Jetpack author, edit link combined into one used in content-post.php.
	 */
	function glowline_single_bottom_meta() {

		echo '<footer class="single-bottom-meta">';

		// Tags. This failed phpcs but matches _s?
		$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'glowline' ) );
		if ( $tags_list ) {

			/* translators: 1: list of tags. */
			printf( '<div class="tagcloud">' . esc_html__( '%1$s', 'glowline' ) . '</div>', $tags_list );
			echo '<div class="clearfix"></div>';
		}

		// author bio for jetpack content controls.
		glowline_author_bio();

		// Edit link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'glowline' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);

		echo '</footer>';
	}
}
