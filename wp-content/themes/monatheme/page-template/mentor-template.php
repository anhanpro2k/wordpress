<?php
/**
 * Template name: Mentor Page
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>
    <main class="blog-page mentor-page">
		<?php
		Elements::Group( 'mentor' )->Html();
		?>
    </main>
<?php
endwhile;
get_footer();