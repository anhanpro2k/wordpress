<?php
/**
 * Section name:  ABOUT SECTION PY-SC2
 * Description:
 * Author: Monamedia
 * Order: 3
 */
?>


<!-- ABOUT -->
<section class="about py-sc">
    <div class="container">
		<?php
		$mona_about_section_content2_title = get_field( 'mona_about_section_content2_title' );
		$mona_about_section_content2       = get_field( 'mona_about_section_content2' );
		?>
		<?php
		if ( ! empty( $mona_about_section_content2 ) || ! empty( $mona_about_section_content2_title ) ) {
			?>
            <section class="about-single">
                <div class="about-content">
                    <div class="about-content__head">
						<?php
						if ( ! empty( $mona_about_section_content2_title ) ) {
							?>
                            <h2 class="about-content__title h4 f-bold">
								<?php echo $mona_about_section_content2_title; ?>
                            </h2>
							<?php
						}
						?>
                    </div>
                    <div class="about-content__list mt-10">
						<?php
						if ( ! empty( $mona_about_section_content2 ) ) {
							?>
                            <div class="about-content__item mona-content">
                                <div class="item">
									<?php
									echo $mona_about_section_content2;
									?>
                                </div>
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

		<?php
		$mona_about_section_goals2 = get_field( 'mona_about_section_goals2' );
		?>
		<?php
		if ( ! empty( $mona_about_section_goals2 ) ) {
			?>
            <section class="about-single">
                <div class="about-range">
                    <div class="about-range__head ta-center">
						<?php
						if ( ! empty( $mona_about_section_goals2['goals_title'] ) ) {
							?>
                            <div class="title h3 heading">
								<?php echo $mona_about_section_goals2['goals_title']; ?>
                            </div>
							<?php
						}
						?>
                    </div>
					<?php
					if ( content_exists( $mona_about_section_goals2['goals_list_item'] ) ) {
						?>
                        <div class="about-range__list">
                            <div class="row gy-2">
								<?php
								foreach ( $mona_about_section_goals2['goals_list_item'] as $key => $item ) {
									?>
                                    <div class="col-6">
                                        <div class="item">
											<?php
											if ( ! empty( $item['item_icon'] ) ) {
												?>
                                                <div class="item-image">
													<?php echo wp_get_attachment_image( $item['item_icon'], 'icon-48', '', [ 'class' => 'img' ] ); ?>
                                                </div>
												<?php
											}
											?>
                                            <div class="item-content">
												<?php
												if ( ! empty( $item['item_title'] ) ) {
													?>
                                                    <h3 class="item-title has-underline h5 f-bold">
														<?php echo $item['item_title']; ?>
                                                    </h3>
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
            </section>
			<?php
		}
		?>

		<?php
		$mona_about_section_business2 = get_field( 'mona_about_section_business2' );
		?>
		<?php
		if ( ! empty( $mona_about_section_business2 ) ) {
			?>
            <section class="about-single">
                <div class="about-employees">
                    <div class="about-employees__head">
						<?php
						if ( ! empty( $mona_about_section_business2['business2_title'] ) ) {
							?>
                            <div class="title h5 f-bold has-linethrough">
                                <span class="text"><?php echo $mona_about_section_business2['business2_title']; ?></span>
                            </div>
							<?php
						}
						?>
                    </div>
                    <div class="about-employees__list">
						<?php
						if ( content_exists( $mona_about_section_business2['business2_list_items'] ) ) {
							?>
                            <div class="swiper">
                                <div class="swiper-wrapper">
									<?php
									foreach ( $mona_about_section_business2['business2_list_items'] as $key => $item ) {
										?>
                                        <div class="swiper-slide">
											<?php echo wp_get_attachment_image( $item['item_logo'], 'business-logo-image', '', [ 'class' => 'img' ] ); ?>
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
                </div>
            </section>
			<?php
		}
		?>
    </div>
</section>