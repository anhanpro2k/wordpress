<?php
/**
 * Section name: Home Target
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 9
 */
?>

    <!-- FAN -->
<?php
$mona_home_section_fan = get_field( 'mona_home_section_fan' );
?>
<?php
if ( ! empty( $mona_home_section_fan ) ) {
	?>
    <section class="fan py-sc-sm">
        <div class="container">
            <div class="fan-heading">
                <div class="row gy-1 ai-center">
                    <div class="col-4-md">
                        <div class="fan-heading__content">
                            <div class="heading-sc">
								<?php
								if ( ! empty( $mona_home_section_fan['fan_subtitle'] ) ) {
									?>
                                    <div class="sub-title"><?php echo $mona_home_section_fan['fan_subtitle'] ?></div>
									<?php
								}
								?>
								<?php
								if ( ! empty( $mona_home_section_fan['fan_title'] ) ) {
									?>
                                    <h2 class="title-sc c-black mt-2"><?php echo $mona_home_section_fan['fan_title']; ?></h2>
									<?php
								}
								?>
								<?php
								if ( ! empty( $mona_home_section_fan['fan_description'] ) ) {
									?>
                                    <div class="desc mt-2">
										<?php echo $mona_home_section_fan['fan_description']; ?>
                                    </div>
									<?php
								}
								?>
                            </div>
                        </div>
                    </div>
					<?php
					if ( content_exists( $mona_home_section_fan['fan_list_company'] ) ) {
						?>
                        <div class="col-8-md">
                            <div class="fan-heading__image flex ai-center">
								<?php
								foreach ( $mona_home_section_fan['fan_list_company'] as $key => $item ) {
									?>
									<?php
									if ( ! empty( $item['company_logo'] ) ) {
										?>
                                        <div class="logo">
											<?php echo wp_get_attachment_image( $item['company_logo'], 'company-icon', '', [ 'class' => 'img' ] ); ?>
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
            </div>
            <div class="fan-test pt-sc-sm">
                <div class="row gy-1 ai-center-lg">
                    <div class="col-5-md">
						<?php
						if ( content_exists( $mona_home_section_fan['fan_list_feedbacks'] ) ) {
							?>
                            <div class="fan-test__content">
                                <div class="fan-test__comment">
									<?php
									foreach ( $mona_home_section_fan['fan_list_feedbacks'] as $key => $item ) {
										?>
                                        <div class="comment">
											<?php
											if ( ! empty( $item['feedback_content'] ) ) {
												?>
                                                <div class="comment-content">
                                                    <div class="text">
														<?php echo $item['feedback_content']; ?>
                                                    </div>
                                                </div>
												<?php
											}
											?>
                                            <div class="comment-bot flex-center-between">
                                                <div class="comment-auth">
													<?php
													if ( ! empty( $item['feedback_avatar'] ) ) {
														?>
                                                        <div class="comment-avt">
															<?php echo wp_get_attachment_image( $item['feedback_avatar'], 'icon-36', '', [ 'class' => 'img' ] ); ?>
                                                        </div>
														<?php
													}
													?>
													<?php
													if ( ! empty( $item['feedback_name'] ) ) {
														?>
                                                        <div class="comment-name f-bold"><?php echo $item['feedback_name']; ?></div>
														<?php
													}
													?>
                                                </div>
												<?php
												if ( ! empty( $item['feedback_job'] ) ) {
													?>
                                                    <div class="comment-pos">
														<?php echo $item['feedback_job']; ?>
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
							<?php
						}
						?>
                    </div>
					<?php
					$fan_video = $mona_home_section_fan['fan_video'];
					?>
					<?php
					if ( ! empty( $fan_video ) ) {
						?>
                        <div class="col-7-md">
                            <div class="fan-test__video">
								<?php
								if ( ! empty( $fan_video['video_thumbnail'] ) ) {
									?>
                                    <div class="video-thumb">
										<?php echo wp_get_attachment_image( $fan_video['video_thumbnail'], 'fan-video', '', [ 'class' => 'img' ] ); ?>
                                    </div>
									<?php
								}
								?>
								<?php
								if ( ! empty( $fan_video['video_link'] ) ) {
								?>
                                <a
                                        href="<?php echo $fan_video['video_link']['url'] ?>"
                                        data-fancybox
                                        class="button-play">

									<?php
									}
									?>
                                    <img src="<?php echo get_site_url(); ?>/template/img/icon-play.png" alt=""/>
                                </a>
                            </div>
                        </div>
						<?php
					}
					?>
                </div>
            </div>
        </div>
    </section>
	<?php
}
?>