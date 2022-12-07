<?php
global $post;
?>
<div class="thumb-bottom">
    <div class="thumb-meta">
        <div class="thumb-meta-auth">
            <div class="thumb-meta-avt">
                <a href="">
					<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                </a>
            </div>
            <div class="thumb-meta-name"><?php echo get_the_author_meta( 'display_name' ) ?></div>
        </div>
        <div class="thumb-meta-time">
            <div class="time-item"><?php echo human_time_diff( mysql2date( 'U', get_the_time( 'Y-m-d H:i:s e' ) ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'monamedia' ); ?></div>
            <div class="time-item"><?php echo reading_time( get_the_ID() ) . __( ' read', 'monamedia' ); ?></div>
        </div>
    </div>
	<?php $tags = wp_get_post_tags( $post->ID ); ?>
	<?php
	if ( content_exists( $tags ) ) {
		?>
        <div class="thumb-tag">
			<?php
			foreach ( $tags as $key => $item ) {
				?>
                <a href="<?php echo get_tag_link( $item->term_id ); ?>"
                   class="tag btn-sm"
                   title="UI/UX"><?php echo $item->name ?></a>
				<?php
			}
			?>
        </div>
		<?php
	}
	?>
</div>