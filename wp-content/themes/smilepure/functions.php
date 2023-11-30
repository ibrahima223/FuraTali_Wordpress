<?php
/**
 * Define constant
 */
$theme = wp_get_theme();

if ( ! empty( $theme['Template'] ) ) {
	$theme = wp_get_theme( $theme['Template'] );
}

if ( ! defined( 'DS' ) ) {
	define( 'DS', DIRECTORY_SEPARATOR );
}

define( 'SMILEPURE_THEME_NAME', $theme['Name'] );
define( 'SMILEPURE_THEME_VERSION', $theme['Version'] );
define( 'SMILEPURE_THEME_DIR', get_template_directory() );
define( 'SMILEPURE_THEME_URI', get_template_directory_uri() );
define( 'SMILEPURE_THEME_IMAGE_DIR', get_template_directory() . DS . 'assets' . DS . 'images' );
define( 'SMILEPURE_THEME_IMAGE_URI', get_template_directory_uri() . DS . 'assets' . DS . 'images' );
define( 'SMILEPURE_CHILD_THEME_URI', get_stylesheet_directory_uri() );
define( 'SMILEPURE_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'SMILEPURE_FRAMEWORK_DIR', get_template_directory() . DS . 'framework' );
define( 'SMILEPURE_CUSTOMIZER_DIR', SMILEPURE_THEME_DIR . DS . 'customizer' );
define( 'SMILEPURE_WIDGETS_DIR', SMILEPURE_THEME_DIR . DS . 'widgets' );
define( 'SMILEPURE_VC_MAPS_DIR', SMILEPURE_THEME_DIR . DS . 'vc-extend' . DS . 'vc-maps' );
define( 'SMILEPURE_VC_PARAMS_DIR', SMILEPURE_THEME_DIR . DS . 'vc-extend' . DS . 'vc-params' );
define( 'SMILEPURE_VC_SHORTCODE_CATEGORY', esc_html__( 'By', 'smilepure' ) . ' ' . SMILEPURE_THEME_NAME );
define( 'SMILEPURE_PROTOCOL', is_ssl() ? 'https' : 'http' );

require_once SMILEPURE_FRAMEWORK_DIR . '/class-static.php';

$files = array(
	SMILEPURE_FRAMEWORK_DIR . '/class-init.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-global.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-actions-filters.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-admin.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-customize.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-enqueue.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-functions.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-helper.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-color.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-import.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-kirki.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-metabox.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-plugins.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-query.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-custom-css.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-templates.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-aqua-resizer.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-visual-composer.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-vc-icon-fontawesome5.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-vc-icon-smilepure.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-vc-icon-flaticon.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-vc-icon-ion.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-vc-icon-icomoon.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-vc-icon-themify.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-vc-icon-linea.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-walker-nav-menu.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-widget.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-widgets.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-footer.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-post-type-blog.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-post-type-service.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-posttypes.php',
	SMILEPURE_FRAMEWORK_DIR . '/class-woo.php',
	SMILEPURE_FRAMEWORK_DIR . '/tgm-plugin-activation.php',
	SMILEPURE_FRAMEWORK_DIR . '/tgm-plugin-registration.php',
);

/**
 * Load Framework.
 */
Smilepure::require_files( $files );

/**
 * Init the theme
 */
Smilepure_Init::instance();

add_action('init', 'get_config_xml', 9999);
function get_config_xml() {

	$a = Smilepure_Kirki::instance()->get_key_string_wpml_config();

	Smilepure_Helper::d($a);
}

/**
 * Admin notice waning minimum plugin version required.
 *
 * @param $plugin_name
 * @param $plugin_version
 */
function smilepure_notice_required_plugin_version( $plugin_name, $plugin_version ) {
	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}

	$message = sprintf(
		esc_html__( '%1$s requires %2$s plugin version %3$s or greater!', 'smilepure' ),
		'<strong>' . SMILEPURE_THEME_NAME . '</strong>',
		'<strong>' . $plugin_name . '</strong>',
		$plugin_version
	);

	printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
}
