<?php
/**
 * Section name: Home Target
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 5
 */

?>
    <!-- SERVICES -->
<?php
$mona_home_section_mentor_service = get_field( 'mona_home_section_mentor_service' );
?>
<?php
if ( ! empty( $mona_home_section_mentor_service ) ) {
	?>
    <section class="services py-sc-sm">
        <div class="container">
            <div class="services-heading">
                <div class="heading-sc ta-center">
					<?php
					if ( ! empty( $mona_home_section_mentor_service['service_title'] ) ) {
						?>
                        <h2 class="title-sc">
							<?php echo $mona_home_section_mentor_service['service_title']; ?>
                        </h2>
						<?php
					}
					?>
					<?php
					if ( ! empty( $mona_home_section_mentor_service['service_description'] ) ) {
						?>
                        <div class="desc mt-2 mona-content">
							<?php echo $mona_home_section_mentor_service['service_description']; ?>
                        </div>
						<?php
					}
					?>
                </div>
            </div>
			<?php
			if ( ! empty( $mona_home_section_mentor_service['service_list_items'] ) ) {
				?>
                <div class="services-list pt-sc-sm">
                    <div class="row gy-1">
						<?php
						foreach ( $mona_home_section_mentor_service['service_list_items'] as $key => $item ) {
							?>
                            <div class="col-4-md">
                                <div class="services-list__item">
									<?php
									if ( ! empty( $item['item_name'] ) ) {
										?>
                                        <h4 class="item-title h3 c-primary">
											<?php echo $item['item_name']; ?>
                                        </h4>
										<?php
									}
									?>
									<?php
									if ( ! empty( $item['item_description'] ) ) {
										?>
                                        <div class="item-desc">
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
				<?php
			}
			?>
			<?php
			if ( ! empty( $mona_home_section_mentor_service['service_link'] ) ) {
				?>
                <div class="services-button ta-center py-sc-sm">
                    <a href="<?php echo $mona_home_section_mentor_service['service_link']['url'] ?>" class="btn-main"
                       title="Contact our Consultant">
						<?php echo $mona_home_section_mentor_service['service_link']['title']; ?>
                    </a>
                </div>
				<?php
			}
			?>
        </div>
    </section>
	<?php
}
?>