/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @package testtheme
 */

( function( $ ) {

	// Grid Settings.
	wp.customize(
		'dynamicgrid', function( value ) {
			value.bind(
				function( to ) {
					if ( 'standard-layout' === to ) {
						$( '.posts-container' ).addClass( 'standard-layout' ).removeClass( 'two-grid-layout three-grid-layout four-grid-layout masonry-enabled' );
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


	wp.customize.selectiveRefresh.partialConstructor.grid_class = wp.customize.selectiveRefresh.Partial.extend({

	    /**
	     * Class name choices.
	     *
	     * This is populated in PHP via `wp_add_inline_script()`.
	     *
	     * @type {Array}
	     */
	    choices: [],

	    /**
	     * Refresh partial.
	     *
	     * Override refresh behavior to bypass partial refresh request in favor of direct DOM manipulation.
	     *
	     * @returns {jQuery.Promise} Resolved promise.
	     */
	    refresh: function() {
	        var partial = this, setting, body, deferred, className;

	        setting = wp.customize( partial.params.primarySetting );
	        className = setting.get();
	        body = $( '.posts-container' );
	        if ( 'standard-layout' === className ) {
	        	body.removeClass( 'masonry-enabled' );
	        } else {
	        	body.addClass( 'masonry-enabled' );
	        }
	        body.removeClass( partial.choices.join( ' ' ) );
	        body.addClass( className );
			body.masonry( 'reloadItems' );
			body.masonry( 'layout' );

	        // Do good diligence and return an expected value from the function.
	        deferred = new $.Deferred();
	        deferred.resolveWith( partial, _.map( partial.placements(), function() {
	            return '';
	        } ) );
	        return deferred.promise();
	    }


	});


} )( jQuery );


