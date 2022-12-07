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
	?>

	<?php
	$mona_course_layout = get_field( 'mona_course_layout' );
	?>
    <!-- MAIN -->
    <main class="<?php echo ( $mona_course_layout == 'layout2' ) ? 'course-detail-page' : 'course-detail-sub-page'; ?>">
		<?php
		$mona_course_student_maximum = ! empty( get_field( 'mona_course_student_maximum' ) ) ? get_field( 'mona_course_student_maximum' ) : 0;
		$current_student             = get_post_meta( get_the_ID(), 'student', true );
		$is_full_student             = ! ( $current_student < $mona_course_student_maximum );
		switch ( $mona_course_layout ) {
			case "layout1": ?>
                <!-- COURSE DETAIL TEMPLATE 1-->
                <section class="course-detail --sub pt-sc-sm pb-sc">
                    <div class="sub-wrap">
                        <div class="container">
                            <div class="sub-row row">
                                <div class="sub-col col-left">
                                    <div class="sub-head">
                                        <!-- OVERVIEW -->
                                        <div class="course-detail__overview">
											<?php
											if ( ! empty( $mona_course_section_info['course_redirect_link'] ) ) {
												?>
                                                <input type="hidden"
                                                       value="<?php echo $mona_course_section_info['course_redirect_link']; ?>"
                                                       class="course-redirect">
												<?php
											}
											?>
                                            <div class="overview">
                                                <div class="overview-content" data-aos="fade-up">
                                                    <div class="overview-textbox">
                                                        <h2 class="overview-title h3 heading mona-title mona-course-title">
															<?php echo get_the_title(); ?></h2>
                                                        <span class="course-id" hidden
                                                              value="<?php echo get_the_ID() ?>"></span>
                                                        <div class="overview-desc mt-2">
															<?php the_excerpt(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="overview-info mt-4">
                                                        <div class="overview-mentor mt-4">
                                                            <div class="mentor flex ai-center">
                                                                <div class="mentor-avt">
																	<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                                                                </div>
                                                                <div class="mentor-by">
																	<?php echo __( 'created by', 'monamedia' ); ?>
                                                                    <a
                                                                            class="name"><?php echo get_the_author_meta( 'display_name' ); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden-on-tablet">
                                            <aside class="aside-course" data-aos="fade-up">
                                                <div class="course-detail__overview">
                                                    <div class="overview">

														<?php
														$mona_course_section_info = get_field( 'mona_course_section_info' );
														?>
														<?php
														$thumbnail_id = $mona_course_section_info['info_image']['ID'];
														?>

														<?php
														if ( ! empty( $mona_course_section_info ) ) {
															?>
                                                            <div class="overview-image">
                                                                <div class="img-inner">
																	<?php
																	if ( ! empty( $thumbnail_id ) ) {
																		echo wp_get_attachment_image( $thumbnail_id, 'course-image', '', [ 'class' => 'img' ] );
																	} else {
																		?>
                                                                        <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                                                             alt=""/>
																		<?php
																	} ?>
                                                                </div>
                                                            </div>
                                                            <div class="overview-course">
																<?php
																if ( ! empty( $mona_course_section_info['info_price1'] ) || ( $mona_course_section_info['info_price2'] ) ) {
																	?>
                                                                    <div class="overview-course__price">
                                                                        <div class="price">
																			<?php
																			if ( ! empty( $mona_course_section_info['info_price1'] ) ) {
																				?>
                                                                                <ins class="price-ins heading h3">
																					<?php echo( $mona_course_section_info['info_price1'] ); ?><?php echo __( 'AUD', 'monamedia' ); ?>
                                                                                </ins>
																				<?php
																			}
																			?>
																			<?php
																			if ( ! empty( $mona_course_section_info['info_price2'] ) ) {
																				?>
                                                                                <del class="price-del h4">
																					<?php echo( $mona_course_section_info['info_price2'] ); ?><?php echo __( 'AUD', 'monamedia' ); ?>
                                                                                </del>
																				<?php
																			}
																			?>
                                                                        </div>
                                                                    </div>
																	<?php
																}
																?>

																<?php
																$info_early_bird = $mona_course_section_info['info_early_bird'];
																?>
																<?php
																if ( ! empty( $info_early_bird ) ) {
																	?>
                                                                    <div class="overview-count">
                                                                        <div class="count">
																			<?php
																			$day_left = day_left( $info_early_bird );
																			if ( ( $day_left ) == 1 ) {
																				echo '<strong>' . $day_left . " " . __( 'day', 'monamedia' ) . " " . '</strong>' . __( 'left early bird', 'monamedia' );
																			} else if ( $day_left == 0 ) {
																				echo 'The course is open';
																			} else {
																				echo '<strong>' . $day_left . " " . __( 'days', 'monamedia' ) . " " . '</strong>' . __( 'left early bird', 'monamedia' );
																			}
																			?>
                                                                        </div>
                                                                    </div>
																	<?php
																}
																?>

                                                                <div class="overview-course__enroll mt-3 <?php echo ( $is_full_student ) ? '' : 'btn-popup mona-register-course' ?>"
																	<?php echo $is_full_student ? '' : 'data-popup="booking"' ?>>
                                                                    <a href="" class="btn-gradient"
                                                                       title="Enroll this course">
																		<?php
																		if ( $is_full_student ) {
																			echo __( 'Đã đủ học viên', 'monamedia' );
																		} else {
																			echo __( 'Đăng ký ngay', 'monamedia' );
																		}
																		?>

                                                                    </a>
                                                                </div>
																<?php
																if ( ! empty( $mona_course_section_info['course_description'] ) ) {
																	?>
                                                                    <div class="overview-course__desc mt-3">
                                                                        <div class="desc mona-content">
																			<?php echo $mona_course_section_info['course_description']; ?>
                                                                        </div>
                                                                    </div>
																	<?php
																}
																?>
                                                                <div class="overview-course__detail mt-3">
																	<?php
																	if ( ! empty( $mona_course_section_info['course_resource_title'] ) ) {
																		?>
                                                                        <div class="label f-bold">
																			<?php echo $mona_course_section_info['course_resource_title']; ?>
                                                                        </div>
																		<?php
																	}
																	?>

																	<?php
																	if ( content_exists( $mona_course_section_info['course_resources'] ) ) {
																		?>
                                                                        <ul class="list mt-3">
																			<?php
																			foreach ( $mona_course_section_info['course_resources'] as $key => $item ) {
																				?>
                                                                                <li class="li">
																					<?php
																					if ( ! empty( $item['resource_icon'] ) ) {
																						?>
                                                                                        <div class="li-icon">
																							<?php echo wp_get_attachment_image( $item['resource_icon']['ID'], 'icon-24', '', [ 'class' => 'img' ] ); ?>
                                                                                        </div>
																						<?php
																					}
																					?>
																					<?php
																					if ( ! empty( $item['resource_content'] ) ) {
																						?>
                                                                                        <div class="li-text">
																							<?php echo $item['resource_content']; ?>
                                                                                        </div>
																						<?php
																					}
																					?>
                                                                                </li>
																				<?php
																			}
																			?>
                                                                        </ul>
																		<?php
																	}
																	?>
                                                                </div>
                                                            </div>
															<?php
														}
														?>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                        <section class="course-detail__info">
                                            <div class="info">
                                                <div class="info-content">
													<?php
													$mona_course_section_learn = get_field( 'mona_course_section_learn' );
													?>
													<?php
													if ( ! empty( $mona_course_section_learn ) ) {
														?>
                                                        <div class="info-content-box">
															<?php
															if ( ! empty( $mona_course_section_learn['learn_title'] ) ) {
																?>
                                                                <div class="info-content__title h4 f-bold"
                                                                     data-aos="fade-down">
																	<?php echo $mona_course_section_learn['learn_title']; ?>
                                                                </div>
																<?php
															}
															?>
															<?php
															if ( content_exists( $mona_course_section_learn['learn_list_items'] ) ) {
																?>
                                                                <div class="info-content__list mt-6">
                                                                    <div class="row gy-1">
																		<?php
																		foreach ( $mona_course_section_learn['learn_list_items'] as $key => $item ) {
																			?>
                                                                            <div class="col-4-md" data-aos="fade-up"
                                                                                 data-aos-delay="<?php echo 100 + $key * 100 ?>">
                                                                                <div class="item">
																					<?php
																					if ( ! empty( $item['item_image'] ) ) {
																						?>
                                                                                        <div class="item-img">
																							<?php echo wp_get_attachment_image( $item['item_image']['ID'], 'learn-image', '', [ 'class' => 'img' ] ); ?>
                                                                                        </div>
																						<?php
																					}
																					?>
                                                                                    <div class="item-content mt-3">
																						<?php
																						if ( ! empty( $item['item_title'] ) ) {
																							?>
                                                                                            <div class="item-title text-gradient f-bold h5">
																								<?php echo $item['item_title']; ?>
                                                                                            </div>
																							<?php
																						}
																						?>
																						<?php
																						if ( ! empty( $item['item_description'] ) ) {
																							?>
                                                                                            <div class="item-desc mona-content">
																								<?php echo $item['item_description']; ?>
                                                                                            </div>
																							<?php
																						}
																						?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
																			<?php
																		}
																		?>

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
                                    </div>
                                    <div class="sub-bot">
                                        <!-- INFO -->
                                        <section class="course-detail__info">
                                            <article class="blog-detail__article">
                                                <div class="mona-content">
													<?php the_content(); ?>
                                                </div>
                                            </article>
											<?php
											$mona_course_section_trial = get_field( 'mona_course_section_trial' );
											?>
											<?php
											if ( ! empty( $mona_course_section_trial ) ) {
												?>
                                                <div class="info">
                                                    <div class="info-content">
                                                        <div class="info-content-box">
															<?php
															if ( ! empty( $mona_course_section_trial['trial_title'] ) ) {
																?>
                                                                <div class="info-content__title h4 f-bold"
                                                                     data-aos="fade-down">
																	<?php echo $mona_course_section_trial['trial_title']; ?>
                                                                </div>
																<?php
															}
															?>
                                                            <div class="info-content__overview" data-aos="fade-up">
                                                                <div class="overview-content">
																	<?php
																	if ( ! empty( $mona_course_section_trial['trial_content'] ) ) {
																		?>
                                                                        <div class="textbox mona-content">
																			<?php echo $mona_course_section_trial['trial_content']; ?>
                                                                        </div>
																		<?php
																	}
																	?>
																	<?php
																	if ( content_exists( $mona_course_section_trial['trial_list_buttons'] ) ) {
																		?>
                                                                        <div class="button-place mt-6">
																			<?php
																			foreach ( $mona_course_section_trial['trial_list_buttons'] as $key => $button ) {
																				?>
																				<?php
																				if ( ! empty( $button['button_link'] ) ) {
																					?>
                                                                                    <a href="<?php echo $button['button_link']['url'] ?>"
                                                                                       class="btn"
                                                                                       title="Get free course">
                                                            <span
                                                                    class="text"><?php echo $button['button_link']['title'] ?></span>
                                                                                    </a>
																					<?php
																				}
																				?>
																				<?php
																			}
																			?>
                                                                        </div>
																		<?php
																	}
																	?>
                                                                </div>
                                                                <div class="overview-image">
                                                                    <div class="polygon polygon-rotate">
                                                                        <img src="<?php echo get_site_url(); ?>/template/img/polygon-will-get.png"
                                                                             alt=""/>
                                                                    </div>
                                                                    <div class="img-man">
                                                                        <img src="<?php echo get_site_url(); ?>/template/img/man-like.png"
                                                                             alt=""/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info-content-box">
															<?php
															$mona_course_section_mentor = get_field( 'mona_course_section_mentor' );
															?>
															<?php
															if ( ! empty( $mona_course_section_mentor['mentor_title'] ) ) {
																?>
                                                                <div class="info-content__title h4 f-bold"
                                                                     data-aos="fade-down">
																	<?php echo $mona_course_section_mentor['mentor_title']; ?>
                                                                </div>
																<?php
															}
															?>
															<?php
															$mentor = get_the_terms( get_the_ID(), 'category_mentor' )[0];
															if ( ! empty( $mentor ) ) {
																?>
                                                                <div class="info-content__mentor" data-aos="fade-up">
                                                                    <div class="mentor">
                                                                        <div class="mentor-card">
                                                                            <figure class="card-box">
                                                                                <div class="card-box__thumb">
                                                                                    <div class="img-inner">
                                                                                        <a
                                                                                                href="<?php echo get_term_link( $mentor->term_id ) ?>">
																							<?php
																							$mona_tax_mentor_avatar = get_field( 'mona_tax_mentor_avatar', $mentor );
																							if ( ! empty( $mona_tax_mentor_avatar ) ) {
																								echo wp_get_attachment_image( $mona_tax_mentor_avatar['ID'], 'icon-96', '', [ 'class' => 'img' ] );
																							} else {
																								?>
                                                                                                <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.png"
                                                                                                     alt=""/>
																								<?php
																							} ?>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <figcaption class="card-box__content">
                                                                                    <div class="name">
                                                                                        <a
                                                                                                href="<?php echo get_term_link( $mentor->term_id ) ?>"><?php echo $mentor->name ?></a>
                                                                                    </div>
																					<?php
																					$mona_tax_mentor_job = get_field( 'mona_tax_mentor_job', $mentor );
																					?>
																					<?php
																					if ( ! empty( $mona_tax_mentor_job ) ) {
																						?>
                                                                                        <div class="meta"><?php echo $mona_tax_mentor_job; ?>
                                                                                        </div>
																						<?php
																					}
																					?>
																					<?php
																					$mona_tax_mentor_social = get_field( 'mona_tax_mentor_social', $mentor );
																					?>

																					<?php
																					if ( content_exists( $mona_tax_mentor_social ) ) {
																						?>
                                                                                        <div class="social">
																							<?php
																							foreach ( $mona_tax_mentor_social as $key => $item ) {
																								if ( ! empty( $item['social_icon'] ) ) {
																									?>
                                                                                                    <a target="_blank"
                                                                                                       href="<?php echo ! empty( $item['social_link'] ) ? $item['social_link']['url'] : ''; ?>"
                                                                                                       class="social-link">
																										<?php echo wp_get_attachment_image( $item['social_icon']['ID'], 'icon-24', '', [ 'class' => 'img' ] ); ?>
                                                                                                    </a>
																									<?php
																								}
																							}
																							?>
                                                                                        </div>
																						<?php
																					}
																					?>
                                                                                </figcaption>
                                                                            </figure>
                                                                        </div>
                                                                        <div class="mentor-about">
                                                                            <p class="desc">
																				<?php echo $mentor->description; ?>
                                                                            </p>
                                                                            <div class="enrolled">
                                                                                <div class="enrolled-item flex ai-center">
                                                                                    <div class="icon">
                                                                                        <img src="<?php echo get_site_url(); ?>/template/img/icon-profile.png"
                                                                                             alt=""/>
                                                                                    </div>
																					<?php

																					$args                 = array(
																						'post_type' => 'mona_course',
																						'tax_query' => array(
																							array(
																								'taxonomy' => 'category_mentor',
																								'field'    => 'term_id',
																								'terms'    => $mentor->term_id
																							)
																						)
																					);
																					$query                = new WP_Query( $args );
																					$total_student_mentor = 0;
																					while ( $query->have_posts() ) {
																						$query->the_post();
																						global $post;
//																					var_dump( get_post_meta( $post->ID, 'student', true ) );
																						$student_enrolled_course = get_post_meta( $post->ID, 'student', true );
																						if ( ! empty( $student_enrolled_course ) ) {
																							$total_student_mentor += $student_enrolled_course;
																						}
																					}
																					wp_reset_query();

																					?>
                                                                                    <p class="text">
																						<?php
																						echo $total_student_mentor . ' ' . __( 'học sinh đăng ký khóa', 'monamedia' );
																						?>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="enrolled-item flex ai-center">
                                                                                    <div class="icon">
                                                                                        <img src="<?php echo get_site_url(); ?>/template/img/icon-ticket-star.png"
                                                                                             alt=""/>
                                                                                    </div>
                                                                                    <p class="text">
																						<?php
																						$count_post = $mentor->count;
																						echo $count_post . " ";
																						echo __( 'khóa học', 'monamedia' ); ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="button-place">
                                                                                <a href="" class="btn-gradient"
                                                                                   title="Contact"><?php echo __( 'Liên hệ tư vấn', 'monamedia' ); ?></a>
                                                                                <a href="<?php echo get_term_link( $mentor->term_id ) ?>"
                                                                                   class="btn-course-list"
                                                                                   title="View course list">
																					<?php echo __( 'Xem danh sách khóa học', 'monamedia' ); ?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
																<?php
															}
															?>
                                                        </div>
                                                        <div class="info-content-box">
                                                            <div class="info-content__title h4 f-bold"
                                                                 data-aos="fade-down">
																<?php echo __( 'Student Feedback', 'monamedia' ); ?>
                                                            </div>
                                                            <div class="info-content__feedback" data-aos="fade-up">
                                                                <div class="feedback">
																	<?php comments_template() ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<?php
											}
											?>
                                        </section>
                                    </div>
                                </div>
                                <div class="sub-col col-right hidden-md">
                                    <aside class="aside-wrap">
                                        <aside class="aside-course" data-aos="fade-up">
                                            <div class="course-detail__overview">
												<?php
												if ( ! empty( $mona_course_section_info['course_redirect_link'] ) ) {
													?>
                                                    <input type="hidden"
                                                           value="<?php echo $mona_course_section_info['course_redirect_link']; ?>"
                                                           class="course-redirect">
													<?php
												}
												?>
                                                <div class="overview">
                                                    <div class="overview-image">
                                                        <div class="img-inner">
															<?php
															$thumbnail_id = $mona_course_section_info['info_image']['ID'];

															if ( ! empty( $thumbnail_id ) ) {
																echo wp_get_attachment_image( $thumbnail_id, 'course-image', '', [ 'class' => 'img' ] );
															} else {
																?>
                                                                <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                                                     alt=""/>
																<?php
															} ?>
                                                        </div>
                                                    </div>
													<?php
													if ( ! empty( $mona_course_section_info ) ) {
														$info_early_bird = $mona_course_section_info['info_early_bird'];
														?>
                                                        <div class="overview-course">
															<?php
															if ( ! empty( $mona_course_section_info['info_price1'] ) || ( $mona_course_section_info['info_price2'] ) ) {
																?>
                                                                <div class="overview-course__price">
                                                                    <div class="price">
																		<?php
																		$day_left = day_left( $info_early_bird );
																		if ( $day_left > 0 ) {
																			?>
																			<?php
																			if ( ! empty( $mona_course_section_info['info_price1'] ) ) {
																				?>
                                                                                <ins class="price-ins heading h3">
																					<?php echo( $mona_course_section_info['info_price1'] ); ?>
																					<?php echo __( 'AUD', 'monamedia' ); ?>
                                                                                </ins>
																				<?php
																			}
																			?>
																			<?php
																			if ( ! empty( $mona_course_section_info['info_price2'] ) ) {
																				?>
                                                                                <del class="price-del h4">
																					<?php echo( $mona_course_section_info['info_price2'] ); ?>
																					<?php echo __( 'AUD', 'monamedia' ); ?>
                                                                                </del>
																				<?php
																			}
																		} else {
																			if ( ! empty( $mona_course_section_info['info_price2'] ) ) {
																				?>
                                                                                <ins class="price-ins heading h3">
																					<?php echo( $mona_course_section_info['info_price2'] ); ?>
																					<?php echo __( 'AUD', 'monamedia' ); ?>
                                                                                </ins>
																				<?php
																			}

																		} ?>
                                                                    </div>
                                                                </div>
																<?php
															}
															?>

															<?php
															if ( ! empty( $info_early_bird ) ) {
																?>
                                                                <div class="overview-count">
                                                                    <div class="count">
																		<?php
																		$day_left = day_left( $info_early_bird );
																		if ( ( $day_left ) == 1 ) {
																			echo '<strong>' . $day_left . " " . __( 'day', 'monamedia' ) . " " . '</strong>' . __( 'left early bird', 'monamedia' );
																		} else if ( $day_left == 0 ) {
																			echo '';
																		} else {
																			echo '<strong>' . $day_left . " " . __( 'days', 'monamedia' ) . " " . '</strong>' . __( 'left early bird', 'monamedia' );
																		}
																		?>
                                                                    </div>
                                                                </div>
																<?php
															}
															?>
                                                            <div class="overview-course__enroll mt-3 <?php echo ( $is_full_student ) ? '' : 'btn-popup mona-register-course' ?>"
																<?php echo $is_full_student ? '' : 'data-popup="booking"' ?>>
                                                                <a href="" class="btn-gradient"
                                                                   title="Enroll this course">
																	<?php
																	if ( $is_full_student ) {
																		echo __( 'Đã đủ học viên', 'monamedia' );
																	} else {
																		echo __( 'Đăng ký ngay', 'monamedia' );
																	}
																	?>
                                                                </a>
                                                            </div>
															<?php
															if ( ! empty( $mona_course_section_info['course_description'] ) ) {
																?>
                                                                <div class="overview-course__desc mt-3">
                                                                    <div class="desc mona-content">
																		<?php echo $mona_course_section_info['course_description']; ?>
                                                                    </div>
                                                                </div>
																<?php
															}
															?>
                                                            <div class="overview-course__detail mt-3">
																<?php
																if ( ! empty( $mona_course_section_info['course_resource_title'] ) ) {
																	?>
                                                                    <div class="label f-bold">
																		<?php echo $mona_course_section_info['course_resource_title']; ?>
                                                                    </div>
																	<?php
																}
																?>

																<?php
																if ( content_exists( $mona_course_section_info['course_resources'] ) ) {
																	?>
                                                                    <ul class="list mt-3">
																		<?php
																		foreach ( $mona_course_section_info['course_resources'] as $key => $item ) {
																			?>
                                                                            <li class="li">
																				<?php
																				if ( ! empty( $item['resource_icon'] ) ) {
																					?>
                                                                                    <div class="li-icon">
																						<?php echo wp_get_attachment_image( $item['resource_icon']['ID'], 'icon-24', '', [ 'class' => 'img' ] ); ?>
                                                                                    </div>
																					<?php
																				}
																				?>
																				<?php
																				if ( ! empty( $item['resource_content'] ) ) {
																					?>
                                                                                    <div class="li-text">
																						<?php echo $item['resource_content']; ?>
                                                                                    </div>
																					<?php
																				}
																				?>
                                                                            </li>
																			<?php
																		}
																		?>
                                                                    </ul>
																	<?php
																}
																?>
                                                            </div>
                                                        </div>
														<?php
													}
													?>
                                                </div>
                                            </div>
                                        </aside>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
				<?php
				break;
			case "layout2": ?>
                <!-- COURSE DETAIL TEMPLATE 2 -->
                <section class="course-detail pt-sc-sm pb-sc">
                    <!-- OVERVIEW -->
                    <section class="course-detail__overview pb-sc-sm">
						<?php
						$mona_course_section_info = get_field( 'mona_course_section_info' );
						?>
                        <div class="container">
                            <div class="overview">
								<?php
								if ( ! empty( $mona_course_section_info['course_redirect_link'] ) ) {
									?>
                                    <input type="hidden"
                                           value="<?php echo $mona_course_section_info['course_redirect_link']; ?>"
                                           class="course-redirect">
									<?php
								}
								?>
                                <div class="row gy-1">
                                    <div class="col-left col-6-md">
                                        <div class="overview-content" data-aos="fade-up">
                                            <div class="overview-textbox">
                                                <h1 class="overview-title h3 heading mona-course-title"><?php the_title(); ?></h1>
                                                <span class="course-id" hidden
                                                      value="<?php echo get_the_ID() ?>"></span>
                                                <div class="overview-desc mt-2">
													<?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                            <div class="overview-info mt-4">
												<?php
												$info_early_bird = $mona_course_section_info['info_early_bird'];
												?>
												<?php
												if ( ! empty( $mona_course_section_info['info_price1'] ) || ( $mona_course_section_info['info_price2'] ) ) {
													?>
                                                    <div class="overview-price">
                                                        <p class="price-text">
															<?php
															if ( ! empty( $mona_course_section_info['info_price1'] ) ) {
																?>
                                                                <ins
                                                                        class="price-ins"><?php echo( $mona_course_section_info['info_price1'] ); ?><?php echo ' ' . __( 'AUD', 'monamedia' ); ?></ins>
																<?php
															}
															?>

															<?php
															if ( ! empty( $mona_course_section_info['info_price2'] ) ) {
																?>
                                                                <del
                                                                        class="price-del"><?php echo $mona_course_section_info['info_price2'] ?><?php echo ' ' . __( 'AUD', 'monamedia' ); ?></del>
																<?php
															} ?>
                                                        </p>
                                                    </div>
													<?php
												} ?>
                                                <div class="overview-count mt-1">

													<?php
													if ( ! empty( $info_early_bird ) ) {
														?>
                                                        <div class="overview-count">
                                                            <div class="count">
																<?php
																$day_left = day_left( $info_early_bird );
																if ( ( $day_left ) == 1 ) {
																	echo '<strong>' . $day_left . " " . __( 'day', 'monamedia' ) . " " . '</strong>' . __( 'left early bird', 'monamedia' );
																} else if ( $day_left == 0 ) {
																	echo '';
																} else {
																	echo '<strong>' . $day_left . " " . __( 'days', 'monamedia' ) . " " . '</strong>' . __( 'left early bird', 'monamedia' );
																}
																?>
                                                            </div>
                                                        </div>
														<?php
													}
													?>
                                                </div>
                                                <div class="overview-mentor mt-4">
                                                    <div class="mentor flex ai-center">
                                                        <div class="mentor-avt">
															<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                                                        </div>
                                                        <div class="mentor-by">
															<?php echo __( 'created by', 'monamedia' ); ?>
                                                            <a class="name"><?php echo get_the_author_meta( 'display_name' ); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="overview-buttons mt-4 ">
                                                    <a href=""
                                                       class="btn-gradient <?php echo ( $is_full_student ) ? '' : 'btn-popup mona-register-course' ?>"
														<?php echo $is_full_student ? '' : 'data-popup="booking"' ?>
                                                       title="Đăng ký ngay">
														<?php
														if ( $is_full_student ) {
															echo __( 'Đã đủ học viên', 'monamedia' );
														} else {
															echo __( 'Đăng ký ngay', 'monamedia' );
														}
														?>
                                                    </a>
													<?php
													if ( ! empty( $mona_course_section_info['course_curriculum'] ) ) {
														?>
                                                        <a href="<?php echo $mona_course_section_info['course_curriculum']['url'] ?>"
                                                           class="btn btn-download" title="Download Curriculum">
                                            <span class="icon-download">
                                                <img src="<?php echo get_site_url(); ?>/template/img/icon-download.png"
                                                     alt=""/>
                                            </span>
															<?php echo __( 'Tải về Curriculum', 'monamedia' ); ?>
                                                        </a>
														<?php
													}
													?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-right col-6-md">
                                        <div class="overview-image" data-aos="fade-up">
                                            <div class="img-inner">

												<?php
												$thumbnail_id = $mona_course_section_info['info_image']['ID'];

												if ( ! empty( $thumbnail_id ) ) {
													echo wp_get_attachment_image( $thumbnail_id, 'course-image', '', [ 'class' => 'img' ] );
												} else {
													?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                                         alt=""/>
													<?php
												} ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- INFO -->
                    <section class="course-detail__info">

                        <div class="container">
                            <div class="info">
                                <div class="row gy-1">
                                    <div class="col-main">
                                        <div class="info-content">
											<?php
											$mona_course_section_learn = get_field( 'mona_course_section_learn' );
											?>
											<?php
											if ( ! empty( $mona_course_section_learn ) ) {
												?>
                                                <div class="info-content-box">
													<?php
													if ( ! empty( $mona_course_section_learn['learn_title'] ) ) {
														?>
                                                        <div class="info-content__title h4 f-bold" data-aos="fade-down">
															<?php echo $mona_course_section_learn['learn_title']; ?>
                                                        </div>
														<?php
													}
													?>
													<?php
													if ( content_exists( $mona_course_section_learn['learn_list_items'] ) ) {
														?>
                                                        <div class="info-content__list mt-6">
                                                            <div class="row gy-1">
																<?php
																foreach ( $mona_course_section_learn['learn_list_items'] as $key => $item ) {
																	?>
                                                                    <div class="col-4-md" data-aos="fade-up"
                                                                         data-aos-delay="<?php echo 100 + $key * 100 ?>">
                                                                        <div class="item">
																			<?php
																			if ( ! empty( $item['item_image'] ) ) {
																				?>
                                                                                <div class="item-img">
																					<?php echo wp_get_attachment_image( $item['item_image']['ID'], 'learn-image', '', [ 'class' => 'img' ] ); ?>
                                                                                </div>
																				<?php
																			}
																			?>
                                                                            <div class="item-content mt-3">
																				<?php
																				if ( ! empty( $item['item_title'] ) ) {
																					?>
                                                                                    <div class="item-title text-gradient f-bold h5">
																						<?php echo $item['item_title']; ?>
                                                                                    </div>
																					<?php
																				}
																				?>
																				<?php
																				if ( ! empty( $item['item_description'] ) ) {
																					?>
                                                                                    <div class="item-desc mona-content">
																						<?php echo $item['item_description']; ?>
                                                                                    </div>
																					<?php
																				}
																				?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
																	<?php
																}
																?>
                                                            </div>
                                                        </div>
														<?php
													}
													?>
                                                </div>
												<?php
											}
											?>
                                            <article class="blog-detail__article">
                                                <div class="mona-content">
													<?php the_content(); ?>
                                                </div>
                                            </article>
											<?php
											$mona_course_section_trial = get_field( 'mona_course_section_trial' );
											?>
											<?php
											if ( ! empty( $mona_course_section_trial ) ) {
												?>
                                                <div class="info-content-box">

													<?php
													if ( ! empty( $mona_course_section_trial['trial_title'] ) ) {
														?>
                                                        <div class="info-content__title h4 f-bold" data-aos="fade-down">
															<?php echo $mona_course_section_trial['trial_title']; ?>
                                                        </div>
														<?php
													} ?>
                                                    <div class="info-content__overview" data-aos="fade-up">
                                                        <div class="overview-content">
															<?php
															if ( ! empty( $mona_course_section_trial['trial_content'] ) ) {
																?>
                                                                <div class="textbox mona-content">
																	<?php echo $mona_course_section_trial['trial_content']; ?>
                                                                </div>
																<?php
															}
															if ( content_exists( $mona_course_section_trial['trial_list_buttons'] ) ) {
																?>
                                                                <div class="button-place mt-6">
																	<?php
																	foreach ( $mona_course_section_trial['trial_list_buttons'] as $key => $button ) {
																		?>
																		<?php
																		if ( ! empty( $button['button_link'] ) ) {
																			?>
                                                                            <a href="<?php echo $button['button_link']['url'] ?>"
                                                                               class="btn"
                                                                               title="Get free course">
                                                    <span
                                                            class="text"><?php echo $button['button_link']['title'] ?></span>
                                                                            </a>
																			<?php
																		}
																		?>
																		<?php
																	}
																	?>
                                                                </div>
																<?php
															}
															?>
                                                        </div>
                                                        <div class="overview-image">
                                                            <div class="polygon polygon-rotate">
                                                                <img src="<?php echo get_site_url(); ?>/template/img/polygon-will-get.png"
                                                                     alt=""/>
                                                            </div>
                                                            <div class="img-man">
                                                                <img src="<?php echo get_site_url(); ?>/template/img/man-like.png"
                                                                     alt=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<?php
											}
											?>
                                            <div class="info-content-box">
												<?php
												$mona_course_section_mentor = get_field( 'mona_course_section_mentor' );
												?>
												<?php
												if ( ! empty( $mona_course_section_mentor['mentor_title'] ) ) {
													?>
                                                    <div class="info-content__title h4 f-bold" data-aos="fade-down">
														<?php echo $mona_course_section_mentor['mentor_title']; ?>
                                                    </div>
													<?php
												}
												$mentor = get_the_terms( get_the_ID(), 'category_mentor' )[0];
												if ( ! empty( $mentor ) ) {
													?>
                                                    <div class="info-content__mentor" data-aos="fade-up">
                                                        <div class="mentor">
                                                            <div class="mentor-card">
                                                                <figure class="card-box">
                                                                    <div class="card-box__thumb">
                                                                        <a href="<?php echo get_term_link( $mentor->term_id ) ?>">
																			<?php
																			$mona_tax_mentor_avatar = get_field( 'mona_tax_mentor_avatar', $mentor );
																			if ( ! empty( $mona_tax_mentor_avatar ) ) {
																				echo wp_get_attachment_image( $mona_tax_mentor_avatar['ID'], 'icon-96', '', [ 'class' => 'img' ] );
																			} else {
																				?>
                                                                                <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.png"
                                                                                     alt=""/>
																				<?php
																			} ?>
                                                                    </div>
                                                                    <figcaption class="card-box__content">
                                                                        <div class="name">
                                                                            <a
                                                                                    href="<?php echo get_term_link( $mentor->term_id ) ?>"><?php echo $mentor->name ?></a>
                                                                        </div>
																		<?php
																		$mona_tax_mentor_job = get_field( 'mona_tax_mentor_job', $mentor );
																		?>
																		<?php
																		if ( ! empty( $mona_tax_mentor_job ) ) {
																			?>
                                                                            <div class="meta"><?php echo $mona_tax_mentor_job; ?>
                                                                            </div>
																			<?php
																		}
																		?>
																		<?php
																		$mona_tax_mentor_social = get_field( 'mona_tax_mentor_social', $mentor );
																		?>

																		<?php
																		if ( content_exists( $mona_tax_mentor_social ) ) {
																			?>
                                                                            <div class="social">
																				<?php
																				foreach ( $mona_tax_mentor_social as $key => $item ) {
																					if ( ! empty( $item['social_icon'] ) ) {
																						?>
                                                                                        <a target="_blank"
                                                                                           href="<?php echo ! empty( $item['social_link'] ) ? $item['social_link']['url'] : ''; ?>"
                                                                                           class="social-link">
																							<?php echo wp_get_attachment_image( $item['social_icon']['ID'], 'icon-24', '', [ 'class' => 'img' ] ); ?>
                                                                                        </a>
																						<?php
																					}
																				}
																				?>
                                                                            </div>
																			<?php
																		}
																		?>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                            <div class="mentor-about">
                                                                <p class="desc">
																	<?php echo $mentor->description; ?>
                                                                </p>
																<?php

																$args                 = array(
																	'post_type' => 'mona_course',
																	'tax_query' => array(
																		array(
																			'taxonomy' => 'category_mentor',
																			'field'    => 'term_id',
																			'terms'    => $mentor->term_id
																		)
																	)
																);
																$query                = new WP_Query( $args );
																$total_student_mentor = 0;
																while ( $query->have_posts() ) {
																	$query->the_post();
																	global $post;
//																					var_dump( get_post_meta( $post->ID, 'student', true ) );
																	$student_enrolled_course = get_post_meta( $post->ID, 'student', true );
																	if ( ! empty( $student_enrolled_course ) ) {
																		$total_student_mentor += $student_enrolled_course;
																	}
																}
																wp_reset_query();
																?>
                                                                <div class="enrolled">
                                                                    <div class="enrolled-item flex ai-center">
                                                                        <div class="icon">
                                                                            <img src="<?php echo get_site_url(); ?>/template/img/icon-profile.png"
                                                                                 alt=""/>
                                                                        </div>
                                                                        <p class="text">
																			<?php
																			echo $total_student_mentor . ' ' . __( 'học sinh đăng ký khóa', 'monamedia' );
																			?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="enrolled-item flex ai-center">
                                                                        <div class="icon">
                                                                            <img src="<?php echo get_site_url(); ?>/template/img/icon-ticket-star.png"
                                                                                 alt=""/>
                                                                        </div>
                                                                        <p class="text">
																			<?php
																			$count_post = $mentor->count;
																			echo $count_post . " ";
																			echo __( 'khóa học', 'monamedia' );
																			?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="button-place">
                                                                    <a href="" class="btn-gradient"
                                                                       title="Contact"><?php echo __( 'Liên hệ tư vấn', 'monamedia' ); ?></a>
                                                                    <a href="<?php echo get_term_link( $mentor->term_id ) ?>"
                                                                       class="btn-course-list" title="View course list">
																		<?php echo __( 'Xem danh sách khóa học', 'monamedia' ); ?> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												} ?>
                                            </div>
                                            <div class="info-content-box">
                                                <div class="info-content__title h4 f-bold" data-aos="fade-down">
													<?php echo __( 'Student Feedback', 'monamedia' ); ?>
                                                </div>
                                                <div class="info-content__feedback" data-aos="fade-up">
                                                    <div class="feedback">
														<?php comments_template() ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
				<?php
				break;
			default: ?>
                <!-- HTML DEFAULT -->
				<?php
				break;
		}
		?>


    </main>


    <!-- POPUP -->
	<?php $form_course_title = mona_get_option( 'form_course_title' ); ?>

    <div
            class="popup popup-booking mona-course-popup<?php echo isset( $_GET['enrolled'] ) && ! $is_full_student ? ' is-show' : '' ?>">
        <div class="container">
            <div class="row  jc-center">
                <div class="col-8-md">
                    <div class="popup-content">
                        <div class="popup-close">
                            <iconify-icon icon="carbon:close"></iconify-icon>
                        </div>
                        <div class="popup-main">
							<?php
							if ( ! empty( $form_course_title ) ) {
								?>
                                <div class="popup-title h4 f-bold"><?php echo $form_course_title; ?></div>
								<?php
							}
							?>
                            <div class="booking-form mt-10">
                                <div class="row gy-1 flex-column-reverse-xs">
                                    <div class="col-6-xs">
										<?php $form_course_shortcode = mona_get_option( 'form_course_shortcode' ); ?>
										<?php
										if ( ! empty( $form_course_shortcode ) ) {
											?>
                                            <div class="form-wrapper">
												<?php echo do_shortcode( $form_course_shortcode ) ?>
                                            </div>
											<?php
										}
										?>
                                    </div>
									<?php $form_course_image = mona_get_option( 'form_course_image' ); ?>
									<?php
									if ( ! empty( $form_course_image ) ) {
										?>
                                        <div class="col-6-xs">
                                            <div class="img-wrap">
                                                <img src="<?php echo $form_course_image ?>" alt=""/>
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

    <!-- POPUP -->
    <!--    <div class="popup popup-register book mona-course-popup--><?php //echo isset( $_GET['enrolled'] ) && ! $is_full_student ? ' is-show' : ''
	?>
    <!--">-->
    <!--        <div class="container">-->
    <!--            <div class="popup-content">-->
    <!--                <div class="popup-close">-->
    <!--                    <iconify-icon icon="carbon:close"></iconify-icon>-->
    <!--                </div>-->
    <!---->
    <!--                <div class="popup-main">-->
    <!--                    <div class="popup-form">-->
    <!--                        <div class="popup-form-textbox ta-center">-->
    <!--                            <div class="title heading h3">--><?php //echo __( 'Đăng ký', 'monamedia' );
	?>
    <!--</div>-->
    <!--                        </div>-->
    <!--                        <div class="form-wrapper">-->
    <!--							--><?php //echo do_shortcode( '[contact-form-7 id="377" title="Form Đăng Ký Khóa Học"]' )
	?>
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

<?php
endwhile;
get_footer();