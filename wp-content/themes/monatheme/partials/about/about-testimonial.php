<?php
/**
 * Section name:  ABOUT SECTION TESTIMONIAL
 * Description:
 * Author: Monamedia
 * Order: 2
 */
?>

    <!-- TESTIMONIAL -->
<?php
$mona_about_section_quotes = get_field( 'mona_about_section_quotes' );
if ( ! empty( $mona_about_section_quotes ) ) {
	?>
    <section class="testimonial">
        <div class="container">
			<?php
			if ( content_exists( $mona_about_section_quotes['quotes_list_item'] ) ) {
				?>
                <div class="testimonial-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
							<?php
							foreach ( $mona_about_section_quotes['quotes_list_item'] as $key => $item ) {
								?>
                                <div class="swiper-slide">
                                    <div class="test-box">
										<?php
										if ( ! empty( $item['item_avatar'] ) ) {
											?>
                                            <div class="test-img" data-swiper-parallax="-900">
												<?php echo wp_get_attachment_image( $item['item_avatar'], 'avatar-quotes-image', '', [ 'class' => 'img' ] ); ?>
                                            </div>
											<?php
										}
										?>
                                        <blockquote class="test-content">
											<?php
											if ( ! empty( $item['item_description'] ) ) {
												?>
                                                <p class="test-desc" data-swiper-parallax="-1200">
													<?php echo $item['item_description']; ?>
                                                </p>
												<?php
											}
											?>
											<?php
											if ( ! empty( $item['item_author'] ) ) {
												?>
                                                <div class="by body-13" data-swiper-parallax="-1500">
                                                    <cite
                                                    ><?php echo $item['item_author']; ?></cite
                                                    >
                                                </div>
												<?php
											}
											?>
                                        </blockquote>
                                    </div>
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
    </section>
	<?php
}
?>