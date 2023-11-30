var $window            = $( window ),
    $html              = $( 'html' ),
    $body              = $( 'body' ),
    $pageWrapper       = $( '#page' ),
    $pageHeader        = $( '#page-header' ),
    $headerInner       = $( '#page-header-inner' ),
    $pageContent       = $( '#page-content' ),
    headerStickyEnable = $insight.header_sticky_enable,
    headerStickyHeight = parseInt( $insight.header_sticky_height ),
    animateQueueDelay  = 200,
    queueResetDelay,
    wWidth             = window.innerWidth;
/**
 * Global ajaxBusy = false
 * Desc: Status of ajax
 */
var ajaxBusy = false;
$( document ).ajaxStart( function() {
	ajaxBusy = true;
} ).ajaxStop( function() {
	ajaxBusy = false;
} );

$( window ).on( 'resize', function() {
	$body.addClass( 'window-resized' );
	wWidth = window.innerWidth;
	calMobileMenuBreakpoint();
	boxedFixVcRow();
	calculateLeftHeaderSize();
	initStickyHeader();
	initFooterParallax();
	initRotateBoxes();
} );

$( document ).on( 'vc-full-width-row', calculateLeftHeaderSize );

$( window ).on( 'load', function() {
	$body.addClass( 'loaded' );

	setTimeout( function() {
		$( '#page-preloader' ).remove();
	}, 600 );

	initQueueAnimationForElements();
	initAnimationForElements();
} );

$( document ).ready( function() {
	$( '.tm-swiper' ).insightSwiper();

	$( '.tm-maps-popup' ).lightGallery( {
		selector: 'this'
	} );

	calMobileMenuBreakpoint();
	boxedFixVcRow();
	initStickyHeader();
	insightInitSmartmenu();
	marqueBackground();
	handlerTestimonials();
	handlerServices();
	scrollToTop();

	// Remove empty p tags form wpautop.
	$( 'p:empty' ).each( function() {
		if ( 0 >= this.attributes.length ) {
			$( this ).remove();
		}
	} );

	insightInitGrid();

	setTimeout( function() {
		navOnePage();
	}, 100 );

	$body.on( 'click', '.vc_tta-tab, .vc_tta-panel', function() {
		$( window ).trigger( 'resize' );
	} );

	initFooterParallax();
	initLazyLoadImages();
	initSmoothScrollLinks();
	initLightGalleryPopups();
	initVideoPopups();
	initSearchPopup();
	initMobileMenu();
	initOffCanvasMenu();
	initOffCanvasSidebar();
	initHeaderRightMoreTools();
	initOfficeSwitcher();
	initTopbarNotice();
	fixLanguageSwitcherAlignment();
	initRotateBoxes();
	handlerPageNotFound();
	imageBeforeAfter();
} );

function fixLanguageSwitcherAlignment() {
	var _width = $( document ).width();
	var lsSubMenu = $( '#switcher-language-wrapper' ).find( '.wpml-ls-sub-menu' );

	if ( lsSubMenu.length > 0 ) {
		if ( lsSubMenu.offset().left + 200 >= _width ) {
			lsSubMenu.addClass( 'hover-back' );
		}
	}
}

function initOfficeSwitcher() {
	var $officeWrapper = $( '#top-bar-office-wrapper' );

	$officeWrapper.on( 'click', '.office-switcher a', function( evt ) {
		evt.preventDefault();
		evt.stopPropagation();

		if ( !$( this ).hasClass( 'current' ) ) {
			$officeWrapper.children( '.offices' ).children( '.office' ).hide();
			$officeWrapper.find( $( this ).attr( 'href' ) ).show();

			$( this ).parents( 'ul' ).first().find( 'a' ).removeClass( 'current' );
			$( this ).addClass( 'current' );
			$officeWrapper.children( '.office-switcher' )
			              .find( '.active' )
			              .children( 'span' )
			              .text( $( this ).text() );
		}

		$( this ).parents( 'ul' ).first().removeClass( 'open' );
	} );
}

function initTopbarNotice() {
	var $topbarNotice = $( '#top-bar-notice' );

	$( '#topbar-remove' ).on( 'click', function( e ) {
		e.preventDefault();
		$topbarNotice.slideUp();
	} );
}

function initLightGalleryPopups() {
	$( '.tm-light-gallery' ).each( function() {
		insightInitLightGallery( $( this ) );
	} );
}

function imageBeforeAfter() {
	if ( $( '.tm-before-after-image' ).length ) {
		$( '.tm-before-after-image' ).twentytwenty();
	}
}

