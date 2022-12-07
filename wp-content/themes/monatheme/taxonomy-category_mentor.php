<?php
/**
 * The template for displaying taxonomy.
 *
 * @package Monamedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); ?>
<?php
$current = get_queried_object();
?>
    <main>
        <!-- BANNER -->
        <section class="banner-course py-sc-sm">
			<?php
			$mona_course_section_banner_info = get_field( 'mona_course_section_banner_info', MONA_PAGE_COURSE );
			?>
			<?php
			if ( ! empty( $mona_course_section_banner_info ) ) {
				?>
                <div class="banner-course-wrap">
                    <div class="container">
                        <div class="banner-course__content">
                            <div class="head">
								<?php
								if ( ! empty( $mona_course_section_banner_info['info_title'] ) ) {
									?>
                                    <h1 class="title heading text-gradient text-ani h1">
										<?php echo $mona_course_section_banner_info['info_title']; ?>
                                    </h1>
									<?php
								}
								?>
								<?php
								if ( ! empty( $mona_course_section_banner_info['info_button_1'] ) ) {
									?>
                                    <a href="<?php echo $mona_course_section_banner_info['info_button_1']['url']; ?>"
                                       class="btn-gradient" title="100% JOB GUARANTEE"
                                    ><?php echo $mona_course_section_banner_info['info_button_1']['title']; ?></a
                                    >
									<?php
								}
								?>
                            </div>
                            <div class="textbox">
								<?php
								if ( ! empty( $mona_course_section_banner_info['info_description'] ) ) {
									?>
                                    <div class="desc f-semi mona-content">
										<?php echo $mona_course_section_banner_info['info_description']; ?>
                                    </div>
									<?php
								}
								?>
								<?php
								if ( content_exists( $mona_course_section_banner_info['info_list_buttons'] ) ) {
									?>
                                    <div class="button-gr">
										<?php
										foreach ( $mona_course_section_banner_info['info_list_buttons'] as $key => $item ) {
											?>
											<?php
											if ( ! empty( $item['button_link'] ) ) {
												?>
                                                <a href="<?php echo $item['button_link']['url'] ?>"
                                                   class="btn-main"><?php echo $item['button_link']['title']; ?></a>
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
                        </div>
						<?php
						if ( ! empty( $mona_course_section_banner_info['info_image'] ) ) {
							?>
                            <div class="banner-course__image">
                                <div class="box-wrap">
                                    <div class="img-man">
										<?php echo wp_get_attachment_image( $mona_course_section_banner_info['info_image']['ID'], 'full', '', [ 'class' => 'img' ] ); ?>
                                    </div>
                                    <div class="polygon">
                                        <img src="<?php echo get_site_url(); ?>/template/img/polygon-course.png"
                                             alt=""/>
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
        </section>


        <!-- COURSE LIST -->
        <section class="course-list">
            <div class="container">
                <div class="course-detail__info">
                    <div class="info-content-box">
                        <div
                                class="info-content__title h3 f-bold"
                                data-aos="fade-down"><?php echo __( 'Mentor', 'monamedia' ); ?>:
							<?php echo $current->name ?>
                        </div>
						<?php
						$mentor = get_term_by( 'id', $current->term_id, 'category_mentor' );
						if ( ! empty( $mentor ) ) {
							?>
                            <div class="info-content__mentor" data-aos="fade-up">
                                <div class="mentor">
                                    <div class="mentor-card">
                                        <figure class="card-box">
											<?php
											$term_link = get_term_link( $mentor->term_id );
											?>
                                            <div class="card-box__thumb">
                                                <a href="<?php echo $term_link; ?>">
													<?php
													$mona_tax_mentor_avatar = get_field( 'mona_tax_mentor_avatar', $mentor );
													if ( ! empty( $mona_tax_mentor_avatar ) ) {
														echo wp_get_attachment_image( $mona_tax_mentor_avatar['ID'], 'icon-96', '', [ 'class' => 'img' ] );
													} else {
														?>
                                                        <img
                                                                src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.png"
                                                                alt=""
                                                        />
														<?php
													} ?>
                                            </div>
                                            <figcaption class="card-box__content">
                                                <div class="name">
                                                    <a href="<?php echo $term_link; ?>"><?php echo $mentor->name ?></a>
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
                                                    <img
                                                            src="<?php echo get_site_url(); ?>/template/img/icon-profile.png"
                                                            alt=""/>
                                                </div>
												<?php

												$args                 = array(
													'post_type' => 'mona_course',
													'tax_query' => array(
														array(
															'taxonomy' => 'category_mentor',
															'field'    => 'term_id',
															'terms'    => $current->term_id,
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
													<?php echo $total_student_mentor . ' ' . __( 'học sinh dăng ký khóa', 'monamedia' ); ?></p>
                                            </div>
                                            <div class="enrolled-item flex ai-center">
                                                <div class="icon">
                                                    <img
                                                            src="<?php echo get_site_url(); ?>/template/img/icon-ticket-star.png"
                                                            alt=""
                                                    />
                                                </div>
                                                <p class="text">
													<?php
													$count_post = $mentor->count;
													echo $count_post . " ";
													if ( $count_post > 1 ) {
														echo __( 'courses', 'monamedia' );
													} else {
														echo __( 'course', 'monamedia' );
													} ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="button-place">
                                            <a
                                                    href=""
                                                    class="btn-gradient"
                                                    title="Contact"
                                            ><?php echo __( 'Liên hệ tư vấn', 'monamedia' ); ?></a
                                            >
                                            <a
                                                    href="<?php echo get_term_link( $mentor->term_id ) ?>"
                                                    class="btn-course-list"
                                                    title="Xem danh sách khóa học"
                                            >
												<?php echo __( 'View course list', 'monamedia' ); ?>                                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
						} ?>
                    </div>
                </div>
                <form action="<?php echo get_term_link( $current->term_id ); ?>" id="filter-form">
                    <div class="course-list__head flex-center-between flex-wrap">
						<?php
						$course_category = get_terms( [
							'taxonomy'   => 'category_course',
							'hide_empty' => true,
						] );
						?>
						<?php
						if ( ! empty( $course_category ) ) {
							?>
                            <div class="list-tab cat-tab">
								<?php
								$is_active = '';
								if ( empty( $_GET['category'] ) || @$_GET['category'] == 'all' ) { //Default category
									$is_active = ' active';
								}
								?>
                                <a class="link<?php echo $is_active; ?>"
                                   value="all"><?php echo __( 'All', 'monamedia' ); ?></a>
								<?php
								foreach ( $course_category as $key => $item ) {
									if ( empty( $is_active ) && isset( $_GET['category'] ) ) {
										if ( @$_GET['category'] == $item->slug ) {
											$is_active = ' active';
										}
									} else {
										$is_active = '';
									}
									?>
                                    <a class="link<?php echo $is_active ?>"
                                       value="<?php echo $item->slug ?>"><?php echo $item->name ?></a>
									<?php
								}
								?>
                            </div>
							<?php
						}
						?>
                        <input type="hidden" id="custId" name='category' value="data">
						<?php
						$course_level = get_terms( [
							'taxonomy'   => 'category_level',
							'hide_empty' => true,
						] )
						?>
						<?php
						if ( ! empty( $course_level ) ) {

							?>
                            <div class="course-list__select">
                                <a href=""
									<?php
									$is_active = '';
									if ( empty( $_GET['level'] ) || @$_GET['level'] == 'all' ) { //Default category
										$is_active = ' active';
									}
									?>
                                   class="option<?php echo $is_active ?>"
                                   title="Intensive"
                                   value="all"><?php echo __( 'All', 'monamedia' ); ?></a>
								<?php
								foreach ( $course_level as $key => $item ) {
									if ( empty( $is_active ) && isset( $_GET['level'] ) ) {
										if ( @$_GET['level'] == $item->slug ) {
											$is_active = ' active';
										}
									} else {
										$is_active = '';
									}
									?>
                                    <a href="" class="option<?php echo $is_active ?>" title="Intensive"
                                       value="<?php echo $item->slug ?>"><?php echo $item->name ?></a>
									<?php
								}
								?>
                            </div>
							<?php
						}
						?>
                        <input type="hidden" id="custId" name='level' value="fundamental">
                    </div>
                </form>
				<?php
				$current_page = get_query_var( 'paged' );
				$current_page = max( 1, $current_page );
				$offset_start = 0;
				$order        = 'DESC';
				$per_page     = 2;
				$offset       = ( $current_page - 1 ) * $per_page + $offset_start;
				$argsCourse   = array(
					'post_type'      => 'mona_course',
					'paged'          => $current_page,
					'offset'         => $offset,
					'post_status'    => 'publish',
					'posts_per_page' => $per_page,
					'order'          => $order,
					'tax_query'      => [
						'relation' => 'AND',
						[
							'taxonomy' => 'category_mentor',
							'field'    => 'id',
							'terms'    => $current->term_id,
						]
					]
				);
				if ( isset( $_GET['category'] ) && $_GET['category'] !== 'all' && ! empty( $_GET['category'] ) ) {
					$argsCourse['tax_query'][] = [
						'taxonomy' => 'category_course',
						'field'    => 'slug',
						'terms'    => $_GET['category'],
					];
				}

				if ( isset( $_GET['level'] ) && $_GET['level'] !== 'all' && ! empty( $_GET['level'] ) ) {
					$argsCourse['tax_query'][] = [
						'taxonomy' => 'category_level',
						'field'    => 'slug',
						'terms'    => $_GET['level'],
					];
				}


				$loop = new WP_Query( $argsCourse );
				?>
				<?php if ( $loop->have_posts() ): ?>
                    <div class="course-list-main">
						<?php
						while ( $loop->have_posts() ) {
							$loop->the_post();
							?>
							<?php
							/**
							 * GET TEMPLATE PART
							 * NAME
							 */
							$slug = '/partials/loop/box';
							$name = 'course';
							echo get_template_part( $slug, $name );
							?>
							<?php
						}
						wp_reset_query();
						?>

                    </div>
                    <div class="pagination">
						<?php mona_pagination_links_icon( $loop ); ?>
                    </div>
				<?php else : ?>
                    <div class="empty-mess">
                        <div class="title-large"><?php echo __( 'Found', 'monamedia' ); ?>
                            <span>0</span>
							<?php echo __( 'course for your search', 'monamedia' ); ?>
                        </div>
                        <img alt=""
                             data-src="<?php echo get_template_directory_uri(); ?>/public/images/icon-search.png"
                             class="empty-img ls-is-cached lazyloaded"
                             src="<?php echo get_template_directory_uri(); ?>/public/images/icon-search.png"">
                        <p class="empty-content aside-title h5">
							<?php echo __( 'No results found for your request. Please try another request or return to our homepage to see our latest information. Thank you!', 'monamedia' ); ?>
                        </p>
                    </div>
				<?php endif; ?>
            </div>
        </section>
    </main>

<?php
get_footer();
