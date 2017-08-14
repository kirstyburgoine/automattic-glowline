<?php
/**
* @package Glowline
* The template for displaying 404 pages (Not Found)
*/

if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

include( get_template_directory() . '/inc/static-function.php' );
include( get_template_directory() . '/inc/template-tags.php' );
include( get_template_directory() . '/inc/jetpack.php' );
include( get_template_directory() . '/inc/widget.php' );
include( get_template_directory() . '/inc/custom-customizer.php' );
include( get_template_directory() . '/inc/customizer.php' );
include( get_template_directory() . '/inc/custom-style.php' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since GlowLine
 */
function glowline_scripts() {

	wp_enqueue_style( 'glowline-lato', glowline_lato_fonts_url(), array(), null );
	wp_enqueue_style( 'glowline-playfair', glowline_playfair_fonts_url(), array(), null );
	wp_enqueue_style( 'glowline-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '1.0.0' );
	wp_enqueue_style( 'glowline-widgets', get_template_directory_uri() . '/css/widget-styles.css', array(), '1.0.0' );
	wp_enqueue_style( 'glowline-defend', get_template_directory_uri() . '/defend.css', array(), '1.0.0' );
	wp_enqueue_style( 'glowline-delete', get_template_directory_uri() . '/delete.css', array(), '1.0.0' );
	// Load our main stylesheet.
	wp_enqueue_style( 'glowline-style', get_stylesheet_uri());

	wp_enqueue_script( 'glowline-classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'glowline-masonry', get_template_directory_uri() . '/js/masonry.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'glowline-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );


	if ( glowline_has_featured_posts( 2 ) ) {

		wp_enqueue_style( 'glowline-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.0' );
		wp_enqueue_script( 'glowline-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '', true );
	}

}

add_action( 'wp_enqueue_scripts', 'glowline_scripts' );


// TODO : Double check this is correct for multiple Google fonts. Seems wrong...
/**
 * Register Google Fonts
 */
function glowline_lato_font_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$arimo = esc_html_x( 'on', 'Lato font: on or off', 'glowline' );

	if ( 'off' !== $arimo ) {
		$font_families = array();
		$font_families[] = 'Lato:400,700,900,400italic,700italic,900italic&subset=latin,latin-ext';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

function glowline_playfair_font_url() {
    $fonts_url = '';
	$arimo = esc_html_x( 'on', 'Playfair font: on or off', 'glowline' );

	if ( 'off' !== $arimo ) {
		$font_families = array();
		$font_families[] = 'Lato:400,700,400italic,700italic&subset=latin,latin-ext';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}



if ( ! function_exists( 'glowline_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 */
function glowline_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   */
	load_theme_textdomain( 'glowline', get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('link','gallery','quote','video','audio') );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable global print stylesheet.
	 */
	add_theme_support( 'print-style' );

	// header image
	$args = array(
		'default-image' => get_template_directory_uri()."/images/header-bg-default.jpg",
	);
	add_theme_support( 'custom-header', $args );

	/* Set the image size by cropping the image */
	add_theme_support('post-thumbnails');
	add_image_size( 'glowline-custom-slider-thumb', 790, 450, true );
	add_image_size( 'glowline-custom-two-grid-thumb', 562, 320, true );
	//custom-three-grid-thumb and custom-releted-post-thumb
	add_image_size( 'glowline-custom-three-grid-thumb', 358, 204, true );
	add_image_size( 'glowline-custom-list-thumb', 468, 267, true );
	add_image_size( 'glowline-custom-boxed-thumb', 585, 333, true );


	add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'header-text' => array( 'site-title', 'site-description' ),
  	) );

}

endif; // glowline_setup

add_action( 'after_setup_theme', 'glowline_setup' );
// ---------------------------------------------------------
// Ends After Setup Stuff
// ---------------------------------------------------------
// Begins additional Functions


// More stuff for Jetpack featured content to replace custom slider
function glowline_get_featured_posts() {
    return apply_filters( 'glowline_get_featured_posts', array() );
}


// More stuff for Jetpack featured content to replace custom slider
function glowline_has_featured_posts( $minimum = 1 ) {

    if ( is_paged() )
        return false;

    $minimum = absint( $minimum );
    $featured_posts = apply_filters( 'glowline_get_featured_posts', array() );

    if ( ! is_array( $featured_posts ) )
        return false;

    if ( $minimum > count( $featured_posts ) )
        return false;

    return true;
}

// Add a fallback image
function glowline_custom_image( $media, $post_id, $args ) {
    if ( $media ) {
        return $media;
    } else {
        $permalink = get_permalink( $post_id );
        //$url = apply_filters( 'jetpack_photon_url', get_template_directory_uri().'/images/790x450.png' );
        $permalink = get_permalink( $post_id );
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $url = apply_filters( 'jetpack_photon_url', $image[0] );

        return array( array(
            'type'  => 'image',
            'from'  => 'custom_fallback',
            'src'   => esc_url( $url ),
            'href'  => $permalink,
        ) );
    }
}
add_filter( 'jetpack_images_get_images', 'glowline_custom_image', 10, 3 );





// Enable threaded comments here instead of header
function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
       wp_enqueue_script('comment-reply');
    }
}
add_action('get_header', 'enable_threaded_comments');


// ---------------------------------------------------------
// Keep Grid Settings in - Nice feature and compliments masonry



global $glowline_grid_layout;
$glowline_grid_layout = get_theme_mod('dynamic_grid','standard-layout');

global $glowline_masonry_layout;
$glowline_masonry_layout = get_theme_mod('masonry_grid','masonry-disabled');