function initRotateBoxes() {
	$( '.tm-rotate-box' ).each( function() {
		var $el = $( this );
		var maxHeight = 0;

		$el.find( '.content-wrap' ).each( function() {
			maxHeight = Math.max( maxHeight, $( this ).outerHeight() );
		} );

		$el.find( '.box' ).height( maxHeight );
	} );
}

function initVideoPopups() {
	$( '.tm-popup-video' ).each( function() {
		var options = {
			selector: 'a',
			fullScreen: false,
			zoom: false
		};
		$( this ).lightGallery( options );
	} );
}

function initLazyLoadImages() {
	if ( $insight.lazyLoadImages != 1 ) {
		return;
	}

	var myLazyLoad = new LazyLoad( {
		elements_selector: '.tm-lazy-load'
	} );
}

function marqueBackground() {
	$( '.background-marque' ).each( function() {
		var $el = $( this );
		var x = 0;
		var step = 1;
		var speed = 10;

		if ( $el.hasClass( 'to-left' ) ) {
			step = - 1;
		}

		$el.css( 'background-repeat', 'repeat-x' );

		var loop = setInterval( function() {
			x += step;
			$el.css( 'background-position-x', x + 'px' );
		}, speed );

		if ( $el.data( 'marque-pause-on-hover' ) == true ) {
			$( this ).on( 'hover', function() {
				clearInterval( loop );
			}, function() {
				loop = setInterval( function() {
					x += step;
					$el.css( 'background-position-x', x + 'px' );
				}, speed );
			} );
		}
	} );
}

