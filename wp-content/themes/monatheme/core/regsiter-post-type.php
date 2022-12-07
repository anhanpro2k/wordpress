<?php
/**
 * Undocumented function
 *
 * @return void
 */
function mona_regsiter_custom_post_types() {

	$posttype_course = [
		'labels'              => [
			'name'          => 'Course',
			'singular_name' => 'Course',
			'all_items'     => __( 'All Courses', 'mona-admin' ),
			'add_new'       => __( 'New', 'mona-admin' ),
			'add_new_item'  => __( 'New', 'mona-admin' ),
			'edit_item'     => __( 'Edit', 'mona-admin' ),
			'new_item'      => __( 'Add', 'mona-admin' ),
			'view_item'     => __( 'View', 'mona-admin' ),
			'view_items'    => __( 'View', 'mona-admin' ),
		],
		'description'         => 'Add Course',
		'supports'            => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields',
			'excerpt',
		],
		'taxonomies'          => array( 'category_course', 'category_mentor', 'category_level' ),
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => [
			'slug'       => 'course',
			'with_front' => true
		],
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	];

	register_post_type( 'mona_course', $posttype_course );

	$tax_courses = [
		'labels'            => [
			'name'              => __( 'Category Course', 'mona-admin' ),
			'singular_name'     => __( 'Category Course', 'mona-admin' ),
			'search_items'      => __( 'Search Course', 'mona-admin' ),
			'all_items'         => __( 'All', 'mona-admin' ),
			'parent_item'       => __( 'Category Course', 'mona-admin' ),
			'parent_item_colon' => __( 'Category Course', 'mona-admin' ),
			'edit_item'         => __( 'Edit', 'mona-admin' ),
			'add_new'           => __( 'Add', 'mona-admin' ),
			'update_item'       => __( 'Update', 'mona-admin' ),
			'add_new_item'      => __( 'Add', 'mona-admin' ),
			'new_item_name'     => __( 'Add', 'mona-admin' ),
			'menu_name'         => __( 'Category Course', 'mona-admin' ),
		],
		'hierarchical'      => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'has_archive'       => true,
		'public'            => true,
		'rewrite'           => array(
			'slug'       => 'category-course',
			'with_front' => true
		),
		'capabilities'      => [
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		],
	];
	register_taxonomy( 'category_course', 'mona_course', $tax_courses );

	$tax_level = [
		'labels'            => [
			'name'              => __( 'Level', 'mona-admin' ),
			'singular_name'     => __( 'Level', 'mona-admin' ),
			'search_items'      => __( 'Search', 'mona-admin' ),
			'all_items'         => __( 'All', 'mona-admin' ),
			'parent_item'       => __( 'Level', 'mona-admin' ),
			'parent_item_colon' => __( 'Level', 'mona-admin' ),
			'edit_item'         => __( 'Edit', 'mona-admin' ),
			'add_new'           => __( 'Add', 'mona-admin' ),
			'update_item'       => __( 'Update', 'mona-admin' ),
			'add_new_item'      => __( 'Add', 'mona-admin' ),
			'new_item_name'     => __( 'Add', 'mona-admin' ),
			'menu_name'         => __( 'Level', 'mona-admin' ),
		],
		'hierarchical'      => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'has_archive'       => true,
		'public'            => true,
		'rewrite'           => array(
			'slug'       => 'level-course',
			'with_front' => true
		),
		'capabilities'      => [
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		],
	];
	register_taxonomy( 'category_level', 'mona_course', $tax_level );

