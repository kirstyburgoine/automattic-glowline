<?php
/**
 * Widgets used in the sidebar and footer
 *
 * @package Glowline
 */

/**
 * Setup widgets
 */
function glowline_widgets_init() {

	// Area , located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary Sidebar', 'glowline' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Main sidebar that appears on the left.', 'glowline' ),
			'before_widget' => '<div class="sidebar-inner-widget">',
			'after_widget'  => '</div><div class="clearfix"></div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	// Area 1, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => esc_html__( 'First Footer Widget Area', 'glowline' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Appears in the first footer section of the site.', 'glowline' ),
			'before_widget' => '<div id="%1s" class="widget %2s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle" >',
			'after_title'   => '</h4>',
		)
	);

	// Area 2, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Second Footer Widget Area', 'glowline' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Appears in the Second footer section of the site.', 'glowline' ),
			'before_widget' => '<div id="%1s" class="widget %2s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle" >',
			'after_title'   => '</h4>',
		)
	);

	// Area 3, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Third Footer Widget Area', 'glowline' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Appears in the Third footer section of the site.', 'glowline' ),
			'before_widget' => '<div id="%1s" class="widget %2s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

}

add_action( 'widgets_init', 'glowline_widgets_init' );
