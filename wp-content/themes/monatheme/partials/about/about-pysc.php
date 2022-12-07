<?php
/**
 * Section name:  ABOUT SECTION PY-SC
 * Description:
 * Author: Monamedia
 * Order: 1
 */
?>


<!-- ABOUT -->
<section class="about py-sc">
    <div class="container">
		<?php
		$mona_about_section_content1_title = get_field( 'mona_about_section_content1_title' );
		$mona_about_section_content1       = get_field( 'mona_about_section_content1' );
		?>
		<?php
		if ( ! empty( $mona_about_section_content1 ) || ! empty( $mona_about_section_content1_title ) ) {
			?>
            <section class="about-single">
                <div class="about-content">
                    <div class="about-content__head">
						<?php
						if ( ! empty( $mona_about_section_content1_title ) ) {
							?>
                            <h2 class="about-content__title h4 f-bold">
								<?php echo $mona_about_section_content1_title; ?>
                            </h2>
							<?php
						}
						?>
                    </div>
                    <div class="about-content__list mt-10">
						<?php
						if ( ! empty( $mona_about_section_content1 ) ) {
							?>
                            <div class="about-content__item mona-content">
                                <div class="item">
									<?php
									echo $mona_about_section_content1;
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
		$mona_about_section_courses = get_field( 'mona_about_section_courses' );
		?>
		<?php
		if ( ! empty( $mona_about_section_courses ) ) {
			?>
            <section class="about-single">
                <div class="about-list">
                    <div class="about-list__head ta-center">
						<?php
						if ( ! empty( $mona_about_section_courses['courses_title'] ) ) {
							?>
                            <h2 class="about-list__title h5 f-bold">
								<?php echo $mona_about_section_courses['courses_title']; ?>
                            </h2>
							<?php
						}
						?>
                    </div>
					<?php
					if ( content_exists( $mona_about_section_courses['courses_list_item'] ) ) {
						?>
                        <div class="about-list__wrap">
							<?php
							foreach ( $mona_about_section_courses['courses_list_item'] as $key => $item ) {
								?>
                                <div class="about-list__item">
                                    <div class="row gy-1">
                                        <div class="col-image">
                                            <div class="item-image">
                                                <div class="img-inner load-img">
                                                    <a href="<?php echo ! empty( $item['item_link'] ) ? $item['item_link']['url'] : ''; ?>">
														<?php
														if ( ! empty( $item['item_image'] ) ) {
															echo wp_get_attachment_image( $item['item_image'], '525x325', '', [ 'class' => 'img' ] );
														} else {
															?>
                                                            <img
                                                                    src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                                                    alt=""
                                                            />
															<?php
														} ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-content">
                                            <div class="item-content">
												<?php
												if ( ! empty( $item['item_title'] ) ) {
													?>
                                                    <h4
                                                            class="item-title h5 f-bold has-underline item-scroll"
                                                    >
                                                        <a href="<?php echo ! empty( $item['item_link'] ) ? $item['item_link']['url'] : ''; ?>">
															<?php echo $item['item_title']; ?>
                                                        </a>
                                                    </h4>
													<?php
												}
												?>
												<?php
												if ( ! empty( $item['item_content'] ) ) {
													?>
                                                    <div class="item-desc mona-content">
														<?php echo $item['item_content']; ?>
                                                    </div>
													<?php
												}
												?>
												<?php
												if ( ! empty( $item['item_link'] ) ) {
													?>
                                                    <div class="button-place">
                                                        <a href="<?php echo $item['item_link']['url']; ?>"
                                                           class="btn-main btn-outline">
															<?php echo $item['item_link']['title']; ?>
                                                        </a>
                                                    </div>
													<?php
												}
												?>
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
            </section>
			<?php
		}
		?>

		<?php
		$mona_about_section_goals = get_field( 'mona_about_section_goals' );
		?>
		<?php
		if ( ! empty( $mona_about_section_goals ) ) {
			?>
            <section class="about-single">
                <div class="about-range">
                    <div class="about-range__head ta-center">
						<?php
						if ( ! empty( $mona_about_section_goals['goals_title'] ) ) {
							?>
                            <div class="title h3 heading">
								<?php echo $mona_about_section_goals['goals_title']; ?>
                            </div>
							<?php
						}
						?>
                    </div>
					<?php
					if ( content_exists( $mona_about_section_goals['goals_list_item'] ) ) {
						?>
                        <div class="about-range__list">
                            <div class="row gy-2">
								<?php
								foreach ( $mona_about_section_goals['goals_list_item'] as $key => $item ) {
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
		$mona_about_section_business1 = get_field( 'mona_about_section_business1' );
		?>
		<?php
		if ( ! empty( $mona_about_section_business1 ) ) {
			?>
            <section class="about-single">
                <div class="about-employees">
                    <div class="about-employees__head">
						<?php
						if ( ! empty( $mona_about_section_business1['business1_title'] ) ) {
							?>
                            <div class="title h5 f-bold has-linethrough">
                                <span class="text"><?php echo $mona_about_section_business1['business1_title']; ?></span>
                            </div>
							<?php
						}
						?>
                    </div>
                    <div class="about-employees__list">
						<?php
						if ( content_exists( $mona_about_section_business1['business_list_item'] ) ) {
							?>
                            <div class="swiper">
                                <div class="swiper-wrapper">
									<?php
									foreach ( $mona_about_section_business1['business_list_item'] as $key => $item ) {
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