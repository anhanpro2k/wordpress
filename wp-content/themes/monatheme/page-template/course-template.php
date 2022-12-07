<?php
/**
 * Template name: Course Page
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>
    <main>
		<?php
		Elements::Group( 'course' )->Html();
		?>
    </main>
<?php
endwhile;
get_footer();
?>