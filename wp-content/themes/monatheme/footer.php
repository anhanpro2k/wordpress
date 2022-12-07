<!--<script src="--><?php //echo get_site_url() ?><!--/template/js/main.js" type="module"></script>-->
<!-- footer -->
<?php wp_footer(); ?>

<!-- POPUP -->
<div class="popup booking-form book">
    <div class="container">
        <div class="popup-content">
            <div class="popup-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    </div>
</div>

<!-- BACK TO TOP -->

<div class="progress-wrap">
    <div class="up">
        <iconify-icon icon="ci:chevron-big-up"></iconify-icon>
    </div>
    <svg
            class="progress-circle svg-content"
            width="100%"
            height="100%"
            viewBox="-1 -1 102 102"
    >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-row">
            <div class="row gy-1">
                <div class="col-wrap col-4-md col-12">
                    <div class="footer-col">
						<?php $footer_logo = mona_get_option( 'footer_logo' ); ?>
						<?php
						if ( ! empty( $footer_logo ) ) {
							?>
                            <a href="<?php echo get_home_url() ?>">
                                <h3 class="footer-logo">
									<?php echo wp_get_attachment_image( attachment_url_to_postid( $footer_logo ), 'footer-menu-image', '', [ 'class' => 'img' ] ); ?>
                                </h3>
                            </a>
							<?php
						}
						?>
                        <div class="footer-col-row">
                            <div class="row">
                                <div class="col-wrap col-4">
                                    <div class="copyright">
                                        <p>
                                            Copyright © <br/>
                                            2022 Coding <br/>
                                            Mentor
                                        </p>
                                    </div>
                                </div>
								<?php $footer_list_links = mona_get_option( 'footer_list_links' ); ?>
								<?php
								if ( content_exists( $footer_list_links ) ) {
									?>
									<?php
									foreach ( $footer_list_links as $key => $item ) {
										?>
										<?php
										if ( ! empty( $item['name'] ) ) {
											?>
                                            <div class="col-wrap col-4">
                                                <a href="<?php echo ! empty( $item['value'] ) ? esc_url( $item['value'] ) : ''; ?>"
                                                   class="link"><?php echo $item['name'] ?></a>
                                            </div>
											<?php
										}
										?>
										<?php
									}
									?>
									<?php
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-wrap col-4-md col-6-xs">
					<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer_column2' ) ) : ?><?php endif; ?>
                    <!--                    <div class="footer-col">-->
                    <!--                        <div class="footer-title h4 f-bold">Các khoá học Intesive</div>-->
                    <!--                        <ul class="footer-links">-->
                    <!--                            <li>-->
                    <!--                                <a href="" class="footer-link" title="Front-end Intensive">Front-end Intensive</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a href="" class="footer-link" title="Data Intensive">Data Intensive</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                </div>
                <div class="col-wrap col-4-md col-6-xs">
                    <div class="footer-col">
                        <div class="footer-chat">
							<?php $footer_chat_label = mona_get_option( 'footer_chat_label' ); ?>
							<?php $footer_chat_link = mona_get_option( 'footer_chat_link' ); ?>
                            <a href="<?php echo ! empty( $footer_chat_link ) ? esc_url( $footer_chat_link ) : ''; ?>"
                               class="btn-chat">
                            <span class="icon">
                                <iconify-icon icon="bi:chat-dots-fill"></iconify-icon>
                            </span>
								<?php echo ! empty( $footer_chat_label ) ? $footer_chat_label : 'Live chat with us' ?>
                            </a>
                        </div>
                        <div class="footer-newsletter">
                            <div class="newsletter">
								<?php
								$footer_form_title = mona_get_option( 'footer_form_title' );
								?>
								<?php
								if ( ! empty( $footer_form_title ) ) {
									?>
                                    <div class="newsletter-title h5 f-bold">
										<?php echo $footer_form_title; ?>
                                    </div>
									<?php
								}
								?>
								<?php
								$footer_form_description = mona_get_option( 'footer_form_description' );
								?>
								<?php
								if ( ! empty( $footer_form_description ) ) {
									?>
                                    <p class="newsletter-desc">
										<?php echo $footer_form_description; ?>
                                    </p>
									<?php
								}
								?>

								<?php
								$footer_form_shortcode = mona_get_option( 'footer_form_shortcode' );
								?>
								<?php
								if ( ! empty( $footer_form_shortcode ) ) {
									?>
                                    <div class="newsletter-form">
                                        <div class="form-wrapper">
											<?php echo do_shortcode( $footer_form_shortcode ) ?>
                                        </div>
                                    </div>
									<?php
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-col-row --mobile">
                    <div class="col-wrap">
                        <div class="copyright">
                            <p>Copyright © 2022 Coding Mentor</p>
                        </div>
                    </div>
					<?php
					if ( content_exists( $footer_list_links ) ) {
						?>
						<?php
						foreach ( $footer_list_links as $key => $item ) {
							?>
							<?php
							if ( ! empty( $item['name'] ) ) {
								?>
                                <div class="col-wrap">
                                    <a href="<?php echo ! empty( $item['value'] ) ? esc_url( $item['value'] ) : ''; ?>"
                                       class="link"><?php echo $item['name'] ?></a>
                                </div>
								<?php
							}
							?>
							<?php
						}
						?>
						<?php
					}
					?>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?php echo get_site_url() ?>/template/dest/jsmain.min.js"></script>
<script src="<?php echo get_site_url(); ?>/template/js/libs/import/gsap.js"></script>
<script src="<?php echo get_site_url(); ?>/template/js/libs/iconify.min.js"></script>
<script src="<?php echo get_site_url(); ?>/template/js/libs/import/swiper.min.js"></script>
<script type="module" src="<?php echo get_site_url(); ?>/template/dest/main.js"></script>
</body>
</html>
