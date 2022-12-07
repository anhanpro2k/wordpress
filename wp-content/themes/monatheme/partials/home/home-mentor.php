<?php
/**
 * Section name: Home Target
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 4
 */
?>
    <!-- MENTOR -->
<?php
$mona_home_section_mentor_experienced = get_field( 'mona_home_section_mentor_experienced' );
?>
<?php
if ( ! empty( $mona_home_section_mentor_experienced ) ) {
	?>
    <section class="mentor">
        <div class="container">
            <div class="mentor-heading ta-center">
                <div class="heading-sc">
					<?php
					if ( ! empty( $mona_home_section_mentor_experienced['mentor_small_title'] ) ) {
						?>
                        <div class="sub-title"><?php echo $mona_home_section_mentor_experienced['mentor_small_title']; ?></div>
						<?php
					}
					?>
					<?php
					if ( ! empty( $mona_home_section_mentor_experienced['mentor_title'] ) ) {
						?>
                        <h2 class="title-sc"><?php echo $mona_home_section_mentor_experienced['mentor_title']; ?></h2>
						<?php
					}
					?>
					<?php
					if ( ! empty( $mona_home_section_mentor_experienced['mentor_description'] ) ) {
						?>
                        <div class="desc">
							<?php echo $mona_home_section_mentor_experienced['mentor_description']; ?>
                        </div>
						<?php
					}
					?>
                </div>
            </div>
			<?php
			if ( content_exists( $mona_home_section_mentor_experienced['mentor_category'] ) ) {
				?>
                <div class="mentor-tab tab-block-js">
                    <div class="mentor-tab__panel panel-w-view">
                        <div class="panel p-2">
							<?php
							foreach ( $mona_home_section_mentor_experienced['mentor_category'] as $key => $item ) {

								if ( ! empty( $item['category_name'] ) ) {
									?>
                                    <div class="panel-item tab-panel-js<?php echo $key == 0 ? ' active' : '' ?>"><?php echo $item['category_name']; ?></div>
									<?php
								}
							}
							?>
                        </div>

						<?php
						if ( ! empty( $mona_home_section_mentor_experienced['mentor_link'] ) ) {
							?>
                            <div class="view-all">
                                <a href="<?php echo $mona_home_section_mentor_experienced['mentor_link']['url'] ?>"
                                   class="view-btn" title="View All Courses">
									<?php echo $mona_home_section_mentor_experienced['mentor_link']['title'] ?>
                                </a>
                            </div>
							<?php
						}
						?>
                    </div>
                    <div class="mentor-tab__content">

						<?php
						foreach ( $mona_home_section_mentor_experienced['mentor_category'] as $key => $item ) {
							?>
							<?php
							if ( content_exists( $item['category_mentor_list'] ) ) {
								?>
                                <div class="content-box tab-content-js <?php echo $key == 0 ? 'active' : '' ?>">
                                    <div class="slider-wrap">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
												<?php
												foreach ( $item['category_mentor_list'] as $mentor_key => $mentor_item ) {
													?>
                                                    <div class="swiper-slide">
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
												}
												?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-ctr">
                                        <div class="arrow prev">
                                            <iconify-icon
                                                    icon="ooui:previous-ltr"
                                                    width="16"
                                            ></iconify-icon>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="arrow next">
                                            <iconify-icon
                                                    icon="ooui:next-ltr"
                                                    width="16"
                                            ></iconify-icon>
                                        </div>
                                    </div>
                                </div>
								<?php
							}
							?>
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