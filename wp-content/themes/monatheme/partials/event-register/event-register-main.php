<?php
/**
 * Section name: EVENT REGISTER
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 0
 */
?>
<!-- MAIN -->
<main class="event-register-page">
	<?php
	if ( isset( $_GET['event_id'] ) ) {
		$event_id = @$_GET['event_id'];
		?>
        <!-- EVENT -->
        <section class="event">
            <div class="container">
                <div class="row jc-center">
                    <div class="col-8-md">
                        <div class="event-regis ta-center">
                            <div class="event-regis__title h4 f-bold">
								<?php echo __( 'Để đăng kí sự kiện này bạn cần phải đăng ký', 'monamedia' ); ?>
                            </div>
                            <div class="event-regis__buttons mt-4">
                                <a href="<?php echo get_permalink( $event_id ); ?>/?register"
                                   class="btn-main"><?php echo __( 'Đăng ký', 'monamedia' ); ?></a>
                            </div>
                        </div>
                        <div class="event-list">
                            <div class="event-list__item">
                                <div class="item-img">
                                    <a href="<?php echo get_permalink( $event_id ); ?>">
										<?php
										if ( ! empty( get_post_thumbnail_id( $event_id ) ) ) {
											?>
											<?php echo wp_get_attachment_image( get_post_thumbnail_id( $event_id ), 'primary-post-thumbnail-image', '', [ 'class' => 'img' ] ); ?>
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
                                <div class="item-bot">
                                    <div class="item-bot__content">
                                        <div class="textbox">
                                            <h4 class="title h4 f-bold">
                                                <a href="<?php echo get_permalink( $event_id ); ?>"><?php echo get_the_title( $event_id ) ?></a>
                                            </h4>
                                            <p class="desc">
												<?php echo get_the_excerpt( $event_id ); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	} ?>
</main>