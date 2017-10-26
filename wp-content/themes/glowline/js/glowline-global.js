/**
 * JS functions file
 *
 * @package Glowline
 */

(function($) {
	// Taken almost entirely from Baskerville. NEed to double check this...
	// posts block for Masonry.
	var $blocks = $( '.masonry-enabled' );

	$( window ).load(
		function() {
				/**
				 * Initial Masonry setup.
				 */

				// Determine text direction.
				var ltr = true;
			if ( $( 'html' ).attr( 'dir' ) == 'rtl' ) {
				ltr = false;
			}

				// fire up Masonry!
				$blocks.imagesLoaded(
					function() {
						$blocks.masonry(
							{
								columnWidth: 1,
								itemSelector: '.grid-post',
								transitionDuration: 0,
								isOriginLeft: ltr,
							}
						).masonry( 'layout' );

						var masonryChild = $blocks.find( '.grid-post' );

						// Animating JS based off Huntt theme.
						masonryChild.each(
							function( i ) {
								// Show content.
								setTimeout(
									function() {
										masonryChild.eq( i ).addClass( 'post-loaded fade-in' );
									}, 100 * ( i + 1 )
								);
							}
						);

						$( '#spinner' ).fadeOut(
							250, function() {
								$( this ).remove();
							}
						);
					}
				);
		}
	);

	/**
	 * Masonry update after Infinte Scroll
	 * JS based off Huntt theme
	 */

	$( document.body ).on(
		'post-load', function() {

			// make sure we're only grabbing new posts.
			var newEl = $blocks.children().not( '.post-loaded, span.infinite-loader' ).addClass( 'post-loaded' );

			// create function for refreshing Masonry.
			function refreshMasonry() {
				$blocks.masonry( 'layout' );
			}

			// check if images loaded in these new posts.
			newEl.imagesLoaded(
				function () {
					// if images loaded, add new posts and update masonry layout.
					$blocks.masonry( 'appended', newEl, true ).masonry( 'layout' );

					// TODO: Change this to OWL or change OWL to flexslider.
					// reinitialize flexslider for new posts, and re-run masonry when complete.
					// $( ".flexslider" ).flexslider( {
					// animation: "slide",
					// controlNav: false,
					// prevText: "Previous",
					// nextText: "Next",
					// smoothHeight: false,
					// startAt : 1,
					// start: refreshMasonry, // reload masonry layout on finish, just in case flexslider was slow.
					// } );.
				}
			).delay( 500 ).each(
				function( i ) {
					// then have a small delay between displaying each post.
					setTimeout(
						function() {
							newEl.eq( i ).addClass( 'fade-in' );
						}, 200 * ( i + 1 )
					);
				}
			);

			// reloading masonry layout again, after delay.
			// fixes edge case issue with Facebook embed reloading and messing up layout.
			setTimeout( refreshMasonry, 3000 );
		}
	);

} )( jQuery );


