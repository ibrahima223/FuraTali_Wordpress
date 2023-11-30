<?php

add_filter( 'vc_autocomplete_tm_testimonial_list_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Testimonial_List',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_testimonial_list_taxonomies_render', array(
	Smilepure_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Testimonial_List extends WPBakeryShortCode {

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

		$text_tmp    = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );
		$name_tmp    = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['name_color'], $atts['custom_name_color'] );
		$by_line_tmp = Smilepure_Helper::get_shortcode_css_color_inherit( 'color', $atts['by_line_color'], $atts['custom_by_line_color'] );

		if ( $text_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-desc { $text_tmp }";
		}

		if ( $name_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-name { $name_tmp }";
		}

		if ( $by_line_tmp !== '' ) {
			$Smilepure_shortcode_lg_css .= "$selector .testimonial-by-line { $by_line_tmp }";
		}

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_group = esc_html__( 'Styling', 'smilepure' );
$pagination    = esc_html__( 'Pagination', 'smilepure' );

vc_map( array(
	'name'                      => esc_html__( 'Testimonials List', 'smilepure' ),
	'base'                      => 'tm_testimonial_list',
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
				esc_html__( 'Style 01', 'smilepure' ) => '01',
				esc_html__( 'Style 02', 'smilepure' ) => '02',
			),
			'std'         => '01',
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
			'group'      => $pagination,
			'heading'    => esc_html__( 'Pagination', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'pagination',
			'value'      => array(
				esc_html__( 'No Pagination', 'smilepure' ) => '',
				esc_html__( 'Pagination', 'smilepure' )    => 'pagination',
			),
			'std'        => '',
		),
		array(
			'group'      => $pagination,
			'heading'    => esc_html__( 'Pagination Align', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'pagination_align',
			'value'      => array(
				esc_html__( 'Left', 'smilepure' )   => 'left',
				esc_html__( 'Center', 'smilepure' ) => 'center',
				esc_html__( 'Right', 'smilepure' )  => 'right',
			),
			'std'        => 'left',
			'dependency' => array(
				'element' => 'pagination',
				'value'   => array( 'pagination', 'infinite', 'loadmore', 'loadmore_alt' ),
			),
		),
	), Smilepure_VC::get_vc_spacing_tab() ),
) );
