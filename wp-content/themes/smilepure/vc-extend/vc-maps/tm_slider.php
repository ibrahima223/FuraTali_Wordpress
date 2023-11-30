<?php

class WPBakeryShortCode_TM_Slider extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		$slide_tmp = '';

		if ( isset( $atts['text_align'] ) && $atts['text_align'] !== '' ) {
			$slide_tmp .= "text-align: {$atts['text_align']};";
		}

		if ( $slide_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .swiper-slide { $slide_tmp }";
		}

		if ( $atts['style'] === '3' ) {
			if ( isset( $atts['item_width'] ) ) {
				Smilepure_VC::get_responsive_css( array(
					'element' => "$selector .swiper-slide",
					'atts'    => array(
						'width' => array(
							'media_str' => $atts['item_width'],
							'unit'      => 'px',
						),
					),
				) );
			}
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$slides_tab  = esc_html__( 'Slides', 'smilepure' );
$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Slider', 'smilepure' ),
	'base'                      => 'tm_slider',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-carousel',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Carousel 01', 'smilepure' )                    => '1',
				esc_html__( 'Carousel 02', 'smilepure' )                    => '2',
				esc_html__( 'Carousel 03 - Auto Items', 'smilepure' )       => '3',
				esc_html__( 'Carousel 04 - Modern Full Wide', 'smilepure' ) => '4',
				esc_html__( 'Carousel 05', 'smilepure' )                    => '5',
			),
			'std'         => '1',
			'admin_label' => true
		),
		array(
			'heading'     => esc_html__( 'Items Display', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'item_width',
			'min'         => 100,
			'max'         => 1000,
			'step'        => 10,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => 370,
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'3',
				),
			),
		),
		array(
			'heading'    => esc_html__( 'Centered', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'centered',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'3',
					'4',
				),
			),
		),
		array(
			'heading'    => esc_html__( 'Image Size', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'image_size',
			'value'      => array(
				esc_html__( '1170x560 (1 Column)', 'smilepure' ) => '1170x560',
				esc_html__( '600x400 (1 Column)', 'smilepure' )  => '600x400',
				esc_html__( '500x338 (3 Columns)', 'smilepure' ) => '500x338',
				esc_html__( '500x676 (3 Columns)', 'smilepure' ) => '500x676',
				esc_html__( 'Full', 'smilepure' )                => 'full',
			),
			'std'        => '500x338',
		),
		array(
			'heading'    => esc_html__( 'Auto Height', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'auto_height',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
			'std'        => '1',
		),
		array(
			'heading'    => esc_html__( 'Loop', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'loop',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
			'std'        => '1',
		),
		array(
			'heading'     => esc_html__( 'Auto Play', 'smilepure' ),
			'description' => esc_html__( 'Delay between transitions (in ms), e.g 3000. Leave blank to disabled.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'auto_play',
		),
		array(
			'heading'    => esc_html__( 'Equal Height', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'equal_height',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Vertically Center', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'v_center',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Navigation', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'nav',
			'value'      => Smilepure_VC::get_slider_navs(),
			'std'        => '',
		),
		Smilepure_VC::extra_id_field( array(
			'heading'    => esc_html__( 'Slider Button ID', 'smilepure' ),
			'param_name' => 'slider_button_id',
			'dependency' => array(
				'element' => 'nav',
				'value'   => array(
					'custom',
				),
			),
		) ),
		array(
			'heading'    => esc_html__( 'Pagination', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'pagination',
			'value'      => Smilepure_VC::get_slider_dots(),
			'std'        => '',
		),
		array(
			'heading'     => esc_html__( 'Items Display', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'items_display',
			'min'         => 1,
			'max'         => 10,
			'suffix'      => 'item (s)',
			'media_query' => array(
				'lg' => 3,
				'md' => 3,
				'sm' => 2,
				'xs' => 1,
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'1',
					'2',
					'5',
				),
			),
		),
		array(
			'heading'    => esc_html__( 'Gutter', 'smilepure' ),
			'type'       => 'number',
			'param_name' => 'gutter',
			'std'        => 30,
			'min'        => 0,
			'max'        => 50,
			'step'       => 1,
			'suffix'     => 'px',
		),
		array(
			'heading'    => esc_html__( 'Full-width Image', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'fw_image',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => $slides_tab,
			'heading'    => esc_html__( 'Slides', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Image', 'smilepure' ),
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Sub Title', 'smilepure' ),
					'type'       => 'textfield',
					'param_name' => 'sub_title',
				),
				array(
					'heading'     => esc_html__( 'Title', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Text', 'smilepure' ),
					'type'       => 'textarea',
					'param_name' => 'text',
				),
				array(
					'heading'    => esc_html__( 'Link', 'smilepure' ),
					'type'       => 'vc_link',
					'param_name' => 'link',
				),
			),
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Text Align', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'text_align',
			'value'      => array(
				esc_html__( 'Default', 'smilepure' ) => '',
				esc_html__( 'Left', 'smilepure' )    => 'left',
				esc_html__( 'Center', 'smilepure' )  => 'center',
				esc_html__( 'Right', 'smilepure' )   => 'right',
				esc_html__( 'Justify', 'smilepure' ) => 'justify',
			),
			'std'        => '',

		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
