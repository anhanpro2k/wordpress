<?php
add_action( 'wp_ajax_mona_ajax_loadmentor', 'mona_ajax_loadmentor' ); // login
add_action( 'wp_ajax_nopriv_mona_ajax_loadmentor', 'mona_ajax_loadmentor' ); // no login

function mona_ajax_loadmentor() {
	$defaultNumberPage = $_POST['defaultNumberPage'];
	$paged             = $_POST['paged'];
	if ( empty( $defaultNumberPage ) && empty( $paged ) ) {
		wp_send_json_error(
			[
				'title'   => __( 'Alert!', 'monamedia' ),
				'message' => __( 'Events are being updated!', 'monamedia' ),
			]
		);
		wp_die();
	} else {
		ob_start();
		$argsMentor = array(
			'taxonomy'   => 'category_mentor',
			'hide_empty' => false,
		);
		$all_mentor = get_terms( $argsMentor );
		$mentor     = loadMoreMentor( $all_mentor, $defaultNumberPage, $paged + 1 );
		foreach ( $mentor as $mentor_item ) {
			?>
            <div class="col-3-md col-4-sm col-6">
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
		<?php if ( ( $paged + 1 ) < ( count( $all_mentor ) / $defaultNumberPage ) ) { ?>
            <a target="_blank" data-default-number="<?php echo 8 ?>" data-current-page="<?php echo $paged + 1 ?>"
               class="btn-main btn-loadmore btn-event-ajax is-loading-btn"
               title="<?php echo __( 'Load More', 'monamedia' ); ?>"><?php echo __( 'Load More', 'monamedia' ); ?></a>
			<?php
		} ?>
		<?php
		wp_send_json_success(
			[
				'title'   => __( 'Alert!', 'monamedia' ),
				'message' => __( 'Loading more events successfully', 'monamedia' ),
				'mentor'  => ob_get_clean(),
			]
		);
		wp_die();

	}

}