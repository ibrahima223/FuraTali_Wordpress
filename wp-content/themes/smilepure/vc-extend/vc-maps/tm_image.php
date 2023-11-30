<?php

class WPBakeryShortCode_TM_Image extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		global $Smilepure_shortcode_md_css;
		global $Smilepure_shortcode_sm_css;
		global $Smilepure_shortcode_xs_css;
		$tmp = $image_tmp = '';

		$tmp .= "text-align: {$atts['align']}";

		if ( $tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector{ $tmp }";
		}

		if ( $atts['md_align'] !== '' ) {
			$Smilepure_shortcode_md_css .= "$selector { text-align: {$atts['md_align']} }";
		}

		if ( $atts['sm_align'] !== '' ) {
			$Smilepure_shortcode_sm_css .= "$selector { text-align: {$atts['sm_align']} }";
		}

		if ( $atts['xs_align'] !== '' ) {
			$Smilepure_shortcode_xs_css .= "$selector { text-align: {$atts['xs_align']} }";
		}

		if ( $atts['rounded'] !== '' ) {
			$image_tmp .= Smilepure_Helper::get_css_prefix( 'border-radius', "{$atts['rounded']}px" );
		}

		if ( $atts['box_shadow'] !== '' ) {
			$image_tmp .= Smilepure_Helper::get_css_prefix( 'box-shadow', $atts['box_shadow'] );
		}

		if ( $atts['full_wide'] === '1' ) {
			$image_tmp .= "width: 100%;";
		}

		if ( $image_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector img { $image_tmp }";
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Single Image', 'smilepure' ),
	'base'                      => 'tm_image',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-singleimage',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Image', 'smilepure' ),
			'type'        => 'attach_image',
			'param_name'  => 'image',
			'admin_label' => true
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
			'heading'    => esc_html__( 'On Click Action', 'smilepure' ),
			'desc'       => esc_html__( 'Select action for click action.', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'action',
			'value'      => array(
				esc_html__( 'None', 'smilepure' )             => '',
				esc_html__( 'Open Popup', 'smilepure' )       => 'popup',
				esc_html__( 'Open Custom Link', 'smilepure' ) => 'custom_link',
				esc_html__( 'Return To Home', 'smilepure' )   => 'go_to_home',
			),
			'std'        => '',
		),
		array(
			'heading'     => esc_html__( 'Link', 'smilepure' ),
			'description' => esc_html__( 'Add a link to image.', 'smilepure' ),
			'type'        => 'vc_link',
			'param_name'  => 'custom_link',
			'dependency'  => array(
				'element' => 'action',
				'value'   => 'custom_link',
			),
		),
		array(
			'heading'     => esc_html__( 'Full Width', 'smilepure' ),
			'description' => esc_html__( 'Make image fit wide of container', 'smilepure' ),
			'type'        => 'checkbox',
			'param_name'  => 'full_wide',
			'value'       => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Rounded', 'smilepure' ),
			'description' => esc_html__( 'Controls the rounded of image', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'rounded',
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Box Shadow', 'smilepure' ),
			'description' => esc_html__( 'E.g 0 20px 30px #ccc', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'box_shadow',
		),
		array(
			'heading'     => esc_html__( 'Caption', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'caption',
			'admin_label' => true,
		),
	), Smilepure_VC::get_alignment_fields(), array(
		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab() ),

) );
