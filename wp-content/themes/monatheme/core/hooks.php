<?php
/**
 * Undocumented function
 *
 * @return void
 */
function add_after_setup_theme() {
	// regsiter menu
	register_nav_menus(
		[
			'primary-menu'     => __( 'Theme Main Menu', 'monamedia' ),
			'sub-menu'         => __( 'Theme Sub Menu', 'monamedia' ),
			'footer-col2-menu' => __( 'Footer Col 2 Menu', 'monamedia' ),

		]
	);
	// add size image
	add_image_size( 'banner-desktop-image', 1920, 790, false );
	add_image_size( 'banner-mobile-image', 400, 675, false );
	add_image_size( 'post-banner-image', 800, 600, false );
	add_image_size( 'post-thumbnail-image', 515, 345, false );
	add_image_size( 'primary-post-thumbnail-image', 1000, 400, false );
	add_image_size( 'icon-96', 96, 96, false );
	add_image_size( 'icon-32', 32, 32, false );
	add_image_size( 'icon-36', 36, 36, false );
	add_image_size( 'icon-48', 48, 48, false );
	add_image_size( 'sidebox-image', 220, 420, false );
	add_image_size( 'footer-menu-image', 361, 48, false );
	add_image_size( 'icon-24', 24, 24, false );
	add_image_size( 'icon-32', 32, 32, false );
	add_image_size( 'learn-image', 150, 64, false );
	add_image_size( 'course-image', 650, 350, false );
	add_image_size( 'course-image-big', 650, 450, false );
	add_image_size( '360x360', 360, 360, false );
	add_image_size( 'banner-mobile-image', 360, 360, false );
	add_image_size( '525x325', 525, 325, false );
	add_image_size( 'business-logo-image', 160, 45, false );
	add_image_size( 'avatar-quotes-image', 120, 120, false );
	add_image_size( 'banner-image', 420, 515, false );
	add_image_size( 'target-image', 650, 400, false );
	add_image_size( 'target-icon', 128, 128, false );
	add_image_size( 'target-icon', 900, 539, false );
	add_image_size( 'will-get-image', 1200, 750, false );
	add_image_size( 'company-icon', 135, 45, false );
	add_image_size( 'journey-image', 440, 725, false );
}

add_action( 'after_setup_theme', 'add_after_setup_theme' );

/**
 * Undocumented function
 *
 * @return void
 */
function mona_add_styles_scripts() {
	wp_enqueue_style( 'mona-custom', get_template_directory_uri() . '/public/css/mona-custom.css', array(), rand() );
	wp_enqueue_script( 'mona-frontend', get_template_directory_uri() . '/public/scripts/mona-frontend.js', array(), false, true );
	wp_localize_script( 'mona-frontend', 'mona_ajax_url',
		[
			'ajaxURL' => admin_url( 'admin-ajax.php' ),
			'siteURL' => get_site_url(),
		]
	);
}

add_action( 'wp_enqueue_scripts', 'mona_add_styles_scripts' );

/**
 * Undocumented function
 *
 * @param [type] $tag
 * @param [type] $handle
 * @param [type] $src
 *
 * @return void
 */
function mona_add_module_to_my_script( $tag, $handle, $src ) {
	if ( 'mona-frontend' === $handle ) {
		$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
	}

	return $tag;
}

add_filter( 'script_loader_tag', 'mona_add_module_to_my_script', 10, 3 );

/**
 * Undocumented function
 *
 * @return void
 */
function mona_redirect_external_after_logout() {
	wp_redirect( get_the_permalink( MONA_PAGE_HOME ) );
	exit();
}

//add_action( 'wp_logout', 'mona_redirect_external_after_logout' );

/**
 * Undocumented function
 *
 * @param [type] $query
 *
 * @return void
 */
function mona_parse_request_post_type( $query ) {
	if ( ! is_admin() ) {
		$query->set( 'ignore_sticky_posts', true );
		$ptype = $query->get( 'post_type', true );
		$ptype = (array) $ptype;

		// if ( isset( $_GET['s'] ) ) {
		//     $ptype[] = 'post';
		//     $query->set('post_type', $ptype);
		//     $query->set( 'posts_per_page' , 12);
		// }

		if ( $query->is_main_query() && $query->is_tax( 'category_event' ) ) {
			$ptype[] = 'mona_event';
			$query->set( 'post_type', $ptype );
			$query->set( 'posts_per_page', 2 );
		}

		if ( $query->is_main_query() && $query->is_tax( 'category_course' ) ) {
			$ptype[] = 'mona_course';
			$query->set( 'post_type', $ptype );
			$query->set( 'posts_per_page', 2 );
		}

		if ( $query->is_main_query() && $query->is_tax( 'category_level' ) ) {
			$ptype[] = 'mona_course';
			$query->set( 'post_type', $ptype );
			$query->set( 'posts_per_page', 2 );
		}

		if ( $query->is_main_query() && $query->is_tax( 'category_mentor' ) ) {
			$ptype[] = 'mona_course';
			$query->set( 'post_type', $ptype );
			$query->set( 'posts_per_page', 2 );
		}

	}

	return $query;
}

add_filter( 'pre_get_posts', 'mona_parse_request_post_type' );

/**
 * Undocumented function
 *
 * @return void
 */
function mona_register_sidebars() {
	register_sidebar(
		[
			'id'            => 'footer_column2',
			'name'          => __( 'Footer Column 2', 'mona-admin' ),
			'description'   => __( 'Nội dung widget.', 'mona-admin' ),
			'before_widget' => '<div id="%1$s" class="footer-col">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="footer-title h4 f-bold">',
			'after_title'   => '</div>',
		]
	);
}

add_action( 'widgets_init', 'mona_register_sidebars' );

/**
 * Undocumented function
 *
 * @param [type] $post_states
 * @param [type] $post
 *
 * @return void
 */
function mona_add_post_state( $post_states, $post ) {
	if ( $post->ID == MONA_PAGE_HOME ) {
		$post_states[] = __( 'PAGE - Trang chủ', 'mona-admin' );
	}
	if ( $post->ID == MONA_PAGE_BLOG ) {
		$post_states[] = __( 'PAGE - Trang Tin tức', 'mona-admin' );
	}

	return $post_states;
}

add_filter( 'display_post_states', 'mona_add_post_state', 10, 2 );

/**
 * Undocumented function
 *
 * @param [type] $html
 *
 * @return void
 */
function mona_change_logo_class( $html ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$html           = sprintf( '<a href="%1$s" class="header-icon" rel="home" itemprop="url"><div class="icon">%2$s</div></a>',
		esc_url( home_url() ),
		wp_get_attachment_image( $custom_logo_id, 'full', false,
			[
				'class' => 'header-logo-image',
			]
		)
	);

	return $html;
}

//add_filter( 'get_custom_logo', 'mona_change_logo_class' );

/**
 * Undocumented function
 *
 * @param [type] $url
 * @param [type] $path
 * @param [type] $blog_id
 *
 * @return void
 */
function mona_filter_admin_url( $url, $path, $blog_id ) {
	if ( $path === 'admin-ajax.php' && ! is_admin() ) {
		$url .= '?mona-ajax';
	}

	return $url;
}

add_filter( 'admin_url', 'mona_filter_admin_url', 999, 3 );