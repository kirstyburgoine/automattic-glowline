/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @package Glowline
 */

( function( $ ) {

	// Site title and description.
	wp.customize(
		'blogname', function( value ) {
			value.bind(
				function( to ) {
					$( '.site-title span' ).text( to );
				}
			);
		}
	);

	wp.customize(
		'blogdescription', function( value ) {
			value.bind(
				function( to ) {
					$( '.site-description' ).text( to );
				}
			);
		}
	);

	// Grid Settings.
	wp.customize(
		'dynamicgrid', function( value ) {
			value.bind(
				function( to ) {
					if ( 'standard-layout' === to ) {
						$( '.posts-container' ).addClass( 'standard-layout' ).removeClass( 'two-grid-layout three-grid-layout four-grid-layout' );
					} else if ( 'two-grid-layout' === to ) {
						$( '.posts-container' ).addClass( 'two-grid-layout' ).removeClass( 'standard-layout three-grid-layout four-grid-layout' );
					} else if ( 'three-grid-layout' === to ) {
						$( '.posts-container' ).addClass( 'three-grid-layout' ).removeClass( 'standard-layout two-grid-layout four-grid-layout' );
					} else {
						$( '.posts-container' ).addClass( 'four-grid-layout' ).removeClass( 'standard-layout two-grid-layout three-grid-layout' );
					}
				}
			);
		}
	);

} )( jQuery );
