<?php

class WPBakeryShortCode_TM_Gallery_Slider extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		$image_tmp = '';

		if ( isset( $atts['image_rounded'] ) && $atts['image_rounded'] !== '' ) {
			$image_tmp .= Smilepure_Helper::get_css_prefix( 'border-radius', $atts['image_rounded'] );
		}

		if ( $image_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .grid-item { {$image_tmp} }";
		}

		Smilepure_VC::get_grid_css( $selector, $atts );

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'     => esc_html__( 'Gallery Slider', 'smilepure' ),
	'base'     => 'tm_gallery_slider',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-gallery',
	'params'   => array_merge( array(
		array(
			'heading'    => esc_html__( 'Images', 'smilepure' ),
			'type'       => 'attach_images',
			'param_name' => 'images',
		),
		array(
			'heading'    => esc_html__( 'Image Size', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'image_size',
			'value'      => array(
				esc_html__( 'Full', 'smilepure' )     => 'full',
				esc_html__( 'Custom', 'smilepure' )   => 'custom',
				esc_html__( '1170x680', 'smilepure' ) => '1170x680',
			),
			'std'        => '1170x680',
		),
		array(
			'heading'          => esc_html__( 'Image Width', 'smilepure' ),
			'type'             => 'number',
			'param_name'       => 'image_size_width',
			'min'              => 0,
			'max'              => 1920,
			'step'             => 10,
			'suffix'           => 'px',
			'dependency'       => array(
				'element' => 'image_size',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'heading'          => esc_html__( 'Image Height', 'smilepure' ),
			'type'             => 'number',
			'param_name'       => 'image_size_height',
			'min'              => 0,
			'max'              => 1920,
			'step'             => 10,
			'suffix'           => 'px',
			'dependency'       => array(
				'element' => 'image_size',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),


		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );

