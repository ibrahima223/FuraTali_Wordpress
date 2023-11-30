<?php

class WPBakeryShortCode_TM_List extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		global $Smilepure_shortcode_md_css;
		global $Smilepure_shortcode_sm_css;
		global $Smilepure_shortcode_xs_css;

		$css  = $tmp = '';

		$css .= "$selector{ text-align: {$atts['align']} }";

		if ( $atts['md_align'] !== '' ) {
			$Smilepure_shortcode_md_css .= "$selector { text-align: {$atts['md_align']} }";
		}

		if ( $atts['sm_align'] !== '' ) {
			$Smilepure_shortcode_sm_css .= "$selector { text-align: {$atts['sm_align']} }";
		}

		if ( $atts['xs_align'] !== '' ) {
			$Smilepure_shortcode_xs_css .= "$selector { text-align: {$atts['xs_align']} }";
		}

		$marker_tmp  = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['marker_color'], $atts['custom_marker_color'] );
		$marker_tmp  .= Smilepure_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['marker_background_color'], $atts['custom_marker_background_color'] );
		$heading_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['title_color'], $atts['custom_title_color'] );
		$text_tmp    = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['desc_color'], $atts['custom_desc_color'] );

		if ( $marker_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .marker { $marker_tmp }";
		}

		if ( $heading_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .title { $heading_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .desc { $text_tmp }";
		}

		if ( isset( $atts['columns'] ) && $atts['columns'] !== '' ) {
			$arr = explode( ';', $atts['columns'] );
			foreach ( $arr as $value ) {
				$tmp = explode( ':', $value );

				switch ( $tmp[0] ) {
					case 'sm' :
						$Smilepure_shortcode_sm_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
					case 'md' :
						$Smilepure_shortcode_md_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
					case 'xs' :
						$Smilepure_shortcode_xs_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
					case 'lg' :
						$Smilepure_shortcode_lg_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
				}
			}
		}

		Smilepure_VC::get_responsive_css( array(
			'element' => "$selector .title",
			'atts'    => array(
				'font-size' => array(
					'media_str' => $atts['heading_font_size'],
					'unit'      => 'px',
				),
			),
		) );

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'List', 'smilepure' ),
	'base'                      => 'tm_list',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-list',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Widget title', 'smilepure' ),
			'description' => esc_html__( 'What text use as a widget title.', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'widget_title',
		),
		array(
			'heading'     => esc_html__( 'List Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'list_style',
			'value'       => array(
				esc_html__( 'Circle List', 'smilepure' )               => 'circle',
				esc_html__( 'Circle List 02', 'smilepure' )            => 'circle-02',
				esc_html__( 'Check List', 'smilepure' )                => 'check',
				esc_html__( 'Check List 02', 'smilepure' )             => 'check-02',
				esc_html__( 'Check List 03', 'smilepure' )             => 'check-03',
				esc_html__( 'Icon List', 'smilepure' )                 => 'icon',
				esc_html__( 'Icon List 02', 'smilepure' )              => 'icon-02',
				esc_html__( 'Icon List 03', 'smilepure' )              => 'icon-03',
				esc_html__( 'Modern Icon List', 'smilepure' )          => 'modern-icon',
				esc_html__( 'Modern Icon List 02', 'smilepure' )       => 'modern-icon-02',
				esc_html__( 'Modern Icon List 03', 'smilepure' )       => 'modern-icon-03',
				esc_html__( '(Automatic) Numbered List', 'smilepure' ) => 'auto-numbered',
				esc_html__( '(Manual) Numbered List', 'smilepure' )    => 'manual-numbered',
				esc_html__( 'List inline', 'smilepure' )               => 'inline',
			),
			'admin_label' => true,
			'std'         => 'icon',
		),
		array(
			'heading'          => '<label class="hint--right hint-bounce" style="margin-right: 10px;" data-hint="' . esc_attr__( 'Large Device', 'smilepure' ) . '"><i class="fa fa-desktop"></i></label>' . esc_html__( 'Alignment', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'align',
			'value'            => array(
				esc_html__( 'Left', 'smilepure' )   => 'left',
				esc_html__( 'Center', 'smilepure' ) => 'center',
				esc_html__( 'Right', 'smilepure' )  => 'right',
			),
			'std'              => 'left',
			'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
			'dependency'       => array(
				'element' => 'list_style',
				'value'   => array(
					'inline',
				),
			),
		),
		array(
			'heading'          => '<label class="hint--top hint-bounce" style="margin-right: 10px;" data-hint="' . esc_attr__( 'Medium Device', 'smilepure' ) . '"><i class="fa fa-tablet fa-rotate-270"></i></label>' . esc_html__( 'Alignment', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'md_align',
			'value'            => array(
				esc_html__( 'Inherit From Larger', 'smilepure' ) => '',
				esc_html__( 'Left', 'smilepure' )                => 'left',
				esc_html__( 'Center', 'smilepure' )              => 'center',
				esc_html__( 'Right', 'smilepure' )               => 'right',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-3',
			'dependency'       => array(
				'element' => 'list_style',
				'value'   => array(
					'inline',
				),
			),
		),
		array(
			'heading'          => '<label class="hint--top hint-bounce" style="margin-right: 10px;" data-hint="' . esc_attr__( 'Small Device', 'smilepure' ) . '"><i class="fa fa-tablet"></i></label>' . esc_html__( 'Alignment', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'sm_align',
			'value'            => array(
				esc_html__( 'Inherit From Larger', 'smilepure' ) => '',
				esc_html__( 'Left', 'smilepure' )                => 'left',
				esc_html__( 'Center', 'smilepure' )              => 'center',
				esc_html__( 'Right', 'smilepure' )               => 'right',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-3',
			'dependency'       => array(
				'element' => 'list_style',
				'value'   => array(
					'inline',
				),
			),
		),
		array(
			'heading'          => '<label class="hint--top hint-bounce" style="margin-right: 10px;" data-hint="' . esc_attr__( 'Extra Small Device', 'smilepure' ) . '"><i class="fa fa-mobile"></i></label>' . esc_html__( 'Alignment', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'xs_align',
			'value'            => array(
				esc_html__( 'Inherit From Larger', 'smilepure' ) => '',
				esc_html__( 'Left', 'smilepure' )                => 'left',
				esc_html__( 'Center', 'smilepure' )              => 'center',
				esc_html__( 'Right', 'smilepure' )               => 'right',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-3',
			'dependency'       => array(
				'element' => 'list_style',
				'value'   => array(
					'inline',
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Columns', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'columns',
			'min'         => 1,
			'max'         => 10,
			'suffix'      => 'item (s)',
			'media_query' => array(
				'lg' => 1,
				'md' => '',
				'sm' => '',
				'xs' => 1,
			),
			'dependency'  => array(
				'element' => 'list_style',
				'value'   => array(
					'circle',
					'circle-02',
					'check',
					'check-02',
					'check-03',
					'icon',
					'icon-02',
					'icon-03',
					'modern-icon',
					'modern-icon-02',
					'modern-icon-03',
					'auto-numbered',
					'manual-numbered',
				),
			),
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Marker Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'marker_color',
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
			'heading'          => esc_html__( 'Custom Marker Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_marker_color',
			'dependency'       => array(
				'element' => 'marker_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Marker Background Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'marker_background_color',
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
			'heading'          => esc_html__( 'Custom Marker Background Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_marker_background_color',
			'dependency'       => array(
				'element' => 'marker_background_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Title Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'title_color',
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
			'heading'          => esc_html__( 'Custom Title Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_title_color',
			'dependency'       => array(
				'element' => 'title_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Description Color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'desc_color',
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
			'heading'          => esc_html__( 'Custom Description Color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_desc_color',
			'dependency'       => array(
				'element' => 'desc_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Heading Font Size', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'heading_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
	),

		Smilepure_VC::icon_libraries( array(
			'allow_none' => true,
			'group'      => '',
			'dependency' => array(
				'element' => 'list_style',
				'value'   => array(
					'icon',
					'icon-02',
					'icon-03',
					'modern-icon',
					'modern-icon-02',
					'modern-icon-03',
					'inline',
				),
			),
		) ), array(
			Smilepure_VC::get_animation_field(),
			Smilepure_VC::extra_class_field(),
			array(
				'group'      => esc_html__( 'Items', 'smilepure' ),
				'heading'    => esc_html__( 'Items', 'smilepure' ),
				'type'       => 'param_group',
				'param_name' => 'items',
				'params'     => array_merge( array(
					array(
						'heading'     => esc_html__( 'Number', 'smilepure' ),
						'type'        => 'textfield',
						'param_name'  => 'item_number',
						'admin_label' => true,
						'description' => esc_html__( 'Only work with List Type: (Manual) Numbered list.', 'smilepure' ),
					),
					array(
						'heading'     => esc_html__( 'Title', 'smilepure' ),
						'type'        => 'textfield',
						'param_name'  => 'item_title',
						'admin_label' => true,
					),
					array(
						'heading'    => esc_html__( 'Sub Title', 'smilepure' ),
						'type'       => 'textfield',
						'param_name' => 'item_sub_title',
					),
					array(
						'heading'    => esc_html__( 'Link', 'smilepure' ),
						'type'       => 'vc_link',
						'param_name' => 'link',
					),
					array(
						'heading'    => esc_html__( 'Description', 'smilepure' ),
						'type'       => 'textarea',
						'param_name' => 'item_desc',
					),
				), Smilepure_VC::icon_libraries_no_depend( array( 'group' => '' ) ) ),
			),

		), Smilepure_VC::get_vc_spacing_tab() ),
) );
