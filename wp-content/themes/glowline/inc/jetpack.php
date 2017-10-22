<?php
/**
 * Adds file support for Jetpack-specific theme functions.
 * See: http://jetpack.me/
 *
 * @package Glowline
 */

if ( ! function_exists( 'glowline_jetpack_setup' ) ) {
	/**
	 * Setup Jetpack options
	 */
	function glowline_jetpack_setup() {
		// Add support for Infinite Scroll.
		add_theme_support(
			'infinite-scroll', array(
				'container'      => 'content',
				'render'         => 'glowline_infinite_scroll_render',
				'footer_widgets' => array( 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
				'footer'         => 'footer',
				'wrapper'        => false,
				'posts_per_page' => 9,
			)
		);
		// Add support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );
		// Add support for Featured content.
		add_theme_support(
			'featured-content', array(
				'filter'         => 'glowline_get_featured_posts',
				'max_posts'      => 20,
				'post_types'     => array( 'post' ),
			)
		);
		// Add theme support for Content Options.
		add_theme_support(
			'jetpack-content-options', array(
				'blog-display'        => 'content', // the default setting of the theme: 'content', 'excerpt' or array( 'content', 'excerpt' ) for themes mixing both display.
				'author-bio'          => true, // display or not the author bio: true or false.
				'author-bio-default'  => false, // the default setting of the author bio, if it's being displayed or not: true or false (only required if false).
				'masonry'             => '.masonry-enabled', // a CSS selector matching the elements that triggers a masonry refresh if the theme is using a masonry layout.
				'post-details'        => array(
					'stylesheet'      => 'glowline-style', // name of the theme's stylesheet.
					'date'            => '.post-meta', // a CSS selector matching the elements that display the post date.
					'categories'      => '.post-category', // a CSS selector matching the elements that display the post categories.
					'tags'            => '.tagscloud', // a CSS selector matching the elements that display the post tags.
					'author'          => '.post-share', // a CSS selector matching the elements that display the post author.
					'comment'         => '.post-comment', // a CSS selector matching the elements that display the comment link.
				),
				'featured-images'     => array(
					'archive'         => true, // enable or not the featured image check for archive pages: true or false.
					'post'            => true, // enable or not the featured image check for single posts: true or false.
					'post-default'    => false, // the default setting of the featured image on single posts, if it's being displayed or not: true or false (only required if false).
					'page'            => true, // enable or not the featured image check for single pages: true or false.
					'page-default'    => false, // the default setting of the featured image on single pages, if it's being displayed or not: true or false (only required if false).
				),
			)
		);

	}
}

add_action( 'after_setup_theme', 'glowline_jetpack_setup' );

/**
 * Check if different layouts are used and render the right one.
 */
function glowline_infinite_scroll_render() {

	global $glowline_grid_layout;

	while ( have_posts() ) {
		the_post();
		if ( 'standard-layout' === $glowline_grid_layout ) {
			get_template_part( 'template-parts/content', get_post_format() );
		} else {
			get_template_part( 'template-parts/content', 'grid' );
		}
	}
}

/** More stuff for Jetpack featured content to replace custom slider. */
function glowline_get_featured_posts() {
	return apply_filters( 'glowline_get_featured_posts', array() );
}


/**
 * Check if a minimum of 1 featured posts exists for slider.
 *
 * @param array $minimum to count number of posts.
 */
function glowline_has_featured_posts( $minimum = 1 ) {

	if ( is_paged() ) {
		return false;
	}

	$minimum = absint( $minimum );
	$featured_posts = apply_filters( 'glowline_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) ) {
		return false;
	}

	if ( $minimum > count( $featured_posts ) ) {
		return false;
	}

	return true;
}

/**
 * Custom fall back image.
 *
 * @param string $media any existing media.
 * @param array  $post_id ids of featured posts.
 * @param array  $args all other options.
 */
function glowline_custom_image( $media, $post_id, $args ) {

	if ( $media ) {
		return $media;
	} else {
		$permalink = get_permalink( $post_id );
		$permalink = get_permalink( $post_id );
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$url = apply_filters( 'jetpack_photon_url', $image[0] );

		return array(
			array(
				'type'  => 'image',
				'from'  => 'custom_fallback',
				'src'   => esc_url( $url ),
				'href'  => $permalink,
			),
		);
	}
}
add_filter( 'jetpack_images_get_images', 'glowline_custom_image', 10, 3 );




/**
 * Return early if Author Bio is not available.
 */
function glowline_author_bio() {
	if ( ! function_exists( 'jetpack_author_bio' ) ) {
		get_template_part( 'template-parts/content', 'author' );
	} else {
		jetpack_author_bio();
	}
}

/**
 * Author Bio Avatar Size.
 */
function glowline_author_bio_avatar_size() {
	return 64;
}
add_filter( 'jetpack_author_bio_avatar_size', 'glowline_author_bio_avatar_size' );
