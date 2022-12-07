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
                <form action="<?php echo get_permalink( MONA_PAGE_COURSE ) ?>" id="filter-form">
                    <div class="course-list__head flex-center-between flex-wrap">
						<?php
						$_GET['level']   = $current->slug;
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
