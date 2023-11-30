<?php
$section             = 'sidebars';
$priority            = 1;
$prefix              = 'sidebars_';
$sidebar_positions   = Smilepure_Helper::get_list_sidebar_positions();
$registered_sidebars = Smilepure_Helper::get_registered_sidebars();

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => sprintf( '<div class="desc">
			<strong class="insight-label insight-label-info">%s</strong>
			<p>%s</p>
			<p>%s</p>
		</div>', esc_html__( 'IMPORTANT NOTE: ', 'smilepure' ), esc_html__( 'Sidebar 2 can only be used if sidebar 1 is selected.', 'smilepure' ), esc_html__( 'Sidebar position option will control the position of sidebar 1. If sidebar 2 is selected, it will display on the opposite side.', 'smilepure' ) ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'General Settings', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'one_sidebar_breakpoint',
	'label'       => esc_html__( 'One Sidebar Breakpoint', 'smilepure' ),
	'description' => esc_html__( 'Controls the breakpoint when has only one sidebar to make the sidebar 100% width.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'postMessage',
	'default'     => 992,
	'choices'     => array(
		'min'  => 460,
		'max'  => 1300,
		'step' => 10,
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'both_sidebar_breakpoint',
	'label'       => esc_html__( 'Both Sidebars Breakpoint', 'smilepure' ),
	'description' => esc_html__( 'Controls the breakpoint when has both sidebars to make sidebars 100% width.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'postMessage',
	'default'     => 1199,
	'choices'     => array(
		'min'  => 460,
		'max'  => 1300,
		'step' => 10,
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'sidebars_below_content_mobile',
	'label'       => esc_html__( 'Sidebars Below Content', 'smilepure' ),
	'description' => esc_html__( 'Move sidebars display after main content on smaller screens.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'No', 'smilepure' ),
		'1' => esc_html__( 'Yes', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'siderbar_bg_color',
	'label'     => esc_html__( 'Sidebar Background Color', 'smilepure' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '
				.page-sidebar .page-sidebar-content,
				.page-sidebar .page-sidebar-content:after,
				.page-sidebar.page-sidebar-right .page-sidebar-content:before
			',
			'property' => 'background-color',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Sidebar Layouts', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'single_sidebar_width',
	'label'       => esc_html__( 'Single Sidebar Width', 'smilepure' ),
	'description' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. Input value as % unit, e.g 33.33333', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '33.33333',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'single_sidebar_offset',
	'label'       => esc_html__( 'Single Sidebar Offset', 'smilepure' ),
	'description' => esc_html__( 'Controls the offset of the sidebar when only one sidebar is present. Enter value including any valid CSS unit, e.g 70px.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Dual Sidebar Layouts', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'dual_sidebar_width',
	'label'       => esc_html__( 'Dual Sidebar Width', 'smilepure' ),
	'description' => esc_html__( 'Controls the width of sidebars when dual sidebars are present. Enter value including any valid CSS unit, e.g 33.33333.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '25',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'dual_sidebar_offset',
	'label'       => esc_html__( 'Dual Sidebar Offset', 'smilepure' ),
	'description' => esc_html__( 'Controls the offset of sidebars when dual sidebars are present. Enter value including any valid CSS unit, e.g 70px.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Pages', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on all pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on all pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );


Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on all pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Search Page', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'search_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on search results page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'blog_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'search_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on search results page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'search_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on search page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Front Latest Posts Page', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'home_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on front latest posts page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'blog_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'home_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on front latest posts page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'home_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'home_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar front latest posts page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Blog Posts', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'post_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single blog post pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'blog_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'post_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single blog post pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'post_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'post_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single blog post pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Blog Archive', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'blog_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on blog archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'blog_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'blog_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on blog archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'blog_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on blog archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Product', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single product pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'shop_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single product pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'product_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single product pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Product Archive', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on product archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'shop_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on product archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'product_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on product archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Doctor', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'doctor_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single doctor pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'doctor_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single doctor pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'doctor_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'doctor_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single doctor pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Doctor Archive', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'doctor_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on doctor archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'doctor_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on doctor archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'doctor_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'doctor_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on doctor archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Service', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single service pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'service_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single service pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'service_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single service pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'service_page_single_sidebar_width',
	'label'       => esc_html__( 'Single Sidebar Width', 'smilepure' ),
	'description' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. Input value as % unit, e.g 33.33333. This setting will be override global sidebar with, If leave blank then use global sidebar width.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '33.333333',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Service Archive', 'smilepure' ) . '</div>',
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on service archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'smilepure' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on service archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'service_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'smilepure' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'smilepure' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on service archive pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );
