<?php
// ---------------------------------------------------------
// JETPACK STUFF
// ---------------------------------------------------------

if ( ! function_exists( 'glowline_jetpack_setup' ) ) {

	function glowline_jetpack_setup() {

	 	add_theme_support( 'infinite-scroll', array(
	    	'container'      => 'posts-container',
	    	'footer_widgets' => array('sidebar-2', 'sidebar-3', 'sidebar-4',),
	    	'footer'         => 'footer',
		) );

		add_theme_support( 'jetpack-responsive-videos' );

		// To replace custom slider
		add_theme_support( 'featured-content', array(
	    	'filter'         => 'glowline_get_featured_posts',
	    	'max_posts'  	 => 20,
	    	'post_types'     => array( 'post' ),
		) );

		add_theme_support( 'jetpack-content-options', array(
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
		) );

	}

} // glowline_setup

add_action( 'after_setup_theme', 'glowline_jetpack_setup' );



// add_action( 'init', 'glowline_infinite_scroll_init' );

// function glowline_infinite_scroll_render() {
//     get_template_part( 'partials/content', 'grid' );
// }

/**
 * Return early if Author Bio is not available.
 */
function glowline_author_bio() {
	if ( ! function_exists( 'jetpack_author_bio' ) ) {
		get_template_part( 'partials/content', 'author' );
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
