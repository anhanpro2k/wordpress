<?php
global $post;
?>
<div class="event-list__item">
    <div class="item-img">
        <a href="<?php the_permalink(); ?>">
			<?php
			if ( ! empty( get_post_thumbnail_id() ) ) {
				echo wp_get_attachment_image( get_post_thumbnail_id(), 'primary-post-thumbnail-image', '', [ 'class' => 'img' ] );
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
    <div class="item-bot">
        <div class="item-bot__date">
            <div class="date">
                <div class="date-icon">
                    <img src="<?php echo get_site_url(); ?>/template/img/icon-calendar.png"
                         alt=""/>
                </div>
				<?php
				$mona_event_title = get_field( 'mona_event_title', $post->ID );
				$mona_event_time  = get_field( 'mona_event_time', $post->ID );
				?>
				<?php
				if ( ! empty( $mona_event_time['time_title'] ) ) {
					?>
                    <div class="date-title heading h3"><?php echo $mona_event_time['time_title']; ?></div>
					<?php
				}
				?>
				<?php
				if ( ! empty( $mona_event_time['time_title'] ) ) {
					?>
                    <div class="date-time f-bold mona-content">
						<?php echo $mona_event_time['time_time']; ?>
                    </div>
					<?php
				}
				?>
            </div>
        </div>
        <div class="item-bot__content">
            <div class="textbox">
                <h4 class="title h4 f-bold">
                    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                </h4>
                <div class="desc">
					<?php the_excerpt(); ?>
                </div>
            </div>
            <div class="button-gr">
                <a href="<?php echo get_permalink( MONA_PAGE_EVENT_REGISTER ) ?>?event_id=<?php echo get_the_ID(); ?>"
                   title="Đăng ký"
                   class="btn-main"><?php echo __( 'Đăng ký', 'monamedia' ); ?></a>
                <a href="<?php the_permalink(); ?>" title="Xem chi tiết" class="btn-more">
					<?php echo __( 'Xem chi tiết', 'monamedia' ); ?>
                </a>
            </div>
        </div>
    </div>
</div>
