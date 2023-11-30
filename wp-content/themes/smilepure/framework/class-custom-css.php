<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue custom styles.
 */
if ( ! class_exists( 'Smilepure_Custom_Css' ) ) {
	class Smilepure_Custom_Css {

		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'extra_css' ) );
		}

		/**
		 * Responsive styles.
		 *
		 * @access public
		 */
		public function extra_css() {
			$px = 'px';

			// Responsive H1 font-size
			$heading_font_sensitive  = Smilepure::setting( 'heading_font_sensitive' );
			$h1_font_size_max        = Smilepure::setting( 'h1_font_size' );
			$h1_font_size_min        = $h1_font_size_max * $heading_font_sensitive;
			$h1_font_size_responsive = "calc($h1_font_size_min$px + ($h1_font_size_max - $h1_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H2 font-size
			$h2_font_size_max        = Smilepure::setting( 'h2_font_size' );
			$h2_font_size_min        = $h2_font_size_max * $heading_font_sensitive;
			$h2_font_size_responsive = "calc($h2_font_size_min$px + ($h2_font_size_max - $h2_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H3 font-size
			$h3_font_size_max        = Smilepure::setting( 'h3_font_size' );
			$h3_font_size_min        = $h3_font_size_max * $heading_font_sensitive;
			$h3_font_size_responsive = "calc($h3_font_size_min$px + ($h3_font_size_max - $h3_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H4 font-size
			$h4_font_size_max        = Smilepure::setting( 'h4_font_size' );
			$h4_font_size_min        = $h4_font_size_max * $heading_font_sensitive;
			$h4_font_size_responsive = "calc($h4_font_size_min$px + ($h4_font_size_max - $h4_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H5 font-size
			$h5_font_size_max        = Smilepure::setting( 'h5_font_size' );
			$h5_font_size_min        = $h5_font_size_max * $heading_font_sensitive;
			$h5_font_size_responsive = "calc($h5_font_size_min$px + ($h5_font_size_max - $h5_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H6 font-size
			$h6_font_size_max        = Smilepure::setting( 'h6_font_size' );
			$h6_font_size_min        = $h6_font_size_max * $heading_font_sensitive;
			$h6_font_size_responsive = "calc($h6_font_size_min$px + ($h6_font_size_max - $h6_font_size_min) * ((100vw - 554px) / 646))";

			$body_typo     = Smilepure::setting( 'typography_body' );
			$_primary_font = $body_typo['font-family'];

			$extra_style = "
				.primary-font, .tm-button, button, input, select, textarea{ font-family: $_primary_font }
				.primary-font-important { font-family: $_primary_font !important }
				h1,.h1{font-size: $h1_font_size_min$px}
				h2,.h2{font-size: $h2_font_size_min$px}
				h3,.h3{font-size: $h3_font_size_min$px}
				h4,.h4{font-size: $h4_font_size_min$px}
				h5,.h5{font-size: $h5_font_size_min$px}
				h6,.h6{font-size: $h6_font_size_min$px}

				@media (min-width: 544px) and (max-width: 1199px) {
					h1,.h1{font-size: $h1_font_size_responsive}
					h2,.h2{font-size: $h2_font_size_responsive}
					h3,.h3{font-size: $h3_font_size_responsive}
					h4,.h4{font-size: $h4_font_size_responsive}
					h5,.h5{font-size: $h5_font_size_responsive}
					h6,.h6{font-size: $h6_font_size_responsive}
				}
			";

			$custom_logo_width        = Smilepure_Helper::get_post_meta( 'custom_logo_width', '' );
			$custom_sticky_logo_width = Smilepure_Helper::get_post_meta( 'custom_sticky_logo_width', '' );

			if ( $custom_logo_width !== '' ) {
				$extra_style .= ".branding__logo img {
                    width: {$custom_logo_width} !important;
                }";
			}

			if ( $custom_sticky_logo_width !== '' ) {
				$extra_style .= ".headroom--not-top .branding__logo .sticky-logo {
                    width: {$custom_sticky_logo_width} !important;
                }";
			}

			$headerStickyHeight = Smilepure::setting( 'header_sticky_height' );
			$stickyPadding      = $headerStickyHeight + 30;
			if ( is_admin_bar_showing() ) {
				$stickyPadding += 32;
			}

			$extra_style .= ".tm-sticky-kit.is_stuck {
				padding-top: {$stickyPadding}px;
			}";


			$site_width = Smilepure_Helper::get_post_meta( 'site_width', '' );
			if ( $site_width === '' ) {
				$site_width = Smilepure::setting( 'site_width' );
			}

			if ( $site_width !== '' ) {
				$extra_style .= "
				.boxed
				{
	                max-width: $site_width;
	            }";
			}

			$tmp = '';

			$site_background_color = Smilepure_Helper::get_post_meta( 'site_background_color', '' );
			if ( $site_background_color !== '' ) {
				$tmp .= "background-color: $site_background_color !important;";
			}

			$site_background_image = Smilepure_Helper::get_post_meta( 'site_background_image', '' );
			if ( $site_background_image !== '' ) {
				$site_background_repeat = Smilepure_Helper::get_post_meta( 'site_background_repeat', '' );
				$tmp                    .= "background-image: url( $site_background_image ) !important; background-repeat: $site_background_repeat !important;";
			}

			$site_background_position = Smilepure_Helper::get_post_meta( 'site_background_position', '' );
			if ( $site_background_position !== '' ) {
				$tmp .= "background-position: $site_background_position !important;";
			}

			$site_background_size = Smilepure_Helper::get_post_meta( 'site_background_size', '' );
			if ( $site_background_size !== '' ) {
				$tmp .= "background-size: $site_background_size !important;";
			}

			$site_background_attachment = Smilepure_Helper::get_post_meta( 'site_background_attachment', '' );
			if ( $site_background_attachment !== '' ) {
				$tmp .= "background-attachment: $site_background_attachment !important;";
			}

			if ( $tmp !== '' ) {
				$extra_style .= "body { $tmp; }";
			}

			$tmp = '';

			$content_background_color = Smilepure_Helper::get_post_meta( 'content_background_color', '' );
			if ( $content_background_color !== '' ) {
				$tmp .= "background-color: $content_background_color !important;";
			}

			$content_background_image = Smilepure_Helper::get_post_meta( 'content_background_image', '' );
			if ( $content_background_image !== '' ) {
				$content_background_repeat = Smilepure_Helper::get_post_meta( 'content_background_repeat', '' );
				$tmp                       .= "background-image: url( $content_background_image ) !important; background-repeat: $content_background_repeat !important;";
			}

			$content_background_position = Smilepure_Helper::get_post_meta( 'content_background_position', '' );
			if ( $content_background_position !== '' ) {
				$tmp .= "background-position: $content_background_position !important;";
			}

			if ( $tmp !== '' ) {
				$extra_style .= ".site { $tmp; }";
			}

			$tmp = '';

			$content_padding = Smilepure_Helper::get_post_meta( 'content_padding' );
			if ( $content_padding === '0' ) {
				$tmp .= 'padding-top: 0 !important;';
				$tmp .= 'padding-bottom: 0 !important;';
			} elseif ( $content_padding === 'top' ) {
				$tmp .= 'padding-top: 0 !important;';
			} elseif ( $content_padding === 'bottom' ) {
				$tmp .= 'padding-bottom: 0 !important;';
			}

			if ( $tmp !== '' ) {
				$extra_style .= ".page-content { $tmp; }";
			}

			$extra_style .= $this->primary_color_css();
			$extra_style .= $this->secondary_color_css();
			$extra_style .= $this->header_css();
			$extra_style .= $this->sidebar_css();
			$extra_style .= $this->title_bar_css();
			$extra_style .= $this->mobile_menu_css();
			$extra_style .= $this->light_gallery_css();

			wp_add_inline_style( 'smilepure-style', html_entity_decode( $extra_style, ENT_QUOTES ) );
		}

		function header_css() {
			$header_type = Smilepure_Global::instance()->get_header_type();
			$css         = '';

			$nav_bg_type = Smilepure::setting( "header_style_{$header_type}_navigation_background_type" );

			if ( $nav_bg_type === 'gradient' ) {

				$gradient = Smilepure::setting( "header_style_{$header_type}_navigation_background_gradient" );
				$_color_1 = $gradient['from'];
				$_color_2 = $gradient['to'];

				$css .= "
				.header-$header_type .header-below {
					background: {$_color_1};
                    background: -webkit-linear-gradient(-136deg, {$_color_2} 0%, {$_color_1} 100%);
                    background: linear-gradient(-136deg, {$_color_2} 0%, {$_color_1} 100%);
				}";
			}

			return $css;
		}

		function sidebar_css() {
			$css = '';

			$page_sidebar1  = Smilepure_Global::instance()->get_sidebar_1();
			$page_sidebar2  = Smilepure_Global::instance()->get_sidebar_2();
			$sidebar_status = Smilepure_Global::instance()->get_sidebar_status();

			if ( 'none' !== $page_sidebar1 ) {

				if ( $sidebar_status === 'both' ) {
					$sidebars_breakpoint = Smilepure::setting( 'both_sidebar_breakpoint' );
				} else {
					$sidebars_breakpoint = Smilepure::setting( 'one_sidebar_breakpoint' );
				}

				$sidebars_below = Smilepure::setting( 'sidebars_below_content_mobile' );

				if ( 'none' !== $page_sidebar2 ) {
					$sidebar_width  = Smilepure::setting( 'dual_sidebar_width' );
					$sidebar_offset = Smilepure::setting( 'dual_sidebar_offset' );
					$content_width  = 100 - $sidebar_width * 2;
				} else {
					$sidebar_width  = Smilepure_Global::instance()->get_single_sidebar_width();
					$sidebar_offset = Smilepure::setting( 'single_sidebar_offset' );
					$content_width  = 100 - $sidebar_width;
				}

				$css .= "
				@media (min-width: {$sidebars_breakpoint}px) {
					.page-sidebar {
						flex: 0 0 $sidebar_width%;
						max-width: $sidebar_width%;
					}
					.page-main-content {
						flex: 0 0 $content_width%;
						max-width: $content_width%;
					}
				}
				@media (min-width: 1200px) {
					.page-sidebar-left .page-sidebar-inner {
						padding-right: $sidebar_offset;
					}
					.page-sidebar-right .page-sidebar-inner {
						padding-left: $sidebar_offset;
					}
				}";

				$_max_width_breakpoint = $sidebars_breakpoint - 1;

				if ( $sidebars_below === '1' ) {
					$css .= "
					@media (max-width: {$_max_width_breakpoint}px) {

						.page-main-content {
							-webkit-order: -1;
							-moz-order: -1;
							order: -1;
						}
					}";
				}
			}

			return $css;
		}

		function title_bar_css() {
			$css = $title_bar_tmp = $overlay_tmp = '';

			$bg_color   = Smilepure_Helper::get_post_meta( 'page_title_bar_background_color', '' );
			$bg_image   = Smilepure_Helper::get_post_meta( 'page_title_bar_background', '' );
			$bg_overlay = Smilepure_Helper::get_post_meta( 'page_title_bar_background_overlay', '' );

			if ( $bg_color !== '' ) {
				$title_bar_tmp .= "background-color: {$bg_color}!important;";
			}

			if ( $bg_image !== '' ) {
				$title_bar_tmp .= "background-image: url({$bg_image})!important;";
			}

			if ( $bg_overlay !== '' ) {
				$overlay_tmp .= "background-color: {$bg_overlay}!important;";
			}

			if ( $title_bar_tmp !== '' ) {
				$css .= ".page-title-bar-inner{ {$title_bar_tmp} }";
			}

			if ( $overlay_tmp !== '' ) {
				$css .= ".page-title-bar-overlay{ {$overlay_tmp} }";
			}

			return $css;
		}

		function mobile_menu_css() {
			$css = '';

			$bg_type = Smilepure::setting( 'mobile_menu_bg_type' );

			if ( $bg_type === 'gradient' ) {

				$gradient = Smilepure::setting( "mobile_menu_bg_color_gradient" );
				$_color_1 = $gradient['from'];
				$_color_2 = $gradient['to'];

				$css .= "
				.page-mobile-main-menu {
					background: {$_color_1};
                    background: -webkit-linear-gradient(-45deg, {$_color_2}, {$_color_1});
                    background: linear-gradient(-45deg, {$_color_2}, {$_color_1});
				}";
			} else {
				$_color_1 = Smilepure::setting( 'mobile_menu_bg_color_1' );
				$css      .= ".page-mobile-main-menu {
                	background: {$_color_1};
                }";
			}

			return $css;
		}

		function primary_color_css() {
			$color     = Smilepure::setting( 'primary_color' );
			$secondary = Smilepure::setting( 'secondary_color' );
			$alpha90   = Smilepure_Color::hex2rgba( $color, '0.9' );
			$alpha80   = Smilepure_Color::hex2rgba( $color, '0.8' );
			$alpha70   = Smilepure_Color::hex2rgba( $color, '0.7' );
			$alpha40   = Smilepure_Color::hex2rgba( $color, '0.4' );
			$alpha33   = Smilepure_Color::hex2rgba( $color, '0.33' );
			$alpha13   = Smilepure_Color::hex2rgba( $color, '0.13' );
			$alpha29   = Smilepure_Color::hex2rgba( $color, '0.29' );
			$alpha18   = Smilepure_Color::hex2rgba( $color, '0.18' );
			$alpha12   = Smilepure_Color::hex2rgba( $color, '0.12' );
			$alpha8    = Smilepure_Color::hex2rgba( $color, '0.08' );
			$alpha6    = Smilepure_Color::hex2rgba( $color, '0.06' );

			// Color.
			$css = "
				.primary-color,
				.page-pagination li a:hover, .page-pagination li a:focus,
                .tm-accordion.style-1 .title-prefix,
                .tm-accordion.style-2 .title-prefix,
                .tm-accordion.style-3 .title-prefix,
                .tm-accordion.style-4 .accordion-title-wrapper:hover .accordion-title,
                .tm-accordion.style-4 .active .accordion-title,
                .tm-testimonial.style-2 .quote-icon,
                .tm-list.style-modern-icon-03 .marker,
                .tm-blog.style-03 .post-read-more a,
                .tm-service.style-04 .post-read-more .button-icon,
                .tm-office-info .info > div:before,
                .comments-title small a:hover, .comment-reply-title small a:hover,
                .tm-skill-box .title .icon,
                .post-sticky span,
                .page-off-canvas-sidebar .widget_pages a:hover, .page-off-canvas-sidebar .widget_nav_menu a:hover, .page-off-canvas-sidebar .insight-core-bmw a:hover,
                mark,
                .error404 .error-404-big-title,
                .page-close-mobile-menu:hover,
                .growl-close:hover,
                .tm-doctor.style-01 .post-item-wrap .social-networks a:hover,
                .single-post .post-meta > div + div:before,
                .tm-service.style-03 .post-read-more a,
                .tm-service-list .service-list-item:hover a, .tm-service-list .service-list-item:hover .icon,
                .tm-popup-video.style-button-06 a .video-text:after,
                .tm-button.style-flat.tm-button-grey .button-icon,
                .tm-button.style-outline.tm-button-grey .button-icon,
				.tm-button.style-outline.tm-button-primary,
				.tm-button.style-text.tm-button-primary,
				.tm-button.style-text_with_underline .button-icon i,
				.tm-box-icon .tm-button .button-icon,
				.tm-box-icon .icon,
				.tm-box-icon.style-2 .box-icon-list i,
				.tm-box-icon.style-6 .heading a:hover,
				.tm-box-icon.style-7 .icon span,
				.tm-contact-form-7 .form-icon,
				.tm-swiper.nav-style-3 .swiper-nav-button:hover,
				.tm-swiper.nav-style-4 .swiper-nav-button:hover,
				.tm-swiper.nav-style-5 .swiper-nav-button:hover,
				.tm-swiper.nav-style-6 .swiper-nav-button:hover,
				.tm-swiper.nav-style-7 .swiper-nav-button:hover,
				.tm-counter.style-01 .number-wrap,
				.tm-counter.style-02 .number-wrap,
				.tm-counter.style-03 .number-wrap,
				.tm-circle-progress-chart .chart-icon,
				.tm-maps.overlay-style-02 .middle-dot,
				.tm-product-banner-slider .tm-product-banner-btn,
				.tm-countdown.skin-dark .number,
				.tm-countdown.skin-dark .separator,
				.tm-slider-button.style-04 .slider-btn:hover,
				.tm-drop-cap.style-1 .drop-cap,
				.typed-text mark,
				.typed-text .typed-cursor,
				.tm-attribute-list.style-01 .icon,
				.tm-twitter.style-slider-quote .tweet-info:before,
				.tm-twitter.style-slider-quote .tweet-text a,
				.tm-twitter .tweet:before,
				.tm-heading.modern-with-separator .heading,
				.tm-button.style-border-text.tm-button-primary,
				.tm-button.style-border-text.tm-button-secondary .button-icon,
				.tm-info-boxes .box-icon,
				.tm-info-boxes .tm-button .button-icon,
				.tm-team-member .social-networks a:hover,
				.post-type-archive-ic_doctor .search-result.style-grid-01 .post-item-wrap .social-networks a:hover,
				 .tm-doctor.style-01 .post-item-wrap .social-networks a:hover,
				.tm-instagram .instagram-user-name,
				.nav-links .archive-link,
				.tm-service.style-01 .post-read-more .btn-icon,
				.tm-service-feature.style-01 .icon,
				.tm-service.style-05 .post-read-more a,
				.tm-service.style-06 .post-read-more a,
				.tm-service.style-06 .service-item:hover .post-icon i,
				.tm-service.style-07 .service-item:hover .post-icon i,
				.tm-box-icon.style-7:hover .icon span,
				.tm-category-feature.style-01 .icon,
				.tm-product.style-grid .woosw-btn.woosw-added,
				.tm-grid-wrapper .btn-filter:hover,
				.tm-grid-wrapper .btn-filter.current,
				.tm-pricing .feature-icon,
				.tm-pricing.style-2 .price-wrap-inner,
				.tm-pricing-rotate-box .tm-pricing-list li:before,
				.tm-service-pricing-menu .service-cost,
				.tm-list .marker,
				.tm-list .link:hover,
				.tm-list.style-modern-icon-04 .marker,
				.tm-accordion.style-3 .active .accordion-title .title-prefix,
				.tm-accordion.style-3 .accordion-title:hover .title-prefix,
				.tm-social-networks .link:hover,
				.woosw-popup .woosw-popup-inner .woosw-popup-content .woosw-popup-content-top .woosw-popup-close:hover,
				.woosw-popup .woosw-popup-inner .woosw-popup-content .woosw-popup-content-bot .woosw-popup-content-bot-inner .woosw-page:hover,
				.woosw-popup .woosw-popup-inner .woosw-popup-content .woosw-popup-content-bot .woosw-popup-content-bot-inner .woosw-continue:hover,
				.skin-primary .wpcf7-text.wpcf7-text, .skin-primary .wpcf7-textarea,
				.tm-menu .menu-price,
				.page-content .tm-custom-menu.style-1 .menu a:hover,
				.post-share a:hover,
				.post-share-toggle,
				.single-post .post-meta .sl-icon,
				.single-post .entry-banner .post-meta a:hover,
				.post-share .post-share-title:before,
				.single-post .post-tags span:before,
				.related-posts .related-post-title a:hover,
				.simple-footer .social-networks a:hover,
				.widget_recent_entries .post-date:before,
				.tm-testimonial.style-5 .swiper-custom-btn:hover,
				.tm-pricing.style-1.tm-pricing-featured .price,
				.header-17 .info-icon,
				.header-19 .info-icon,
				.page-sidebar-fixed .widget a:hover,
				.top-bar-office-wrapper .office-list a:hover,
				.menu--primary .menu-item-feature,
				.comment-nav-links li .current, .page-pagination li .current,
				.nav-links a:hover:after,
				.page-main-content .search-form .search-submit:hover .search-btn-icon,
				.widget_search .search-submit:hover .search-btn-icon, .widget_product_search .search-submit:hover .search-btn-icon,
				.tm-cta-box .info .link a,
				.widget_rss .rss-date:before,
				.single-mp-event .post-meta > div + div:before
				{
					color: {$color}
				}";

			// Color Important.
			$css .= "
                .primary-color-important,
				.primary-color-hover-important:hover
				 {
                      color: {$color}!important;
				 }";

			// Background Color.
			$css .= "
                .primary-background-color,
                .hint--primary:after,
                .page-scroll-up,
                .page-scroll-up:before,
                .comment-nav-links li .next:hover, .comment-nav-links li .prev:hover, .page-pagination li .next:hover, .page-pagination li .prev:hover,
                .widget_calendar #today,
                .tm-box-icon.style-7 .tm-box-icon__btn.tm-button-primary:before,
                .post-type-archive-ic_doctor .search-result.style-grid-03 .info,
                .tm-doctor.style-03 .info,
                .tm-view-demo.style-02 .thumbnail:before,
                .page-links > span,
                .page-off-canvas-sidebar .widget-title:after,
                .top-bar-01 .top-bar-button,
                .desktop-menu .header-09 .header-special-button,
                .tm-team-member.style-3 .info,
                .tm-service-list .service-list-item:after,
                .tm-gradation--with_image .count span,
                .tm-gradation--with_image .count span:before,
                .tm-gradation--with_image .count span:after,
                .tm-accordion.style-1 .accordion-title:before,
				.tm-maps.overlay-style-01 .animated-dot .middle-dot,
				.tm-maps.overlay-style-01 .animated-dot div[class*='signal'],
				.tm-heading.with-separator-2 .heading:after,
				.tm-button.style-border-text.tm-button-primary:after,
				.tm-team-member.style-2 .inner:before,
				.tm-popup-video.style-button-05 a .video-play,
				.tm-popup-video.style-button-05 a .video-text:before,
				.tm-popup-video.style-button-06 a .video-text:before,
				.tm-popup-video.style-button-06 a .video-play,
				.vc_tta.vc_general.vc_tta-style-smilepure-tour-01 .vc_tta-tabs-list .vc_tta-tab:hover, .vc_tta.vc_general.vc_tta-style-smilepure-tour-01 .vc_tta-tabs-list .vc_tta-tab.vc_active,
				.vc_tta.vc_general.vc_tta-style-smilepure-tour-02 .vc_tta-tabs-list .vc_tta-tab:hover, .vc_tta.vc_general.vc_tta-style-smilepure-tour-02 .vc_tta-tabs-list .vc_tta-tab.vc_active,
				.tm-gallery-slider .lSAction .lSPrev:hover .nav-button-icon:before, .tm-gallery-slider .lSAction .lSNext:hover .nav-button-icon:before,
				.tm-card.style-2 .icon:before,
				.tm-grid-wrapper .btn-filter:after,
				.tm-grid-wrapper .filter-counter,
				.tm-page-feature.style-01 .grid-item.current .post-item-wrap, .tm-page-feature.style-01 .grid-item:hover .post-item-wrap,
				.tm-service.style-02 .post-read-more a,
				.tm-service.style-02 .post-read-more a:before,
				.tm-service.style-02 .post-read-more a:after,
				.tm-service-feature.style-01 .current .post-item-wrap,
				.tm-service-feature.style-01 .grid-item:hover .post-item-wrap,
				.tm-category-feature.style-01 .current .cat-item-wrap,
				.tm-category-feature.style-01 .grid-item:hover .cat-item-wrap,
				.tm-drop-cap.style-2 .drop-cap,
				.tm-icon.style-01 .icon,
				.tm-box-icon.style-2 .content-wrap:after,
				.tm-contact-form-7.style-02 .wpcf7-submit,
				.tm-contact-form-7.style-03 .wpcf7-submit,
				.tm-card.style-1,
				.tm-list.style-modern-icon-02 .marker,
				.tm-rotate-box .box,
				.tm-blog.style-list .post-read-more a:after,
				.tm-social-networks.style-solid-rounded-icon .item:hover .link,
				.tm-social-networks.style-solid-rounded-icon-02 .item:hover .link,
				.tm-separator.style-thick-short-line .separator-wrap,
				.tm-button.style-modern.tm-button-grey:hover:after,
				.tm-button.style-flat.tm-button-primary,
				.tm-button.style-flat.tm-button-secondary:hover,
				.tm-button.style-flat.tm-button-grey:hover,
				.tm-button.style-outline.tm-button-primary:before,
				.tm-button.style-modern.tm-button-primary,
				.tm-button.style-modern.tm-button-secondary:after,
				.tm-callout-box.style-01,
				.tm-heading.thick-separator .separator:after,
				.tm-heading.modern-with-separator-02 .heading:after,
				.tm-gradation .count-wrap:before, .tm-gradation .count-wrap:after,
				.vc_progress_bar .vc_general.vc_single_bar .vc_bar,
				.tm-swiper .swiper-nav-button:hover,
				.tm-swiper.nav-style-4 .swiper-nav-button,
				.tm-swiper.nav-style-5 .swiper-nav-button,
				.tm-swiper .swiper-pagination-bullet:hover:before,
				.tm-swiper .swiper-pagination-bullet.swiper-pagination-bullet-active:before,
				.tm-testimonial.style-4 .swiper-custom-btn:hover,
				.tm-timeline.style-01 .content-header,
				.tm-timeline.style-01 .dot:after,
				.tm-gradation .dot:after,
				.tm-slider-button.style-02 .slider-btn:hover,
				.tm-rotate-box.style-2 .heading:after,
				.tm-contact-form-7.style-04 .wpcf7-submit:hover,
				.tagcloud a:hover,
				.tm-search-form .category-list a:hover,
				.select2-container--default .select2-results__option--highlighted[aria-selected],
				.tm-heading.with-separator-04:before,
				.tm-slider-button.style-03 .slider-btn:hover,
				.tm-heading.with-separator-03 .heading:before, .tm-heading.with-separator-03 .heading:after,
				.box-bg-primary .vc_column-inner .wpb_wrapper,
				.tm-swiper.pagination-style-11 .swiper-pagination-bullet.swiper-pagination-bullet-active,
				.tm-swiper.pagination-style-11 .swiper-pagination-bullet:hover,
				.tm-jobs-box .tm-jobs-box-top .link a:hover:after,
				.tm-pricing.style-3 .tm-pricing-recomend,
				.tm-popup-video.style-poster-07 .video-play,
				.tm-popup-video.style-button-03 .video-play,
				.tm-social-networks.style-rounded-icon-title .item:hover .link-icon,
				.tm-gradation--basic .item:hover .count .number,
				.widget_archive a:hover, .widget_categories a:hover, .widget_meta a:hover, .widget_product_categories a:hover, .widget_pages a:hover, .widget_nav_menu a:hover, .insight-core-bmw a:hover,
				.widget_pages .current-menu-item > a, .widget_nav_menu .current-menu-item > a, .insight-core-bmw .current-menu-item > a,
				.widget_categories .current-cat > a,
				.widget_categories .current-cat-ancestor > a,
				.widget_categories .current-cat-parent > a,
				.widget_recent_comments a:before,
				.widget_archive a:before,
				.widget_categories .current-cat > a:before,
				.widget_categories .current-cat-ancestor > a:before,
				.widget_categories .current-cat-parent > a:before,
				.widget_categories a:before,
				.widget_meta a:before,
				.widget_product_categories a:before,
				.widget_pages a:before,
				.widget_nav_menu a:before,
				.insight-core-bmw a:before
				{
					background-color: {$color};
				}";

			$css .= "
                .primary-background-color-important,
				.primary-background-color-hover-important:hover,
				.woosc-area .woosc-inner .woosc-bar .woosc-bar-btn,
				.lg-progress-bar .lg-progress,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-03 .vc_tta-tab > a:before,
				body table.booked-calendar td.today:hover .date span
				{
					background-color: {$color}!important;
				}";

			$css .= "
                .tm-box-icon.style-11:hover .content-wrap,
                .tm-box-icon.style-14:hover .content-wrap,
                .tm-service.style-08 .service-item:hover .post-item-wrap
				{
					background: linear-gradient(90deg,  {$color} 50%, transparent 50%), linear-gradient(90deg,  {$color} 50%, transparent 50%), linear-gradient(0deg,  {$color} 50%, transparent 50%), linear-gradient(0deg,  {$color} 50%, transparent 50%);
					background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
					background-size: 15px 3px, 15px 3px, 3px 15px, 3px 15px;
					background-position: 0px 0px, 100% 100%, 0px 100%, 100% 0px;
				}";

			$css .= "
                .btn-view-full-map
				{
					background-color: {$alpha70};
				}";

			$css .= "
                .tm-view-demo.style-01 .overlay
				{
					background-color: {$alpha90};
				}";

			$css .= "
                .tm-popup-video.style-poster-01 .video-overlay
				{
					background-color: {$alpha80};
				}";

			$css .= "
                .tm-popup-video.style-poster-07 .video-play
				{
					box-shadow: 0 0 20px {$alpha70};
				}";

			$css .= "
                .tm-timeline.style-01 .dot,
                .tm-gradation .dot,
                .single-post .post-link,
                .single-post .post-quote-content
				{
					background-color: {$alpha18};
				}";

			$css .= "
                .tm-timeline.style-01 .dot:before,
                .tm-gradation .dot:before
				{
					background-color: {$alpha29};
				}";

			$css .= "
                .tm-list.style-check-03 .marker:before,
                .tm-button.style-text_with_underline .button-icon i
				{
					background-color: {$alpha12};
				}";

			$css .= "
                .tm-box-icon.style-4:hover .content-wrap
				{
					background-color: {$alpha8};
				}";
			$css .= "
                .tm-service.style-06 .service-item:hover .post-icon i,
                .tm-service.style-07 .service-item:hover .post-icon i
				{
					background-color: {$alpha6};
				}";

			// Border.
			$css .= "
				.primary-border-color,
                .comment-nav-links li .next:hover, .comment-nav-links li .prev:hover, .page-pagination li .next:hover, .page-pagination li .prev:hover,
                .wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-02 .vc_tta-panel-title,
                .error404 .error-404-search-form-wrap .search-field,
                .widget .mc4wp-form input[type=email]:focus,
                .single-post .post-quote-content,
                .tm-gradation--basic .item:hover .count .number,
                .tm-service.style-icon-dotted .service-item:hover .post-icon-overlay,
                .tm-service.style-icon-dashed .service-item:hover .post-icon-overlay,
                .tm-blog.style-02 .post-categories a,
                .tagcloud a:hover,
                .tm-swiper.nav-style-4 .swiper-nav-button,
                .tm-swiper.nav-style-5 .swiper-nav-button,
				.tm-button.style-outline.tm-button-primary,
				.tm-button.style-flat.tm-button-primary,
				.tm-button.style-flat.tm-button-secondary:hover,
				.tm-button.style-flat.tm-button-grey:hover,
				.tm-social-networks.style-rounded-icon-title .item:hover .link-icon,
				.tm-gallery-slider .lSAction .lSPrev:hover .nav-button-icon:before, .tm-gallery-slider .lSAction .lSNext:hover .nav-button-icon:before,
				.tm-pricing.style-2.tm-pricing-featured .inner:after,
				.tm-contact-form-7.style-02 .wpcf7-text:focus,
				.tm-contact-form-7.style-02 .wpcf7-date:focus,
				.tm-contact-form-7.style-02 .wpcf7-select:focus,
				.tm-contact-form-7.style-02 .wpcf7-textarea:focus,
				.tm-swiper .swiper-nav-button:hover,
				.tm-swiper .swiper-pagination-bullet:hover:before, .tm-swiper .swiper-pagination-bullet.swiper-pagination-bullet-active:before,
				.tm-social-networks.style-solid-rounded-icon .item:hover .link,
				.tm-social-networks.style-solid-rounded-icon-02 .item:hover .link,
				.tm-testimonial.style-4 .swiper-custom-btn:hover,
				.widget_pages .current-menu-item, .widget_nav_menu .current-menu-item, .insight-core-bmw .current-menu-item,
				.post-type-service .page-sidebar .widget_pages .current-menu-item,
				.post-type-service .page-sidebar .widget_nav_menu .current-menu-item,
				.post-type-service .page-sidebar .insight-core-bmw .current-menu-item,
				.post-share-toggle:hover,
				.tm-slider-button.style-03 .slider-btn:hover,
				.tm-popup-video.style-button-05 a .video-play,
				.tm-jobs-box .tm-jobs-box-top .link a:hover:after,
				body table.booked-calendar td.today .date span
				{
					border-color: {$color};
				}";

			$css .= "
				.tm-box-icon.style-7 .icon-overlay
				{
					border-color: $alpha8;
				}";


			// Border Important.
			$css .= "
                .primary-border-color-important,
				.primary-border-color-hover-important:hover,
				.tm-maps.overlay-style-02 .animated-dot .signal2,
				.lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover,
				#fp-nav ul li a.active span, .fp-slidesNav ul li a.active span
				{
					border-color: {$color}!important;
				}";

			// Border Top.
			$css .= "
                .tm-grid-wrapper .filter-counter:before,
                .hint--primary.hint--top-left:before,
                .hint--primary.hint--top-right:before,
                .hint--primary.hint--top:before
                {
					border-top-color: {$color};
				}";

			// Border Right.
			$css .= "
                .hint--primary.hint--right:before
                {
					border-right-color: {$color};
				}";

			// Border Left.
			$css .= "
                .vc_tta.vc_general.vc_tta-style-smilepure-tour-01 .vc_tta-tabs-list .vc_tta-tab:after,
                .vc_tta.vc_general.vc_tta-style-smilepure-tour-02 .vc_tta-tabs-list .vc_tta-tab:after
                {
					border-left-color: {$color};
				}";

			// Border Bottom.
			$css .= "
                .hint--primary.hint--bottom-left:before,
                .hint--primary.hint--bottom-right:before,
                .hint--primary.hint--bottom:before
                {
					border-bottom-color: {$color};
				}";

			$css .= "
                .hint--primary.hint--left:before
                {
                    border-left-color: {$color};
                }";

			$css .= "
				.tm-popup-video.style-poster-01
				{
					box-shadow: 0 0 40px $alpha40;
				}";

			$css .= ".tm-maps.overlay-style-02 .animated-dot .signal2
			{
				box-shadow: inset 0 0 35px 10px {$color};
			}";

			$css .= ".testimonial-info svg *, .tm-testimonial.style-7 .quote-icon svg *
			{
				fill: {$color};
			}";

			$css .= "
			.tm-heading.medium-separator .separator:after,
			.tm-heading.above-medium-separator .separator:after,
			.tm-pricing-rotate-box .title,
			.mptt-shortcode-wrapper .mptt-navigation-tabs li:before,
			.wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-02 .vc_tta-tab:hover:after,
			.wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-02 .vc_tta-tab.vc_active:after
			 {
				background-color: $color;
				background-image: linear-gradient(136deg, {$color} 0%, {$color} 100%);
			}";

			$css .= "
			.widget_recent_comments a,
			.single-post .post-tags a,
			.single-post .post-meta a,
			.tm-blog .post-categories a,
			.tm-service.style-01 .post-info:after,
			.tm-accordion.style-2 .accordion-title .title-text
			 {
				background-image: linear-gradient(to right,{$color} 0%, {$color} 100%);
			}";

			if ( Smilepure_Helper::active_woocommerce() ) {
				$css .= "
				.woocommerce div.quantity .increase:hover span, .woocommerce div.quantity .decrease:hover span,
				.woocommerce .cart_list.product_list_widget a:hover,
				.woocommerce.single-product div.product .woocommerce-tabs ul.tabs li.active a,
				.woocommerce.single-product div.product .woocommerce-tabs ul.tabs li a:hover,
				.woocommerce ul.product_list_widget li .product-title:hover,
                .woocommerce.single-product div.product .single_add_to_cart_button:hover,
                .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
                .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
                .woocommerce .quantity button:hover span,
                .woocommerce nav.woocommerce-pagination ul li a:focus,
                .woocommerce nav.woocommerce-pagination ul li a:hover,
				.woocommerce-Price-amount, .amount, .woocommerce div.product p.price, .woocommerce div.product span.price,
				.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover,
				.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover, .button:hover,
				.woocommerce-Price-amount, .amount, .woocommerce div.product p.price, .woocommerce div.product span.price {
					color: {$color}
				}";

				$css .= "
				.woocommerce nav.woocommerce-pagination ul li .current,
				.woocommerce nav.woocommerce-pagination ul li a:hover {
					color: {$color}!important;
				}";

				$css .= "
				.woocommerce nav.woocommerce-pagination ul li .current:after, .woocommerce nav.woocommerce-pagination ul li a:hover:after,
				.woocommerce nav.woocommerce-pagination ul li .next:hover, .woocommerce nav.woocommerce-pagination ul li .prev:hover,
				.woocommerce-MyAccount-navigation .is-active a,
				.woocommerce-MyAccount-navigation a:hover,
                .tm-product.style-grid .woocommerce_loop_add_to_cart_wrap a:hover,
                .tm-product.style-grid .woosq-btn:hover,
                .tm-product.style-grid .woosc-btn:hover,
                .tm-product.style-grid .woosw-btn:hover,
                .single-product .woosw-btn:hover,
                .single-product .woosc-btn:hover,
				.woocommerce .tm-products .product .woosw-btn.woosw-added,
				.woocommerce .tm-products .product .woosq-btn.woosq-added,
				.woocommerce .tm-products .product .woosc-btn.woosc-added,
				.woocommerce .products .product .woosw-btn.woosw-added,
				.woocommerce .products .product .woosq-btn.woosq-added,
				.woocommerce .products .product .woosc-btn.woosc-added,
				.woocommerce.single-product div.product .summary .wishlist-btn a.woosw-added,
				.woocommerce.single-product div.product .summary .compare-btn a.woosc-added,
                .woocommerce .tm-products .product .woocommerce_loop_add_to_cart_wrap .button:hover, .woocommerce .products .product .woocommerce_loop_add_to_cart_wrap .button:hover,
				.woocommerce.single-product div.product .single_add_to_cart_button:hover,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
				.woocommerce .widget_price_filter .price_slider_amount .button:hover {
					background-color: {$color};
				}";

				$css .= "
				.woocommerce nav.woocommerce-pagination ul li .next:hover, .woocommerce nav.woocommerce-pagination ul li .prev:hover {
					background-color: {$color}!important;
				}";

				$css .= "
				.woocommerce nav.woocommerce-pagination ul li .next:hover, .woocommerce nav.woocommerce-pagination ul li .prev:hover,
				.woocommerce.single-product div.product .single_add_to_cart_button:hover,
				.single-product .woosw-btn:hover,
				.single-product .woosc-btn:hover,
				.woocommerce .tm-products .product .woosw-btn.woosw-added,
				.woocommerce .tm-products .product .woosq-btn.woosq-added,
				.woocommerce .tm-products .product .woosc-btn.woosc-added,
				.woocommerce .products .product .woosw-btn.woosw-added,
				.woocommerce .products .product .woosq-btn.woosq-added,
				.woocommerce .products .product .woosc-btn.woosc-added,
				.woocommerce.single-product div.product .summary .wishlist-btn a.woosw-added,
				.woocommerce.single-product div.product .summary .compare-btn a.woosc-added,
				body.woocommerce-cart table.cart td.actions .coupon .input-text:focus,
				.woocommerce .tm-products .product .woocommerce_loop_add_to_cart_wrap .button, .woocommerce .products .product .woocommerce_loop_add_to_cart_wrap .button,
				.woocommerce .widget_price_filter .price_slider_amount .button:hover,
				.woocommerce.single-product div.product .summary .wishlist-btn a:hover, .woocommerce.single-product div.product .summary .compare-btn a:hover,
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.button.alt, .woocommerce input.button.alt, .button {
					border-color: {$color};
				}";

				$css .= "
                .mini-cart .widget_shopping_cart_content,
				.woocommerce.single-product div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce .select2-container .select2-choice {
					border-bottom-color: {$color};
				}";
			}

			return $css;
		}

		function secondary_color_css() {
			$color = Smilepure::setting( 'secondary_color' );

			// Color.
			$css = "
				.secondary-color,
				.topbar a,
				.tm-testimonial.style-2 .testimonial-desc,
				blockquote,
				.page-links > a:hover,
				.widget_rss ul a:hover,
				.comment-nav-links li span, .comment-nav-links li a, .page-pagination li span, .page-pagination li a,
				.page-close-canvas-sidebar span:hover,
				.tm-blog.style-03 .post-read-more .btn-text,
				.tm-button.tm-button-secondary.style-text,
				.tm-button.style-border-text.tm-button-secondary,
				.tm-button.style-border-text.tm-button-primary .button-icon,
				.tm-box-icon.style-7:hover .icon span,
				.tm-mailchimp-form.style-3 button[type='submit']:hover,
				.tm-twitter.style-slider-quote .tweet-text a:hover,
				.nav-links .archive-link:hover,
				.tm-service.style-05 .post-read-more a .btn-text,
				.tm-office-info .link a,
				.tm-grid-wrapper .btn-filter,
				.tm-blog.style-01 .post-categories a:hover,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-title>a,
				.comment-list .comment-datetime:before,
				.tm-service.style-06 .post-icon,
				.tagcloud a,
				.nav-links a:hover div,
				.comment-nav-links li a:hover, .comment-nav-links li a:focus
				{
					color: {$color}
				}";

			// Color Important.
			$css .= "
				.secondary-color-important,
				.secondary-color-hover-important:hover
				{
					color: {$color}!important;
				}";

			// Background Color.
			$css .= "
				.secondary-background-color,
				.tm-pricing-table th.col-featured,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-01 .vc_tta-panel.vc_active .vc_tta-panel-title,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-01 .vc_tta-tab:hover > a, .wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-01 .vc_tta-tab.vc_active > a,
				.tm-team-member.style-3 .photo:before,
				.tm-testimonial-list.style-02 .testimonial-info,
				.tm-accordion.style-3 .accordion-title-wrapper:hover .accordion-title,
				.tm-accordion.style-3 .active .accordion-title,
				.tm-testimonial.style-8 .testimonial-info,
				.tm-gradation--with_image .item:hover .count span,
                .tm-gradation--with_image .item:hover .count span:before,
                .tm-gradation--with_image .item:hover .count span:after,
                .tm-gallery .overlay,
                .tm-blog.style-list .post-read-more a,
                .tm-blog.style-list_simple .post-thumbnail a:before,
                .tm-testimonial-metro .post-thumbnail:after,
				.tm-heading.above-thick-separator .separator:after,
				.tm-heading.beside-thick-separator:before,
				.tm-contact-form-7.style-04 .wpcf7-submit,
				.tm-popup-video.style-button-03 a:hover .video-play,
				.tm-button.style-flat.tm-button-secondary,
				.tm-button.style-flat.tm-button-primary:hover,
				.tm-button.style-outline.tm-button-secondary:before,
				.tm-button.style-outline.tm-button-grey:before,
				.tm-button.style-modern.tm-button-primary:after,
				.tm-button.style-modern.tm-button-secondary,
				.tm-button.style-border-text.tm-button-secondary:after,
				.tm-list.style-modern-icon-02 .list-item:hover .marker,
				.tm-contact-form-7.style-02 .wpcf7-submit:hover,
				.tm-contact-form-7.style-03 .wpcf7-submit:hover,
				.tm-popup-video.style-button-05 a:hover .video-play,
				.widget_product_categories .count,
				.top-bar-01 .top-bar-button:hover,
				.tm-search-form .search-submit:hover,
				.tm-box-icon.style-7 .tm-box-icon__btn.tm-button-secondary:before,
				.tm-box-icon.style-7 .tm-box-icon__btn.tm-button-grey:before,
				.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-tab>a,
				.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-tabs.vc_tta-color-secondary.vc_tta-style-modern .vc_tta-tab > a,
				.vc_tta-color-secondary.vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-body,
				.vc_tta-color-secondary.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-flat .vc_tta-tab>a,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel:not(.vc_active) .vc_tta-panel-heading:focus,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel:not(.vc_active) .vc_tta-panel-heading:hover,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-tab:not(.vc_active) >a:focus,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-tab:not(.vc_active) >a:hover,
				.tm-swiper.pagination-style-6 .swiper-pagination-bullet.swiper-pagination-bullet-active:before,
				.tm-swiper.pagination-style-6 .swiper-pagination-bullet:hover:before,
				.wp-block-button__link
				{
					background-color: {$color};
				}";

			// Background Color Important.
			$css .= "
				.secondary-background-color-important,
				.secondary-background-color-hover-important:hover,
				.mejs-controls .mejs-time-rail .mejs-time-current
				{
					background-color: {$color}!important;
				}";

			// Border Color.
			$css .= ".secondary-border-color,
				.tm-button.style-outline.tm-button-secondary,
				.tm-button.style-flat.tm-button-primary:hover,
				.tm-button.style-flat.tm-button-secondary,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-smilepure-01 .vc_active .vc_tta-panel-heading,
				.tm-popup-video.style-button-05 a:hover .video-play,
				.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-controls-icon::after,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-controls-icon::before,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body::after,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body::before,
				.vc_tta-tabs.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-tab > a
				{
					border-color: {$color};
				}";

			// Border Color Important.
			$css .= ".secondary-border-color-important,
				.secondary-border-color-hover-important:hover
				{
					border-color: {$color}!important;
				}";

			if ( Smilepure_Helper::active_woocommerce() ) {
				$css .= "
				.woocommerce.single-product div.product .woocommerce-tabs ul.tabs li a,
				.woocommerce .cart.shop_table td.product-subtotal,
				.woocommerce nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li a,
				.woocommerce .tm-products .product .woosw-btn, .woocommerce .tm-products .product .woosq-btn, .woocommerce .tm-products .product .woosc-btn, .woocommerce .products .product .woosw-btn, .woocommerce .products .product .woosq-btn, .woocommerce .products .product .woosc-btn,
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.button.alt, .woocommerce input.button.alt, .button,
				.woocommerce div.quantity .increase span, .woocommerce div.quantity .decrease span
				{
					color: {$color}
				}";

				$css .= "
				.tm-product-search-form .search-submit:hover,
				.woocommerce.single-product div.product .single_add_to_cart_button,
				.woocommerce .cats .product-category:hover .cat-text,
				.woocommerce .products div.product .product-overlay,
				.woocommerce a.button:hover,
				.woocommerce button.button:hover,
				.woocommerce input.button:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce input.button.alt:hover
				{
					background-color: {$color};
				}";

				$css .= "
				.woocommerce.single-product div.product .images .thumbnails .item img:hover,
				.woocommerce.single-product div.product .single_add_to_cart_button,
				.woocommerce a.button:hover,
				.woocommerce button.button:hover,
				.woocommerce input.button:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce input.button.alt:hover,
				.button:hover {
					border-color: {$color};
				}";
			}

			return $css;
		}

		function light_gallery_css() {
			$css                    = '';
			$primary_color          = Smilepure::setting( 'primary_color' );
			$secondary_color        = Smilepure::setting( 'secondary_color' );
			$cutom_background_color = Smilepure::setting( 'light_gallery_custom_background' );
			$background             = Smilepure::setting( 'light_gallery_background' );

			$tmp = '';

			if ( $background === 'primary' ) {
				$tmp .= "background-color: {$primary_color} !important;";
			} elseif ( $background === 'secondary' ) {
				$tmp .= "background-color: {$secondary_color} !important;";
			} else {
				$tmp .= "background-color: {$cutom_background_color} !important;";
			}

			$css .= ".lg-backdrop { $tmp }";

			return $css;
		}

		function get_typo_css( $typography ) {
			$css = '';

			if ( ! empty( $typography ) ) {
				foreach ( $typography as $attr => $value ) {
					if ( $attr === 'subsets' ) {
						continue;
					}
					if ( $attr === 'font-family' ) {
						$css .= "{$attr}: \"{$value}\", Helvetica, Arial, sans-serif;";
					} elseif ( $attr === 'variant' ) {
						$css .= "font-weight: {$value};";
					} else {
						$css .= "{$attr}: {$value};";
					}
				}
			}

			return $css;
		}
	}

	new Smilepure_Custom_Css();
}
