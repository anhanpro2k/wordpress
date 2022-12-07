<?php
/**
 * Template name: Home Page
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>
    <main class="home-page">
		<?php
		Elements::Group( 'home' )->Html();
		?>
    </main>
<?php
endwhile;
get_footer();