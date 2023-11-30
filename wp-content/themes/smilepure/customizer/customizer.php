<?php
/**
 * Theme Customizer
 *
 * @package SmilePure
 * @since   1.0
 */

/**
 * Setup configuration
 */
Smilepure_Kirki::add_config( 'theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add sections
 */
$priority = 1;

Smilepure_Kirki::add_section( 'layout', array(
	'title'    => esc_html__( 'Layout', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'color_', array(
	'title'    => esc_html__( 'Colors', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'background', array(
	'title'    => esc_html__( 'Background', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'typography', array(
	'title'    => esc_html__( 'Typography', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'top_bar', array(
	'title'    => esc_html__( 'Top bar', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'header', array(
	'title'    => esc_html__( 'Header', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'logo', array(
	'title'       => esc_html__( 'Logo', 'smilepure' ),
	'description' => '<div class="desc">
			<strong class="insight-label insight-label-info">' . esc_html__( 'IMPORTANT NOTE: ', 'smilepure' ) . '</strong>
			<p>' . esc_html__( 'These settings can be overridden by settings from Page Options Box in separator page.', 'smilepure' ) . '</p>
			<p><img src="' . SMILEPURE_THEME_IMAGE_URI . '/customize/logo-settings.jpg" alt="' . esc_attr__( 'logo-settings', 'smilepure' ) . '"/></p>
		</div>',
	'priority'    => $priority ++,
) );

Smilepure_Kirki::add_panel( 'navigation', array(
	'title'    => esc_html__( 'Navigation', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'sliders', array(
	'title'    => esc_html__( 'Sliders', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'title_bar', array(
	'title'    => esc_html__( 'Page Title Bar', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'sidebars', array(
	'title'    => esc_html__( 'Sidebars', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'footer', array(
	'title'    => esc_html__( 'Footer', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'blog', array(
	'title'    => esc_html__( 'Blog', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'shop', array(
	'title'    => esc_html__( 'Shop', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'service', array(
	'title'    => esc_html__( 'Service', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'doctor', array(
	'title'    => esc_html__( 'Doctor', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'socials', array(
	'title'    => esc_html__( 'Social Networks', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'social_sharing', array(
	'title'    => esc_html__( 'Social Sharing', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'search', array(
	'title'    => esc_html__( 'Search', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'error404_page', array(
	'title'    => esc_html__( 'Error 404 Page', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'coming_soon', array(
	'title'    => esc_html__( 'Coming Soon', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'shortcode', array(
	'title'    => esc_html__( 'Shortcodes', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_panel( 'advanced', array(
	'title'    => esc_html__( 'Advanced', 'smilepure' ),
	'priority' => $priority ++,
) );

Smilepure_Kirki::add_section( 'additional_js', array(
	'title'    => esc_html__( 'Additional JS', 'smilepure' ),
	'priority' => $priority ++,
) );

/**
 * Load panel & section files
 */
$files = array(
	SMILEPURE_CUSTOMIZER_DIR . '/section-color.php',

	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/general.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-01.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-02.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-03.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-04.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-05.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-06.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-07.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-08.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-09.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-10.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-11.php',
	SMILEPURE_CUSTOMIZER_DIR . '/top_bar/style-12.php',

	SMILEPURE_CUSTOMIZER_DIR . '/header/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/general.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/sticky.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/more-options.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-01.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-02.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-03.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-04.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-05.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-06.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-07.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-08.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-09.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-11.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-12.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-13.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-14.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-15.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-16.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-17.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-18.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-19.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-21.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-22.php',
	SMILEPURE_CUSTOMIZER_DIR . '/header/style-23.php',

	SMILEPURE_CUSTOMIZER_DIR . '/navigation/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/navigation/desktop-menu.php',
	SMILEPURE_CUSTOMIZER_DIR . '/navigation/off-canvas-menu.php',
	SMILEPURE_CUSTOMIZER_DIR . '/navigation/mobile-menu.php',

	SMILEPURE_CUSTOMIZER_DIR . '/section-sliders.php',

	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/general.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-01.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-02.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-03.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-04.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-05.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-06.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-07.php',
	SMILEPURE_CUSTOMIZER_DIR . '/title_bar/style-08.php',

	SMILEPURE_CUSTOMIZER_DIR . '/footer/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/footer/general.php',
	SMILEPURE_CUSTOMIZER_DIR . '/footer/style-01.php',
	SMILEPURE_CUSTOMIZER_DIR . '/footer/style-02.php',
	SMILEPURE_CUSTOMIZER_DIR . '/footer/footer-simple.php',

	SMILEPURE_CUSTOMIZER_DIR . '/advanced/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/advanced/advanced.php',
	SMILEPURE_CUSTOMIZER_DIR . '/advanced/pre-loader.php',
	SMILEPURE_CUSTOMIZER_DIR . '/advanced/light-gallery.php',

	SMILEPURE_CUSTOMIZER_DIR . '/shortcode/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/shortcode/animation.php',

	SMILEPURE_CUSTOMIZER_DIR . '/section-background.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-error404.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-coming-soon.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-layout.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-logo.php',

	SMILEPURE_CUSTOMIZER_DIR . '/blog/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/blog/archive.php',
	SMILEPURE_CUSTOMIZER_DIR . '/blog/single.php',

	SMILEPURE_CUSTOMIZER_DIR . '/shop/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/shop/archive.php',
	SMILEPURE_CUSTOMIZER_DIR . '/shop/single.php',
	SMILEPURE_CUSTOMIZER_DIR . '/shop/cart.php',

	SMILEPURE_CUSTOMIZER_DIR . '/service/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/service/archive.php',
	SMILEPURE_CUSTOMIZER_DIR . '/service/single.php',

	SMILEPURE_CUSTOMIZER_DIR . '/doctor/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/doctor/archive.php',

	SMILEPURE_CUSTOMIZER_DIR . '/search/_panel.php',
	SMILEPURE_CUSTOMIZER_DIR . '/search/search-page.php',
	SMILEPURE_CUSTOMIZER_DIR . '/search/search-popup.php',

	SMILEPURE_CUSTOMIZER_DIR . '/section-sharing.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-sidebars.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-socials.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-typography.php',
	SMILEPURE_CUSTOMIZER_DIR . '/section-additional-js.php',
);

Smilepure::require_files( $files );