jQuery( document ).ready(
	function() {
		"use strict";

		// -------------------------------------------
		// Responsive slider.
		// jQuery( ".owl-carousel" ).owlCarousel(
		// 	{
		// 		rtl: true,
		// 		nav: true, // Show next and prev buttons.
		// 		pagination:false,
		// 		slideSpeed : 500,
		// 		paginationSpeed : 400,
		// 		items : 1,
		// 		autoplay: true,
		// 		lazyLoad : true,
		// 		singleItem:true,
		// 		autoHeight:true,
		// 		dots:false,
		// 		loop:true
		// 	}
		// );

		jQuery(window).load(function() {
    		jQuery('.flexslider').flexslider({
    			controlNav: false,
    			animation: "slide"
    		});
		});

		// -------------------------------------------
		// masonry.
		jQuery( '.masonry-enabled' ).masonry(
			{
				itemSelector: '.grid-post',
				columnWidth: '.grid-post'
			}
		);

		// -------------------------------------------
		// Dropdown menu.
		function thDropdownMenu() {
			var wWidth = jQuery( window ).width();

			if (wWidth > 1024) {
				jQuery( '.navigation ul.sub-menu, .navigation ul.children' ).hide();
				var timer;
				var delay = 100;

				jQuery( '.navigation li' ).hover(
					function() {
						var $this = jQuery( this );
						timer = setTimeout(
							function() {
								$this.children( 'ul.sub-menu, ul.children' ).slideDown( 'fast' );
							}, delay
						);

					},
					function() {
						jQuery( this ).children( 'ul.sub-menu, ul.children' ).hide();
						clearTimeout( timer );
					}
				);
			} else {
				jQuery( '.navigation li' ).unbind( 'hover' );
				jQuery( '.navigation li.active > ul.sub-menu, .navigation li.active > ul.children' ).show();
			}
		}

		thDropdownMenu();

		jQuery( window ).resize(
			function() {
				thDropdownMenu();
			}
		);

		// -------------------------------------------
		// Vertical menus toggles.
		jQuery( '.widget .menu-menu-1-container, .navigation .menu' ).addClass( 'toggle-menu' );
		jQuery( '.toggle-menu ul.sub-menu, .toggle-menu ul.children' ).addClass( 'toggle-submenu' );
		jQuery( '.toggle-menu ul.sub-menu' ).parent().addClass( 'toggle-menu-item-parent' );
		jQuery( '.toggle-menu .toggle-menu-item-parent' ).append( '<span class="toggle-caret"><i class="fa fa-plus"></i></span>' );

		jQuery( '.toggle-caret' ).click(
			function(e) {
				e.preventDefault();
				jQuery( this ).parent().toggleClass( 'active' ).children( '.toggle-submenu' ).slideToggle( 'fast' );
			}
		);

		// -------------------------------------------
		// Show-hide Scroll to top & move-to-top arrow.
		jQuery( "body" ).prepend( "<a id='move-to-top' class='animate move-to-top ' href='#masthead'><i class='fa fa-angle-up'></i></a>" );

		var scrollDes = 'html,body';
		/*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
		if (navigator.userAgent.match( /opera/i )) {
			scrollDes = 'html';
		}

		// -------------------------------------------
		// show ,hide.
		jQuery( window ).scroll(
			function () {
				if (jQuery( this ).scrollTop() > 160) {
					jQuery( '#move-to-top' ).addClass( 'filling' ).removeClass( 'hiding' );
				} else {
					jQuery( '#move-to-top' ).removeClass( 'filling' ).addClass( 'hiding' );
				}
			}
		);

		// -------------------------------------------
		// Make all anchor links smooth scrolling & scroll handler.
		var scrollToAnchor = function( id, event ) {
			// grab the element to scroll to based on the name.
			var elem = jQuery( "a[name='" + id + "']" );
			// if that didn't work, look for an element with our ID.
			if ( typeof( elem.offset() ) === "undefined" ) {
				elem = jQuery( "#" + id );
			}
			// if the destination element exists.
			if ( typeof( elem.offset() ) !== "undefined" ) {
				// cancel default event propagation.
				event.preventDefault();

				// do the scroll.
				var scroll_to = elem.offset().top;
				jQuery( 'html, body' ).animate(
					{
						scrollTop: scroll_to
					}, 600, 'swing', function() {
						if (scroll_to > 46) {
							window.location.hash = id;
						} }
				);
			}
		};

		// -------------------------------------------
		// bind to click event.
		jQuery( "a" ).click(
			function( event ) {
				// only do this if it's an anchor link.
				var href = jQuery( this ).attr( "href" );
				if ( href && href.match( "#" ) && href !== '#' ) {
					// scroll to the location.
					var parts = href.split( '#' ),
					url = parts[0],
					target = parts[1];
					if (( ! url || url == window.location.href.split( '#' )[0]) && target) {
						scrollToAnchor( target, event );
					}
				}
			}
		);

		// -------------------------------------------
		// Responsive Navigation.
		/* <![CDATA[ */
		var glowline_customscript = {"responsive":"1","nav_menu":"secondary"};
		/* ]]> */

		if (glowline_customscript.responsive && glowline_customscript.nav_menu != 'none') {
			jQuery( document ).ready(
				function($){
					// merge if two menus exist.
					if (glowline_customscript.nav_menu == 'both') {
						jQuery( '.navigation' ).not( '.mobile-menu-wrapper' ).find( '.menu' ).clone().appendTo( '.mobile-menu-wrapper' ).hide();
					}

					jQuery( '.toggle-mobile-menu' ).click(
						function(e) {
							e.preventDefault();
							e.stopPropagation();
							jQuery( 'body' ).toggleClass( 'mobile-menu-active' );
						}
					);

					// prevent propagation of scroll event to parent.
					jQuery( document ).on(
						'DOMMouseScroll mousewheel', '.mobile-menu-wrapper', function(ev) {
							var $this = jQuery( this ),
							scrollTop = this.scrollTop,
							scrollHeight = this.scrollHeight,
							height = $this.height(),
							delta = (ev.type == 'DOMMouseScroll' ?
							ev.originalEvent.detail * -40 :
							ev.originalEvent.wheelDelta),
							up = delta > 0;

							var prevent = function() {
								ev.stopPropagation();
								ev.preventDefault();
								ev.returnValue = false;
								return false;
							}

							if ( jQuery( 'a#pull' ).css( 'display' ) !== 'none' ) { // if toggle menu button is visible ( small screens ).

								if ( ! up && -delta > scrollHeight - height - scrollTop) {
									// Scrolling down, but this will take us past the bottom.
									$this.scrollTop( scrollHeight );
									return prevent();
								} else if (up && delta > scrollTop) {
									// Scrolling up, but this will take us past the top.
									$this.scrollTop( 0 );
									return prevent();
								}
							}
						}
					);

				}
			).on(
				'click', function(event) {

					var $target = jQuery( event.target );
					if ( ( $target.hasClass( "fa" ) && $target.parent().hasClass( "toggle-caret" ) ) || $target.hasClass( "toggle-caret" ) ) {// allow clicking on menu toggles.
						return;
					}

						jQuery( 'body' ).removeClass( 'mobile-menu-active' );
				}
			);
		}

		// Scroll down header.
		function init() {
			window.addEventListener(
				'scroll', function(e){
					var distanceY = window.pageYOffset || document.documentElement.scrollTop,
					shrinkOn = 250,
					header = document.querySelector( "header" );
					if (distanceY > shrinkOn) {
						classie.add( header,"smaller" );
						jQuery( ".main-heading" ).addClass( "smaller" );
					} else {
						if (classie.has( header,"smaller" )) {
							classie.remove( header,"smaller" );
							jQuery( ".main-heading" ).removeClass( "smaller" );
						}
					}
				}
			);
			jQuery( 'iframe' ).wrap( '<div class="video-wrapper" />' );
		}

		window.onload = init();

	}
);
