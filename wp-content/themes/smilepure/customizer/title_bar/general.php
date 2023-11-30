<?php
$section  = 'title_bar';
$priority = 1;
$prefix   = 'title_bar_';

$title_bar_stylish = Smilepure_Helper::get_title_bar_list( true );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'layout',
	'label'       => esc_html__( 'Default Title Bar', 'smilepure' ),
	'description' => esc_html__( 'Select default title bar that displays on all pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '03',
	'choices'     => Smilepure_Helper::get_title_bar_list(),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'search_title',
	'label'       => esc_html__( 'Search Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text prefix that displays on search results page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Search results for: ', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'home_title',
	'label'       => esc_html__( 'Home Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text that displays on front latest posts page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Blog', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_category_title',
	'label'       => esc_html__( 'Archive Category Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive category page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Category: ', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_tag_title',
	'label'       => esc_html__( 'Archive Tag Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive tag page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Tag: ', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_author_title',
	'label'       => esc_html__( 'Archive Author Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive author page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Author: ', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_year_title',
	'label'       => esc_html__( 'Archive Year Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive year page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Year: ', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_month_title',
	'label'       => esc_html__( 'Archive Month Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive month page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Month: ', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_day_title',
	'label'       => esc_html__( 'Archive Day Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive day page.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Day: ', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'single_blog_title',
	'label'       => esc_html__( 'Single Blog Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text that displays on single blog posts. Leave blank to use post title.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Blog', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'single_product_title',
	'label'       => esc_html__( 'Single Product Heading', 'smilepure' ),
	'description' => esc_html__( 'Enter text that displays on single product pages. Leave blank to use product title.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Shop', 'smilepure' ),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_page_title_bar_layout',
	'label'       => esc_html__( 'Single Page Title Bar Layout', 'smilepure' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'default',
	'choices'     => $title_bar_stylish,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_title_bar_layout',
	'label'       => esc_html__( 'Single Blog Page Title Bar Layout', 'smilepure' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single blog post pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '01',
	'choices'     => $title_bar_stylish,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_product_title_bar_layout',
	'label'       => esc_html__( 'Single Product Page Title Bar Layout', 'smilepure' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single product pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'default',
	'choices'     => $title_bar_stylish,
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_service_title_bar_layout',
	'label'       => esc_html__( 'Single Service Page Title Bar Layout', 'smilepure' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single service post pages.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '02',
	'choices'     => $title_bar_stylish,
) );
