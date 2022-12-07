<?php
/**
 * The template for displaying page template.
 *
 * @package Monamedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
while ( have_posts() ):
	the_post();
	global $post;
	?>
	<main class="blog-detail-page default-page">
		<!-- BLOG DETAIL -->
		<section class="blog-detail">
			<div class="container">
				<div class="blog-detail__main">
					<div class="row gy-1 flex-column-reverse-md">
						<div class="col-8-md">
							<article class="blog-detail__article">
								<h1><?php echo the_title(); ?></h1>

								<figure class="thumb-box image">
									<?php
									if ( ! empty( get_post_thumbnail_id() ) ) {
										?>
										<div class="img-wrap">
											<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'post-banner-image', '', [ 'class' => 'img' ] ); ?>
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
												<div
													class="thumb-meta-name"><?php echo get_the_author_meta( 'display_name' ) ?></div>
											</div>
											<div class="thumb-meta-time">
												<div
													class="time-item"><?php echo human_time_diff( mysql2date( 'U', get_the_time( 'Y-m-d H:i:s e' ) ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'monamedia' ); ?></div>
												<div
													class="time-item"><?php echo reading_time( get_the_ID() ) . __( ' read', 'monamedia' ); ?></div>
											</div>
										</div>
									</div>
								</figure>
								<div class="mona-content">
									<?php the_content(); ?>
								</div>
							</article>
						</div>

					</div>
				</div>
			</div>
		</section>
	</main
<?php
endwhile;
get_footer();
