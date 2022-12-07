<?php
/**
 * The template for displaying index.
 *
 * @package Monamedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * define acf
 */
if ( get_current_user_id() == 1 ) {
	define( 'ACF_LITE', false );
} else {
	define( 'ACF_LITE', true );
}

function reading_time( $post_ID ): string {
	$content     = get_post_field( 'post_content', $post_ID );
	$word_count  = str_word_count( strip_tags( $content ) );
	$readingtime = ceil( $word_count / 200 );

	if ( $readingtime == 1 ) {
		$timer = __( ' minute', 'monamedia' );
	} else {
		$timer = __( ' minutes', 'monamedia' );
	}

	return $readingtime . $timer;
}

function mona_pagination_links_icon( $wp_query = '' ): void {
	if ( $wp_query == '' ) {
		global $wp_query;
	}
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}
	echo '<div class="paginations">';
	echo paginate_links(
		[
			'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link( $bignum ) ) ),
			'format'    => '',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<iconify-icon icon="ooui:previous-ltr"></iconify-icon>',
			'next_text' => '<iconify-icon icon="ooui:previous-rtl"></iconify-icon>',
			'type'      => 'list',
			'end_size'  => 3,
			'mid_size'  => 3
		]

	);
	echo '</div>';
}

function loadMoreMentor( $array, $default_number, $page ) {
	if ( $page < 1 ) {
		return null;
	}
	if ( $default_number < count( $array ) ) {
		if ( $default_number * ( $page - 1 ) + 1 > count( $array ) ) {
			return null;
		}

		return array_splice( $array, $default_number * ( $page - 1 ), $default_number );
	}

	return null;
}

/**
 * @throws Exception
 */
function day_left( $future_date = '' ) {
	$date1 = new DateTime( $future_date );
	$date1->modify( '+1 day' );
	$now = new DateTime();
	if ( $now < $date1 ) {
		return ( $date1->diff( $now ) )->days;
	} else {
		return 0;
	}

}

function wpcf7_add_text_to_mail_body( $contact_form ) {
	$form_id = $contact_form->id();
	if ( $form_id == 368 ) { //  => Your Form ID.
		// Submission object, that generated when the user click the submit button.
		$submission = WPCF7_Submission:: get_instance();
		if ( $submission ) {
			$posted_data = $submission->get_posted_data();
			$event_id    = $posted_data['event-id'];
//			// Got name data
			if ( ! empty( get_post_meta( $event_id, 'participant', true ) ) ) {
				$current_participant = get_post_meta( $event_id, 'participant', true );
				update_post_meta( $event_id, 'participant', $current_participant + 1 );
			} else {
				add_post_meta( $event_id, 'participant', 1, true );
			}

		}
	} else if ( $form_id == 377 ) {
		$submission  = WPCF7_Submission:: get_instance();
		$posted_data = $submission->get_posted_data();
		$course_id   = $posted_data['course-id'];
		if ( ! empty( get_post_meta( $course_id, 'student', true ) ) ) {
			$current_student = get_post_meta( $course_id, 'student', true );
			update_post_meta( $course_id, 'student', $current_student + 1 );
		} else {
			add_post_meta( $course_id, 'student', 1, true );
		}

	}

}

add_action( 'wpcf7_before_send_mail', 'wpcf7_add_text_to_mail_body' );


/**
 * Undocumented function
 * Trả về giá trị dạng số
 *
 * @param [type] $value_num
 *
 * @return void
 */

/**
 * define theme page
 */
define( 'MONA_PAGE_HOME', get_option( 'page_on_front', true ) );
define( 'MONA_PAGE_BLOG', get_option( 'page_for_posts', true ) );
define( 'MONA_PAGE_EVENT', url_to_postid( get_the_permalink( 58 ) ) );
define( 'MONA_PAGE_COURSE', url_to_postid( get_the_permalink( 253 ) ) );
define( 'MONA_PAGE_EVENT_REGISTER', url_to_postid( get_the_permalink( 375 ) ) );

require_once( get_template_directory() . '/__autoload.php' );

