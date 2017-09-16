<?php
/**
 * Sets up the Glowline theme.
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package Glowline
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}


if ( ! function_exists( 'glowline_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function glowline_setup() {
		/**
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_theme_textdomain( 'glowline', get_template_directory() . '/languages' );

		/** Add RSS feed links to <head> for posts and comments.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Register menu in theme.
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menu( 'menu-1', __( 'Primary Menu', 'glowline' ) );

		/**
		 * Enable support for Post Formats.
		 */
		add_theme_support( 'post-formats', array( 'link', 'gallery', 'quote', 'video', 'audio' ) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Enable global print stylesheet.
		 */
		add_theme_support( 'print-style' );

		$args = array(
			'default-image' => get_template_directory_uri() . '/images/header-bg-default.jpg',
		);
		add_theme_support( 'custom-header', $args );

		/** Set the image size by cropping the image */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'glowline-custom-slider-thumb', 790, 450, true );
		add_image_size( 'glowline-custom-two-grid-thumb', 562, 320, true );
		add_image_size( 'glowline-custom-three-grid-thumb', 358, 204, true );
		add_image_size( 'glowline-custom-list-thumb', 468, 267, true );
		add_image_size( 'glowline-custom-boxed-thumb', 585, 333, true );

		add_theme_support(
			'custom-logo', array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);
	}

endif;

add_action( 'after_setup_theme', 'glowline_setup' );
/**
 *
 * Enqueue scripts and styles for the front end.
 *
 * @since GlowLine
 */
function glowline_scripts() {

	wp_enqueue_style( 'glowline-fonts', glowline_fonts_url(), array(), null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '1.0.0' );
	// Load our main stylesheet.
	wp_enqueue_style( 'glowline-style', get_stylesheet_uri() );

	wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'glowline-custom', get_template_directory_uri() . '/js/glowline-global.js', array( 'jquery', 'masonry' ), '', true );

	if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) === 1 ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( glowline_has_featured_posts( 2 ) ) {
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.0' );
		wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '', true );
	}

}

add_action( 'wp_enqueue_scripts', 'glowline_scripts' );


if ( ! function_exists( 'glowline_fonts_url' ) ) :
	/**
	 * Register Google Fonts
	 */
	function glowline_fonts_url() {
		$fonts_url = '';

		/*
		Translators: If there are characters in your language that are not
		* supported by Lato, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$lato = esc_html_x( 'on', 'Lato font: on or off', 'glowline' );

		/*
		Translators: If there are characters in your language that are not
		* supported by Playfair, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$playfair = esc_html_x( 'on', 'Playfair font: on or off', 'glowline' );

		if ( 'off' !== $lato || 'off' !== $playfair ) {
			$font_families = array();

			if ( 'off' !== $lato ) {
				$font_families[] = 'Lato:400,700,900,400italic,700italic,900italic';
			}

			if ( 'off' !== $playfair ) {
				$font_families[] = 'Playfair+Display:400,700';
			}

			$query_args = array(
				'family' => rawurlencode( implode( '|', $font_families ) ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;


include( get_template_directory() . '/inc/static-function.php' );

include( get_template_directory() . '/inc/template-tags.php' );

include( get_template_directory() . '/inc/jetpack.php' );

include( get_template_directory() . '/inc/widget.php' );

include( get_template_directory() . '/inc/customizer.php' );


/**
 * Grid & Masonry Settings.
 */
global $glowline_grid_layout;
$glowline_grid_layout = get_theme_mod( 'dynamic_grid', 'standard-layout' );

global $glowline_masonry_layout;
$glowline_masonry_layout = get_theme_mod( 'masonry_grid', 'masonry-disabled' );

