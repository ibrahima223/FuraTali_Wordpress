<?php

add_filter( 'vc_autocomplete_tm_testimonial_metro_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Testimonial_Metro',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_testimonial_metro_taxonomies_render', array(
	Smilepure_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Testimonial_Metro extends WPBakeryShortCode {

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
		$atts['row_gutter'] = $atts['gutter'];

		Smilepure_VC::get_grid_css( $selector, $atts );

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Testimonial Metro', 'smilepure' ),
	'base'     => 'tm_testimonial_metro',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-testimonials',
	'params'   => array_merge( array(
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
				'xl' => '5',
				'lg' => '3',
				'md' => '',
				'sm' => '2',
				'xs' => '1',
			),
		),
		array(
			'heading'     => esc_html__( 'Grid Gutter', 'smilepure' ),
			'description' => esc_html__( 'Controls the gutter of grid. Default 30px', 'smilepure' ),
			'type'        => 'number',
			'param_name'  => 'gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		Smilepure_VC::get_animation_field(),
		Smilepure_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Data Settings', 'smilepure' ),
			'type'       => 'hidden',
			'param_name' => 'main_query',
			'std'        => '',
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'smilepure' ),
			'heading'     => esc_html__( 'Items per page', 'smilepure' ),
			'description' => esc_html__( 'Number of items to show per page.', 'smilepure' ),
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
	), Smilepure_VC::get_grid_pagination_fields(), Smilepure_VC::get_vc_spacing_tab(), Smilepure_VC::get_custom_style_tab() ),
) );
