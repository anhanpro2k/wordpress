<?php
/**
 * Section name: Home Target
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 3
 */
?>
<!-- GOING -->
<?php
$mona_home_section_going = get_field( 'mona_home_section_going' );
?>
<?php
if ( ! empty( $mona_home_section_going ) ) {
	?>
    <section class="going">
        <div class="container">
            <div class="going-heading">
                <div class="heading-sc ta-center">
					<?php
					if ( ! empty( $mona_home_section_going['going_title'] ) ) {
						?>
                        <div class="title-sc"><?php echo $mona_home_section_going['going_title']; ?></div>
						<?php
					}
					?>
					<?php
					if ( ! empty( $mona_home_section_going['going_description'] ) ) {
						?>
                        <div class="desc">
							<?php echo $mona_home_section_going['going_description']; ?>
                        </div>
						<?php
					}
					?>
                </div>
            </div>
			<?php
			$going_category_course = $mona_home_section_going['going_category_course'];
			?>
            <div class="going-tab tab-block-js">
                <div class="going-tab__panel panel-w-view">
					<?php
					if ( content_exists( $going_category_course ) ) {
						?>
                        <div class="panel p-2">
							<?php
							foreach ( $going_category_course as $key => $item ) {
								?>
                                <div class="panel-item tab-panel-js<?php echo $key == 0 ? ' active' : '' ?>"><?php echo $item->name ?></div>
								<?php
							}
							?>
                        </div>
						<?php
					}
					?>
                    <div class="view-all">
                        <a href="<?php echo get_permalink( MONA_PAGE_COURSE ) ?>" class="view-btn"
                           title="View All Courses">
							<?php echo __( 'View All Courses', 'monamedia' ); ?>
                        </a>
                    </div>
                </div>
				<?php
				if ( content_exists( $going_category_course ) ) {
					?>
                    <div class="going-tab__content">
						<?php
						foreach ( $going_category_course as $key => $item ) {
							?>
                            <div class="content tab-content-js <?php echo $key == 0 ? 'active' : '' ?>">
                                <div class="content-item slider-tab">
									<?php
									$order      = 'DESC';
									$per_page   = 4;
									$argsCourse = array(
										'post_type'      => 'mona_course',
										'post_status'    => 'publish',
										'posts_per_page' => $per_page,
										'order'          => $order,
										'tax_query'      => [
											'relation' => 'AND',
											[
												'taxonomy' => 'category_course',
												'field'    => 'id',
												'terms'    => $item->term_id,
											]
										]
									);

									$loop = new WP_Query( $argsCourse );
									?>
									<?php
									if ( $loop->have_posts() ) {
										?>
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
												<?php
												while ( $loop->have_posts() ) {
													$loop->the_post();
													global $post;
													?>
                                                    <div class="swiper-slide">
                                                        <div class="content-item-inner">
                                                            <div class="content-item__img">
																<?php
																$mona_course_section_info = get_field( 'mona_course_section_info' );
																$info_image               = $mona_course_section_info['info_image'];
																if ( ! empty( $info_image ) ) {
																	?>
																	<?php echo wp_get_attachment_image( $info_image['ID'], 'course-image-big', '', [ 'class' => 'img' ] ); ?>
																	<?php
																} else { ?>
                                                                    <img
                                                                            src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                                                            alt=""
                                                                    />
																	<?php
																}
																?>
                                                            </div>
                                                            <div class="content-item__info">
                                                                <div class="course-box">
                                                                    <div class="course-box__header">
                                                                        <a href="<?php the_permalink( $post->ID ); ?>"
                                                                           class="course-box__logo">
																			<?php
																			$mona_course_icon = get_field( 'mona_course_icon' );
																			?>
																			<?php
																			if ( ! empty( $mona_course_icon ) ) {
																				echo wp_get_attachment_image( $mona_course_icon, 'icon-32', '', [ 'class' => 'img' ] );
																			} else {
																				?>
                                                                                <img
                                                                                        src="<?php echo get_template_directory_uri(); ?>/public/images/icons8-education-30.png"
                                                                                        alt=""
                                                                                />
																				<?php
																			} ?>
                                                                        </a>
                                                                        <div class="course-box__content">
                                                                            <div class="course-box__title h5 f-bold">
                                                                                <p class="title">
                                                                                    <a href="<?php the_permalink( $post->ID ); ?>"><?php echo get_the_title( $post->ID ) ?></a>
                                                                                </p>
                                                                            </div>
																			<?php
																			$mentor = get_the_terms( $post->ID, 'category_mentor' )[0]; //just get only 1 mentor
																			?>
                                                                            <div class="mentor"><?php echo __( 'Mentor', 'monamedia' ); ?>
                                                                                : <?php echo $mentor->name ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="course-box__button">
                                                                        <a href="<?php echo get_permalink( $post->ID ) ?>"
                                                                           class="btn-main"
                                                                        ><?php echo __( 'Get Started for Free', 'monamedia' ); ?></a
                                                                        >
																		<?php
																		$mona_course_student_maximum = ! empty( get_field( 'mona_course_student_maximum', $post->ID ) ) ? get_field( 'mona_course_student_maximum', $post->ID ) : 0;
																		$current_student             = get_post_meta( $post->ID, 'student', true );
																		if ( empty( $current_student ) ) {
																			$current_student = 0;
																		}
																		?>
                                                                        <div class="enrolled">
                                                                            <p><?php echo $current_student . "/" . $mona_course_student_maximum . ' ' ?><?php echo __( 'enrolled', 'monamedia' ); ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
												wp_reset_query();
												?>
                                            </div>
                                        </div>
										<?php
									}
									wp_reset_query();
									?>

                                    <div class="slider-ctr">
                                        <div class="arrow prev">
                                            <iconify-icon
                                                    icon="ooui:previous-ltr"
                                                    width="16"
                                            ></iconify-icon>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="arrow next">
                                            <iconify-icon
                                                    icon="ooui:next-ltr"
                                                    width="16"
                                            ></iconify-icon>
                                        </div>
                                    </div>
                                </div>
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
    </section>
	<?php
}
?>
