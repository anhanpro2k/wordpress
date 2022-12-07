<?php
/**
 * Section name:  ABOUT SECTION BANNER
 * Description: We are  Coding Mentor
 * Author: Monamedia
 * Order: 0
 */
?>

<?php
$mona_about_section_banner = get_field( 'mona_about_section_banner' );
?>
    <!-- BANNER ABOUT -->
<?php
if ( ! empty( $mona_about_section_banner ) ) {
	?>
    <section class="banner-about">
		<?php
		$banner_image = $mona_about_section_banner['banner_image'];
		?>
        <div class="banner-about-bg">
			<?php
			$banner_mobile  = $banner_image['image_mobile'];
			$banner_desktop = $banner_image['image_desktop'];
			$banner_url     = "";
			if ( ! empty( $banner_desktop ) ) {
				$banner_url = wp_get_attachment_image_src( $banner_desktop, 'banner-desktop-image' )[0];
			} else {
				$banner_url = get_template_directory_uri() . '/public/images/grey-banner-default.jpg';
			}
			?>
            <img src="<?php echo $banner_url ?>" alt=""/>
        </div>
        <div class="container">
            <div class="banner-about-row row">
                <div class="col-content">
                    <div class="banner-about__content">
                        <div class="textbox p-6">
							<?php
							if ( ! empty( $mona_about_section_banner['banner_title'] ) ) {
								?>
                                <h1 class="title h2 heading text-gradient text-ani">
									<?php echo $mona_about_section_banner['banner_title']; ?>
                                </h1>
								<?php
							}
							?>
							<?php
							if ( ! empty( $mona_about_section_banner['banner_description'] ) ) {
								?>
                                <p class="desc mt-4">
									<?php echo $mona_about_section_banner['banner_description']; ?>
                                </p>
								<?php
							}
							?>
							<?php
							if ( ! empty( $mona_about_section_banner['banner_content'] ) ) {
								?>
                                <div class="list-wrap mt-6 mona-content">
									<?php echo $mona_about_section_banner['banner_content']; ?>
                                </div>
								<?php
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-about__img">
            <div class="img-wrap">
				<?php
				if ( ! empty( $banner_mobile ) ) {
					?>
					<?php echo wp_get_attachment_image( $banner_mobile, 'banner-mobile-image', '', [ 'class' => 'img-main' ] ); ?>
					<?php
				}
				?>
                <img src="<?php echo get_site_url(); ?>/template/img/polygon-target.png" alt="" class="img-polygon"/>
            </div>
        </div>
    </section>
	<?php
}
?>