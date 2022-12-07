<?php
global $post;
?>
<figure class="thumb-box" data-aos="fade-up">
    <div class="thumb-head flex">
        <div class="thumb-img">
            <div class="img-wrap">
                <a href="<?php echo get_the_permalink(); ?>">
					<?php
					if ( ! empty( get_post_thumbnail_id() ) ) {
						?>

						<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'post-thumbnail-image', '', [ 'class' => 'img' ] ); ?>
						<?php
					} else {
						?>
                        <img
                                src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                alt=""
                        />

						<?php
					} ?>
                </a>
            </div>
        </div>
        <figcaption class="thumb-content">
            <h4 class="title">
                <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
            </h4>
            <p class="desc">
				<?php the_excerpt(); ?>
            </p>
        </figcaption>
    </div>
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
                    <a href="<?php echo get_tag_link( $item->term_id ); ?>" class="tag btn-sm"
                       title="UI/UX"><?php echo $item->name ?></a>
					<?php
				}
				?>
            </div>
			<?php
		}
		?>
    </div>
</figure>
