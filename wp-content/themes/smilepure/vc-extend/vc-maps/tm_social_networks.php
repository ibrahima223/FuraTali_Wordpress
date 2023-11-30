<?php

class WPBakeryShortCode_TM_Social_Networks extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		global $Smilepure_shortcode_md_css;
		global $Smilepure_shortcode_sm_css;
		global $Smilepure_shortcode_xs_css;

		$tmp = $link_css = $link_hover_css = $icon_css = $icon_hover_css = $text_css = $text_hover_css = '';
		extract( $atts );

		$icon_css       .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$icon_hover_css .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_hover_color'], $atts['custom_icon_hover_color'] );
		$text_css       .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );
		$text_hover_css .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_hover_color'], $atts['custom_text_hover_color'] );
		$link_css       .= Smilepure_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['border_color'], $atts['custom_border_color'] );
		$link_hover_css .= Smilepure_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['border_hover_color'], $atts['custom_border_hover_color'] );
		$link_css       .= Smilepure_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_color'], $atts['custom_background_color'] );
		$link_hover_css .= Smilepure_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_hover_color'], $atts['custom_background_hover_color'] );

		if ( $atts['align'] !== '' ) {
			$tmp .= "text-align: {$atts['align']};";
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

		if ( isset( $atts['icon_font_size'] ) ) {
			Smilepure_VC::get_responsive_css( array(
				'element' => "$selector .link-icon",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['icon_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		if ( isset( $atts['title_font_size'] ) ) {
			Smilepure_VC::get_responsive_css( array(
				'element' => "$selector .link-text",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['title_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		if ( $tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector { $tmp }";
		}

		if ( $icon_css !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .link-icon { $icon_css }";
		}

		if ( $icon_hover_css !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .item:hover .link-icon { $icon_hover_css }";
		}

		if ( $text_css !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .link-text { $text_css }";
		}

		if ( $text_hover_css !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .item:hover .link-text { $text_hover_css }";
		}

		if ( $link_css !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .link { $link_css }";
		}

		if ( $link_hover_css !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .item:hover .link { $link_hover_css }";
		}
	}
}

$color_tab   = esc_html__( 'Color', 'smilepure' );
$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Social Networks', 'smilepure' ),
	'base'                      => 'tm_social_networks',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-social-networks',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Widget title', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'smilepure' ),
		),
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Icons', 'smilepure' )                 => 'icons',
				esc_html__( 'Large Icons', 'smilepure' )           => 'large-icons',
				esc_html__( 'Solid Square Icon', 'smilepure' )     => 'solid-square-icon',
				esc_html__( 'Solid Rounded Icon', 'smilepure' )    => 'solid-rounded-icon',
				esc_html__( 'Solid Rounded Icon 02', 'smilepure' ) => 'solid-rounded-icon-02',
				esc_html__( 'Solid Rounded Icon 03', 'smilepure' ) => 'solid-rounded-icon-03',
				esc_html__( 'Title', 'smilepure' )                 => 'title',
				esc_html__( 'Icon + Title', 'smilepure' )          => 'icon-title',
				esc_html__( 'Rounded Icon + Title', 'smilepure' )  => 'rounded-icon-title',
			),
			'std'         => 'icons',
		),
		array(
			'heading'     => esc_html__( 'Layout', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'layout',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Inline', 'smilepure' )    => 'inline',
				esc_html__( 'List', 'smilepure' )      => 'list',
				esc_html__( '2 Columns', 'smilepure' ) => 'two-columns',
			),
			'std'         => 'inline',
		),
		array(
			'heading'     => esc_html__( 'Color', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'color',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Default', 'smilepure' )          => 'default',
				esc_html__( 'Custom all items', 'smilepure' ) => 'all-items',
				esc_html__( 'Custom each item', 'smilepure' ) => 'each-item',
			),
			'std'         => 'default',
		),

	), Smilepure_VC::get_alignment_fields(), array(
		array(
			'heading'    => esc_html__( 'Open link in a new tab', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'target',
			'value'      => array(
				esc_html__( 'Yes', 'smilepure' ) => '1',
			),
			'std'        => '1',
		),
		array(
			'heading'    => esc_html__( 'Show tooltip as item title', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'tooltip_enable',
			'value'      => array(
				esc_html__( 'Yes', 'smilepure' ) => '1',
			),
		),
		array(
			'heading'    => esc_html__( 'Tooltip position', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'tooltip_position',
			'value'      => array(
				esc_html__( 'Top', 'smilepure' )    => 'top',
				esc_html__( 'Right', 'smilepure' )  => 'right',
				esc_html__( 'Bottom', 'smilepure' ) => 'bottom',
				esc_html__( 'Left', 'smilepure' )   => 'left',
			),
			'std'        => 'top',
			'dependency' => array(
				'element' => 'tooltip_enable',
				'value'   => '1',
			),
		),
		array(
			'heading'    => esc_html__( 'Tooltip skin', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'tooltip_skin',
			'value'      => array(
				esc_html__( 'Default', 'smilepure' ) => '',
				esc_html__( 'Primary', 'smilepure' ) => 'primary',
			),
			'std'        => '',
			'dependency' => array(
				'element' => 'tooltip_enable',
				'value'   => '1',
			),
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'smilepure' ),
			'heading'    => esc_html__( 'Items', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array_merge( array(
				array(
					'heading'     => esc_html__( 'Title', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Link', 'smilepure' ),
					'type'       => 'textfield',
					'param_name' => 'link',
				),

				array(
					'heading'    => esc_html__( 'Color', 'smilepure' ),
					'type'       => 'dropdown',
					'param_name' => 'item_custom_color',
					'value'      => array(
						esc_html__( 'Default', 'smilepure' ) => '',
						esc_html__( 'Custom', 'smilepure' )  => 'custom',
					),
					'std'        => '',
				),
				array(
					'heading'          => esc_html__( 'Icon color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_icon_color',
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
				),
				array(
					'heading'          => esc_html__( 'Icon hover color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_icon_hover_color',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'heading'          => esc_html__( 'Text color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_text_color',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'heading'          => esc_html__( 'Text hover color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_text_hover_color',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'heading'          => esc_html__( 'Border color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_border_color',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'heading'          => esc_html__( 'Border hover color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_border_hover_color',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'heading'          => esc_html__( 'Background color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_background_color',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'heading'          => esc_html__( 'Background hover color', 'smilepure' ),
					'type'             => 'colorpicker',
					'param_name'       => 'item_custom_background_hover_color',
					'dependency'       => array(
						'element' => 'item_custom_color',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6',
				),

			), Smilepure_VC::icon_libraries_no_depend() ),

			'value' => rawurlencode( wp_json_encode( array(
				array(
					'title'     => esc_html__( 'Twitter', 'smilepure' ),
					'link'      => '#',
					'icon_type' => 'fontawesome5',
					'icon_ion'  => 'fab fa-twitter',
				),
				array(
					'title'     => esc_html__( 'Facebook', 'smilepure' ),
					'link'      => '#',
					'icon_type' => 'fontawesome5',
					'icon_ion'  => 'fab fa-facebook-f',
				),
				array(
					'title'     => esc_html__( 'Vimeo', 'smilepure' ),
					'link'      => '#',
					'icon_type' => 'fontawesome5',
					'icon_ion'  => 'fab fa-vimeo-v',
				),
				array(
					'title'     => esc_html__( 'Linkedin', 'smilepure' ),
					'link'      => '#',
					'icon_type' => 'fontawesome5',
					'icon_ion'  => 'fab fa-linkedin-in',
				),
				array(
					'title'     => esc_html__( 'Skype', 'smilepure' ),
					'link'      => '#',
					'icon_type' => 'fontawesome5',
					'icon_ion'  => 'fab fa-skype',
				),
			) ) ),

		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Icon Font Size', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'icon_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Title Font Size', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'title_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Icon color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom icon color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_color',
			'dependency'       => array(
				'element' => 'icon_color',
				'value'   => 'custom',
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Icon hover color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_hover_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom icon hover color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_hover_color',
			'dependency'       => array(
				'element' => 'icon_hover_color',
				'value'   => 'custom',
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Text color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'text_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom text color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_text_color',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Text hover color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'text_hover_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom text hover color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_text_hover_color',
			'dependency'       => array(
				'element' => 'text_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Border color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'border_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom border color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_border_color',
			'dependency'       => array(
				'element' => 'border_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Border hover color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'border_hover_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom border hover color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_border_hover_color',
			'dependency'       => array(
				'element' => 'border_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Background color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'background_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom background color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_background_color',
			'dependency'       => array(
				'element' => 'background_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Background hover color', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'background_hover_color',
			'value'            => array(
				esc_html__( 'Default color', 'smilepure' )   => '',
				esc_html__( 'Primary color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom color', 'smilepure' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'all-items',
			),
		),
		array(
			'group'            => $color_tab,
			'heading'          => esc_html__( 'Custom background hover color', 'smilepure' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_background_hover_color',
			'dependency'       => array(
				'element' => 'background_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
	) ),
) );
