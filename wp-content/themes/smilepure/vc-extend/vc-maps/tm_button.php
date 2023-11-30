<?php

class WPBakeryShortCode_TM_Button extends WPBakeryShortCode {

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;
		global $Smilepure_shortcode_md_css;
		global $Smilepure_shortcode_sm_css;
		global $Smilepure_shortcode_xs_css;

		$wrapper_tmp     = '';
		$button_tmp      = $button_hover_tmp = '';
		$button_icon_tmp = $button_hover_icon_tmp = '';

		if ( $atts['align'] !== '' ) {
			$wrapper_tmp .= "text-align: {$atts['align']};";
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
			$button_tmp .= Smilepure_Helper::get_css_prefix( 'border-radius', $atts['rounded'] );
		}

		if ( $atts['size'] === 'custom' ) {
			if ( $atts['width'] !== '' ) {
				$button_tmp .= "min-width: {$atts['width']}px;";
			}

			if ( $atts['border_width'] !== '' ) {
				$button_tmp .= "border-width: {$atts['border_width']}px;";
			}

			if ( $atts['height'] !== '' ) {
				$button_tmp   .= "min-height: {$atts['height']}px;";
				$_line_height = $atts['height'];
				if ( $atts['border_width'] !== '' ) {
					$_line_height = $_line_height - ( $atts['border_width'] * 2 );
				}

				$button_tmp .= "line-height: {$_line_height}px;";
			}
		}

		if ( isset( $atts['icon_font_size'] ) ) {
			Smilepure_VC::get_responsive_css( array(
				'element' => "$selector .button-icon",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['icon_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		if ( isset( $atts['text_font_size'] ) ) {
			Smilepure_VC::get_responsive_css( array(
				'element' => "$selector .button-text",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['text_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		$font_color       = $border_color = $bg_color = '';
		$font_hover_color = $border_hover_color = $bg_hover_color = '';
		$icon_color       = $icon_hover_color = '';

		if ( $atts['color'] === 'custom' ) {


			$font_color         .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['font_color'], $atts['custom_font_color'] );
			$border_color       .= Smilepure_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['button_border_color'], $atts['custom_button_border_color'] );
			$bg_color           .= Smilepure_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['button_bg_color'], $atts['custom_button_bg_color'] );
			$font_hover_color   .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['font_color_hover'], $atts['custom_font_color_hover'] );
			$border_hover_color .= Smilepure_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['button_border_color_hover'], $atts['custom_button_border_color_hover'] );
			$bg_hover_color     .= Smilepure_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['button_bg_color_hover'], $atts['custom_button_bg_color_hover'] );
			$icon_color         .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['button_icon_color'], $atts['custom_button_icon_color'] );
			$icon_hover_color   .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['button_icon_color_hover'], $atts['custom_button_icon_color_hover'] );

