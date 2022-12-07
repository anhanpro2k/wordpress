<?php
/**
 * The template for displaying sidebar.
 *
 * @package Monamedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * This file is here to avoid the Deprecated Message for sidebar by wp-includes/theme-compat/sidebar.php.
 */

if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'blog' ) ) : ?><?php endif; ?>

<div class="aside-wrap" data-aos="fade-up">
    <aside class="aside-item aside-search">
        <div class="form-wrapper">
			<?php
			$current    = get_queried_object();
			$action_url = "";
			if ( is_single() ) {
				$action_url = get_permalink( MONA_PAGE_BLOG );
			}

			?>
            <form action="<?php echo $action_url; ?>">
                <button type="submit" class="form-submit">
                    <span class="icon-search">
						<img src="http://codingmentor.monamedia.net/wp-content/uploads/2022/11/magnifying-glass-1.png">
                    </span>
                </button>
                <div class="form-field">
                    <input
                            name="search"
                            type="text"
                            class="form-ctr"
                            placeholder="<?php echo __( 'Search for articles', 'monamedia' ); ?>"
                    />
                </div>
            </form>
        </div>
    </aside>

	<?php
	$mona_blog_recommended_topic = get_field( 'mona_blog_recommended_topic', MONA_PAGE_BLOG );
	$categories                  = get_the_category();
	?>
	<?php
	if ( content_exists( $mona_blog_recommended_topic ) ) {
		?>
        <aside class="aside-item aside-topic">
            <h3 class="aside-title h5"><?php echo ! empty( $mona_blog_recommended_topic['topic_title'] ) ? $mona_blog_recommended_topic['topic_title'] : __( 'Recommended Topic', 'monamedia' ); ?></h3>
            <div class="topic-list">
				<?php
				foreach ( $mona_blog_recommended_topic['top_list_recommended'] as $key => $item ) {
					if ( $item->count > 0 ) {
						$is_active = "";
						if ( is_single() ) {
							foreach ( $categories as $category ) {
								if ( $category->term_id === $item->term_id ) {
									$is_active = 'active';
									break;
								}
							}
						} else if ( is_category() ) {
							if ( $item->term_id == $current->term_id ) {
								$is_active = 'active';
							}
						}
						?>
                        <a href="<?php echo get_category_link( $item->term_id ) ?>"
                           title="Technology" class="topic <?php echo $is_active ?>">
							<?php echo $item->name; ?>
                        </a>
						<?php
					}
				}
				?>
            </div>
        </aside>
		<?php
	}
	?>
</div>
