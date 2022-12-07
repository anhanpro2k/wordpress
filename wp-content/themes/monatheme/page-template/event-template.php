<?php
/**
 * Template name: Event Page
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>
    <main>
		<?php
		Elements::Group( 'event' )->Html();
		?>
    </main>
<?php
endwhile;
get_footer();
?>