//	$tax_courses = [
//		'labels'            => [
//			'name'              => __( 'Course Category', 'mona-admin' ),
//			'singular_name'     => __( 'Course Category', 'mona-admin' ),
//			'search_items'      => __( 'Search', 'mona-admin' ),
//			'all_items'         => __( 'All', 'mona-admin' ),
//			'parent_item'       => __( 'Course Category', 'mona-admin' ),
//			'parent_item_colon' => __( 'Course Category', 'mona-admin' ),
//			'edit_item'         => __( 'Edit', 'mona-admin' ),
//			'add_new'           => __( 'Add', 'mona-admin' ),
//			'update_item'       => __( 'Update', 'mona-admin' ),
//			'add_new_item'      => __( 'Add', 'mona-admin' ),
//			'new_item_name'     => __( 'Add', 'mona-admin' ),
//			'menu_name'         => __( 'Course Category', 'mona-admin' ),
//		],
//		'hierarchical'      => true,
//		'show_admin_column' => true,
//		'has_archive'       => true,
//		'public'            => true,
//		'rewrite'           => array(
//			'slug'       => 'category-course',
//			'with_front' => true
//		),
//		'capabilities'      => [
//			'manage_terms' => 'publish_posts',
//			'edit_terms'   => 'publish_posts',
//			'delete_terms' => 'publish_posts',
//			'assign_terms' => 'publish_posts',
//		],
//	];
//	register_taxonomy( 'category_course', 'mona_course', $tax_courses );

	$tax_mentor = [
		'labels'            => [
			'name'              => __( 'Mentor', 'mona-admin' ),
			'singular_name'     => __( 'Mentor', 'mona-admin' ),
			'search_items'      => __( 'Search', 'mona-admin' ),
			'all_items'         => __( 'All', 'mona-admin' ),
			'parent_item'       => __( 'Mentor', 'mona-admin' ),
			'parent_item_colon' => __( 'Mentor', 'mona-admin' ),
			'edit_item'         => __( 'Edit', 'mona-admin' ),
			'add_new'           => __( 'Add', 'mona-admin' ),
			'update_item'       => __( 'Update', 'mona-admin' ),
			'add_new_item'      => __( 'Add', 'mona-admin' ),
			'new_item_name'     => __( 'Add', 'mona-admin' ),
			'menu_name'         => __( 'Mentor', 'mona-admin' ),
		],
		'hierarchical'      => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'has_archive'       => true,
		'public'            => true,
		'rewrite'           => array(
			'slug'       => 'category-mentor',
			'with_front' => true
		),
		'capabilities'      => [
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		],
	];
	register_taxonomy( 'category_mentor', 'mona_course', $tax_mentor );


	$posttype_event = [
		'labels'              => [
			'name'          => 'Event',
			'singular_name' => 'Event',
			'all_items'     => __( 'All Event', 'mona-admin' ),
			'add_new'       => __( 'New Event', 'mona-admin' ),
			'add_new_item'  => __( 'New Event', 'mona-admin' ),
			'edit_item'     => __( 'Edit', 'mona-admin' ),
			'new_item'      => __( 'Add', 'mona-admin' ),
			'view_item'     => __( 'View', 'mona-admin' ),
			'view_items'    => __( 'View', 'mona-admin' ),
		],
		'description'         => 'Add Event',
		'supports'            => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields',
			'excerpt',
		],
		'taxonomies'          => array( 'category_event' ),
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => [
			'slug'       => 'event',
			'with_front' => true
		],
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	];
	register_post_type( 'mona_event', $posttype_event );

	$tax_category_event = [
		'labels'            => [
			'name'              => __( 'Category Event', 'mona-admin' ),
			'singular_name'     => __( 'Category Event', 'mona-admin' ),
			'search_items'      => __( 'Search', 'mona-admin' ),
			'all_items'         => __( 'All Category', 'mona-admin' ),
			'parent_item'       => __( 'Category Event', 'mona-admin' ),
			'parent_item_colon' => __( 'Category Event', 'mona-admin' ),
			'edit_item'         => __( 'Edit', 'mona-admin' ),
			'add_new'           => __( 'Add New', 'mona-admin' ),
			'update_item'       => __( 'Update', 'mona-admin' ),
			'add_new_item'      => __( 'Add New', 'mona-admin' ),
			'new_item_name'     => __( 'Add New', 'mona-admin' ),
			'menu_name'         => __( 'Category Event', 'mona-admin' ),
		],
		'hierarchical'      => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'has_archive'       => true,
		'public'            => true,
		'rewrite'           => array(
			'slug'       => 'category-event',
			'with_front' => true
		),
		'capabilities'      => [
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		],
	];
	register_taxonomy( 'category_event', 'mona_event', $tax_category_event );


	$posttype_speaker = [
		'labels'              => [
			'name'          => 'Speaker',
			'singular_name' => 'Speaker',
			'all_items'     => __( 'All Speaker', 'mona-admin' ),
			'add_new'       => __( 'New Speaker', 'mona-admin' ),
			'add_new_item'  => __( 'New Speaker', 'mona-admin' ),
			'edit_item'     => __( 'Edit', 'mona-admin' ),
			'new_item'      => __( 'Add', 'mona-admin' ),
			'view_item'     => __( 'View', 'mona-admin' ),
			'view_items'    => __( 'View', 'mona-admin' ),
		],
		'description'         => 'Add Speaker',
		'supports'            => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields',
			'excerpt',
		],
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => [
			'slug'       => 'speaker',
			'with_front' => true
		],
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	];
	register_post_type( 'mona_speaker', $posttype_speaker );


	flush_rewrite_rules();
}

add_action( 'init', 'mona_regsiter_custom_post_types' );