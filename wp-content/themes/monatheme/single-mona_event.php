<?php
/**
 * The template for displaying single.
 *
 * @package Monamedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
while ( have_posts() ):
	the_post();
	mona_set_post_view();
	global $post;
	?>
    <main class="event-detail-page">
        <!-- EVENT DETAIL -->
        <section class="event-detail">
            <div class="container">
                <div class="event-detail-row">
                    <div class="row gy-1">
                        <div class="col-content col-8-md">
                            <div class="event-detail__thumb" data-aos="fade-up">
                                <div class="thumb-wrap">
									<?php
									if ( ! empty( get_post_thumbnail_id() ) ) {
										?>
										<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'primary-post-thumbnail-image', '', [ 'class' => 'img' ] ); ?>
										<?php
									} else {
										?>
                                        <img
                                                src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                                alt=""
                                        />
										<?php
									} ?>
                                </div>
                                <div class="thumb-content">
                                    <div class="title h4 f-bold">
                                        <h1>
                                            <a href=""><?php the_title() ?></a>
                                        </h1>
                                        <span class="btn-hide event-id" style="display: none"
                                              value="<?php echo get_the_ID() ?>"></span>
                                    </div>
                                    <div class="enrolled flex ai-center">
										<?php
										if ( ! empty( get_post_meta( get_the_ID(), 'participant', true ) ) ) {
											$number_participant = get_post_meta( get_the_ID(), 'participant', true );
										} else {
											$number_participant = 0;
										}
										$mona_course_default_icon = get_field( 'mona_course_default_icon', MONA_PAGE_COURSE );

										if ( content_exists( $mona_course_default_icon ) ) { ?>
                                            <div class="enrolled-imgs flex ai-center">
												<?php
												for ( $i = 0; $i < $number_participant; $i ++ ) {
													if ( ! empty( $mona_course_default_icon[ $i ]['icon_avatar'] ) ) {
														?>
                                                        <div class="img-wrap">
															<?php echo wp_get_attachment_image( $mona_course_default_icon[ $i ]['icon_avatar'], 'icon-22', '', [ 'class' => 'img' ] ); ?>
                                                        </div>
														<?php
													} else {
														break;
													}
												}
												?>
                                            </div>
											<?php
										} else { ?>
                                            <div class="enrolled-imgs flex ai-center">
												<?php
												for ( $i = 0; $i < $number_participant; $i ++ ) {
													if ( $i < 4 ) {
														?>
                                                        <div class="img-wrap">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.png"
                                                                 alt=""/>
                                                        </div>
														<?php
													} else {
														break;
													}
												}
												?>
                                            </div>
											<?php
										} ?>
                                        <div class="enrolled-text ml-1 f-semi">

                                            <p><?php echo __( 'Có', 'monamedia' ) . ' '; ?><?php echo $number_participant; ?><?php echo ' ' . __( 'người
                                                tham gia', 'monamedia' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="event-detail__content">
                                <article class="event-detail__article mona-content">
									<?php the_content(); ?>
                                </article>
                                <div class="event-detail__speakers">
									<?php
									$mona_event_speaker = get_field( 'mona_event_speaker' );
									?>
									<?php
									if ( content_exists( $mona_event_speaker ) ) {
									?>
                                    <div class="speakers">
                                        <div class="speakers-title h4 f-bold"><?php echo __( 'Diễn giả', 'monamedia' ); ?></div>
                                        <div class="speakers-list flex ai-center flex-wrap">
											<?php
											foreach ( $mona_event_speaker as $key => $item ) {
												?>
                                                <div class="speakers-item">
                                                    <figure class="card-box">
                                                        <div class="card-box__thumb">
                                                            <div class="img-inner">
																<?php
																if ( empty( get_post_thumbnail_id( $item->ID ) ) ) {
																	?>
                                                                    <a href="<?php echo get_permalink( $item->ID ); ?>">
                                                                        <img
                                                                                src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.png"
                                                                                alt=""
                                                                        />
                                                                    </a>
																	<?php
																} else {
																	?>
                                                                    <a href="<?php echo get_permalink( $item->ID ); ?>">
                                                                        <img
                                                                                src="<?php echo get_the_post_thumbnail_url( $item->ID, 'icon-96' ); ?>"
                                                                                alt=""
                                                                        />
                                                                    </a>
																	<?php
																} ?>
                                                            </div>
                                                        </div>
                                                        <figcaption class="card-box__content">
                                                            <div class="name"><a
                                                                        href="<?php echo get_permalink( $item->ID ); ?>"><?php echo $item->post_title ?></a>
                                                            </div>
															<?php
															$mona_speaker_position = get_field( 'mona_speaker_position', $item->ID );
															?>
															<?php
															if ( ! empty( $mona_speaker_position ) ) {
																?>
                                                                <div class="meta"><?php echo $mona_speaker_position; ?></div>
																<?php
															}
															?>
															<?php
															$mona_speaker_socials = get_field( 'mona_speaker_socials', $item->ID );
															?>
															<?php
															if ( content_exists( $mona_speaker_socials ) ) {
																?>
                                                                <div class="social">
																	<?php
																	foreach ( $mona_speaker_socials as $social ) {
																		?>
                                                                        <a href="<?php echo $social['social_link']['url']; ?>"
                                                                           target="_blank"
                                                                           class="social-link">
																			<?php echo wp_get_attachment_image( $social['social_icon']['ID'], 'icon-32', '', [ 'class' => 'img' ] ); ?>
                                                                        </a>
																		<?php
																	}
																	?>
                                                                </div>
																<?php
															}
															?>
                                                        </figcaption>
                                                    </figure>
                                                </div>
												<?php
											}
											?>
                                        </div>
										<?php
										}
										?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-aside col-4-md">
                            <aside class="aside-wrap" data-aos="fade-up">
                                <aside class="aside-item aside-calendar">
                                    <div class="calendar">
										<?php
										$mona_event_time = get_field( 'mona_event_time' );
										?>
										<?php
										if ( ! empty( $mona_event_time ) ) {
											?>
                                            <div class="calendar-content">
                                                <div class="calendar-head">
                                                    <div class="calendar-icon">
                                                        <img src="<?php echo get_site_url(); ?>/template/img/icon-calendar-black.png"
                                                             alt=""/>
                                                    </div>
													<?php
													if ( ! empty( $mona_event_time['time_title'] ) ) {
														?>
                                                        <div class="calendar-title heading h3"><?php echo $mona_event_time['time_title']; ?></div>
														<?php
													}
													?>
                                                </div>
                                                <div class="calendar-times">
													<?php
													if ( ! empty( $mona_event_time['time_time'] ) ) {
														?>
                                                        <div class="time f-bold h5 upper mona-content">
															<?php echo $mona_event_time['time_time']; ?>
                                                        </div>
														<?php
													}
													?>
                                                </div>
                                            </div>
											<?php
										}
										?>
                                        <button data-popup="booking"
                                                class="btn-regis btn-main btn-popup">
                                            <span class="icon-success">
                                                <iconify-icon icon="clarity:check-line" width="24"></iconify-icon>
                                            </span>
											<?php echo __( 'Đăng ký', 'monamedia' ); ?></button>
                                    </div>
                                </aside>
                            </aside>
                        </div>
                    </div>
                </div>
        </section>
    </main>


	<?php $form_event_title = mona_get_option( 'form_event_title' ); ?>
    <!-- POPUP -->
    <div class="popup popup-booking mona-event-popup<?php echo isset( $_GET['register'] ) ? ' is-show' : '' ?>">
        <div class="container">
            <div class="row  jc-center">
                <div class="col-8-md">
                    <div class="popup-content">
                        <div class="popup-close">
                            <img src="http://codingmentor.monamedia.net/wp-content/uploads/2022/11/btn-close.png"
                                 alt="">
                        </div>
                        <div class="popup-main">
							<?php
							if ( ! empty( $form_event_title ) ) {
								?>
                                <div class="popup-title h4 f-bold"><?php echo $form_event_title ?></div>
								<?php
							}
							?>
                            <div class="booking-form mt-10">
								<?php $form_event_shortcode = mona_get_option( 'form_event_shortcode' ); ?>
                                <div class="row gy-1 flex-column-reverse-xs">
                                    <div class="col-6-xs">
										<?php
										if ( ! empty( $form_event_shortcode ) ) {
											?>
                                            <div class="form-wrapper">
												<?php echo do_shortcode( $form_event_shortcode ) ?>
                                            </div>
											<?php
										}
										?>
                                    </div>
									<?php $form_event_image = mona_get_option( 'form_event_image' ); ?>
									<?php
									if ( ! empty( $form_event_image ) ) {
										?>
                                        <div class="col-6-xs">
                                            <div class="img-wrap">
                                                <img src="<?php echo $form_event_image ?>" alt=""/>
                                            </div>
                                        </div>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endwhile;
get_footer();
