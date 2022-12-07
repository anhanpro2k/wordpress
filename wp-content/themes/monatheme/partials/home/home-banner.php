<?php
/**
 * Section name: Home Banner
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 0
 */

?>

<?php
$mona_home_section_banner = get_field( 'mona_home_section_banner' );
?>
<?php
if ( ! empty( $mona_home_section_banner ) ) {
	?>
    <section class="banner-home">
		<?php
		if ( ! empty( $mona_home_section_banner['banner_list_objects'] ) ) {
			?>
            <div class="object-wrap">
                <div class="object-container">
                    <ul class="object-links">
						<?php
						foreach ( $mona_home_section_banner['banner_list_objects'] as $key_object => $item_object ) {
							?>
							<?php
							if ( ! empty( $item_object['object_link'] ) ) {
								?>
                                <li class="object-item">
                                    <a href="<?php echo $item_object['object_link']['url'] ?>"
                                       class="object-link"><?php echo $item_object['object_link']['title'] ?></a>
                                </li>
								<?php
							}
							?>
							<?php
						}
						?>
                    </ul>
                </div>
            </div>
			<?php
		}
		?>
        <div class="container">
            <div class="banner-home-row">
                <div class="row">
                    <div class="col-6-md">
                        <div class="banner-home__content">
                            <div class="textbox">
								<?php
								if ( ! empty( $mona_home_section_banner['banner_title'] ) ) {
									?>
                                    <h1 class="title h1 heading">
										<?php echo $mona_home_section_banner['banner_title']; ?>
                                    </h1>
									<?php
								}
								?>
								<?php
								if ( ! empty( $mona_home_section_banner['banner_description'] ) ) {
									?>
                                    <div class="desc mona-content">
										<?php echo $mona_home_section_banner['banner_description']; ?>
                                    </div>
									<?php
								}
								?>
                            </div>
							<?php
							if ( content_exists( $mona_home_section_banner['banner_list_buttons'] ) ) {
								?>
                                <div class="button-gr">
									<?php
									foreach ( $mona_home_section_banner['banner_list_buttons'] as $key => $item ) {
										if ( ! empty( $item['button_link'] ) ) {
											?>
                                            <a href="<?php echo $item['button_link']['url']; ?>"
                                               class="btn-gradient"><?php echo $item['button_link']['title']; ?></a>
											<?php
										}
									}
									?>
                                </div>
								<?php
							}
							?>
							<?php
							if ( ! empty( $mona_home_section_banner['banner_explore'] ) ) {
								?>
                                <div class="or">
                                    <p><?php echo __( 'Or', 'monamedia' ); ?> <a class="link"
                                                                                 href="<?php echo $mona_home_section_banner['banner_explore']['url']; ?>"><?php echo $mona_home_section_banner['banner_explore']['title']; ?></a>
                                    </p>
                                </div>
								<?php
							}
							?>
                        </div>
                    </div>
                    <div class="col-wrap">
                        <div class="banner-home__image" data-aos="zoom-in">
							<?php
							if ( ! empty( $mona_home_section_banner['banner_image'] ) ) {
								?>
								<?php echo wp_get_attachment_image( $mona_home_section_banner['banner_image'], 'banner-image', '', [ 'class' => 'img-main' ] ); ?>
								<?php
							}
							?>
                            <picture>
                                <source
                                        media="(max-width:767px)"
                                        srcset="<?php echo get_site_url(); ?>/template/img/polygon-banner-home-sm.png"
                                />
                                <img
                                        class="polygon-img"
                                        src="<?php echo get_site_url(); ?>/template/img/polygon-banner-home.png"
                                        alt=""
                                />
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
}
?>