function initSmoothScrollLinks() {
	// Allows for easy implementation of smooth scrolling for buttons
	$( '.smooth-scroll-link' ).on( 'click', function( e ) {
		var href = $( this ).attr( 'href' );

		if ( !href ) {
			href = $( this ).data( 'href' );
		}

		var _wWidth = window.innerWidth;
		if ( href.match( /^([.#])(.+)/ ) ) {
			e.preventDefault();
			var offset = 0;
			if ( $insight.header_sticky_enable == 1 && $pageHeader.length > 0 && $headerInner.data( 'sticky' ) == '1' ) {

				if ( $headerInner.data( 'header-position' ) === 'left' ) {
					if ( _wWidth < $insight.mobile_menu_breakpoint ) {
						offset += headerStickyHeight;
					}
				} else {
					offset += headerStickyHeight;
				}
			}

			// Add offset of admin bar when viewport min-width 600.
			if ( _wWidth > 600 ) {
				var adminBarHeight = $( '#wpadminbar' ).height();
				offset += adminBarHeight;
			}

			$.smoothScroll( {
				offset: - offset,
				scrollTarget: $( href ),
				speed: 600,
				easing: 'linear'
			} );
		}
	} );
}

function initAnimationForElements() {
	if ( !$body.hasClass( 'page-has-animation' ) ) {
		return;
	}

	var $animations = $pageContent.find( '.tm-animation' );

	$animations.vcwaypoint( function() {
		// Fix for different ver of waypoints plugin.
		var _self = this.element ? this.element : $( this );
		$( _self ).addClass( 'animate' );
	}, {
		offset: '100%' // triggerOnce: true
	} );
}

function initQueueAnimationForElements() {
	if ( !$body.hasClass( 'page-has-animation' ) ) {
		return;
	}

	$( '.tm-animation-queue' ).each( function() {
		var itemQueue  = [],
		    queueTimer,
		    queueDelay = $( this ).data( 'animation-delay' ) ? $( this ).data( 'animation-delay' ) : animateQueueDelay;

		$( this ).children( '.item' ).vcwaypoint( function() {
			// Fix for different ver of waypoints plugin.
			var _self = this.element ? this.element : $( this );
			itemQueue.push( _self );
			processItemQueue( itemQueue, queueDelay, queueTimer );
			queueDelay += animateQueueDelay;
		}, {
			offset: '90%',
			triggerOnce: true
		} );
	} );
}

function processItemQueue( itemQueue, queueDelay, queueTimer, queueResetDelay ) {
	clearTimeout( queueResetDelay );
	queueTimer = window.setInterval( function() {
		if ( itemQueue !== undefined && itemQueue.length ) {
			$( itemQueue.shift() ).addClass( 'animate' );
			processItemQueue();
		} else {
			window.clearInterval( queueTimer );
		}
	}, queueDelay );
}

function insightInitSmartmenu() {
	var $primaryMenu = $pageHeader.find( '#page-navigation' ).find( 'ul' ).first();

	if ( !$primaryMenu.hasClass( 'sm' ) ) {
		return;
	}

	$primaryMenu.smartmenus( {
		hideTimeout: 0,
		subMenusSubOffsetX: - 2,
		subMenusSubOffsetY: - 17,
		hideOnClick: false
	} );

	$primaryMenu.on( 'click', '.vc_tta-tab a', function( e ) {
		e.preventDefault();
		e.stopPropagation();
		var _this = jQuery( this );
		var _this_id = _this.attr( 'href' ).replace( '#', '' );
		_this.closest( '.vc_tta-tabs-container' ).find( '.vc_tta-tab ' ).removeClass( 'vc_active' );
		_this.closest( '.vc_tta-tab' ).addClass( 'vc_active' );
		_this.closest( '.vc_tta' ).find( '.vc_tta-panel' ).removeClass( 'vc_active' );
		_this.closest( '.vc_tta' ).find( '.vc_tta-panel[id="' + _this_id + '"]' ).addClass( 'vc_active' );
	} );

	// Add animation for sub menu.
	$primaryMenu.on( {
		'show.smapi': function( e, menu ) {
			$( menu ).removeClass( 'hide-animation' ).addClass( 'show-animation' );
		},
		'hide.smapi': function( e, menu ) {
			$( menu ).removeClass( 'show-animation' ).addClass( 'hide-animation' );
		}
	} ).on( 'animationend webkitAnimationEnd oanimationend MSAnimationEnd', 'ul', function( e ) {
		$( this ).removeClass( 'show-animation hide-animation' );
		e.stopPropagation();
	} );
}

function insightInitLightGallery( $gallery ) {
	var _download   = (
		    $insight.light_gallery_download === '1'
	    ),
	    _autoPlay   = (
		    $insight.light_gallery_auto_play === '1'
	    ),
	    _zoom       = (
		    $insight.light_gallery_zoom === '1'
	    ),
	    _fullScreen = (
		    $insight.light_gallery_full_screen === '1'
	    ),
	    _share      = (
		    $insight.light_gallery_share === '1'
	    ),
	    _thumbnail  = (
		    $insight.light_gallery_thumbnail === '1'
	    );

	var options = {
		selector: '.zoom',
		thumbnail: _thumbnail,
		download: _download,
		autoplay: _autoPlay,
		zoom: _zoom,
		share: _share,
		fullScreen: _fullScreen,
		hash: false,
		animateThumb: false,
		showThumbByDefault: false,
		getCaptionFromTitleOrAlt: false
	};

	$gallery.lightGallery( options );
}

function animateMagicLineOnScroll( $li, $magicLine, onScroll, id ) {
	if ( onScroll == false ) {
		$li.each( function() {
			var link = $( this ).children( 'a[href*="#"]:not([href="#"])' );
			if ( link.attr( 'href' ) == id ) {

				if ( $magicLine ) {
					var left = $( this ).position().left + link.padding().left;
					var width = link.width();
					$magicLine.stop().animate( {
						left: left,
						width: width
					} );
					$magicLine
						.attr( 'data-left', left )
						.attr( 'data-width', width );
				}

				$( this ).siblings( 'li' ).removeClass( 'current-menu-item' );
				$( this ).addClass( 'current-menu-item' );

				return true;
			}
		} );
	}
}

function navOnePage() {
	if ( !$body.hasClass( 'one-page' ) ) {
		return;
	}
	var $header = $( '#page-header' );
	var $headerInner = $header.children( '#page-header-inner' );
	var isMagicLine = $headerInner.data( 'magic-line' );
	var $el,
	    newWidth,
	    $mainNav = $( '#page-navigation' ).find( '.menu__container' ).first();
	var $li = $mainNav.children( '.menu-item' );
	var $links = $li.children( 'a[href^="#"]:not([href="#"])' );
	var onScroll = false;
	var $magicLine;

	if ( isMagicLine ) {
		$mainNav.append( '<li id="magic-line"></li>' );
		$magicLine = $( '#magic-line' );
	}

	$li.each( function() {
		var link = $( this ).children( 'a[href^="#"]:not([href="#"])' );

		if ( link.length > 0 ) {
			var id = link.attr( 'href' );
			if ( $( id ).length > 0 ) {
				$( id ).vcwaypoint( function( direction ) {
					if ( direction === 'down' ) {
						animateMagicLineOnScroll( $li, $magicLine, onScroll, id );
					}
				}, {
					offset: '25%'
				} );

				$( id ).vcwaypoint( function( direction ) {
					if ( direction === 'up' ) {
						animateMagicLineOnScroll( $li, $magicLine, onScroll, id );
					}
				}, {
					offset: '-25%'
				} );
			}
		}
	} );

	if ( $magicLine ) {
		$li.hover( function() {
			$el = $( this );

			var link = $el.children( 'a' );
			var left = $( this ).position().left + link.padding().left;
			newWidth = $el.children( 'a' ).width();
			$magicLine.stop().animate( {
				left: left,
				width: newWidth
			} );
		}, function() {
			if ( !$( this ).hasClass( 'current-menu-item' ) ) {
				$magicLine.stop().animate( {
					left: $magicLine.attr( 'data-left' ),
					width: $magicLine.attr( 'data-width' )
				} );
			}
		} );
	}

	// Allows for easy implementation of smooth scrolling for navigation links.
	$links.on( 'click', function() {
		var $this = $( this );
		var href = $( this ).attr( 'href' );
		var offset = 0;

		if ( $body.hasClass( 'admin-bar' ) ) {
			offset += 32;
		}

		if ( headerStickyEnable == 1 && $headerInner.data( 'sticky' ) == '1' ) {
			offset += headerStickyHeight;
			offset = - offset;
		}

		var parent = $this.parent( 'li' );

		if ( $magicLine ) {
			var left = parent.position().left + $this.padding().left;
			$magicLine.attr( 'data-left', left )
			          .attr( 'data-width', $this.width() );
		}

		parent.siblings( 'li' ).removeClass( 'current-menu-item' );
		parent.addClass( 'current-menu-item' );

		$.smoothScroll( {
			offset: offset,
			scrollTarget: $( href ),
			speed: 400,
			easing: 'linear',
			beforeScroll: function() {
				onScroll = true;
			},
			afterScroll: function() {
				onScroll = false;
			}
		} );
		return false;
	} );
}

function initFooterParallax() {
	var footerWrap = $( '#page-footer-wrapper' );

	if ( !footerWrap.hasClass( 'parallax' ) || $body.hasClass( 'page-template-one-page-scroll' ) ) {
		return;
	}

	if ( footerWrap.length > 0 ) {
		var contentWrap = $pageWrapper.children( '.content-wrapper' );
		if ( wWidth >= 1024 ) {
			var fwHeight = footerWrap.height();
			$body.addClass( 'page-footer-parallax' );
			contentWrap.css( {
				marginBottom: fwHeight
			} );
		} else {
			$body.removeClass( 'page-footer-parallax' );
			contentWrap.css( {
				marginBottom: 0
			} );
		}
	}
}

function scrollToTop() {
	if ( $insight.scroll_top_enable != 1 ) {
		return;
	}
	var $scrollUp = $( '#page-scroll-up' );
	var lastScrollTop = 0;
	var autoHide;

	$window.scroll( function() {
		clearTimeout( autoHide );

		var st = $( this ).scrollTop();
		if ( st > lastScrollTop ) {
			$scrollUp.removeClass( 'show' );
		} else {
			if ( $window.scrollTop() > 200 ) {
				$scrollUp.addClass( 'show' );

				autoHide = setTimeout( function() {
					$scrollUp.removeClass( 'show' );
				}, 6000 );
			} else {
				$scrollUp.removeClass( 'show' );
			}
		}
		lastScrollTop = st;
	} );

	$scrollUp.on( 'click', function( evt ) {
		$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
		evt.preventDefault();
	} );
}

function openMobileMenu() {
	$body.addClass( 'page-mobile-menu-opened' );

	$( document ).trigger( 'mobileMenuOpen' );
}

function closeMobileMenu() {
	$body.removeClass( 'page-mobile-menu-opened' );

	$( document ).trigger( 'mobileMenuClose' );
}

function calMobileMenuBreakpoint() {
	var _breakpoint = $insight.mobile_menu_breakpoint;
	if ( wWidth <= _breakpoint ) {
		$body.removeClass( 'desktop-menu' ).addClass( 'mobile-menu' );
	} else {
		$body.addClass( 'desktop-menu' ).removeClass( 'mobile-menu' );
	}
}

function initMobileMenu() {
	$( '#page-open-mobile-menu' ).on( 'click', function( e ) {
		e.preventDefault();
		openMobileMenu();
	} );

	$( '#page-close-mobile-menu' ).on( 'click', function( e ) {
		e.preventDefault();
		closeMobileMenu();
	} );

	$( document ).on( 'mobileMenuOpen', function() {
		$html.css( {
			'overflow': 'hidden'
		} );
	} );

	$( document ).on( 'mobileMenuClose', function() {
		$html.css( {
			'overflow': ''
		} );
	} );

	var menu = $( '#mobile-menu-primary' );

	menu.on( 'click', 'a', function( e ) {
		var $this = $( this );
		var _li = $( this ).parent( 'li' );
		var href = $this.attr( 'href' );

		if ( $body.hasClass( 'one-page' ) && href && href.match( /^([.#])(.+)/ ) ) {
			closeMobileMenu();
			var offset = 0;

			if ( $body.hasClass( 'admin-bar' ) ) {
				offset += 32;
			}

			if ( headerStickyEnable == 1 && $headerInner.data( 'sticky' ) == '1' ) {
				offset += headerStickyHeight;
			}

			if ( offset > 0 ) {
				offset = - offset;
			}

			_li.siblings( 'li' ).removeClass( 'current-menu-item' );
			_li.addClass( 'current-menu-item' );

			setTimeout( function() {
				$.smoothScroll( {
					offset: offset,
					scrollTarget: $( href ),
					speed: 600,
					easing: 'linear'
				} );
			}, 300 );

			return false;
		}
	} );

	menu.on( 'click', '.toggle-sub-menu', function( e ) {
		var _li = $( this ).parents( 'li' ).first();

		e.preventDefault();
		e.stopPropagation();

		var _friends = _li.siblings( '.opened' );
		_friends.removeClass( 'opened' );
		_friends.find( '.opened' ).removeClass( 'opened' );
		_friends.find( '.sub-menu' ).stop().slideUp();

		if ( _li.hasClass( 'opened' ) ) {
			_li.removeClass( 'opened' );
			_li.find( '.opened' ).removeClass( 'opened' );
			_li.find( '.sub-menu' ).stop().slideUp();
		} else {
			_li.addClass( 'opened' );
			_li.children( '.sub-menu' ).stop().slideDown();
		}
	} );
}

function initOffCanvasSidebar() {
	'use strict';

	$( '#page-open-canvas-sidebar' ).on( 'click', function( e ) {
		e.preventDefault();
		$body.addClass( 'page-off-canvas-sidebar-opened' );
	} );

	$( '#page-close-canvas-sidebar' ).on( 'click', function( e ) {
		e.preventDefault();
		$body.removeClass( 'page-off-canvas-sidebar-opened' );
	} );
}

function initOffCanvasMenu() {
	$( '#page-open-main-menu' ).on( 'click', function( e ) {
		e.preventDefault();

		$body.addClass( 'page-off-canvas-menu-opened' );
	} );

	$( '#page-close-main-menu' ).on( 'click', function( e ) {
		e.preventDefault();

		$body.removeClass( 'page-off-canvas-menu-opened' );
	} );
}

function initHeaderRightMoreTools() {
	$( '#header-right-more' ).on( 'click', function() {
		$body.toggleClass( 'header-more-tools-opened' );
	} );


	$( document ).on( 'click', function( evt ) {
		if ( evt.target.id === 'page-header-inner' ) {
			return;
		}

		if ( $( evt.target ).closest( '#page-header-inner' ).length ) {
			return;
		}

		$body.removeClass( 'header-more-tools-opened' );
	} );
}

function initStickyHeader() {
	if ( $insight.header_sticky_enable == 1 && $pageHeader.length > 0 && $headerInner.data( 'sticky' ) == '1' ) {
		if ( $headerInner.data( 'header-position' ) != 'left' ) {
			var _hOffset = $headerInner.offset().top;
			var _hHeight = $headerInner.outerHeight();
			var offset = _hOffset + _hHeight;

			$pageHeader.headroom( {
				offset: offset,
				onTop: function() {
					if ( !$pageHeader.hasClass( 'header-layout-fixed' ) ) {
						$pageWrapper.css( {
							paddingTop: 0
						} );
					}
				},
				onNotTop: function() {
					if ( !$pageHeader.hasClass( 'header-layout-fixed' ) ) {
						$pageWrapper.css( {
							paddingTop: _hHeight + 'px'
						} );
					}
				}
			} );
		} else {
			if ( wWidth <= $insight.mobile_menu_breakpoint ) {
				if ( !$pageHeader.data( 'headroom' ) ) {
					var _hOffset = $headerInner.offset().top;
					var _hHeight = $headerInner.outerHeight();
					var offset = _hOffset + _hHeight;

					$pageHeader.headroom( {
						offset: offset
					} );
				}
			} else {
				if ( $pageHeader.data( 'headroom' ) ) {
					$pageHeader.data( 'headroom' ).destroy();
					$pageHeader.removeData( 'headroom' );
				}
			}
		}
	}
}

function openSearchPopup() {
	$body.addClass( 'page-search-popup-opened' );

	$html.css( {
		'overflow': 'hidden'
	} );

	var popupSearch = $( '#page-search-popup' );
	var searchField = popupSearch.find( '.search-field' );

	setTimeout( function() {
		searchField.focus();
	}, 500 );
}

function closeSearchPopup() {
	$body.removeClass( 'page-search-popup-opened' );

	$html.css( {
		'overflow': ''
	} );
}

function initSearchPopup() {
	$( '#btn-open-popup-search' ).on( 'click', function( e ) {
		e.preventDefault();
		openSearchPopup();
	} );

	$( '#search-popup-close' ).on( 'click', function( e ) {
		e.preventDefault();
		closeSearchPopup();
	} );

	var popupSearch = $( '#page-search-popup' );

	popupSearch.on( 'click', function( e ) {
		if ( e.target !== this ) {
			return;
		}

		closeSearchPopup();
	} );
}

function calculateLeftHeaderSize() {
	if ( $headerInner.data( 'header-position' ) != 'left' ) {
		return;
	}

	var _wWidth = window.innerWidth;
	var _containerWidth = parseInt( $body.data( 'site-width' ) );
	var $footer = $( '#page-footer-wrapper' );

	if ( _wWidth <= $insight.mobile_menu_breakpoint ) {
		$html.css( {
			marginLeft: 0
		} );

		if ( $footer.hasClass( 'parallax' ) || $footer.hasClass( 'fixed' ) || $footer.hasClass( 'overlay' ) ) {
			$footer.css( {
				left: 0
			} );
		}
	} else {
		var headerWidth = $headerInner.outerWidth();

		if ( $insight.isRTL ) {
			$html.css( {
				marginRight: headerWidth + 'px'
			} );
		} else {
			$html.css( {
				marginLeft: headerWidth + 'px'
			} );
		}

		if ( $footer.hasClass( 'parallax' ) || $footer.hasClass( 'fixed' ) || $footer.hasClass( 'overlay' ) ) {
			if ( $insight.isRTL ) {
				$footer.css( {
					right: headerWidth + 'px'
				} );
			} else {
				$footer.css( {
					left: headerWidth + 'px'
				} );
			}
		}

		var rows = $( '#page-main-content' ).find( '.vc_row, .vc_section' );
		var footerRows = $footer.find( '.page-footer-inner' ).first().find( '.vc_row, .vc_section' );
		rows = rows.add( footerRows );

		var $contentWidth = $( '#page' ).width();
		rows.each( function() {
			if ( $( this ).attr( 'data-vc-full-width' ) ) {
				var left = 0;

				if ( $contentWidth > $insight.mobile_menu_breakpoint ) {
					left = - (
						(
							$contentWidth - _containerWidth
						) / 2
					) + 'px';
				}

				var width = $contentWidth + 'px';
				$( this ).css( {
					width: width
				} );

				if ( $insight.isRTL ) {
					$( this ).css( {
						right: left,
						left: 'auto'
					} );
				} else {
					$( this ).css( {
						left: left
					} );
				}

				var stretch = $( this ).attr( 'data-vc-stretch-content' );
				if ( typeof stretch === typeof undefined || stretch === false ) {
					var _padding = 0;
					if ( $contentWidth > $insight.mobile_menu_breakpoint ) {
						_padding = (
							(
								$contentWidth - _containerWidth
							) / 2
						);
					}
					$( this ).css( {
						paddingLeft: _padding,
						paddingRight: _padding
					} );
				}
			}
		} );
	}
}

function boxedFixVcRow() {
	if ( !$body.hasClass( 'boxed' ) ) {
		return;
	}

	if ( wWidth < 1200 ) {
		return;
	}

	var siteWidth    = $pageWrapper.outerWidth(),
	    contentWidth = $body.data( 'content-width' ),
	    space        = (
		                   siteWidth - contentWidth
	                   ) / 2;

	var breakpoint = Math.min( siteWidth, contentWidth );

	$pageWrapper.find( '[data-vc-full-width=true]' ).each( function() {
		$( this ).css( {
			left: - space,
			width: siteWidth + 'px'
		} );

		if ( $( this ).data( 'vc-stretch-content' ) != true ) {
			$( this ).css( {
				paddingLeft: space,
				paddingRight: space
			} );
		}
	} );
}

function handlerPageNotFound() {
	if ( !$body.hasClass( 'error404' ) ) {
		return;
	}

	$( '#tm-btn-go-back' ).on( 'click', function() {
		window.history.back();
	} );
}

function handlerTestimonials() {
	$( '.tm-testimonial' ).each( function() {
		var $slider = $( this );

		if ( !$slider.hasClass( 'style-4' ) ) {
			return;
		}

		var $sliderContainer = $slider.children( '.swiper-container' ).first();
		var lgItems = $slider.data( 'lg-items' ) ? $slider.data( 'lg-items' ) : 1;
		var mdItems = $slider.data( 'md-items' ) ? $slider.data( 'md-items' ) : lgItems;
		var smItems = $slider.data( 'sm-items' ) ? $slider.data( 'sm-items' ) : mdItems;
		var xsItems = $slider.data( 'xs-items' ) ? $slider.data( 'xs-items' ) : smItems;

		var lgGutter = $slider.data( 'lg-gutter' ) ? $slider.data( 'lg-gutter' ) : 0;
		var mdGutter = $slider.data( 'md-gutter' ) ? $slider.data( 'md-gutter' ) : lgGutter;
		var smGutter = $slider.data( 'sm-gutter' ) ? $slider.data( 'sm-gutter' ) : mdGutter;
		var xsGutter = $slider.data( 'xs-gutter' ) ? $slider.data( 'xs-gutter' ) : smGutter;

		var autoPlay = $slider.data( 'autoplay' );
		var speed = $slider.data( 'speed' ) ? $slider.data( 'speed' ) : 1000;
		var nav = $slider.data( 'nav' );
		var pagination = $slider.data( 'pagination' );
		var paginationType = $slider.data( 'pagination-type' ) ? $slider.data( 'pagination-type' ) : 'bullets';

		var options = {
			loop: true,
			slidesPerView: lgItems,
			spaceBetween: lgGutter,
			breakpoints: {
				// when window width is <=
				767: {
					slidesPerView: xsItems,
					spaceBetween: xsGutter
				},
				990: {
					slidesPerView: smItems,
					spaceBetween: smGutter
				},
				1199: {
					slidesPerView: mdItems,
					spaceBetween: mdGutter
				}
			}
		};

		if ( speed ) {
			options.speed = speed;
		}

		if ( autoPlay ) {
			options.autoplay = {
				delay: autoPlay,
				disableOnInteraction: false
			};
		}

		if ( nav ) {
			var $swiperPrev = $( '<div class="swiper-nav-button swiper-button-prev"><i class="nav-button-icon"></i></div>' );
			var $swiperNext = $( '<div class="swiper-nav-button swiper-button-next"><i class="nav-button-icon"></i></div>' );

			$slider.append( $swiperPrev ).append( $swiperNext );

			options.navigation = {
				nextEl: $swiperNext,
				prevEl: $swiperPrev,
			};
		}

		if ( pagination ) {
			var $swiperPagination = $( '<div class="swiper-pagination"></div>' );
			$slider.addClass( 'has-pagination' );

			$slider.append( $swiperPagination );

			options.pagination = {
				el: $swiperPagination,
				clickable: true,
				type: paginationType
			};
		}

		var $swiper = new Swiper( $sliderContainer, options );

		var $testimonial_thumbs_container = $slider.children( '.tm-testimonial-pagination' )
		                                           .children( '.swiper-container' )
		                                           .first();

		var $swiperThumbs = new Swiper( $testimonial_thumbs_container, {
			slidesPerView: 3,
			spaceBetween: 30,
			centeredSlides: true,
			loop: true
		} );

		$swiper.on( 'slideChange', function() {
			var $_slides = $testimonial_thumbs_container.children( '.swiper-wrapper' )
			                                            .children( '.swiper-slide' );
			$_slides.each( function( i, o ) {

				if ( $( this ).hasClass( 'swiper-slide-duplicate' ) ) {
					return true;
				}

				if ( $( this ).data( 'swiper-slide-index' ) === $swiper.realIndex ) {
					$swiperThumbs.slideTo( i );
				}
			} );
		} );

		$swiperThumbs.on( 'slideChange', function() {
			var $_slides = $sliderContainer.children( '.swiper-wrapper' ).children( '.swiper-slide' );
			$_slides.each( function( i, o ) {

				if ( $( this ).hasClass( 'swiper-slide-duplicate' ) ) {
					return true;
				}

				if ( $( this ).data( 'swiper-slide-index' ) === $swiperThumbs.realIndex ) {
					$swiper.slideTo( i );
				}
			} );
		} );

		$swiperThumbs.on( 'click', function() {
			$swiperThumbs.slideTo( $swiperThumbs.clickedIndex );
		} );
	} );
}

function handlerServices() {
	$( '.tm-service' ).each( function() {
		var $slider = $( this );

		if ( !$slider.hasClass( 'style-carousel_07' ) ) {
			return;
		}

		var $sliderContainer = $slider.children( '.swiper-container' ).first();
		var lgItems = $slider.data( 'lg-items' ) ? $slider.data( 'lg-items' ) : 1;
		var mdItems = $slider.data( 'md-items' ) ? $slider.data( 'md-items' ) : lgItems;
		var smItems = $slider.data( 'sm-items' ) ? $slider.data( 'sm-items' ) : mdItems;
		var xsItems = $slider.data( 'xs-items' ) ? $slider.data( 'xs-items' ) : smItems;

		var lgGutter = $slider.data( 'lg-gutter' ) ? $slider.data( 'lg-gutter' ) : 0;
		var mdGutter = $slider.data( 'md-gutter' ) ? $slider.data( 'md-gutter' ) : lgGutter;
		var smGutter = $slider.data( 'sm-gutter' ) ? $slider.data( 'sm-gutter' ) : mdGutter;
		var xsGutter = $slider.data( 'xs-gutter' ) ? $slider.data( 'xs-gutter' ) : smGutter;

		var autoPlay = $slider.data( 'autoplay' );
		var speed = $slider.data( 'speed' ) ? $slider.data( 'speed' ) : 1000;
		var nav = $slider.data( 'nav' );
		var pagination = $slider.data( 'pagination' );
		var paginationType = $slider.data( 'pagination-type' ) ? $slider.data( 'pagination-type' ) : 'bullets';

		var options = {
			loop: true,
			slidesPerView: lgItems,
			spaceBetween: lgGutter,
			breakpoints: {
				// when window width is <=
				767: {
					slidesPerView: xsItems,
					spaceBetween: xsGutter
				},
				990: {
					slidesPerView: smItems,
					spaceBetween: smGutter
				},
				1199: {
					slidesPerView: mdItems,
					spaceBetween: mdGutter
				}
			}
		};

		if ( speed ) {
			options.speed = speed;
		}

		if ( autoPlay ) {
			options.autoplay = {
				delay: autoPlay,
				disableOnInteraction: false
			};
		}

		if ( nav ) {
			var $swiperPrev = $( '<div class="swiper-nav-button swiper-button-prev"><i class="nav-button-icon"></i></div>' );
			var $swiperNext = $( '<div class="swiper-nav-button swiper-button-next"><i class="nav-button-icon"></i></div>' );

			$slider.append( $swiperPrev ).append( $swiperNext );

			options.navigation = {
				nextEl: $swiperNext,
				prevEl: $swiperPrev,
			};
		}

		if ( pagination ) {
			var $swiperPagination = $( '<div class="swiper-pagination"></div>' );
			$slider.addClass( 'has-pagination' );

			$slider.append( $swiperPagination );

			options.pagination = {
				el: $swiperPagination,
				clickable: true,
				type: paginationType
			};
		}

		var $swiper = new Swiper( $sliderContainer, options );
		var $swiperNavPrev = $( '<div class="swiper-nav-button swiper-button-prev"><i class="nav-button-icon"></i></div>' );
		var $swiperNavNext = $( '<div class="swiper-nav-button swiper-button-next"><i class="nav-button-icon"></i></div>' );
		var $service_nav_container = $slider.children( '.tm-service-pagination' )
		                                    .children( '.swiper-container' )
		                                    .first();
		$slider.children( '.tm-service-pagination' ).append( $swiperNavPrev ).append( $swiperNavNext );
		var $swiperThumbs = new Swiper( $service_nav_container, {
			slidesPerView: 5,
			spaceBetween: 0,
			centeredSlides: true,
			loop: true,
			watchSlidesProgress: true,
			watchSlidesVisibility: true,
			navigation: {
				nextEl: $swiperNavNext,
				prevEl: $swiperNavPrev,
			},
			breakpoints: {
				// when window width is <=
				767: {
					slidesPerView: 1
				},
				990: {
					slidesPerView: 2
				},
				1199: {
					slidesPerView: 3
				}
			}
		} );

		$swiper.on( 'slideChange', function() {
			var $_slides = $service_nav_container.children( '.swiper-wrapper' )
			                                     .children( '.swiper-slide' );
			$_slides.each( function( i, o ) {

				if ( $( this ).hasClass( 'swiper-slide-duplicate' ) ) {
					return true;
				}

				if ( $( this ).data( 'swiper-slide-index' ) === $swiper.realIndex ) {
					$swiperThumbs.slideTo( i );
				}
			} );
		} );

		$swiperThumbs.on( 'slideChange', function() {
			var $_slides = $sliderContainer.children( '.swiper-wrapper' ).children( '.swiper-slide' );
			$_slides.each( function( i, o ) {

				if ( $( this ).hasClass( 'swiper-slide-duplicate' ) ) {
					return true;
				}

				if ( $( this ).data( 'swiper-slide-index' ) === $swiperThumbs.realIndex ) {
					$swiper.slideTo( i );
				}
			} );
		} );

		$swiperThumbs.on( 'click', function() {
			$swiperThumbs.slideTo( $swiperThumbs.clickedIndex );
		} );
	} );
}
