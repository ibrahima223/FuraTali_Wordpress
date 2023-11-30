jQuery( document ).ready( function( $ ) {
	'use strict';

	jQuery( 'body' ).on( 'click', '.vc_wrapper-param-type-spacing .wpb_element_label', function() {
		jQuery( '.wpb_el_type_spacing' ).removeClass( 'active' );
		jQuery( this ).parent().addClass( 'active' );
	} );
} );
