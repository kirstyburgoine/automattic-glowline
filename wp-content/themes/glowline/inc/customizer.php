<?php
/**
 * Optional Theme Customizer Settings
 *
 * @package Glowline
 */

/**
 * Registers grid options
 *
 * @param array $wp_customize settings for customizer.
 * @return void
 */
function glowline_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'glowline_customize_partial_blogname',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'glowline_customize_partial_blogdescription',
		)
	);

	// =============================
	// = Theme Options       =
	// =============================
	$wp_customize->add_section(
		'theme_options', array(
			'title'       => esc_html__( 'Theme Options ', 'glowline' ),
			'priority'    => 250,
		)
	);

	// = Choose Grid Layout  =
	$wp_customize->add_setting(
		'dynamicgrid', array(
			'default'     => 'standard-layout',
			'capability'  => 'edit_theme_options',
			'sanitize_callback' => 'glowline_sanitize_grid_options',
		)
	);

	$wp_customize->add_control(
		'dynamicgrid', array(
			'settings'    => 'dynamicgrid',
			'label'       => esc_html__( 'Choose A Post Layout','glowline' ),
			'section'     => 'theme_options',
			'type'        => 'select',
			'choices'     => array(
				'standard-layout'       => esc_html__( 'Standard Layout','glowline' ),
				'two-grid-layout'       => esc_html__( 'Two Column Grid','glowline' ),
				'three-grid-layout'     => esc_html__( 'Three Column Grid','glowline' ),
				'four-grid-layout'      => esc_html__( 'Four Column Grid','glowline' ),
			),
		)
	);

	$wp_customize->get_setting( 'dynamicgrid' )->transport       = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'dynamicgrid', array(
			'selector'          => '.posts-container',
			'type'				=> 'grid_class',
			'settings'          => 'dynamicgrid',
			'render_callback'   => 'glowline_customize_partial_grid_classes',
		)
	);
}

add_action( 'customize_register','glowline_customize_register' );


/**
 * Sanitize layout dropdown options
 *
 * @param string $input options selected.
 */
function glowline_sanitize_grid_options( $input ) {
	$valid = array(
		'standard-layout'       => esc_html__( 'Standard Layout','glowline' ),
		'two-grid-layout'       => esc_html__( 'Two Column Grid','glowline' ),
		'three-grid-layout'     => esc_html__( 'Three Column Grid','glowline' ),
		'four-grid-layout'      => esc_html__( 'Four Column Grid','glowline' ),
		'five-grid-layout'      => esc_html__( 'Five Column Grid','glowline' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function glowline_customize_partial_grid_classes( $glowline_grid_layout ) {
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
function glowline_customize_preview_js() {
	wp_enqueue_script( 'glowline_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'customize-selective-refresh' ), '', true );
}
add_action( 'customize_preview_init', 'glowline_customize_preview_js' );
