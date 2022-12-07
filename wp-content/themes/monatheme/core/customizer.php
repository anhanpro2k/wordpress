<?php

if ( class_exists( 'Kirki' ) ) {

	/**
	 * Add sections
	 */
	function kirki_demo_scripts() {
		wp_enqueue_style( 'kirki-demo', get_stylesheet_uri(), array(), time() );
	}

	add_action( 'wp_enqueue_scripts', 'kirki_demo_scripts' );

	$priority = 1;

	/**
	 * Add panel
	 */
	// Kirki::add_panel( 'panel_contacts',
	//     [
	//         'title'     => __( 'Liên hệ', 'mona-admin' ),
	//         'priority'   => $priority++,
	//         'capability' => 'edit_theme_options',
	//     ]
	// );

	/**
	 * Add section
	 */
	Kirki::add_section( 'section_side_box',
		[
			'title'      => __( 'Sidebox Nav Side', 'mona-admin' ),
			'priority'   => $priority ++,
			'capability' => 'edit_theme_options',
		]
	);

	Kirki::add_section( 'section_register_form',
		[
			'title'      => __( 'Register Form', 'mona-admin' ),
			'priority'   => $priority ++,
			'capability' => 'edit_theme_options',
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'form_event_title',
			'label'       => __( 'Tiêu đề Form Đăng Ký Sự Kiện', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_register_form',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'form_event_shortcode',
			'label'       => __( 'Shortcode Form Đăng Ký Sự Kiện', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_register_form',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'image',
			'settings'    => 'form_event_image',
			'label'       => __( 'Hình Ảnh Form Đăng Ký Sự Kiện', 'mona-admin' ),
			'description' => '360x415',
			'help'        => '',
			'section'     => 'section_register_form',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);


	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'form_course_title',
			'label'       => __( 'Tiêu đề Form Đăng Ký Khóa Học', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_register_form',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'form_course_shortcode',
			'label'       => __( 'Shortcode Form Đăng Ký Khóa Học', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_register_form',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'image',
			'settings'    => 'form_course_image',
			'label'       => __( 'Hình Ảnh Form Đăng Ký Khóa Học', 'mona-admin' ),
			'description' => '360x415',
			'help'        => '',
			'section'     => 'section_register_form',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);


	/**
	 * Add section
	 */
	Kirki::add_section( 'section_footer',
		[
			'title'      => __( 'Footer', 'mona-admin' ),
			'priority'   => $priority ++,
			'capability' => 'edit_theme_options',
		]
	);


	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'image',
			'settings'    => 'side_box_image',
			'label'       => __( 'Image', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_side_box',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);


	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'image',
			'settings'    => 'footer_logo',
			'label'       => __( 'Footer Logo', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_footer',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	Kirki::add_field( 'mona_setting', [
		'type'         => 'repeater',
		'label'        => __( 'List Link', 'mona-admin' ),
		'section'      => 'section_footer',
		'priority'     => $priority ++,
		'row_label'    => [
			'type'  => 'text',
			'value' => __( 'Link', 'mona-admin' ),
		],
		'button_label' => __( 'Add New', 'mona-admin' ),
		'settings'     => 'footer_list_links',
		'fields'       => [
			'name'  => [
				'type'        => 'text',
				'label'       => __( 'Link Name', 'mona-admin' ),
				'description' => '',
				'default'     => '',
			],
			'value' => [
				'type'        => 'text',
				'label'       => __( 'Link Url', 'mona-admin' ),
				'description' => '',
				'default'     => '',
			]
		]
	] );

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'footer_chat_label',
			'label'       => __( 'Live chat label', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_footer',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'footer_chat_link',
			'label'       => __( 'Live chat link', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_footer',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'footer_form_title',
			'label'       => __( 'Form Title', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_footer',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'footer_form_description',
			'label'       => __( 'Form Description', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_footer',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);


	/**
	 * Add field
	 */
	Kirki::add_field( 'mona_setting',
		[
			'type'        => 'text',
			'settings'    => 'footer_form_shortcode',
			'label'       => __( 'Form Shortcode', 'mona-admin' ),
			'description' => '',
			'help'        => '',
			'section'     => 'section_footer',
			'default'     => '',
			'priority'    => $priority ++,
		]
	);

	/**
	 * Add field
	 */
	// kirki::add_field( 'mona_setting', [
	//     'type'        => 'repeater',
	//     'label'       => __( 'Danh sách liên kết', 'mona-admin' ),
	//     'section'     => 'section_contact_socials',
	//     'priority'    =>  $priority++,
	//     'row_label' => [
	//         'type'  => 'text',
	//         'value' => __( 'Liên kết', 'mona-admin' ),

	//     ],
	//     'button_label' => __( 'Add New', 'mona-admin' ),
	//     'settings'     => 'contact_social_items',
	//     'fields' => [
	//         'icon' => [
	//             'type'        => 'image',
	//             'label'       => __( 'Icon', 'mona-admin' ),
	//             'description' => '',
	//             'default'     => '',
	//         ],
	//         'link' => [
	//             'type'        => 'text',
	//             'label'       => __( 'Link', 'mona-admin' ),
	//             'description' => '',
	//             'default'     => '',
	//         ],
	//     ]
	// ]);

}

if ( ! function_exists( 'mona_option' ) ) {

	/**
	 * Undocumented function
	 *
	 * @param [type] $setting
	 * @param string $default
	 *
	 * @return void
	 */
	function mona_option( $setting, $default = '' ) {
		echo mona_get_option( $setting, $default );
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $setting
	 * @param string $default
	 *
	 * @return void
	 */
	function mona_get_option( $setting, $default = '' ) {

		if ( class_exists( 'Kirki' ) ) {

			$value = $default;

			$options = get_option( 'option_name', array() );
			$options = get_theme_mod( $setting, $default );

			if ( isset ( $options ) ) {
				$value = $options;
			}

			return $value;
		}

		return $default;
	}

}
