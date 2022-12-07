<?php
/*
The comments page for Bones
*/

// don't load it if you can't comment
if ( post_password_required() ) {
	return;
}
//echo "Hello world";


/************* COMMENT LAYOUT *********************/
?>

<div id="comments" class="comments-are">
	<?php
	if ( have_comments() ) : ?>
        <ol class="comment-list">
			<?php
			$args = array(
				'walker'            => null, //customizer depth
				'max_depth'         => '',
				'style'             => 'ol',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => 'Reply',
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 40,
				'reverse_top_level' => null,
				'reverse_children'  => null,
				'format'            => 'html5',
				'short_ping'        => false,
				'echo'              => true
			);
			wp_list_comments( $args );
			?>
        </ol>
		<?php
		//We have comments
		if ( ! comments_open() && get_comments_number() ): ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'monamedia' ); ?></p>
		<?php else: ?>
            COMMENTS ARE OPEN
		<?php

		endif;
	endif; ?>

	<?php comment_form(); ?>
</div>

<!-- Comment Layout-->

