<?php

class WPBakeryShortCode_TM_Heading extends WPBakeryShortCode {

	/**
	 * Defines fields names for google_fonts, font_container and etc
	 *
	 * @since 4.4
	 * @var array
	 */
	protected $fields = array(
		'google_fonts' => 'google_fonts',
		'el_class'     => 'el_class',
		'css'          => 'css',
		'text'         => 'text',
	);

	/**
	 * Parses shortcode attributes and set defaults based on vc_map function relative to shortcode and fields names
	 *
	 * @param $atts
	 *
	 * @since 4.3
	 * @return array
	 */
	public function getAttributes( $atts ) {
		/**
		 * Shortcode attributes
		 *
		 * @var $text
		 * @var $google_fonts
		 * @var $el_class
		 * @var $css
		 */
		$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
		extract( $atts );

		/**
		 * Get default values from VC_MAP.
		 */
		$google_fonts_field = $this->getParamData( 'google_fonts' );

		$el_class                    = $this->getExtraClass( $el_class );
		$google_fonts_obj            = new Vc_Google_Fonts();
		$google_fonts_field_settings = isset( $google_fonts_field['settings'], $google_fonts_field['settings']['fields'] ) ? $google_fonts_field['settings']['fields'] : array();
		$google_fonts_data           = strlen( $google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $google_fonts_field_settings, $google_fonts ) : '';

		return array(
			'text'              => isset( $text ) ? $text : '',
			'google_fonts'      => $google_fonts,
			'el_class'          => $el_class,
			'css'               => $css,
			'google_fonts_data' => $google_fonts_data,
		);
	}

	/**
	 * Get param value by providing key
	 *
	 * @param $key
	 *
	 * @since 4.4
	 * @return array|bool
	 */
	protected function getParamData( $key ) {
		return WPBMap::getParam( $this->shortcode, $this->getField( $key ) );
	}

	/**
	 * Used to get field name in vc_map function for google_fonts, font_container and etc..
	 *
	 * @param $key
	 *
	 * @since 4.4
	 * @return bool
	 */
	protected function getField( $key ) {
		return isset( $this->fields[ $key ] ) ? $this->fields[ $key ] : false;
	}

