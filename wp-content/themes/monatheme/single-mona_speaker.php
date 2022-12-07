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
    <main class="blog-detail-page">
        <!-- BLOG DETAIL -->
        <section class="blog-detail">
            <div class="container">
                <div class="blog-detail__main">
                    <div class="row gy-1 flex-column-reverse-md">
                        <div class="col-8-md">
                            <article class="blog-detail__article">
                                <h1><?php echo the_title(); ?></h1>
                                <p>
									<?php the_excerpt(); ?>
                                </p>

								<?php
								$mona_speaker_banner = get_field( 'mona_speaker_banner' );
								?>

                                <figure class="thumb-box image">
									<?php
									if ( ! empty( $mona_speaker_banner ) ) {
										?>
                                        <div class="img-wrap">
											<?php echo wp_get_attachment_image( $mona_speaker_banner, 'post-banner-image', '', [ 'class' => 'img' ] ); ?>
                                        </div>
										<?php
									}
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
										<?php
										$mona_speaker_socials = get_field( 'mona_speaker_socials', get_the_ID() );
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
                                    </div>

                                </figure>

                                <div class="mona-content">
									<?php the_content(); ?>
                                </div>
                            </article>
							<?php
							$tags    = wp_get_post_tags( get_the_ID() );
							$tags_id = [];
							foreach ( $tags as $key => $value ) {
								$tags_id[] = $value->term_id;
							}
							$argsRelatedPosts = [
								'post_type'      => 'post',
								'posts_per_page' => 6,
								'post__not_in'   => [ get_the_ID() ],
								'tax_query'      => [
									'relation' => 'OR',
									[
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => get_post_term_ids( get_the_ID(), 'category' ),
										'operator' => 'IN',
									],
									[
										'taxonomy' => 'post_tag',
										'field'    => 'term_id',
										'terms'    => $tags_id,
									],
								]
							];
							$loop             = new WP_Query( $argsRelatedPosts );
							if ( $loop->have_posts() ) { ?>
                                <div class="blog-detail__related">
									<?php
									while ( $loop->have_posts() ) {
										$loop->the_post();
										?>
										<?php
										/**
										 * GET BOX
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
								<?php
							}
							?>
                        </div>
                        <div class="col-4-md">
							<?php
							/**
							 * GET TEMPLATE PART
							 * SIDEBAR
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
endwhile;
get_footer();