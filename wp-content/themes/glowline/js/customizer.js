jQuery(document).ready(function() {

	
  /* === Checkbox Multiple Control === */
    jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
        'change',
        function() {
   // alert('');
            checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );

	/*Documentation link and Upgrade to PRO link */
	if( !jQuery( ".preview-notice" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section preview-notice">');
	}

	if( jQuery( ".preview-notice" ).length ) {

		jQuery('.preview-notice').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="//themehunk.com/product/glowline-gracefull-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}', glowlineCustomizerObject.pro));

	}
	if ( !jQuery( ".preview-notice" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}




});