/**
 * File wai-aria.js
 *
 * Focus styles for menus when using keyboard navigation
 * Solution taken from: https://codeable.io/wordpress-accessibility-creating-accessible-dropdown-menus/
 *
 * @package Glowline
 */

jQuery(
	function ( $ ) {
		/**
		 * Properly update the ARIA states on focus (keyboard) and mouse over events.
		 */
		$( '[role="menubar"]' ).on(
			'focus.aria  mouseenter.aria', '[aria-haspopup="true"]', function ( ev ) {
				$( ev.currentTarget ).attr( 'aria-expanded', true );
			}
		);

		/**
		 * Properly update the ARIA states on blur (keyboard) and mouse out events.
		 */
		$( '[role="menubar"]' ).on(
			'blur.aria  mouseleave.aria', '[aria-haspopup="true"]', function ( ev ) {
				$( ev.currentTarget ).attr( 'aria-expanded', false );
			}
		);
	}
);
