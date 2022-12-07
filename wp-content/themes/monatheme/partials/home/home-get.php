<?php
/**
 * Section name: Home Target
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 2
 */

?>

<?php
$mona_home_section_get = get_field( 'mona_home_section_get' );
?>
    <!-- GET -->
<?php
if ( ! empty( $mona_home_section_get ) ) {
	?>
    <section class="get">
        <div class="container">
			<?php
			if ( ! empty( $mona_home_section_get['get_title'] ) ) {
				?>
                <div class="get-heading ta-center">
                    <div class="title-sc heading h1 c-primary"><?php echo $mona_home_section_get['get_title']; ?></div>
                </div>
				<?php
			}
			?>
			<?php
			if ( content_exists( $mona_home_section_get['get_list_items'] ) ) {
				?>
                <div class="get-list">
                    <div class="row gy-1">
						<?php
						foreach ( $mona_home_section_get['get_list_items'] as $key => $item ) {
							?>
                            <div class="col-4-md">
                                <div class="get-list__item item-scroll">
                                    <div class="item">
										<?php
										if ( ! empty( $item['item_icon'] ) ) {
											?>
                                            <div class="item-image">
												<?php echo wp_get_attachment_image( $item['item_icon'], 'target-icon', '', [ 'class' => 'img' ] ); ?>
                                            </div>
											<?php
										}
										?>
                                        <div class="item-content">
											<?php
											if ( ! empty( $item['item_title'] ) ) {
												?>
                                                <h3 class="item-title">
													<?php echo $item['item_title']; ?>
                                                </h3>
												<?php

											}
											?>
											<?php
											if ( ! empty( $item['item_description'] ) ) {
												?>
                                                <div class="item-text">
													<?php echo $item['item_description']; ?>
                                                </div>
												<?php
											}
											?>
                                        </div>
										<?php
										if ( ! empty( $item['item_link'] ) ) {
											?>
                                            <div class="item-button">
                                                <a
                                                        href="<?php echo $item['item_link']['url'] ?>"
                                                        class="btn-main--black"
                                                        title="View Certification"
                                                ><?php echo $item['item_link']['title'] ?></a
                                                >
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
            <div class="get-image">
                <div class="img-wrap">
					<?php
					if ( ! empty( $mona_home_section_get['get_image'] ) ) {
						?>
                        <div class="img-main">
							<?php echo wp_get_attachment_image( $mona_home_section_get['get_image'], 'will-get-image', '', [ 'class' => 'img' ] ); ?>
                        </div>
						<?php
					}
					?>
                    <div class="polygon">
                        <img src="<?php echo get_site_url(); ?>/template/img/polygon-will-get.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
}
?>