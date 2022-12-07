<?php
/**
 * Section name:  Mentor Main
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 0
 */

?>

<!-- MENTOR -->
<section class="sc-mentor py-sc">
    <div class="container">
        <div class="sc-mentor__heading">
            <div class="heading-sc ta-center">
                <h1 class="title-sc text-gradient">Mentor</h1>
                <div class="desc mona-content">
					<?php the_content(); ?></div>
            </div>
        </div>
        <div class="sc-mentor__list pt-sc-sm">
			<?php
			$argsMentor = array(
				'taxonomy'   => 'category_mentor',
				'hide_empty' => false,
			);
			$mentor     = get_terms( $argsMentor );
			?>
            <div class="row gy-1">
				<?php
				foreach ( $mentor as $mentor_key => $mentor_item ) {
					if ( $mentor_key + 1 <= 8 ) {
						?>
                        <div class="col-3-md col-4-sm col-6">
                            <figure class="card-box">
                                <div class="card-box__thumb">
                                    <div class="img-inner">
                                        <a href="<?php echo get_term_link( $mentor_item->term_id ); ?>">
											<?php
											$mona_tax_mentor_avatar = get_field( 'mona_tax_mentor_avatar', $mentor_item );
											echo wp_get_attachment_image( $mona_tax_mentor_avatar['ID'], 'icon-96', '', [ 'class' => 'img' ] );
											?>
                                        </a>
                                    </div>
                                </div>
                                <figcaption class="card-box__content">
                                    <div class="name"><a
                                                href="<?php echo get_term_link( $mentor_item->term_id ); ?>"><?php echo $mentor_item->name ?></a>
                                    </div>
                                    <div class="meta"></div>
                                    <p class="desc">
										<?php echo $mentor_item->description; ?>
                                    </p>
									<?php
									$mona_tax_mentor_social = get_field( 'mona_tax_mentor_social', $mentor_item );
									?>
									<?php
									if ( content_exists( $mona_tax_mentor_social ) ) {
										?>
                                        <div class="social">
											<?php
											foreach ( $mona_tax_mentor_social as $key => $item ) {
												?>
												<?php
												if ( ! empty( $item['social_icon'] ) ) {
													?>
                                                    <a target="_blank"
                                                       href="<?php echo ! empty( $item['social_link'] ) ? $item['social_link']['url'] : '' ?>"
                                                       class="social-link">
														<?php echo wp_get_attachment_image( $item['social_icon']['ID'], 'icon-32', '', [ 'class' => 'img' ] ); ?>
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
                                </figcaption>
                            </figure>
                        </div>
						<?php
					} else {
						break;
					}
				}
				?>
                <a target="_blank" data-default-number="<?php echo 8 ?>" data-current-page="1"
                   class="btn-main btn-loadmore btn-event-ajax is-loading-btn"
                   title="<?php echo __( 'Load More', 'monamedia' ); ?>"><?php echo __( 'Load More', 'monamedia' ); ?></a>
            </div>
        </div>
    </div>
</section>