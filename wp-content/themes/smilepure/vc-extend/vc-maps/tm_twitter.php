<?php

class WPBakeryShortCode_TM_Twitter extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;

		$icon_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$text_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );

		if ( $icon_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .tweet:before{ $icon_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .tweet{ $text_tmp }";
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$carousel_tab = esc_html__( 'Carousel Settings', 'smilepure' );
$styling_tab  = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Twitter', 'smilepure' ),
	'base'                      => 'tm_twitter',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-twitter',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Widget title', 'smilepure' ),
			'description' => esc_html__( 'What text use as a widget title.', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'widget_title',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'List', 'smilepure' )         => 'list',
				esc_html__( 'Slider', 'smilepure' )       => 'slider',
				esc_html__( 'Slider Quote', 'smilepure' ) => 'slider-quote',
			),
			'std'         => 'slider-quote',
		),
		array(
			'heading'    => esc_html__( 'Consumer Key', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'consumer_key',
		),
		array(
			'heading'    => esc_html__( 'Consumer Secret', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'consumer_secret',
		),
		array(
			'heading'    => esc_html__( 'Access Token', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'access_token',
		),
		array(
			'heading'    => esc_html__( 'Access Token Secret', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'access_token_secret',
		),
		array(
			'heading'    => esc_html__( 'Twitter Username', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'username',
		),
		array(
			'heading'    => esc_html__( 'Number of tweets', 'smilepure' ),
			'type'       => 'number',
			'param_name' => 'number_items',
		),
		array(
			'heading'    => esc_html__( 'Heading', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'heading',
			'std'        => esc_html__( 'From Twitter', 'smilepure' ),
		),
		array(
			'heading'    => esc_html__( 'Show date.', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'show_date',
			'value'      => array(
				esc_html__( 'Yes', 'smilepure' ) => '1',
			),
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Speed', 'smilepure' ),
			'description' => esc_html__( 'Duration of transition between slides (in ms), e.g 1000. Leave blank to use default.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'carousel_speed',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider_2',
					'slider-quote',
				),
			),
		),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Auto Play', 'smilepure' ),
			'description' => esc_html__( 'Delay between transitions (in ms), e.g 3000. Leave blank to disabled.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'carousel_auto_play',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider_2',
					'slider-quote',
				),
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Navigation', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_nav',
			'value'      => Smilepure_VC::get_slider_navs(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider_2',
					'slider-quote',
				),
			),
		),
		Smilepure_VC::extra_id_field( array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Slider Button ID', 'smilepure' ),
			'param_name' => 'slider_button_id',
			'dependency' => array(
				'element' => 'carousel_nav',
				'value'   => array(
					'custom',
				),
			),
		) ),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Pagination', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_pagination',
			'value'      => Smilepure_VC::get_slider_dots(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider_2',
					'slider-quote',
				),
			),
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Icon Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Custom Icon Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_color',
			'dependency'       => array(
				'element' => 'icon_color',
				'value'   => 'custom',
			),
			'std'              => '#999',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Text Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'text_color',
			'value'            => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Custom Text Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_text_color',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#999',
			'edit_field_class' => 'vc_col-sm-6',
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
