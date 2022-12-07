<?php
global $post;
?>
<div class="course-list__single">
    <div class="row gy-1">
        <div class="col-img">
            <div class="single-img">
                <div class="img-inner">
                    <a href="<?php the_permalink( $post->ID ); ?>">
						<?php
						if ( ! empty( get_post_thumbnail_id() ) ) {
							?>
							<?php echo wp_get_attachment_image( get_post_thumbnail_id(), '350x350', '', [ 'class' => 'img' ] ); ?>
							<?php
						} else { ?>
                            <img
                                    src="<?php echo get_template_directory_uri(); ?>/public/images/default-thumbnail.jpg"
                                    alt=""
                            />
							<?php
						} ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-content">
            <div class="single-content">
                <div class="single-title h3 heading">
                    <a href="<?php the_permalink( $post->ID ); ?>"
                       title="Backend Intensive"><?php the_title() ?></a></div>
                <div class="single-mentor flex ai-center mt-3">
					<?php
					$mentor = get_the_terms( $post->ID, 'category_mentor' )[0]; //just get only 1 mentor
					?>
					<?php
					if ( ! empty( $mentor ) ) {
						$mona_tax_mentor_avatar = get_field( 'mona_tax_mentor_avatar', $mentor );
						?>
                        <div class="mentor-avt">
							<?php

							if ( ! empty( $mona_tax_mentor_avatar ) ) {
								?>
								<?php echo wp_get_attachment_image( $mona_tax_mentor_avatar['ID'], 'icon-32', '', [ 'class' => 'img' ] ); ?>
								<?php
							} else {
								?>
                                <img
                                        src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.png"
                                        alt=""
                                />
								<?php
							} ?>
                        </div>

                        <div class="mentor-name f-bold h5">
                            <a href="<?php echo get_term_link( $mentor ) ?>"><?php echo __( 'Mentor: ', 'monamedia' ); ?><?php echo $mentor->name ?></a>
                        </div>
						<?php
					}
					?>

                </div>
                <p class="single-desc">
					<?php the_excerpt(); ?>
                </p>
                <div class="single-buttons flex ai-center">
                    <a
                            href="<?php the_permalink(); ?>?enrolled"
                            class="btn btn-gradient"
                            title="Enroll this course"
                    >
						<?php echo __( 'Enroll this course', 'monamedia' ); ?>
                    </a>
                    <a href="<?php the_permalink(); ?>" class="btn btn-detail" title="View Details"
                    ><?php echo __( 'View Details', 'monamedia' ); ?></a
                    >

                </div>
                <div class="single-enrolled flex ai-center mt-4">
					<?php
					$mona_course_student_maximum = ! empty( get_field( 'mona_course_student_maximum', get_the_ID() ) ) ? get_field( 'mona_course_student_maximum', get_the_ID() ) : 0;
					$current_student             = get_post_meta( get_the_ID(), 'student', true );
					if ( empty( $current_student ) ) {
						$current_student = 0;
					}
					?>
					<?php


					$mona_course_default_icon = get_field( 'mona_course_default_icon', MONA_PAGE_COURSE );
					?>
					<?php
					if ( content_exists( $mona_course_default_icon ) ) {
						?>
                        <div class="enrolled-images">
							<?php
							for ( $i = 0; $i < $current_student; $i ++ ) {
								if ( ! empty( $mona_course_default_icon[ $i ]['icon_avatar'] ) ) {
									?>
                                    <span class="avt">
                                        <?php echo wp_get_attachment_image( $mona_course_default_icon[ $i ]['icon_avatar'], 'icon-22', '', [ 'class' => 'img' ] ); ?>
                                    </span>
									<?php
								} else {
									break;
								}
							}
							?>
                        </div>
						<?php
					} else { ?>
                        <div class="enrolled-images">
							<?php
							for ( $i = 0; $i < $current_student; $i ++ ) {
								if ( $i < 4 ) {
									?>

                                    <span class="avt">
                           <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.png"
                                alt=""/>
                       </span>
									<?php
								} else {
									break;
								}
							}
							?>
                        </div>
						<?php
					} ?>
                    <div class="enrolled-qty"><?php echo $current_student . "/" . $mona_course_student_maximum . ' ' ?><?php echo __( 'enrolled', 'monamedia' ); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
