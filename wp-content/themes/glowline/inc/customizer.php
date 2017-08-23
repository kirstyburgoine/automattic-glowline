<?php  /**  * @package Glowline  */
	 //  =============================
	 //  = Default Theme Customizer Settings  =
	 //  @GlowLine Theme
	 //  =============================

/*theme customizer*/
function glowline_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'glowline_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'glowline_customize_partial_blogdescription',
	) );



	//  =============================
	//  = Theme Options       =
	//  =============================
   $wp_customize->add_section('theme_options', array(
		'title'    => __('Theme Options ', 'glowline'),
		'priority' => 250,
	));

	//= Choose Grid Layout  =
	 $wp_customize->add_setting('dynamic_grid', array(
		'default'           => 'standard-layout',
		'capability'        => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dynamic_grid', array(
		'settings'  => 'dynamic_grid',
		'label'     => __('Choose A Post Layout','glowline'),
		'section'   => 'theme_options',
		'type'      => 'select',
		'choices'   => array(
			'standard-layout'       => __('Standard Layout','glowline'),
			'two-grid-layout'       => __('Two Column Grid','glowline'),
			'three-grid-layout'     => __('Three Column Grid','glowline'),
			'four-grid-layout'      => __('Four Column Grid','glowline'),
			'five-grid-layout'      => __('Five Column Grid','glowline'),
		),
	));
	//= Enable Masonry  =
	$wp_customize->add_setting('masonry_grid', array(
		'default'           => 'masonry-disabled',
		'capability'        => 'edit_theme_options'
	));
	$wp_customize->add_control( 'masonry_grid', array(
		'settings'  => 'masonry_grid',
		'label'     => __('Enable Masonry Layout','glowline'),
		'description' => __('Only works with the grid options selected','glowline'),
		'section'   => 'theme_options',
		'type'      => 'select',
		'choices'   => array(
			'masonry-enabled'       => __('Enabled','glowline'),
			'masonry-disabled'      => __('Disabled','glowline'),
		),
	));


}
add_action('customize_register','glowline_customize_register');

?>