			$button_tmp            .= $font_color . $border_color . $bg_color;
			$button_hover_tmp      .= $font_hover_color . $border_hover_color . $bg_hover_color;
			$button_icon_tmp       .= $icon_color;
			$button_hover_icon_tmp .= $icon_hover_color;
		}

		if ( $wrapper_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector { $wrapper_tmp }";
		}

		if ( $button_tmp !== '' ) {
			if ( $atts['style'] === 'border-text' ) {
				$Smilepure_shortcode_lg_css .= "$selector .tm-button { $font_color }";
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:before { $bg_color }";
				$Smilepure_shortcode_lg_css .= "$selector .tm-button .button-icon { $icon_color }";
			} else {
				$Smilepure_shortcode_lg_css .= "$selector .tm-button { $button_tmp }";
			}
		}

		if ( $button_hover_tmp !== '' ) {
			if ( $atts['style'] === 'text' ) {
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover span { $button_hover_tmp }";
			} elseif ( $atts['style'] === 'modern' ) {
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:after { $bg_hover_color }";

				$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover {{$font_hover_color} {$border_hover_color}}";
			} elseif ( $atts['style'] === 'outline' ) {
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover { $font_hover_color }";
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:before { $bg_hover_color }";
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover { $border_hover_color }";
			} elseif ( $atts['style'] === 'border-text' ) {
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover { $font_hover_color }";
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:after { $bg_hover_color }";
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover .button-icon { $icon_hover_color }";
			} else {
				$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover { $button_hover_tmp }";
			}
		}

		if ( $button_icon_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .tm-button .button-icon { $button_icon_tmp }";
		}

		if ( $button_hover_icon_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .tm-button:hover .button-icon { $button_hover_icon_tmp }";
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'     => esc_html__( 'Button', 'smilepure' ),
	'base'     => 'tm_button',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-button',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Flat', 'smilepure' )                => 'flat',
				esc_html__( 'Outline', 'smilepure' )             => 'outline',
				esc_html__( 'Text', 'smilepure' )                => 'text',
				esc_html__( 'Text with underline', 'smilepure' ) => 'text_with_underline',
				esc_html__( 'Border Text', 'smilepure' )         => 'border-text',
				esc_html__( 'Image Text', 'smilepure' )          => 'image-text',
				esc_html__( 'Modern', 'smilepure' )              => 'modern',
			),
			'std'         => 'flat',
		),
		array(
			'heading'    => esc_html__( 'Image', 'smilepure' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
			'dependency' => array( 'element' => 'style', 'value' => 'image-text' ),
		),
		array(
			'heading'     => esc_html__( 'Size', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'size',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Large', 'smilepure' )       => 'lg',
				esc_html__( 'Normal', 'smilepure' )      => 'nm',
				esc_html__( 'Small', 'smilepure' )       => 'sm',
				esc_html__( 'Extra Small', 'smilepure' ) => 'xs',
				esc_html__( 'Custom', 'smilepure' )      => 'custom',
			),
			'std'         => 'nm',
		),
		array(
			'heading'     => esc_html__( 'Width', 'smilepure' ),
			'description' => esc_html__( 'Controls the width of button.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'px',
			'param_name'  => 'width',
			'dependency'  => array( 'element' => 'size', 'value' => 'custom' ),
		),
		array(
			'heading'     => esc_html__( 'Height', 'smilepure' ),
			'description' => esc_html__( 'Controls the height of button.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'px',
			'param_name'  => 'height',
			'dependency'  => array( 'element' => 'size', 'value' => 'custom' ),
		),
		array(
			'heading'     => esc_html__( 'Border Width', 'smilepure' ),
			'description' => esc_html__( 'Controls the border width of button.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'px',
			'param_name'  => 'border_width',
			'dependency'  => array( 'element' => 'size', 'value' => 'custom' ),
		),
		array(
			'heading'     => esc_html__( 'Force Full Width', 'smilepure' ),
			'description' => esc_html__( 'Make button full wide.', 'smilepure' ),
			'type'        => 'checkbox',
			'param_name'  => 'full_wide',
			'value'       => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
		),
		array(
			'heading'     => esc_html__( 'Rounded', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'rounded',
			'description' => esc_html__( 'Input a valid radius, e.g 10px. Leave blank to use default.', 'smilepure' ),
		),
		array(
			'heading'    => esc_html__( 'Link', 'smilepure' ),
			'type'       => 'vc_link',
			'param_name' => 'button',
		),
		array(
			'group'      => esc_html__( 'Icon', 'smilepure' ),
			'heading'    => esc_html__( 'Icon align', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'icon_align',
			'value'      => array(
				esc_html__( 'Left', 'smilepure' )  => 'left',
				esc_html__( 'Right', 'smilepure' ) => 'right',
			),
			'std'        => 'right',
		),
		array(
			'heading'     => esc_html__( 'Button Action', 'smilepure' ),
			'description' => esc_html__( 'To make smooth scroll action work then input button url like this: #about-us-section. )', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'action',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Default', 'smilepure' )                    => '',
				esc_html__( 'Smooth scroll to a section', 'smilepure' ) => 'smooth_scroll',
				esc_html__( 'Open link as popup video', 'smilepure' )   => 'popup_video',

			),
			'std'         => '',
		),
		array(
			'heading'     => esc_html__( 'Hover Animation', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'hover_animation',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Default', 'smilepure' )   => '',
				esc_html__( 'Icon Move', 'smilepure' ) => 'icon-move',
				esc_html__( 'Move Up', 'smilepure' )   => 'move-up',
			),
			'std'         => '',
		),
	), Smilepure_VC::get_alignment_fields(), array(
		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
		Smilepure_VC::extra_id_field(),
	), Smilepure_VC::icon_libraries( array(
		'allow_none' => true,
	) ), array(
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
			'heading'     => esc_html__( 'Text Font Size', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'text_font_size',
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
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Color', 'smilepure' ),
			'param_name'  => 'color',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Primary', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary', 'smilepure' ) => 'secondary',
				esc_html__( 'Grey', 'smilepure' )      => 'grey',
				esc_html__( 'Custom', 'smilepure' )    => 'custom',
			),
			'std'         => 'primary',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Background color', 'smilepure' ),
			'param_name'       => 'button_bg_color',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )     => '',
				esc_html__( 'Primary', 'smilepure' )     => 'primary',
				esc_html__( 'Secondary', 'smilepure' )   => 'secondary',
				esc_html__( 'Transparent', 'smilepure' ) => 'transparent',
				esc_html__( 'Custom', 'smilepure' )      => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom background color', 'smilepure' ),
			'param_name'       => 'custom_button_bg_color',
			'dependency'       => array(
				'element' => 'button_bg_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text color', 'smilepure' ),
			'param_name'       => 'font_color',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )   => '',
				esc_html__( 'Primary', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom', 'smilepure' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom text color', 'smilepure' ),
			'param_name'       => 'custom_font_color',
			'dependency'       => array(
				'element' => 'font_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Border color', 'smilepure' ),
			'param_name'       => 'button_border_color',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )   => '',
				esc_html__( 'Primary', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom', 'smilepure' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Border color', 'smilepure' ),
			'param_name'       => 'custom_button_border_color',
			'dependency'       => array(
				'element' => 'button_border_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Icon color', 'smilepure' ),
			'param_name'       => 'button_icon_color',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )   => '',
				esc_html__( 'Primary', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom', 'smilepure' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Icon color', 'smilepure' ),
			'param_name'       => 'custom_button_icon_color',
			'dependency'       => array(
				'element' => 'button_icon_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Background color (on hover)', 'smilepure' ),
			'param_name'       => 'button_bg_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )     => '',
				esc_html__( 'Primary', 'smilepure' )     => 'primary',
				esc_html__( 'Secondary', 'smilepure' )   => 'secondary',
				esc_html__( 'Transparent', 'smilepure' ) => 'transparent',
				esc_html__( 'Custom', 'smilepure' )      => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom background color (on hover)', 'smilepure' ),
			'param_name'       => 'custom_button_bg_color_hover',
			'dependency'       => array(
				'element' => 'button_bg_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text color (on hover)', 'smilepure' ),
			'param_name'       => 'font_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )   => '',
				esc_html__( 'Primary', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom', 'smilepure' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text color (on hover)', 'smilepure' ),
			'param_name'       => 'custom_font_color_hover',
			'dependency'       => array(
				'element' => 'font_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Border color (on hover)', 'smilepure' ),
			'param_name'       => 'button_border_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )   => '',
				esc_html__( 'Primary', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom', 'smilepure' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Border color (on hover)', 'smilepure' ),
			'param_name'       => 'custom_button_border_color_hover',
			'dependency'       => array(
				'element' => 'button_border_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Icon color (on hover)', 'smilepure' ),
			'param_name'       => 'button_icon_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )   => '',
				esc_html__( 'Primary', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom', 'smilepure' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Icon color (on hover)', 'smilepure' ),
			'param_name'       => 'custom_button_icon_color_hover',
			'dependency'       => array(
				'element' => 'button_icon_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
	),

		Smilepure_VC::get_vc_spacing_tab() ),
) );
