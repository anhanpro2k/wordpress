<?php
/**
 * Section name: Home Question
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 7
 */
?>
    <!-- FAQ -->
<?php
$mona_home_section_question = get_field( 'mona_home_section_question' );
?>
<?php
if ( ! empty( $mona_home_section_question ) ) {
	?>
    <section class="faq py-sc">
        <div class="container">
            <div class="faq-wrap">
                <div class="faq-heading">
                    <div class="heading-sc ta-center">
						<?php
						if ( ! empty( $mona_home_section_question['question_title'] ) ) {
							?>
                            <h2 class="title-sc"><?php echo $mona_home_section_question['question_title']; ?></h2>
							<?php
						}
						?>
						<?php
						if ( ! empty( $mona_home_section_question['question_description'] ) ) {
							?>
                            <div class="desc mt-2">
								<?php echo $mona_home_section_question['question_description']; ?>
                            </div>
							<?php
						}
						?>
                    </div>
                </div>
				<?php
				if ( content_exists( $mona_home_section_question['question_list_items'] ) ) {
					?>
                    <div class="faq-acc pt-sc-sm">
						<?php
						foreach ( $mona_home_section_question['question_list_items'] as $key => $item ) {
							?>
                            <div class="acc">
                                <div class="acc-header acc-js">
									<?php
									if ( ! empty( $item['item_question'] ) ) {
										?>
                                        <div class="acc-title f-bold h5">
											<?php echo $key + 1 ?> . <?php echo $item['item_question']; ?>
                                        </div>
										<?php
									}
									?>
                                    <div class="acc-expand">
                                        <iconify-icon
                                                icon="akar-icons:plus"
                                                width="24"
                                        ></iconify-icon>
                                    </div>
                                </div>
								<?php
								if ( ! empty( $item['item_answer'] ) ) {
									?>
                                    <div class="acc-content mt-4">
                                        <div class="acc-desc">
											<?php echo $item['item_answer']; ?>
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
					<?php
				}
				?>
            </div>
        </div>
    </section>
	<?php
}
?>