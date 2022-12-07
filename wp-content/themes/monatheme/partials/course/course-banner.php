<?php
/**
 * Section name:  COURSE BANNER
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 0
 */
?>

<!-- BANNER -->
<section class="banner-course py-sc-sm">
	<?php
	$mona_course_section_banner_info = get_field( 'mona_course_section_banner_info' );
	?>
	<?php
	if ( ! empty( $mona_course_section_banner_info ) ) {
		?>
        <div class="banner-course-wrap">
            <div class="container">
                <div class="banner-course__content">
                    <div class="head">
						<?php
						if ( ! empty( $mona_course_section_banner_info['info_title'] ) ) {
							?>
                            <h1 class="title heading text-gradient text-ani h1">
								<?php echo $mona_course_section_banner_info['info_title']; ?>
                            </h1>
							<?php
						}
						?>
						<?php
						if ( ! empty( $mona_course_section_banner_info['info_button_1'] ) ) {
							?>
                            <a href="<?php echo $mona_course_section_banner_info['info_button_1']['url']; ?>"
                               class="btn-gradient" title="100% JOB GUARANTEE"
                            ><?php echo $mona_course_section_banner_info['info_button_1']['title']; ?></a
                            >
							<?php
						}
						?>
                    </div>
                    <div class="textbox">
						<?php
						if ( ! empty( $mona_course_section_banner_info['info_description'] ) ) {
							?>
                            <div class="desc f-semi mona-content">
								<?php echo $mona_course_section_banner_info['info_description']; ?>
                            </div>
							<?php
						}
						?>
						<?php
						if ( content_exists( $mona_course_section_banner_info['info_list_buttons'] ) ) {
							?>
                            <div class="button-gr">
								<?php
								foreach ( $mona_course_section_banner_info['info_list_buttons'] as $key => $item ) {
									?>
									<?php
									if ( ! empty( $item['button_link'] ) ) {
										?>
                                        <a href="<?php echo $item['button_link']['url'] ?>"
                                           class="btn-main"><?php echo $item['button_link']['title']; ?></a>
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
                    </div>
                </div>
				<?php
				if ( ! empty( $mona_course_section_banner_info['info_image'] ) ) {
					?>
                    <div class="banner-course__image">
                        <div class="box-wrap">
                            <div class="img-man">
								<?php echo wp_get_attachment_image( $mona_course_section_banner_info['info_image']['ID'], 'full', '', [ 'class' => 'img' ] ); ?>
                            </div>
                            <div class="polygon">
                                <img src="<?php echo get_site_url(); ?>/template/img/polygon-course.png" alt=""/>
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
</section>