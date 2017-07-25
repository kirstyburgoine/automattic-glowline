<?php  /**  * @package Glowline  */
	 //  =============================
	 //  = Default Theme Customizer Settings  =
	 //  @GlowLine Theme
	 //  =============================

/*theme customizer*/
function glowline_customize_register( $wp_customize ) {
$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	 //  =============================
	 //  = General Settings     =
	 //  =============================
	$wp_customize->get_section('title_tagline')->title = esc_html__('Site Identity', 'glowline');
	$wp_customize->remove_control( 'header_textcolor' );

	 //  =============================
	 //  = Header Settings       =
	 //  =============================
	$wp_customize->get_section('header_image')->title = esc_html__('Header Image Settings', 'glowline');
	$wp_customize->get_section('header_image')->priority = 25;
	//  =header  Background Type  =
	 $wp_customize->add_setting('header_background_type', array(
		'default'        => 'color',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'header_background_type', array(
		'settings' => 'header_background_type',
		'label'   => __('Background','glowline'),
		'section' => 'header_image',
		'priority' => 5,
		'type'    => 'radio',
		'choices'     => array(
			'color'   => 'Color',
			'image'   => 'Image',
		),
	));
   $wp_customize->add_setting('theme_bg_color', array(
		'default'           => '#f5f5f5',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_bg_color', array(
		'label'    => __('Background Color', 'glowline'),
		'section'  => 'header_image',
		'settings' => 'theme_bg_color',
		'priority' => 6,

	)));



	//  =============================
	//  = Theme Settings       =
	//  =============================
   $wp_customize->add_section('theme_settings', array(
		'title'    => __('Theme Settings ', 'glowline'),
		'priority' => 25,
	));

	//= Choose Grid Layout  =
	 $wp_customize->add_setting('dynamic_grid', array(
		'default'           => 'standard-layout',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'dynamic_grid', array(
		'settings'  => 'dynamic_grid',
		'label'     => __('Choose Post Layout','glowline'),
		'section'   => 'theme_settings',
		'type'      => 'select',
		'choices'   => array(
			'standard-layout'       => __('Standard Layout','glowline'),
			'two-grid-layout'       => __('Two Grid','glowline'),
		),
	));

	   //= Choose Post Meta  =
	 $wp_customize->add_setting('home_post_meta', array(
		'default'           =>array(),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'glowline_checkbox_explode'
	));
	$wp_customize->add_control(new Customize_Control_Checkbox_Multiple(
		$wp_customize,'home_post_meta', array(
		'settings'          => 'home_post_meta',
		'label'             => __( 'Meta Info to Hide', 'glowline' ),
		'section'           => 'theme_settings',
		'choices'           => array(
			   'category'   => __( 'Hide Category','glowline' ),
				'date'      => __( 'Hide Date','glowline' ),
				'comment'   => __( 'Hide Comment','glowline' ),
			)
		)
	)
);




	//  =============================
	//  = Colors      =
	//  =============================

	 $wp_customize->get_section('colors')->title = esc_html__('Colors', 'glowline');
	 $wp_customize->add_setting('theme_color', array(
		'default'           => '#bdb76b',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_color', array(
		'label'    => __('Theme Color', 'glowline'),
		'section'  => 'colors',
		'settings' => 'theme_color',
		'priority' => 6,

	)));
	$wp_customize->add_setting('header_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
		'label'    => __('Header Background Color', 'glowline'),
		'section'  => 'colors',
		'settings' => 'header_bg_color',
		'priority' => 7,

	)));
	$wp_customize->add_setting('strapline', array(
		'default'           => '#bdb76b',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'strapline', array(
		'label'    => __('Strapline Color', 'glowline'),
		'section'  => 'colors',
		'settings' => 'strapline',
		'priority' => 8,

	)));

}
add_action('customize_register','glowline_customize_register');

?>