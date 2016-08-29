<?php
/**
 * WordPress function Page
 * @since GlowLine
 */
if ( ! isset( $content_width ) ) {
  $content_width = 1170;
}
require_once( get_template_directory() . '/inc/index.php' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since GlowLine
 */
function glowline_scripts() {
  // Add Genericons font, used in the main stylesheet.
   wp_enqueue_style( 'glowline-lato', '//fonts.googleapis.com/css?family=Lato:400,900,700');
  wp_enqueue_style( 'glowline-playfair', '//fonts.googleapis.com/css?family=Playfair+Display:400,700');
  wp_enqueue_style( 'glowline-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '1.0.0' );
  wp_enqueue_style( 'glowline-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.0' );
  // Load our main stylesheet.
  wp_enqueue_style('glowline-style', get_stylesheet_uri());
  wp_enqueue_script( 'glowline-classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'glowline-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'glowline-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );
  // Comment reply
    if (is_singular() && get_option('thread_comments')){
    wp_enqueue_script('comment-reply');
  }
}

add_action( 'wp_enqueue_scripts', 'glowline_scripts' );

/**
  * dynamic social link
  *
  */
function glowline_social_links(){
?>
    <ul>
<?php if($f_link = get_theme_mod('f_link')) : ?><li><a target='_blank' href="<?php echo esc_url($f_link); ?>" ><i class='fa fa-facebook'></i></a></li><?php endif; ?>
<?php if($g_link = get_theme_mod('g_link')) : ?><li><a target='_blank' href="<?php echo esc_url($g_link); ?>" ><i class='fa fa-google-plus'></i></a></li><?php endif; ?>
<?php if($p_link = get_theme_mod('p_link')) : ?><li><a target='_blank' href="<?php echo esc_url($p_link); ?>" ><i class='fa fa-pinterest'></i></a></li><?php endif; ?>
    </ul>
	
<?php
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
     * Enable support for Post Formats.
     */

    add_theme_support( 'post-formats', array('link','gallery','quate','video','audio') );
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );
// header image
    $args = array(
  'default-image' => GLOWLINE_DUMMY_BG_IMAGE,
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

// home page post meta
function glowline_home_post_meta($search,$default=false){
 $home_post_meta = get_theme_mod('home_post_meta');
$value = (!empty($home_post_meta) && !empty($home_post_meta[0]))?in_array($search, $home_post_meta):$default;
return $value;
}
// single page post meta
function glowline_single_post_meta($search,$default=false){
 $home_post_meta = get_theme_mod('single_post_meta');
$value = (!empty($home_post_meta) && !empty($home_post_meta[0]))?in_array($search, $home_post_meta):$default;
return $value;
}

global $grid_layout;
$grid_layout = get_theme_mod('dynamic_grid','standard-layout');