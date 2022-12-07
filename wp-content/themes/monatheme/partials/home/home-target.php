<?php
/**
 * Section name: Home Target
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 1
 */

?>


<!-- TARGET -->
<section class="target">

	<?php
	$mona_home_section_target = get_field( 'mona_home_section_target' );
	?>
    <div class="target-wrap">
		<?php
		if ( ! empty( $mona_home_section_target ) ) {
			?>
            <div class="target-heading ta-center">
				<?php
				if ( ! empty( $mona_home_section_target['target_title'] ) ) {
					?>
                    <div class="container">
                        <h2 class="target-title c-white heading h1">
							<?php echo $mona_home_section_target['target_title']; ?>
                        </h2>
                    </div>
					<?php
				}
				?>
            </div>
            <section class="target-single">
                <div class="study pt-sc-sm">
                    <div class="study-image">
                        <div class="img-wrap">
                            <img
                                    src="<?php echo get_site_url(); ?>/template/img/decor-right.png"
                                    alt=""
                                    class="decor decor-right"
                            />
                            <img
                                    src="<?php echo get_site_url(); ?>/template/img/decor-left.png"
                                    alt=""
                                    class="decor decor-left"
                            />
							<?php
							if ( ! empty( $mona_home_section_target['target_image'] ) ) {
								?>
                                <div class="img-main" data-aos="zoom-in">
									<?php echo wp_get_attachment_image( $mona_home_section_target['target_image'], 'target-image', '', [ 'class' => 'img' ] ); ?>
                                </div>
								<?php
							}
							?>
                            <div class="img-polygon">
                                <img src="<?php echo get_site_url(); ?>/template/img/polygon-target.png" alt=""/>
                            </div>
                        </div>
                    </div>
					<?php
					if ( content_exists( $mona_home_section_target['target_list_items'] ) ) {
						?>
                        <div class="study-list-wrap">
                            <div class="container">
                                <div class="study-list">
                                    <div class="bg-target">
                                        <img src="<?php echo get_site_url(); ?>/template/img/bg-target.png" alt=""/>
                                    </div>

                                    <div class="row gy-1">
										<?php
										foreach ( $mona_home_section_target['target_list_items'] as $key => $item ) {
											?>
                                            <div class="col-4-sm">
                                                <div class="item">
													<?php
													if ( ! empty( $item['item_icon'] ) ) {
														?>
                                                        <div class="item-img">
															<?php echo wp_get_attachment_image( $item['item_icon'], 'target-icon', '', [ 'class' => 'img' ] ); ?>
                                                        </div>
														<?php
													}
													?>
													<?php
													if ( ! empty( $item['item_name'] ) ) {
														?>
                                                        <h4 class="item-title text-gradient h3 heading">
															<?php echo $item['item_name']; ?>
                                                        </h4>
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
            </section>
			<?php
		}
		?>
		<?php
		$mona_home_section_journey = get_field( 'mona_home_section_journey' );
		?>
		<?php
		if ( ! empty( $mona_home_section_journey ) ) {
			?>
            <section class="target-single">
                <div class="journey">
                    <img
                            src="<?php echo get_site_url(); ?>/template/img/decor-right.png"
                            alt=""
                            class="decor decor-right"
                    />
                    <img src="<?php echo get_site_url(); ?>/template/img/decor-left.png" alt=""
                         class="decor decor-left"/>
                    <div class="container">
                        <div class="journey-row row ai-center">
                            <div class="col-content tab-block-js">
								<?php
								if ( ! empty( $mona_home_section_journey['journey_title'] ) ) {
									?>
                                    <h3 class="journey-title heading h2 c-white">
										<?php echo $mona_home_section_journey['journey_title']; ?>
                                    </h3>
									<?php
								}
								?>
								<?php
								if ( content_exists( $mona_home_section_journey['journey_list_items'] ) ) {
									?>
                                    <div class="journey-content mt-6">
										<?php
										foreach ( $mona_home_section_journey['journey_list_items'] as $key => $item ) {
											?>
                                            <div class="content-box tab-content-js<?php echo $key == 0 ? ' active' : '' ?>">
												<?php
												if ( ! empty( $item['item_title'] ) ) {
													?>
                                                    <h4 class="content-box__title text-gradient heading h3">
														<?php echo $item['item_title']; ?>
                                                    </h4>
													<?php
												}
												?>
												<?php
												if ( ! empty( $item['item_description'] ) ) {
													?>
                                                    <div class="content-box__desc mona-content">
														<?php echo $item['item_description']; ?>
                                                    </div>
													<?php
												}
												?>
                                                <div class="need-help">
													<?php
													if ( ! empty( $item['item_question'] ) ) {
														?>
                                                        <div class="need-help__title h5 f-bold">
															<?php echo $item['item_question']; ?>
                                                        </div>
														<?php
													}
													?>
													<?php
													if ( ! empty( $item['item_answer'] ) ) {
														?>
                                                        <div class="need-help__desc">
															<?php echo $item['item_answer']; ?>
                                                        </div>
														<?php
													}
													?>
                                                </div>
                                                <div class="button-gr flex ai-center flex-wrap">
													<?php
													if ( ! empty( $item['item_button1'] ) ) {
														?>
                                                        <a
                                                                href="<?php echo $item['item_button1']['url']; ?>"
                                                                class="btn-main"
                                                                title="Get Started for Free"
                                                        ><?php echo $item['item_button1']['title']; ?></a
                                                        >
														<?php
													}
													?>
													<?php
													if ( ! empty( $item['item_button2'] ) ) {
														?>
                                                        <div class="or">
                                                            <p>
																<?php echo __( 'Or', 'monamedia' ); ?>
                                                                <a href="<?php echo $item['item_button2']['url'] ?>"
                                                                   class="link"><?php echo $item['item_button2']['title'] ?></a>
                                                            </p>
                                                        </div>
														<?php
													}
													?>
                                                </div>
                                            </div>
											<?php
										}
										?>

                                        <div class="arrow-triangle">
                                            <div class="arrow"></div>
                                        </div>
                                    </div>
									<?php
								}
								?>
								<?php
								if ( content_exists( $mona_home_section_journey['journey_list_items'] ) ) {
									?>
                                    <div class="journey-pagination">
										<?php
										foreach ( $mona_home_section_journey['journey_list_items'] as $key => $item ) {
											?>
                                            <div class="pagination-item tab-panel-js <?php echo $key == 0 ? 'active' : ''; ?>"><?php echo $key + 1 ?>
                                            </div>
											<?php
										}
										?>
                                    </div>
									<?php
								}
								?>
                            </div>
                            <div class="col-image">
                                <div class="journey-image">
                                    <div class="polygon">
                                        <img src="<?php echo get_site_url(); ?>/template/img/polygon-journey.png"
                                             alt=""/>
                                    </div>
									<?php
									if ( ! empty( $mona_home_section_journey['journey_image'] ) ) {
										?>
                                        <div class="img-main" data-aos="zoom-in">
											<?php echo wp_get_attachment_image( $mona_home_section_journey['journey_image'], 'journey-image', '', [ 'class' => 'img' ] ); ?>
                                        </div>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<?php
		}
		?>
		<?php
		$mona_home_section_help = get_field( 'mona_home_section_help' );
		?>
		<?php
		if ( ! empty( $mona_home_section_help ) ) {
			?>
            <section class="target-single">
                <div class="better">
                    <div class="container">
                        <div class="better-row row ai-center">
                            <div class="col-image">
                                <div class="image-wrap">
									<?php
									if ( ! empty( $mona_home_section_help['help_image'] ) ) {
										?>
                                        <div class="img-main" data-aos="zoom-in-up">
											<?php echo wp_get_attachment_image( $mona_home_section_help['help_image'], 'help-image', '', [ 'class' => 'img' ] ); ?>
                                        </div>
										<?php
									}
									?>
                                    <div class="polygon">
                                        <img src="<?php echo get_site_url(); ?>/template/img/polygon-get-better.png"
                                             alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-content">
                                <div class="content-box">
									<?php
									if ( ! empty( $mona_home_section_help['help_title'] ) ) {
										?>
                                        <div class="title heading c-white h2">
											<?php echo $mona_home_section_help['help_title']; ?>
                                        </div>
										<?php
									}
									?>
									<?php
									if ( ! empty( $mona_home_section_help['help_description'] ) ) {
										?>
                                        <div class="desc c-white mt-6 mona-content">
											<?php echo $mona_home_section_help['help_description']; ?>
                                        </div>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<?php
		}
		?>
    </div>
</section>