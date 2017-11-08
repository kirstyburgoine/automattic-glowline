<?php
/**
Plugin Name: Column Layouts
Plugin URI: http://wordpress.com/kirstyburgoine/
Description: Simple plugin to allow changing number of columns / masonry and demonstrate partial refresh in customizer.
Author: Kirsty Burgoine
Version: 0.0.1
Author URI: http://wordpress.com/kirstyburgoine/
*/
?>

<?php

function testtheme_customize_register( $wp_customize ) {

	// $wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	// $wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	// $wp_customize->selective_refresh->add_partial(
	// 	'blogname', array(
	// 		'selector'        => '.site-title a',
	// 		'render_callback' => 'testtheme_customize_partial_blogname',
	// 	)
	// );

	// $wp_customize->selective_refresh->add_partial(
	// 	'blogdescription', array(
	// 		'selector'        => '.site-description',
	// 		'render_callback' => 'testtheme_customize_partial_blogdescription',
	// 	)
	// );

	// =============================
	// = Theme Options       =
	// =============================
	$wp_customize->add_section(
		'theme_options', array(
			'title'       => esc_html__( 'Theme Options ', 'testtheme' ),
			'priority'    => 250,
		)
	);

	// = Choose Grid Layout  =
	$wp_customize->add_setting(
		'dynamicgrid', array(
			'default'     => 'standard-layout',
			'capability'  => 'edit_theme_options',
			'sanitize_callback' => 'testtheme_sanitize_grid_options',
		)
	);

	$wp_customize->add_control(
		'dynamicgrid', array(
			'settings'    => 'dynamicgrid',
			'label'       => esc_html__( 'Choose A Post Layout','testtheme' ),
			'section'     => 'theme_options',
			'type'        => 'select',
			'choices'     => array(
				'standard-layout'       => esc_html__( 'Standard Layout','testtheme' ),
				'two-grid-layout'       => esc_html__( 'Two Column Grid','testtheme' ),
				'three-grid-layout'     => esc_html__( 'Three Column Grid','testtheme' ),
				'four-grid-layout'      => esc_html__( 'Four Column Grid','testtheme' ),
			),
		)
	);

	$wp_customize->get_setting( 'dynamicgrid' )->transport       = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'dynamicgrid', array(
			'selector'          => '.posts-container',
			'type'				=> 'grid_class',
			'settings'          => 'dynamicgrid',
			'render_callback'   => 'testtheme_customize_partial_grid_classes',
		)
	);
}

add_action( 'customize_register','testtheme_customize_register' );


/**
 * Sanitize layout dropdown options
 *
 * @param string $input options selected.
 */
function testtheme_sanitize_grid_options( $input ) {
	$valid = array(
		'standard-layout'       => esc_html__( 'Standard Layout','testtheme' ),
		'two-grid-layout'       => esc_html__( 'Two Column Grid','testtheme' ),
		'three-grid-layout'     => esc_html__( 'Three Column Grid','testtheme' ),
		'four-grid-layout'      => esc_html__( 'Four Column Grid','testtheme' ),
		'five-grid-layout'      => esc_html__( 'Five Column Grid','testtheme' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function testtheme_customize_partial_grid_classes( $testtheme_grid_layout ) {
	$grid_layout = get_option( 'dynamicgrid' );

	if ( 'standard-layout' === $grid_layout ) {
		return $grid_layout;
	} else {
		return $grid_layout;
	}

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function testtheme_customize_preview_js() {

	if ( ! is_customize_preview() ) {
		return;
	}
	wp_enqueue_script( 'testtheme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'customize-selective-refresh' ), '', true );
}
add_action( 'customize_preview_init', 'testtheme_customize_preview_js' );
