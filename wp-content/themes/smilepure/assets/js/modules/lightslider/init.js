jQuery( document ).ready( function( $ ) {
	'use strict';

	var lightSliderOptions = {
		item: 1,
		slideMargin: 30,
		auto: false,
		loop: true,
		keyPress: true,
		controls: true,
		thumbItem: 6,
		pager: true,
		gallery: true,
		galleryMargin: 30,
		thumbMargin: 30,
		prevHtml: '<span class="nav-button-icon"></span>',
		nextHtml: '<span class="nav-button-icon"></span>'
	}

	if ( $insight.isRTL ) {
		lightSliderOptions.rtl = true;
	}

	$( '.tm-light-slider' ).lightSlider( lightSliderOptions );
} );
