<?php
/**
 * Section name: Home Guide
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 6
 */
?>

<!-- GUIDE -->
<?php
$mona_home_section_guide = get_field( 'mona_home_section_guide' );
?>
<?php
if ( ! empty( $mona_home_section_guide ) ) {
	?>
    <section class="guide">
        <div class="container">
            <div class="guide-box pb-sc-sm" data-aos="fade-up">
                <div class="bg-layer">
                    <img src="<?php echo get_site_url(); ?>/template/img/layer-grid.png" alt=""/>
                </div>
                <div class="row jc-center">
                    <div class="col-8-lg">
                        <div class="guide-row">
                            <div class="row gy-1">
								<?php
								$guide_guide = $mona_home_section_guide ['guide_guide']
								?>
								<?php
								if ( ! empty( $guide_guide ) ) {
									?>
                                    <div class="col-6-sm">
                                        <div class="heading-sc">
											<?php
											if ( ! empty( $guide_guide['guide_subtitle'] ) ) {
												?>
                                                <div class="sub-title"><?php echo $guide_guide['guide_subtitle']; ?></div>
												<?php
											}
											?>
											<?php
											if ( ! empty( $guide_guide['guide_title'] ) ) {
												?>
                                                <h2 class="title-sc"><?php echo $guide_guide['guide_title']; ?></h2>
												<?php
											}
											?>
											<?php
											if ( ! empty( $guide_guide['guide_description'] ) ) {
												?>
                                                <div class="desc h6 mona-content">
													<?php echo $guide_guide['guide_description']; ?>
                                                </div>
												<?php
											}
											?>
                                        </div>
                                    </div>
									<?php
								}
								?>
								<?php
								$guide_course = $mona_home_section_guide ['guide_course']
								?>
								<?php
								if ( ! empty( $guide_course ) ) {
									?>
                                    <div class="col-6-sm">
                                        <div class="guide-course">
                                            <div class="guide-course__heading flex-center-between">
												<?php
												if ( ! empty( $guide_course['course_label'] ) ) {
													?>
                                                    <div class="label h6"><?php echo $guide_course['course_label']; ?></div>
													<?php
												}
												?>
												<?php
												if ( ! empty( $guide_course['course_icon'] ) ) {
													?>
                                                    <div class="logo">
														<?php echo wp_get_attachment_image( $guide_course['course_icon'], 'icon-32', '', [ 'class' => 'img' ] ); ?>
                                                    </div>
													<?php
												}
												?>
                                            </div>
                                            <div class="guide-course__content mt-5">
												<?php
												if ( ! empty( $guide_course['course_title'] ) ) {
													?>
                                                    <div class="name h3 heading">
                                                        <a href="<?php echo $guide_course['course_title']['url']; ?>"> <?php echo $guide_course['course_title']['title'] ?> </a>
                                                    </div>
													<?php
												}
												?>
												<?php
												if ( ! empty( $guide_course['course_description'] ) ) {
													?>
                                                    <p class="desc mt-5">
														<?php echo $guide_course['course_description']; ?>
                                                    </p>
													<?php
												}
												?>
												<?php
												$course_tutorial = $guide_course['course_tutorial'];
												?>
												<?php
												if ( ! empty( $course_tutorial ) ) {
													?>
                                                    <div class="tuts flex ai-center mt-5">
														<?php
														if ( ! empty( $course_tutorial['tutorial_icon'] ) ) {
															?>
                                                            <div class="tuts-icon">
																<?php echo wp_get_attachment_image( $course_tutorial['tutorial_icon'], 'icon-24', '', [ 'class' => 'img' ] ); ?>
                                                            </div>
															<?php
														}
														?>
														<?php
														if ( ! empty( $course_tutorial['tutorial_text'] ) ) {
															?>
                                                            <p class="tuts-text c-white f-semi">
																<?php echo $course_tutorial['tutorial_text']; ?>
                                                            </p>
															<?php
														}
														?>
                                                    </div>
													<?php
												}
												?>
												<?php
												if ( ! empty( $course_tutorial['course_link'] ) ) {
													?>
                                                    <div class="button-place mt-5">
                                                        <a
                                                                href="<?php echo $course_tutorial['course_link']['url'] ?>"
                                                                class="btn-main"
                                                                title="Download Curriculum"
                                                        ><?php echo $course_tutorial['course_link']['title']; ?>
                                                        </a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
}
?>