	/**
	 * Parses google_fonts_data to get needed css styles to markup
	 *
	 * @param $el_class
	 * @param $css
	 * @param $google_fonts_data
	 * @param $atts
	 *
	 * @since 4.3
	 * @return array
	 */
	public function getStyles( $el_class, $css, $google_fonts_data, $atts ) {
		$styles = array();
		if ( ( ! isset( $atts['custom_google_font'] ) || 'yes' !== $atts['custom_google_font'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
			$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
			$styles[]            = 'font-family:' . $google_fonts_family[0];
		}

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-heading ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

		return array(
			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
			'styles'    => $styles,
		);
	}

	public function get_inline_css( $selector ) {
		global $Smilepure_shortcode_lg_css;
		global $Smilepure_shortcode_md_css;
		global $Smilepure_shortcode_sm_css;
		global $Smilepure_shortcode_xs_css;
		$atts = vc_map_get_attributes( $this->getShortcode(), $this->getAtts() );
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

		$font_size = $atts['font_size'];
		$title     = "$selector .heading";

		if ( $atts['max_width'] !== '' ) {
			$tmp .= "max-width: {$atts['max_width']};";
		}

		if ( $atts['line_height'] !== '' ) {
			$tmp .= "line-height: {$atts['line_height']};";
		}

		if ( $atts['letter_spacing'] !== '' ) {
			$tmp .= "letter-spacing: {$atts['letter_spacing']};";
		}

		if ( $atts['font_weight'] !== '' ) {
			$tmp .= "font-weight: {$atts['font_weight']};";
		}

		if ( $atts['font_decoration'] !== '' ) {
			$tmp .= "text-decoration: {$atts['font_decoration']};";
		}

		if ( $atts['text_transform'] !== '' ) {
			$tmp .= "text-transform: {$atts['text_transform']};";
		}

		if ( $atts['font_style'] !== '' ) {
			$tmp .= "font-style: {$atts['font_style']};";
		}

		$tmp .= Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'], $atts['gradient_text_color'] );

		if ( $tmp !== '' ) {
			$css .= "$title { $tmp }";
		}

		Smilepure_VC::get_responsive_css( array(
			'element' => $title,
			'atts'    => array(
				'font-size' => array(
					'media_str' => $font_size,
					'unit'      => 'px',
				),
			),
		) );

		$Smilepure_shortcode_lg_css .= $css;


		$icon_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );

		if ( $icon_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .icon { $icon_tmp }";
		}

		if ( isset( $atts['icon_font_size'] ) ) {
			Smilepure_VC::get_responsive_css( array(
				'element' => "$selector .icon",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['icon_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Heading', 'smilepure' ),
	'base'                      => 'tm_heading',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-typography',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'None', 'smilepure' )                 => '',
				esc_html__( 'Gradient', 'smilepure' )             => 'gradient',
				esc_html__( 'With Separator 01', 'smilepure' )    => 'with-separator-1',
				esc_html__( 'With Separator 02', 'smilepure' )    => 'with-separator-2',
				esc_html__( 'Icon modern', 'smilepure' )          => 'modern-icon',
				esc_html__( 'Highlight Big Number', 'smilepure' ) => 'highlight-big-number',
				esc_html__( 'Highlight - Typed', 'smilepure' )    => 'typed-text',
			),
			'std'         => '',
		),
		array(
			'heading'     => esc_html__( 'Text', 'smilepure' ),
			'type'        => 'textarea',
			'param_name'  => 'text',
			'description' => esc_html__( 'Wrap text in &lt;mark&gt;&lt;/mark&gt; tag to make text highlight, Wrap text in &lt;strong&gt;&lt;/strong&gt; tag to make text bold in style multiweight', 'smilepure' ),
			'admin_label' => true,
		),
		array(
			'heading'    => esc_html__( 'Typed String', 'smilepure' ),
			'type'       => 'param_group',
			'param_name' => 'typed_list',
			'params'     => array_merge( array(
				array(
					'heading'     => esc_html__( 'Text', 'smilepure' ),
					'type'        => 'textfield',
					'param_name'  => 'text',
					'admin_label' => true,
				),
			) ),
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'typed-text',
				),
			),

		),
		array(
			'heading'     => esc_html__( 'Link', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'link',
			'description' => esc_html__( 'Input link for heading.', 'smilepure' ),
		),
		array(
			'heading'    => esc_html__( 'Element Tag', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'tag',
			'value'      => array(
				esc_html__( 'h1', 'smilepure' )  => 'h1',
				esc_html__( 'h2', 'smilepure' )  => 'h2',
				esc_html__( 'h3', 'smilepure' )  => 'h3',
				esc_html__( 'h4', 'smilepure' )  => 'h4',
				esc_html__( 'h5', 'smilepure' )  => 'h5',
				esc_html__( 'h6', 'smilepure' )  => 'h6',
				esc_html__( 'p', 'smilepure' )   => 'p',
				esc_html__( 'div', 'smilepure' ) => 'div',
			),
			'std'        => 'h3',
		),
		array(
			'heading'    => esc_html__( 'Use custom font family', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'custom_google_font',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => 1 ),
			'std'        => 0,
		),
		array(
			'type'       => 'google_fonts',
			'param_name' => 'google_fonts',
			'value'      => 'font_family:' . rawurlencode( 'Poppins:300,regular,500,600,700' ) . '|font_style:' . rawurlencode( '600 semi-bold regular:600:normal' ),
			'settings'   => array(
				'fields' => array(
					'font_family_description' => esc_html__( 'Select font family.', 'smilepure' ),
					'font_style_description'  => esc_html__( 'Select font styling.', 'smilepure' ),
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Font Size', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'font_size',
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
			'heading'          => esc_html__( 'Letter Spacing', 'smilepure' ),
			'description'      => esc_html__( 'E.g 5px or 0.02em', 'smilepure' ),
			'type'             => 'textfield',
			'param_name'       => 'letter_spacing',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'heading'          => esc_html__( 'Line Height', 'smilepure' ),
			'description'      => esc_html__( 'E.g 18px or 1.8', 'smilepure' ),
			'type'             => 'textfield',
			'param_name'       => 'line_height',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'heading'          => esc_html__( 'Font Weight', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'font_weight',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' )           => '',
				esc_html__( '100 - Ultra Light', 'smilepure' ) => '100',
				esc_html__( '200 - Light', 'smilepure' )       => '200',
				esc_html__( '300 - Book', 'smilepure' )        => '300',
				esc_html__( '400 - Regular', 'smilepure' )     => '400',
				esc_html__( '500 - Medium', 'smilepure' )      => '500',
				esc_html__( '600 - SemiBold', 'smilepure' )    => '600',
				esc_html__( '700 - Bold', 'smilepure' )        => '700',
				esc_html__( '800 - Extra Bold', 'smilepure' )  => '800',
				esc_html__( '900 - Ultra Bold', 'smilepure' )  => '900',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-3',
		),
		array(
			'heading'          => esc_html__( 'Font Style', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'font_style',
			'value'            => array(
				esc_html__( 'Default', 'smilepure' ) => '',
				esc_html__( 'Italic', 'smilepure' )  => 'italic',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-3',
		),
		array(
			'heading'          => esc_html__( 'Font Decoration', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'font_decoration',
			'value'            => array(
				esc_html__( 'None', 'smilepure' )         => '',
				esc_html__( 'Underline', 'smilepure' )    => 'underline',
				esc_html__( 'Overline', 'smilepure' )     => 'overline',
				esc_html__( 'Line Through', 'smilepure' ) => 'line-through',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-3',
		),
		array(
			'heading'          => esc_html__( 'Text Transform', 'smilepure' ),
			'type'             => 'dropdown',
			'param_name'       => 'text_transform',
			'value'            => array(
				esc_html__( 'None', 'smilepure' )       => '',
				esc_html__( 'lowercase', 'smilepure' )  => 'lowercase',
				esc_html__( 'UPPERCASE', 'smilepure' )  => 'uppercase',
				esc_html__( 'Capitalize', 'smilepure' ) => 'capitalize',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-3',
		),
	), Smilepure_VC::get_alignment_fields(), array(
		array(
			'heading'    => esc_html__( 'Text Color', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'text_color',
			'value'      => array(
				esc_html__( 'Default Color', 'smilepure' )   => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Gradient Color', 'smilepure' )  => 'gradient',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'        => '',
		),
		array(
			'heading'    => esc_html__( 'Gradient Color 1', 'smilepure' ),
			'type'       => 'gradient',
			'param_name' => 'gradient_text_color',
			'dependency' => array(
				'element' => 'text_color',
				'value'   => array( 'gradient' ),
			),
		),
		array(
			'heading'    => esc_html__( 'Custom Text Color', 'smilepure' ),
			'type'       => 'colorpicker',
			'param_name' => 'custom_text_color',
			'dependency' => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'        => '#222',
		),
		array(
			'heading'     => esc_html__( 'Max Width', 'smilepure' ),
			'description' => esc_html__( 'Input the max width that makes text multi lines, e.g 400px', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'max_width',
		),
		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
		// Design Options Group.
		Smilepure_VC::css_editor_field(),
		array(
			'group'        => esc_html__( 'Design Options', 'smilepure' ),
			'heading'      => esc_html__( 'Medium Device Spacing', 'smilepure' ),
			'type'         => 'spacing',
			'param_name'   => 'md_spacing',
			'spacing_icon' => 'fa-tablet fa-rotate-270',
		),
		array(
			'group'        => esc_html__( 'Design Options', 'smilepure' ),
			'heading'      => esc_html__( 'Small Device Spacing', 'smilepure' ),
			'type'         => 'spacing',
			'param_name'   => 'sm_spacing',
			'spacing_icon' => 'fa-tablet',
		),
		array(
			'group'        => esc_html__( 'Design Options', 'smilepure' ),
			'heading'      => esc_html__( 'Extra Small Spacing', 'smilepure' ),
			'type'         => 'spacing',
			'param_name'   => 'xs_spacing',
			'spacing_icon' => 'fa-mobile',
		),
	), Smilepure_VC::icon_libraries( array(
		'allow_none' => true,
	) ), array(
		array(
			'group'       => esc_html__( 'Icon', 'smilepure' ),
			'heading'     => esc_html__( 'Icon Font Size', 'smilepure' ),
			'description' => esc_html__( 'Leave blank to inherit from title', 'smilepure' ),
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
			'group'      => esc_html__( 'Icon', 'smilepure' ),
			'heading'    => esc_html__( 'Icon Color', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'icon_color',
			'value'      => array(
				esc_html__( 'Inherit', 'smilepure' )         => '',
				esc_html__( 'Primary Color', 'smilepure' )   => 'primary',
				esc_html__( 'Secondary Color', 'smilepure' ) => 'secondary',
				esc_html__( 'Custom Color', 'smilepure' )    => 'custom',
			),
			'std'        => '',
		),
		array(
			'group'      => esc_html__( 'Icon', 'smilepure' ),
			'heading'    => esc_html__( 'Custom Icon Color', 'smilepure' ),
			'type'       => 'colorpicker',
			'param_name' => 'custom_icon_color',
			'dependency' => array(
				'element' => 'icon_color',
				'value'   => 'custom',
			),
			'std'        => '#fff',
		),
	), Smilepure_VC::get_custom_style_tab() ),
) );
