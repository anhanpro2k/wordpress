<?php
/**
 * Section name: Event Main
 * Description: Hiển thị thông tin ...
 * Author: Monamedia
 * Order: 0
 */
?>

<!-- MAIN -->
<main class="event-page">
    <!-- EVENT -->
    <section class="event">
        <div class="container">
            <div class="row jc-center">
                <div class="col-8-md">
					<?php
					$mona_event_title = get_field( 'mona_event_title' );
					?>
                    <div class="heading-sc">
						<?php
						if ( ! empty( $mona_event_title ) ) {
							?>
                            <div class="textbox ta-center">
                                <h1 class="title-sc"><?php echo $mona_event_title; ?></h1>
                            </div>
							<?php
						}
						?>
                    </div>
					<?php
					$mona_event_category = get_field( 'mona_event_category' );
					?>
					<?php
					if ( content_exists( $mona_event_category ) ) {
						?>
                        <div class="event-links">
                            <a href="<?php echo get_page_link( MONA_PAGE_EVENT ) ?>" class="link active">All</a>
							<?php
							foreach ( $mona_event_category as $key => $item ) {
								$term_name = get_term( $item )->name;
								?>
                                <a href="<?php echo get_term_link( $item ) ?>"
                                   class="link"><?php echo $term_name; ?></a>
								<?php
							}
							?>
                        </div>
						<?php
					}
					?>
					<?php
					$mona_event_number_per_page = get_field( 'mona_event_number_per_page' );
					?>
					<?php
					$current_page = get_query_var( 'paged' );
					$current_page = max( 1, $current_page );
					$offset_start = 0;
					$order        = 'DESC';
					$per_page     = ! empty( $mona_event_number_per_page ) ? $mona_event_number_per_page : 2;
					$offset       = ( $current_page - 1 ) * $per_page + $offset_start;
					$argsEvent    = array(
						'post_type'      => 'mona_event',
						'paged'          => $current_page,
						'offset'         => $offset,
						'post_status'    => 'publish',
						'posts_per_page' => $per_page,
						'order'          => $order,
					);


					$loop = new WP_Query( $argsEvent );
					?>
					<?php
					if ( $loop->have_posts() ) {
						?>
                        <div class="event-list">
							<?php
							while ( $loop->have_posts() ) {
								$loop->the_post();
								/**
								 * GET TEMPLATE PART
								 * EVENT
								 */
								$slug = '/partials/loop/box';
								$name = 'event';
								echo get_template_part( $slug, $name );
							}
							wp_reset_query();
							?>
                        </div>
                        <div class="pagination text-center">
							<?php mona_pagination_links_icon( $loop ); ?>
                        </div>
						<?php
					}
					?>
                </div>
            </div>
        </div>
    </section>
</main>