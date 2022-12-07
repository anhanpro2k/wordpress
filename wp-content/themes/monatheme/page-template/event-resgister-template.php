<?php
/**
 * Template name: Event Register Page
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>
    <main>
		<?php
		Elements::Group( 'event-register' )->Html();
		?>
    </main>
<?php
endwhile;
get_footer();