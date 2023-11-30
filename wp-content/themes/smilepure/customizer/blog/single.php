<?php
$section  = 'blog_single';
$priority = 1;
$prefix   = 'single_post_';

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_feature_enable',
	'label'       => esc_html__( 'Featured Image', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display featured image on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_title_enable',
	'label'       => esc_html__( 'Post Title', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the post title.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_categories_enable',
	'label'       => esc_html__( 'Categories', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the categories on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_tags_enable',
	'label'       => esc_html__( 'Tags', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the tags on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_date_enable',
	'label'       => esc_html__( 'Post Meta Date', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the date on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_author_enable',
	'label'       => esc_html__( 'Post Author', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the author on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_comment_count_enable',
	'label'       => esc_html__( 'Comment Count', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the comment count on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_share_enable',
	'label'       => esc_html__( 'Post Sharing', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the social sharing on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_author_box_enable',
	'label'       => esc_html__( 'Author Info Box', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the author info box on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_pagination_enable',
	'label'       => esc_html__( 'Previous/Next Pagination', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display the previous/next post pagination on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_related_enable',
	'label'       => esc_html__( 'Related', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display related posts on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'            => 'number',
	'settings'        => 'single_post_related_number',
	'label'           => esc_html__( 'Number of related posts item', 'smilepure' ),
	'section'         => $section,
	'priority'        => $priority ++,
	'default'         => 3,
	'choices'         => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'active_callback' => array(
		array(
			'setting'  => 'single_post_related_enable',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Smilepure_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_comment_enable',
	'label'       => esc_html__( 'Comments', 'smilepure' ),
	'description' => esc_html__( 'Turn on to display comments on blog single posts.', 'smilepure' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'smilepure' ),
		'1' => esc_html__( 'On', 'smilepure' ),
	),
) );
