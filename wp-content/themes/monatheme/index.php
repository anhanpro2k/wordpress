<?php
/**
 * The template for displaying index.
 *
 * @package Monamedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

    <!-- MAIN -->
    <main class="blog-page">
        <!-- BLOG -->
        <section class="blog">
            <div class="container">
                <div class="blog-wrap">
                    <div class="row gy-1 flex-column-reverse-md">
                        <div class="col-8-md">
							<?php
							$post_per_page = get_field( 'post_per_page' );
							?>
							<?php
							$current_page = get_query_var( 'paged' );
							$current_page = max( 1, $current_page );
							$offset_start = 0;
							$order        = 'DESC';
							$per_page     = ! empty( $post_per_page ) ? $post_per_page : 4;
							$offset       = ( $current_page - 1 ) * $per_page + $offset_start;
							$argsNews     = array(
								'post_type'      => 'post',
								'paged'          => $current_page,
								'offset'         => $offset,
								'post_status'    => 'publish',
								'posts_per_page' => $per_page,
								'order'          => $order,
							);
							if ( isset( $_GET['search'] ) ) {
								$argsNews['s'] = @$_GET['search'];
							}

							$loop = new WP_Query( $argsNews );
							?>
							<?php if ( $loop->have_posts() ) { ?>
                                <div class="blog-post">
									<?php
									$loop->the_post();
									?>
                                    <div class="blog-post__main" data-aos="fade-up">
										<?php
										if ( isset( $_GET['search'] ) ) { ?>
                                            <div class="empty-mess">
                                                <div class="title-large"><?php echo __( 'Found', 'monamedia' ); ?>
                                                    <span><?php echo $loop->found_posts ?></span>
													<?php echo __( ( $loop->found_posts > 1 ? "posts" : "post" ) . ' with keyword ', 'monamedia' ); ?>
                                                    <span>"<?php echo @$_GET['search'] ?>"</span>
                                                </div>

                                            </div>
											<?php
										}
										?>
                                        <figure class="thumb-box aos-init aos-animate" data-aos="fade-up">
                                            <div class="thumb-head flex">
                                                <div class="thumb-img">
                                                    <div class="img-wrap">
                                                        <a href="<?php the_permalink(); ?>">
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
											<?php
											/**
											 * GET TEMPLATE PART
											 * THUMB BOTTOM
											 */
											$slug = '/partials/global/global';
											$name = 'thumb-bot';
											echo get_template_part( $slug, $name );
											?>
                                        </figure>
                                    </div>
									<?php
									wp_reset_query();
									?>

                                    <div class="blog-post__sub">
										<?php
										while ( $loop->have_posts() ) {
											$loop->the_post();
											?>

											<?php
											/**
											 * GET TEMPLATE PART
											 * NEWS
											 */
											$slug = '/partials/loop/box';
											$name = 'news';
											echo get_template_part( $slug, $name );
											?>
											<?php
										}
										wp_reset_query();
										?>
                                    </div>
                                </div>
                                <div class="pagination text-center" data-aos="fade-up">
									<?php mona_pagination_links_icon( $loop ); ?>
                                </div>
							<?php } else { ?>
                                <div class="blog-post">
                                    <div class="blog-post__main" data-aos="fade-up">
                                        <figure class="aos-init aos-animate" data-aos="fade-up">
                                            <div class="thumb-head flex">
                                                <div class="empty-mess">
                                                    <div class="title-large"><?php echo __( 'Found', 'monamedia' ); ?>
                                                        <span>0</span>
														<?php echo __( 'post for your search', 'monamedia' ); ?>
                                                    </div>
                                                    <img alt=""
                                                         data-src="<?php echo get_template_directory_uri(); ?>/public/images/icon-search.png"
                                                         class="empty-img ls-is-cached lazyloaded"
                                                         src="<?php echo get_template_directory_uri(); ?>/public/images/icon-search.png"">
                                                    <p class="empty-content aside-title h5">
														<?php echo __( 'No results found for your request. Please try another request or return to our homepage to see our latest information. Thank you!', 'monamedia' ); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

								<?php
							} ?>
                        </div>
                        <div class="col-4-md">
							<?php
							/**
							 * GET TEMPLATE PART
							 * NAME
							 */
							$slug = 'sidebar';
							echo get_template_part( $slug );
							?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
?>