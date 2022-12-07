<?php
/**
 * Template name: About Page
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>
    <main class="about-page">
		<?php
		Elements::Group( 'about' )->Html();
		?>
    </main>
<?php
endwhile;
get_footer();
?>