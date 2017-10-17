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
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

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
		 'dynamic_grid', array(
			 'default'     => 'standard-layout',
			 'capability'  => 'edit_theme_options',
			 'sanitize_callback' => 'glowline_sanitize_grid_options',
		 )
	 );

	$wp_customize->add_control(
		'dynamic_grid', array(
			'settings'    => 'dynamic_grid',
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

	// = Enable Masonry  =
	$wp_customize->add_setting(
		'masonry_grid', array(
			'default'     => 'masonry-disabled',
			'capability'  => 'edit_theme_options',
			'sanitize_callback' => 'glowline_sanitize_masonry_options',
		)
	);

	$wp_customize->add_control(
		'masonry_grid', array(
			'settings'    => 'masonry_grid',
			'label'       => esc_html__( 'Enable Masonry Layout','glowline' ),
			'description' => esc_html__( 'Only works with the grid options selected','glowline' ),
			'section'     => 'theme_options',
			'type'        => 'select',
			'choices'     => array(
				'masonry-enabled'       => esc_html__( 'Enabled','glowline' ),
				'masonry-disabled'      => esc_html__( 'Disabled','glowline' ),
			),
		)
	);

}

add_action( 'customize_register','glowline_customize_register' );


/**
 * Sanitize a layout dropdown options
 */
function glowline_sanitize_grid_options( $input ) {
    $valid = array(
    	'standard-layout'		=> esc_html__( 'Standard Layout','glowline' ),
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

/**
 * Sanitize masonry dropdown
 */
function glowline_sanitize_masonry_options( $input ) {
    $valid = array(
		'masonry-enabled'       => esc_html__( 'Enabled','glowline' ),
		'masonry-disabled'      => esc_html__( 'Disabled','glowline' ),
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}




