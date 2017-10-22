/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Grid Settings.
	wp.customize( 'dynamic_grid', function( value ) {
		value.bind( function( to ) {

			if ( 'standard-layout' === to ) {
				$( 'body' ).addClass( 'standard-layout' ).removeClass( 'masonry-enabled two-grid-layout three-grid-layout four-grid-layout' );
			} elseif ( 'two-grid-layout' === to ) {
				$( 'body' ).addClass( 'masonry-enabled two-grid-layout' ).removeClass( 'standard-layout three-grid-layout four-grid-layout' );
			} elseif ( 'three-grid-layout' === to ) {
				$( 'body' ).addClass( 'masonry-enabled three-grid-layout' ).removeClass( 'standard-layout two-grid-layout four-grid-layout' );
			} else {
				$( 'body' ).addClass( 'masonry-enabled four-grid-layout' ).removeClass( 'standard-layout two-grid-layout three-grid-layout' );
			}
		} );
	} );

} )( jQuery );
