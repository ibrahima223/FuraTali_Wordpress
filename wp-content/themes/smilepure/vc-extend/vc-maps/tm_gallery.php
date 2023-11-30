<?php

class WPBakeryShortCode_TM_Gallery extends WPBakeryShortCode {

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
	'name'     => esc_html__( 'Gallery', 'smilepure' ),
	'base'     => 'tm_gallery',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-gallery',
	'params'   => array_merge( array(
		array(
			'heading'    => esc_html__( 'Images', 'smilepure' ),
			'type'       => 'attach_images',
			'param_name' => 'images',
		),
		array(
			'heading'     => esc_html__( 'Gallery Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Grid Classic', 'smilepure' )    => 'grid',
				esc_html__( 'Grid Metro', 'smilepure' )      => 'metro',
				esc_html__( 'Grid Masonry', 'smilepure' )    => 'masonry',
				esc_html__( 'Justify Gallery', 'smilepure' ) => 'justified',
			),
			'std'         => 'grid',
		),
		array(
			'heading'     => esc_html__( 'Hover Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'hover_style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'With Overlay', 'smilepure' ) => 'overlay',
				esc_html__( 'Simple', 'smilepure' )       => 'simple',
			),
			'std'         => 'overlay',
		),
		array(
			'heading'    => esc_html__( 'Image Size', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'image_size',
			'value'      => array(
				esc_html__( 'Full', 'smilepure' )    => 'full',
				esc_html__( 'Custom', 'smilepure' )  => 'custom',
				esc_html__( '480x480', 'smilepure' ) => '480x480',
				esc_html__( '370x250', 'smilepure' ) => '370x250',
				esc_html__( '570x385', 'smilepure' ) => '570x385',
			),
			'std'        => '480x480',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'grid',
				),
			),
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
			'heading'    => esc_html__( 'Metro Layout', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'metro_layout',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Item Size', 'smilepure' ),
					'type'        => 'dropdown',
					'param_name'  => 'size',
					'admin_label' => true,
					'value'       => array(
						esc_html__( 'Width 1 - Height 1', 'smilepure' ) => '1:1',
						esc_html__( 'Width 1 - Height 2', 'smilepure' ) => '1:2',
						esc_html__( 'Width 2 - Height 1', 'smilepure' ) => '2:1',
						esc_html__( 'Width 2 - Height 2', 'smilepure' ) => '2:2',
					),
					'std'         => '1:1',
				),
			),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'size' => '2:2',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '2:2',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
			) ) ),
			'dependency' => array(
				'element' => 'style',
				'value'   => array( 'metro' ),
			),
		),
		array(
			'heading'     => esc_html__( 'Columns', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'columns',
			'min'         => 1,
			'max'         => 6,
			'step'        => 1,
			'suffix'      => '',
			'media_query' => array(
				'lg' => '3',
				'md' => '',
				'sm' => '2',
				'xs' => '1',
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'grid',
					'metro',
					'masonry',
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Columns Gutter', 'smilepure' ),
			'description' => esc_html__( 'Controls the gutter of grid columns.', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'     => esc_html__( 'Rows Gutter', 'smilepure' ),
			'description' => esc_html__( 'Controls the gutter of grid rows.', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'row_gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'     => esc_html__( 'Row Height', 'smilepure' ),
			'description' => esc_html__( 'Controls the height of grid row.', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'justify_row_height',
			'std'         => 300,
			'min'         => 50,
			'max'         => 500,
			'step'        => 10,
			'suffix'      => 'px',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'justified' ),
			),
		),
		array(
			'heading'     => esc_html__( 'Max Row Height', 'smilepure' ),
			'description' => esc_html__( 'Controls the max height of grid row. Leave blank or 0 keep it disabled.', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'justify_max_row_height',
			'std'         => 0,
			'min'         => 0,
			'max'         => 500,
			'step'        => 10,
			'suffix'      => 'px',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'justified' ),
			),
		),
		array(
			'heading'    => esc_html__( 'Last row alignment', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'justify_last_row_alignment',
			'value'      => array(
				esc_html__( 'Justify', 'smilepure' )                              => 'justify',
				esc_html__( 'Left', 'smilepure' )                                 => 'nojustify',
				esc_html__( 'Center', 'smilepure' )                               => 'center',
				esc_html__( 'Right', 'smilepure' )                                => 'right',
				esc_html__( 'Hide ( if row can not be justified )', 'smilepure' ) => 'hide',
			),
			'std'        => 'justify',
			'dependency' => array(
				'element' => 'style',
				'value'   => array( 'justified' ),
			),
		),
		Smilepure_VC::get_animation_field( array(
			'std'        => 'move-up',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'grid',
					'metro',
					'masonry',
					'justified',
				),
			),
		) ),
		Smilepure_VC::extra_class_field(),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Image Rounded', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'image_rounded',
			'description' => esc_html__( 'Input a valid radius, e.g 10px. Leave blank to use default.', 'smilepure' ),
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );

