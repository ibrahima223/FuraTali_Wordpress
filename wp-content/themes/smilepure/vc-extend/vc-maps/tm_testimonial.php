<?php

add_filter( 'vc_autocomplete_tm_testimonial_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Testimonial',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_testimonial_taxonomies_render', array(
	Smilepure_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Testimonial extends WPBakeryShortCode {

	/**
	 * @param $search_string
	 *
	 * @return array|bool
	 */
	public static function autocomplete_taxonomies_field_search( $search_string ) {
		$data = Smilepure_VC::instance()->autocomplete_get_data_from_post_type( $search_string, 'testimonial' );

		return $data;
	}

	public function get_inline_css( $selector, $atts ) {
		global $Smilepure_shortcode_lg_css;

		$text_tmp         = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );
		$name_tmp         = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['name_color'], $atts['custom_name_color'] );
		$by_line_tmp      = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['by_line_color'], $atts['custom_by_line_color'] );
		$star_tmp         = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['star_color'], $atts['custom_star_color'] );
		$quote_icon_tmp   = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['quote_icon_color'], $atts['custom_quote_icon_color'] );
		$button_tmp       = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['button_color'], $atts['custom_button_color'] );
		$button_hover_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['button_hover_color'], $atts['custom_button_hover_color'] );
		$divider_tmp      = Smilepure_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['divider_color'], $atts['custom_divider_color'] );

		if ( $text_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-desc { $text_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-desc a { $text_tmp }";
		}

		if ( $name_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-name { $name_tmp }";
		}

		if ( $by_line_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-by-line { $by_line_tmp }";
		}

		if ( $star_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-header .testimonial-rating { $star_tmp }";
		}

		if ( $quote_icon_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .quote-icon { $quote_icon_tmp }";
		}

		if ( $divider_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-footer { $divider_tmp }";
		}

		if ( $button_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .swiper-custom-btn { $button_tmp }";
		}

		if ( $button_hover_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .swiper-custom-btn:hover { $button_hover_tmp }";
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$carousel_tab  = esc_html__( 'Carousel Settings', 'smilepure' );
$styling_group = esc_html__( 'Styling', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Testimonials', 'smilepure' ),
	'base'                      => 'tm_testimonial',
	'category'                  => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-testimonials',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'smilepure' ) => '1',
				esc_html__( 'Style 02', 'smilepure' ) => '2',
				esc_html__( 'Style 03', 'smilepure' ) => '3',
				esc_html__( 'Style 04', 'smilepure' ) => '4',
				esc_html__( 'Style 05', 'smilepure' ) => '5',
				esc_html__( 'Style 06', 'smilepure' ) => '6',
				esc_html__( 'Style 07', 'smilepure' ) => '7',
				esc_html__( 'Style 08', 'smilepure' ) => '8',
			),
			'std'         => '1',
		),
		Smilepure_VC::extra_class_field(),
		array(
			'group'       => esc_html__( 'Data Settings', 'smilepure' ),
			'heading'     => esc_html__( 'Number', 'smilepure' ),
			'description' => esc_html__( 'Number of items to show.', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'number',
			'std'         => 9,
			'min'         => 1,
			'max'         => 100,
			'step'        => 1,
		),
		array(
			'group'              => esc_html__( 'Data Settings', 'smilepure' ),
			'heading'            => esc_html__( 'Narrow data source', 'smilepure' ),
			'description'        => esc_html__( 'Enter categories, tags or custom taxonomies.', 'smilepure' ),
			'type'               => 'autocomplete',
			'param_name'         => 'taxonomies',
			'settings'           => array(
				'multiple'       => true,
				'min_length'     => 1,
				'groups'         => true,
				// In UI show results grouped by groups, default false.
				'unique_values'  => true,
				// In UI show results except selected. NB! You should manually check values in backend, default false.
				'display_inline' => true,
				// In UI show results inline view, default false (each value in own line).
				'delay'          => 500,
				// delay for search. default 500.
				'auto_focus'     => true,
				// auto focus input, default true.
			),
			'param_holder_class' => 'vc_not-for-custom',
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'smilepure' ),
			'heading'     => esc_html__( 'Order by', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'orderby',
			'value'       => array(
				esc_html__( 'Date', 'smilepure' )                  => 'date',
				esc_html__( 'Post ID', 'smilepure' )               => 'ID',
				esc_html__( 'Author', 'smilepure' )                => 'author',
				esc_html__( 'Title', 'smilepure' )                 => 'title',
				esc_html__( 'Last modified date', 'smilepure' )    => 'modified',
				esc_html__( 'Post/page parent ID', 'smilepure' )   => 'parent',
				esc_html__( 'Number of comments', 'smilepure' )    => 'comment_count',
				esc_html__( 'Menu order/Page Order', 'smilepure' ) => 'menu_order',
				esc_html__( 'Meta value', 'smilepure' )            => 'meta_value',
				esc_html__( 'Meta value number', 'smilepure' )     => 'meta_value_num',
				esc_html__( 'Random order', 'smilepure' )          => 'rand',
			),
			'description' => esc_html__( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'smilepure' ),
			'std'         => 'date',
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'smilepure' ),
			'heading'     => esc_html__( 'Sort order', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'order',
			'value'       => array(
				esc_html__( 'Descending', 'smilepure' ) => 'DESC',
				esc_html__( 'Ascending', 'smilepure' )  => 'ASC',
			),
			'description' => esc_html__( 'Select sorting order.', 'smilepure' ),
			'std'         => 'DESC',
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'smilepure' ),
			'heading'     => esc_html__( 'Meta key', 'smilepure' ),
			'description' => esc_html__( 'Input meta key for grid ordering.', 'smilepure' ),
			'type'        => 'textfield',
			'param_name'  => 'meta_key',
			'dependency'  => array(
				'element' => 'orderby',
				'value'   => array(
					'meta_value',
					'meta_value_num',
				),
			),
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text Color', 'smilepure' ),
			'param_name'       => 'text_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text Color', 'smilepure' ),
			'param_name'       => 'custom_text_color',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Name Color', 'smilepure' ),
			'param_name'       => 'name_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Name Color', 'smilepure' ),
			'param_name'       => 'custom_name_color',
			'dependency'       => array(
				'element' => 'name_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'By Line Color', 'smilepure' ),
			'param_name'       => 'by_line_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom By Line Color', 'smilepure' ),
			'param_name'       => 'custom_by_line_color',
			'dependency'       => array(
				'element' => 'by_line_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Quote icon Color', 'smilepure' ),
			'param_name'       => 'quote_icon_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Quote Icon Color', 'smilepure' ),
			'param_name'       => 'custom_quote_icon_color',
			'dependency'       => array(
				'element' => 'quote_icon_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Star Color', 'smilepure' ),
			'param_name'       => 'star_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Star Color', 'smilepure' ),
			'param_name'       => 'custom_star_color',
			'dependency'       => array(
				'element' => 'star_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Divider Color', 'smilepure' ),
			'param_name'       => 'divider_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Divider Color', 'smilepure' ),
			'param_name'       => 'custom_divider_color',
			'dependency'       => array(
				'element' => 'divider_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Nav Color', 'smilepure' ),
			'param_name'       => 'button_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Nav Color', 'smilepure' ),
			'param_name'       => 'custom_button_color',
			'dependency'       => array(
				'element' => 'button_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Nav Hover Color', 'smilepure' ),
			'param_name'       => 'button_hover_color',
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
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Nav Hover Color', 'smilepure' ),
			'param_name'       => 'custom_button_hover_color',
			'dependency'       => array(
				'element' => 'button_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'heading'    => esc_html__( 'Loop', 'smilepure' ),
			'group'      => $carousel_tab,
			'type'       => 'checkbox',
			'param_name' => 'loop',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
			'std'        => '1',
		),
		array(
			'heading'    => esc_html__( 'Centered', 'smilepure' ),
			'group'      => $carousel_tab,
			'type'       => 'checkbox',
			'param_name' => 'centered',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
			'std'        => '',
		),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Auto Play', 'smilepure' ),
			'description' => esc_html__( 'Delay between transitions (in ms), e.g 3000. Leave blank to disabled.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'auto_play',
			'std'         => 5000,
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Navigation', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'nav',
			'value'      => Smilepure_VC::get_slider_navs(),
			'std'        => '',
		),
		Smilepure_VC::extra_id_field( array(
			'group'      => $carousel_tab,
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
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Pagination', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'pagination',
			'value'      => Smilepure_VC::get_slider_dots(),
			'std'        => '',
		),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Gutter', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'carousel_gutter',
			'min'         => 0,
			'step'        => 1,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => 30,
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Items Display', 'smilepure' ),
			'type'        => 'number_responsive',
			'param_name'  => 'carousel_items_display',
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
				'element'            => 'style',
				'value_not_equal_to' => array(
					'4',
					'8',
				),
			),
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
