<?php
function glowline_jetpack_setup() {

  	add_theme_support( 'infinite-scroll', array(
    'container' => 'content',
    'footer' => 'page',
	) );

	/*
	 * Enable responsive videos.
	 */
	add_theme_support( 'jetpack-responsive-videos' );

}
add_action( 'after_setup_theme', 'glowline_jetpack_setup' );
?>