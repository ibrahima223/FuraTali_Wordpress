<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Smilepure_Metabox' ) ) {
	class Smilepure_Metabox {

		/**
		 * Smilepure_Metabox constructor.
		 */
		public function __construct() {
			add_filter( 'insight_core_meta_boxes', array( $this, 'register_meta_boxes' ) );
		}

		/**
		 * Register Metabox
		 *
		 * @param $meta_boxes
		 *
		 * @return array
		 */
		public function register_meta_boxes( $meta_boxes ) {
			$page_registered_sidebars = Smilepure_Helper::get_registered_sidebars( true );

			$general_options = array(
				array(
					'title'  => esc_html__( 'General', 'smilepure' ),
					'fields' => array(
						array(
							'id'      => 'site_layout',
							'type'    => 'select',
							'title'   => esc_html__( 'Layout', 'smilepure' ),
							'desc'    => 'When you choose Default, the value in <a href="' . admin_url( 'customize.php' ) . '" target="_blank">Customizer</a> will be used.',
							'options' => array(
								''      => esc_html__( 'Default', 'smilepure' ),
								'boxed' => esc_html__( 'Boxed', 'smilepure' ),
								'wide'  => esc_html__( 'Wide', 'smilepure' ),
							),
							'default' => '',
						),
						array(
							'id'    => 'site_width',
							'type'  => 'text',
							'title' => esc_html__( 'Site Width', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the site width for this page. Enter value including any valid CSS unit, e.g 1200px. Leave blank to use global setting.', 'smilepure' ),
						),
						array(
							'id'      => 'content_padding',
							'type'    => 'switch',
							'title'   => esc_html__( 'Content Padding', 'smilepure' ),
							'desc'    => 'By default, the page content has the padding top & bottom is 100px.',
							'default' => '1',
							'options' => array(
								'1'      => esc_html__( 'Default', 'smilepure' ),
								'0'      => esc_html__( 'No Padding', 'smilepure' ),
								'top'    => esc_html__( 'No Top Padding', 'smilepure' ),
								'bottom' => esc_html__( 'No Bottom Padding', 'smilepure' ),
							),
						),
						array(
							'id'      => 'body_class',
							'type'    => 'text',
							'title'   => esc_html__( 'Body Class', 'smilepure' ),
							'desc'    => esc_html__( 'Add a class name to body and refer to it in custom CSS.', 'smilepure' ),
							'default' => '',
						),
					),
				),
				array(
					'title'  => esc_html__( 'Background', 'smilepure' ),
					'fields' => array(
						array(
							'id'      => 'site_background_message',
							'type'    => 'message',
							'title'   => esc_html__( 'Info', 'smilepure' ),
							'message' => esc_html__( 'These options controls the background on boxed mode.', 'smilepure' ),
						),
						array(
							'id'    => 'site_background_color',
							'type'  => 'color',
							'title' => esc_html__( 'Background Color', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the background color of the outer background area in boxed mode of this page.', 'smilepure' ),
						),
						array(
							'id'    => 'site_background_image',
							'type'  => 'media',
							'title' => esc_html__( 'Background Image', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the background image of the outer background area in boxed mode of this page.', 'smilepure' ),
						),
						array(
							'id'      => 'site_background_repeat',
							'type'    => 'select',
							'title'   => esc_html__( 'Background Repeat', 'smilepure' ),
							'desc'    => esc_html__( 'Controls the background repeat of the outer background area in boxed mode of this page.', 'smilepure' ),
							'options' => array(
								'no-repeat' => esc_html__( 'No repeat', 'smilepure' ),
								'repeat'    => esc_html__( 'Repeat', 'smilepure' ),
								'repeat-x'  => esc_html__( 'Repeat X', 'smilepure' ),
								'repeat-y'  => esc_html__( 'Repeat Y', 'smilepure' ),
							),
						),
						array(
							'id'      => 'site_background_attachment',
							'type'    => 'select',
							'title'   => esc_html__( 'Background Attachment', 'smilepure' ),
							'desc'    => esc_html__( 'Controls the background attachment of the outer background area in boxed mode of this page.', 'smilepure' ),
							'options' => array(
								''       => esc_html__( 'Default', 'smilepure' ),
								'fixed'  => esc_html__( 'Fixed', 'smilepure' ),
								'scroll' => esc_html__( 'Scroll', 'smilepure' ),
							),
						),
						array(
							'id'    => 'site_background_position',
							'type'  => 'text',
							'title' => esc_html__( 'Background Position', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the background position of the outer background area in boxed mode of this page.', 'smilepure' ),
						),
						array(
							'id'    => 'site_background_size',
							'type'  => 'text',
							'title' => esc_html__( 'Background Size', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the background size of the outer background area in boxed mode of this page.', 'smilepure' ),
						),
						array(
							'id'      => 'content_background_message',
							'type'    => 'message',
							'title'   => esc_html__( 'Info', 'smilepure' ),
							'message' => esc_html__( 'These options controls the background of main content on this page.', 'smilepure' ),
						),
						array(
							'id'    => 'content_background_color',
							'type'  => 'color',
							'title' => esc_html__( 'Background Color', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the background color of main content on this page.', 'smilepure' ),
						),
						array(
							'id'    => 'content_background_image',
							'type'  => 'media',
							'title' => esc_html__( 'Background Image', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the background image of main content on this page.', 'smilepure' ),
						),
						array(
							'id'      => 'content_background_repeat',
							'type'    => 'select',
							'title'   => esc_html__( 'Background Repeat', 'smilepure' ),
							'desc'    => esc_html__( 'Controls the background repeat of main content on this page.', 'smilepure' ),
							'options' => array(
								'no-repeat' => esc_html__( 'No repeat', 'smilepure' ),
								'repeat'    => esc_html__( 'Repeat', 'smilepure' ),
								'repeat-x'  => esc_html__( 'Repeat X', 'smilepure' ),
								'repeat-y'  => esc_html__( 'Repeat Y', 'smilepure' ),
							),
						),
						array(
							'id'    => 'content_background_position',
							'type'  => 'text',
							'title' => esc_html__( 'Background Position', 'smilepure' ),
							'desc'  => esc_html__( 'Controls the background position of main content on this page.', 'smilepure' ),
						),
					),
				),
				array(
					'title'  => esc_html__( 'Header', 'smilepure' ),
					'fields' => array(
						array(
							'id'      => 'top_bar_type',
							'type'    => 'select',
							'title'   => esc_html__( 'Top Bar Type', 'smilepure' ),
							'desc'    => 'When you choose Default, the value in <a href="' . admin_url( 'customize.php' ) . '" target="_blank">Customizer</a> will be used.',
							'default' => '',
							'options' => Smilepure_Helper::get_top_bar_list( true ),
						),
						array(
							'id'      => 'header_type',
							'type'    => 'select',
							'title'   => esc_html__( 'Header Type', 'smilepure' ),
							'desc'    => 'When you choose Default, the value in <a href="' . admin_url( 'customize.php' ) . '" target="_blank">Customizer</a> will be used.',
							'default' => '',
							'options' => Smilepure_Helper::get_header_list( true ),
						),
						array(
							'id'      => 'menu_display',
							'type'    => 'select',
							'title'   => esc_html__( 'Primary Menu', 'smilepure' ),
							'desc'    => esc_html__( 'Select which menu displays on this page.', 'smilepure' ),
							'default' => '',
							'options' => Smilepure_Helper::get_all_menus(),
						),
						array(
							'id'      => 'menu_one_page',
							'type'    => 'switch',
							'title'   => esc_html__( 'One Page Menu', 'smilepure' ),
							'default' => '0',
							'options' => array(
								'0' => esc_html__( 'Disable', 'smilepure' ),
								'1' => esc_html__( 'Enable', 'smilepure' ),
							),
						),
						array(
							'id'      => 'custom_logo',
							'type'    => 'media',
							'title'   => esc_html__( 'Custom Logo', 'smilepure' ),
							'desc'    => esc_html__( 'Select custom logo for this page.', 'smilepure' ),
							'default' => '',
						),
						array(
							'id'      => 'custom_logo_retina',
							'type'    => 'media',
							'title'   => esc_html__( 'Custom Logo Retina', 'smilepure' ),
							'desc'    => esc_html__( 'Select custom logo retina for this page.', 'smilepure' ),
							'default' => '',
						),
						array(
							'id'      => 'custom_logo_width',
							'type'    => 'text',
							'title'   => esc_html__( 'Custom Logo Width', 'smilepure' ),
							'desc'    => esc_html__( 'Controls the width of logo, e.g 190px', 'smilepure' ),
							'default' => '',
						),
						array(
							'id'      => 'custom_sticky_logo_width',
							'type'    => 'text',
							'title'   => esc_html__( 'Custom Sticky Logo Width', 'smilepure' ),
							'desc'    => esc_html__( 'Controls the width of sticky logo, e.g 150px', 'smilepure' ),
							'default' => '',
						),
					),
				),
				array(
					'title'  => esc_html__( 'Title', 'smilepure' ),
					'fields' => array(
						array(
							'id'      => 'page_title_bar_layout',
							'type'    => 'select',
							'title'   => esc_html__( 'Layout', 'smilepure' ),
							'desc'    => 'When you choose Default, the value in <a href="' . admin_url( 'customize.php' ) . '" target="_blank">Customizer</a> will be used.',
							'default' => 'default',
							'options' => Smilepure_Helper::get_title_bar_list( true ),
						),
						array(
							'id'      => 'page_title_bar_background_color',
							'type'    => 'color',
							'title'   => esc_html__( 'Background Color', 'smilepure' ),
							'default' => '',
						),
						array(
							'id'      => 'page_title_bar_background',
							'type'    => 'media',
							'title'   => esc_html__( 'Background Image', 'smilepure' ),
							'default' => '',
						),
						array(
							'id'      => 'page_title_bar_background_overlay',
							'type'    => 'color',
							'title'   => esc_html__( 'Background Overlay', 'smilepure' ),
							'default' => '',
						),
						array(
							'id'    => 'page_title_bar_custom_heading',
							'type'  => 'text',
							'title' => esc_html__( 'Custom Title', 'smilepure' ),
							'desc'  => esc_html__( 'Insert custom heading for the page title bar. Leave blank to use default.', 'smilepure' ),
						),
						array(
							'id'    => 'page_title_bar_custom_text',
							'type'  => 'text',
							'title' => esc_html__( 'Custom text', 'smilepure' ),
							'desc'  => esc_html__( 'Insert custom text for the page title bar. Leave blank to use default.', 'smilepure' ),
						),
					),
				),
				array(
					'title'  => esc_html__( 'Sidebar', 'smilepure' ),
					'fields' => array(
						array(
							'id'      => 'page_sidebar_position',
							'type'    => 'switch',
							'title'   => esc_html__( 'Position', 'smilepure' ),
							'desc'    => 'When you choose Default, the value in <a href="' . admin_url( 'customize.php' ) . '" target="_blank">Customizer</a> will be used.',
							'default' => 'default',
							'options' => Smilepure_Helper::get_list_sidebar_positions( true ),
						),
						array(
							'id'      => 'page_sidebar_1',
							'type'    => 'select',
							'title'   => esc_html__( 'Sidebar 1', 'smilepure' ),
							'desc'    => esc_html__( 'Select sidebar 1 that will display on this page.', 'smilepure' ),
							'default' => 'default',
							'options' => $page_registered_sidebars,
						),
						array(
							'id'      => 'page_sidebar_2',
							'type'    => 'select',
							'title'   => esc_html__( 'Sidebar 2', 'smilepure' ),
							'desc'    => esc_html__( 'Select sidebar 2 that will display on this page.', 'smilepure' ),
							'default' => 'default',
							'options' => $page_registered_sidebars,
						),
					),
				),
				array(
					'title'  => esc_html__( 'Slider', 'smilepure' ),
					'fields' => array(
						array(
							'id'      => 'revolution_slider',
							'type'    => 'select',
							'title'   => esc_html__( 'Revolution Slider', 'smilepure' ),
							'desc'    => esc_html__( 'Select the unique name of the slider.', 'smilepure' ),
							'options' => Smilepure_Helper::get_list_revslider(),
						),
						array(
							'id'      => 'slider_position',
							'type'    => 'select',
							'title'   => esc_html__( 'Position', 'smilepure' ),
							'default' => 'below',
							'options' => array(
								'above' => esc_html__( 'Above Header', 'smilepure' ),
								'below' => esc_html__( 'Below Header', 'smilepure' ),
							),
						),
					),
				),
				array(
					'title'  => esc_html__( 'Footer', 'smilepure' ),
					'fields' => array(
						array(
							'id'      => 'footer_page',
							'type'    => 'select',
							'title'   => esc_html__( 'Footer', 'smilepure' ),
							'desc'    => 'When you choose Default, the value in <a href="' . admin_url( 'customize.php' ) . '" target="_blank">Customizer</a> will be used.',
							'default' => 'default',
							'options' => Smilepure_Footer::get_list_footers( true ),
						),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_page_options',
				'title'      => esc_html__( 'Page Options', 'smilepure' ),
				'post_types' => array( 'page' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => $general_options,
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_post_options',
				'title'      => esc_html__( 'Page Options', 'smilepure' ),
				'post_types' => array( 'post' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array_merge( array(
							array(
								'title'  => esc_html__( 'Post', 'smilepure' ),
								'fields' => array(
									array(
										'id'    => 'post_gallery',
										'type'  => 'gallery',
										'title' => esc_html__( 'Gallery Format', 'smilepure' ),
									),
									array(
										'id'    => 'post_video',
										'type'  => 'textarea',
										'title' => esc_html__( 'Video Format', 'smilepure' ),
									),
									array(
										'id'    => 'post_audio',
										'type'  => 'textarea',
										'title' => esc_html__( 'Audio Format', 'smilepure' ),
									),
									array(
										'id'    => 'post_quote_text',
										'type'  => 'text',
										'title' => esc_html__( 'Quote Format - Source Text', 'smilepure' ),
									),
									array(
										'id'    => 'post_quote_name',
										'type'  => 'text',
										'title' => esc_html__( 'Quote Format - Source Name', 'smilepure' ),
									),
									array(
										'id'    => 'post_quote_url',
										'type'  => 'text',
										'title' => esc_html__( 'Quote Format - Source Url', 'smilepure' ),
									),
									array(
										'id'    => 'post_link',
										'type'  => 'text',
										'title' => esc_html__( 'Link Format', 'smilepure' ),
									),
								),
							),
						), $general_options ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_product_options',
				'title'      => esc_html__( 'Page Options', 'smilepure' ),
				'post_types' => array( 'product' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => $general_options,
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_service_options',
				'title'      => esc_html__( 'Page Options', 'smilepure' ),
				'post_types' => array( 'service' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array_merge( array(
							array(
								'title'  => esc_html__( 'Service', 'smilepure' ),
								'fields' => array(
									array(
										'id'      => 'service_message',
										'type'    => 'message',
										'title'   => esc_html__( 'Info', 'smilepure' ),
										'message' => esc_html__( 'These options just use for the service.', 'smilepure' ),
									),
									array(
										'id'      => 'service_style',
										'type'    => 'select',
										'title'   => esc_html__( 'Style', 'smilepure' ),
										'desc'    => esc_html__( 'Select style for the single service page.', 'smilepure' ),
										'default' => '',
										'options' => array(
											''   => esc_html__( 'Default', 'smilepure' ),
											'01' => esc_html__( 'Style 01', 'smilepure' ),
											'02' => esc_html__( 'Style 02', 'smilepure' ),
										),
									),
									array(
										'id'      => 'service_icon',
										'type'    => 'text',
										'title'   => esc_html__( 'Icon', 'smilepure' ),
										'desc'    => esc_html__( 'Add the icon for this service.', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'service_image_small',
										'type'    => 'media',
										'title'   => esc_html__( 'Image small', 'smilepure' ),
										'desc'    => esc_html__( 'Images are only displayed in Service style 04.', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'service_trending',
										'type'    => 'switch',
										'title'   => esc_html__( 'Trending', 'smilepure' ),
										'default' => '0',
										'options' => array(
											'0'   => esc_html__( 'No', 'smilepure' ),
											'yes' => esc_html__( 'Yes', 'smilepure' ),
										),
									),
								),
							),
						), $general_options ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_doctor_options',
				'title'      => esc_html__( 'Doctor Options', 'smilepure' ),
				'post_types' => array( 'ic_doctor' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array_merge( array(
							array(
								'title'  => esc_html__( 'Doctor Details', 'smilepure' ),
								'fields' => array(
									array(
										'id'      => 'position',
										'type'    => 'text',
										'title'   => esc_html__( 'Position', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a position of doctor (for example: "Physiotherapist").', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'url_facebook',
										'type'    => 'text',
										'title'   => esc_html__( 'Facebook', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a URL facebook.', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'url_twitter',
										'type'    => 'text',
										'title'   => esc_html__( 'Twitter', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a URL twitter.', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'url_instagram',
										'type'    => 'text',
										'title'   => esc_html__( 'Instagram', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a URL instagram.', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'url_google_plus',
										'type'    => 'text',
										'title'   => esc_html__( 'Google plus', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a URL google plus.', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'url_linkedin',
										'type'    => 'text',
										'title'   => esc_html__( 'Linkedin', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a URL linkedin.', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'url_pinterest',
										'type'    => 'text',
										'title'   => esc_html__( 'Pinterest', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a URL pinterest.', 'smilepure' ),
										'default' => '',
									),

								),
							),
						), $general_options ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_testimonial_options',
				'title'      => esc_html__( 'Testimonial Options', 'smilepure' ),
				'post_types' => array( 'testimonial' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array(
							array(
								'title'  => esc_html__( 'Testimonial Details', 'smilepure' ),
								'fields' => array(
									array(
										'id'      => 'by_line',
										'type'    => 'text',
										'title'   => esc_html__( 'By Line', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a byline for the customer giving this testimonial (for example: "CEO of Thememove").', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'url',
										'type'    => 'text',
										'title'   => esc_html__( 'Url', 'smilepure' ),
										'desc'    => esc_html__( 'Enter a URL that applies to this customer (for example: http://www.thememove.com/).', 'smilepure' ),
										'default' => '',
									),
									array(
										'id'      => 'rating',
										'type'    => 'select',
										'title'   => esc_html__( 'Rating', 'smilepure' ),
										'default' => '',
										'options' => array(
											''  => esc_html__( 'Select a rating', 'smilepure' ),
											'1' => esc_html__( '1 Star', 'smilepure' ),
											'2' => esc_html__( '2 Stars', 'smilepure' ),
											'3' => esc_html__( '3 Stars', 'smilepure' ),
											'4' => esc_html__( '4 Stars', 'smilepure' ),
											'5' => esc_html__( '5 Stars', 'smilepure' ),
										),
									),
								),
							),
						),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_footer_options',
				'title'      => esc_html__( 'Footer Options', 'smilepure' ),
				'post_types' => array( 'ic_footer' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array(
							array(
								'title'  => esc_html__( 'Effect', 'smilepure' ),
								'fields' => array(
									array(
										'id'      => 'effect',
										'type'    => 'switch',
										'title'   => esc_html__( 'Effect', 'smilepure' ),
										'default' => '',
										'options' => array(
											''         => esc_html__( 'Normal', 'smilepure' ),
											'parallax' => esc_html__( 'Parallax', 'smilepure' ),
										),
									),
								),
							),
							array(
								'title'  => esc_html__( 'Styling', 'smilepure' ),
								'fields' => array(
									array(
										'id'      => 'style',
										'type'    => 'select',
										'title'   => esc_html__( 'Style', 'smilepure' ),
										'default' => '01',
										'options' => array(
											'01' => esc_html__( 'Style 01', 'smilepure' ),
											'02' => esc_html__( 'Style 02', 'smilepure' ),
										),
									),
								),
							),
						),
					),
				),
			);

			return $meta_boxes;
		}

	}

	new Smilepure_Metabox();
}
