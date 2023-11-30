<?php

class WPBakeryShortCode_TM_Before_After_Image extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Image Before After', 'smilepure' ),
	'base'     => 'tm_before_after_image',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-gallery',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'smilepure' ) => '1',
			),
			'std'         => '1',
		),
		array(
			'heading'     => esc_html__( 'Image Size', 'smilepure' ),
			'description' => esc_html__( 'Controls the size of image.', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'image_size',
			'value'       => array(
				esc_html__( 'Full', 'smilepure' )   => 'full',
				esc_html__( 'Custom', 'smilepure' ) => 'custom',
			),
			'std'         => 'full',
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
		array(
			'heading'     => esc_html__( 'Image before', 'smilepure' ),
			'type'        => 'attach_image',
			'param_name'  => 'image_before',
			'admin_label' => true,
		),
		array(
			'heading'     => esc_html__( 'Image after', 'smilepure' ),
			'type'        => 'attach_image',
			'param_name'  => 'image_after',
			'admin_label' => true,
		),

		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );

