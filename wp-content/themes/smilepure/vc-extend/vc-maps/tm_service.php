<?php

add_filter( 'vc_autocomplete_tm_service_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Service',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_service_taxonomies_render', array(
	Smilepure_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_service_filter_by_callback', array(
	'WPBakeryShortCode_TM_Service',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_service_filter_by_render', array(
	Smilepure_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Service extends WPBakeryShortCode {

	/**
	 * @param $search_string
	 *
	 * @return array|bool
	 */

	public static function autocomplete_taxonomies_field_search( $search_string ) {
		$data = Smilepure_VC::instance()->autocomplete_get_data_from_post_type( $search_string, 'service' );

		return $data;
	}

	public function get_inline_css( $selector, $atts ) {
		Smilepure_VC::get_grid_css( $selector, $atts );

		Smilepure_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$carousel_tab   = esc_html__( 'Carousel Settings', 'smilepure' );
$carousel_types = array(
	'carousel_01',
	'carousel_02',
	'carousel_03',
	'carousel_04',
	'carousel_05',
	'carousel_06',
	'carousel_07',
	'carousel_08',
);
$grid_types     = array(
	'grid_classic_01',
	'grid_classic_02',
	'grid_classic_03',
	'grid_classic_04',
	'grid_classic_05',
	'grid_classic_06',
	'grid_classic_07',
	'grid_classic_08',
);

vc_map( array(
	'name'     => esc_html__( 'Service', 'smilepure' ),
	'base'     => 'tm_service',
	'category' => SMILEPURE_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-grid',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Grid 01', 'smilepure' )     => 'grid_classic_01',
				esc_html__( 'Grid 02', 'smilepure' )     => 'grid_classic_02',
				esc_html__( 'Grid 03', 'smilepure' )     => 'grid_classic_03',
				esc_html__( 'Grid 04', 'smilepure' )     => 'grid_classic_04',
				esc_html__( 'Grid 05', 'smilepure' )     => 'grid_classic_05',
				esc_html__( 'Grid 06', 'smilepure' )     => 'grid_classic_06',
				esc_html__( 'Grid 07', 'smilepure' )     => 'grid_classic_07',
				esc_html__( 'Grid 08', 'smilepure' )     => 'grid_classic_08',
				esc_html__( 'Carousel 01', 'smilepure' ) => 'carousel_01',
				esc_html__( 'Carousel 02', 'smilepure' ) => 'carousel_02',
				esc_html__( 'Carousel 03', 'smilepure' ) => 'carousel_03',
				esc_html__( 'Carousel 04', 'smilepure' ) => 'carousel_04',
				esc_html__( 'Carousel 05', 'smilepure' ) => 'carousel_05',
				esc_html__( 'Carousel 06', 'smilepure' ) => 'carousel_06',
				esc_html__( 'Carousel 07', 'smilepure' ) => 'carousel_07',
				esc_html__( 'Carousel 08', 'smilepure' ) => 'carousel_08',
			),
			'std'         => 'grid_classic_01',
		),
		array(
			'heading'     => esc_html__( 'Icon effect', 'smilepure' ),
			'type'        => 'dropdown',
			'param_name'  => 'icon_effect',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Dotted', 'smilepure' ) => 'dotted',
				esc_html__( 'Dashed', 'smilepure' ) => 'dashed',
			),
			'std'         => 'dotted',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'grid_classic_06',
					'grid_classic_07',
					'carousel_06',
					'carousel_07',
				),
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
				'value'   => $grid_types,
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
			'dependency'  => array(
				'element' => 'style',
				'value'   => $grid_types,
			),
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
			'dependency'  => array(
				'element' => 'style',
				'value'   => $grid_types,
			),
		),
		array(
			'heading'    => esc_html__( 'Image Size', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'image_size',
			'value'      => array(
				esc_html__( '370x277', 'smilepure' ) => '370x277',
				esc_html__( '370x237', 'smilepure' ) => '370x237',
				esc_html__( '480x480', 'smilepure' ) => '480x480',
				esc_html__( '570x385', 'smilepure' ) => '570x385',
			),
			'std'        => '370x237',
		),
		Smilepure_VC::get_animation_field( array(
			'std' => 'move-up',
		) ),
		Smilepure_VC::extra_class_field(),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Auto Play', 'smilepure' ),
			'description' => esc_html__( 'Delay between transitions (in ms), e.g 3000. Leave blank to disabled.', 'smilepure' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'carousel_auto_play',
			'dependency'  => array(
				'element' => 'style',
				'value'   => $carousel_types,
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Loop', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'carousel_loop',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
			'std'        => '1',
			'dependency' => array(
				'element' => 'style',
				'value'   => $carousel_types,
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Equal Height', 'smilepure' ),
			'type'       => 'checkbox',
			'param_name' => 'equal_height',
			'value'      => array( esc_html__( 'Yes', 'smilepure' ) => '1' ),
			'dependency' => array(
				'element' => 'style',
				'value'   => $carousel_types,
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Navigation', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_nav',
			'value'      => Smilepure_VC::get_slider_navs(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => $carousel_types,
			),
		),
		Smilepure_VC::extra_id_field( array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Slider Button ID', 'smilepure' ),
			'param_name' => 'slider_button_id',
			'dependency' => array(
				'element' => 'carousel_nav',
				'value'   => array(
					'custom',
				),
			),
		) ),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Pagination', 'smilepure' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_pagination',
			'value'      => Smilepure_VC::get_slider_dots(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => $carousel_types,
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
				'lg' => 3,
				'md' => 3,
				'sm' => 2,
				'xs' => 1,
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => $carousel_types,
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Gutter', 'smilepure' ),
			'type'       => 'number',
			'param_name' => 'carousel_gutter',
			'std'        => 30,
			'min'        => 0,
			'max'        => 50,
			'step'       => 1,
			'suffix'     => 'px',
			'dependency' => array(
				'element' => 'style',
				'value'   => $carousel_types,
			),
		),
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
	), Smilepure_VC::get_grid_filter_fields(), Smilepure_VC::get_grid_pagination_fields(), Smilepure_VC::get_vc_spacing_tab(), Smilepure_VC::get_custom_style_tab() ),
) );

