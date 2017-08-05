<?php
/**
 * Custom template tags for this theme
 *
 * @package glowline
 */

if ( ! function_exists( 'glowline_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time to replace Glowline's custom.
	 */
	function glowline_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
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
?>
