<?php

class WPBakeryShortCode_TM_Popup_Video extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
		if ( $atts['bg_image'] !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .video-play {background-image: url(" . wp_get_attachment_image_url( $atts['bg_image'], 'full' ) . ")};";
		}
	}
}

$posters_style = array(
	'poster-01',
	'poster-02',
	'poster-03',
	'poster-04',
	'poster-05',
	'poster-06',
	'poster-07',
);

$button_style = array(
	'button',
	'button-02',
	'button-03',
	'button-04',
	'button-05',
	'button-06',
);

vc_map( array(
	'name'                      => esc_html__( 'Popup Video', 'smilepure' ),
	'base'                      => 'tm_popup_video',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-video',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Poster Style 01', 'smilepure' )              => 'poster-01',
				esc_html__( 'Poster Style 02', 'smilepure' )              => 'poster-02',
				esc_html__( 'Poster Style 03', 'smilepure' )              => 'poster-03',
				esc_html__( 'Poster Style 04', 'smilepure' )              => 'poster-04',
				esc_html__( 'Poster Style 05', 'smilepure' )              => 'poster-05',
				esc_html__( 'Poster Style 06', 'smilepure' )              => 'poster-06',
				esc_html__( 'Poster Style 07', 'smilepure' )              => 'poster-07',
				esc_html__( 'White button Solid', 'smilepure' )           => 'button',
				esc_html__( 'White button Border', 'smilepure' )          => 'button-02',
				esc_html__( 'Primary button Outline', 'smilepure' )       => 'button-03',
				esc_html__( 'Primary button Solid', 'smilepure' )         => 'button-05',
				esc_html__( 'Button With Background Image', 'smilepure' ) => 'button-06',
			),
			'std'         => 'poster-01',
		),
		array(
			'heading'     => esc_html__( 'Video Url', 'smilepure' ),
			'description' => esc_html__( 'E.g "https://www.youtube.com/watch?v=9No-FiEInLA"', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'video',
		),
		array(
			'heading'    => esc_html__( 'Video Text', 'smilepure' ),
			'type'       => 'textfield',
			'param_name' => 'video_text',
			'std'        => esc_html__( 'Play Video', 'smilepure' ),
			'dependency' => array(
				'element'            => 'style',
				'value_not_equal_to' => array(
					'poster-02',
					'poster-07',
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Text position', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'text_position',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Top', 'smilepure' )    => 'top',
				esc_html__( 'Right', 'smilepure' )  => 'right',
				esc_html__( 'Bottom', 'smilepure' ) => 'bottom',
				esc_html__( 'Left', 'smilepure' )   => 'left',
			),
			'std'         => 'bottom',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'button',
					'button-02',
					'button-03',
					'button-04',
					'button-05',
					'button-06',
				),
			),
		),
		array(
			'heading'    => esc_html__( 'Button Background Image', 'smilepure' ),
			'type'       => 'attach_image',
			'param_name' => 'bg_image',
			'dependency' => array( 'element' => 'style', 'value' => array( 'button-06' ) ),
		),
		array(
			'heading'    => esc_html__( 'Align', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'align',
			'value'      => array(
				esc_html__( 'Left', 'smilepure' )   => 'left',
				esc_html__( 'Center', 'smilepure' ) => 'center',
				esc_html__( 'Right', 'smilepure' )  => 'right',
			),
			'std'        => 'center',
			'dependency' => array( 'element' => 'style', 'value' => $button_style ),
		),
		array(
			'heading'    => esc_html__( 'Poster Image', 'smilepure' ),
			'type'       => 'attach_image',
			'param_name' => 'poster',
			'dependency' => array( 'element' => 'style', 'value' => $posters_style ),
		),
		array(
			'heading'     => esc_html__( 'Poster Image Size', 'smilepure' ),
			'description' => esc_html__( 'Controls the size of poster image.', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'image_size',
			'value'       => array(
				esc_html__( '670x455', 'smilepure' ) => '670x455',
				esc_html__( '600x420', 'smilepure' ) => '600x420',
				esc_html__( '570x364', 'smilepure' ) => '570x364',
				esc_html__( '470x320', 'smilepure' ) => '470x320',
				esc_html__( 'Full', 'smilepure' )    => 'full',
				esc_html__( 'Custom', 'smilepure' )  => 'custom',
			),
			'std'         => '670x455',
			'dependency'  => array( 'element' => 'style', 'value' => $posters_style ),
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
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		Smilepure_VC::extra_class_field(),
	), Smilepure_VC::get_vc_spacing_tab(), Smilepure_VC::get_custom_style_tab() ),
) );
