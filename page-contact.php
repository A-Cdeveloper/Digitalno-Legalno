<?php
/**
 * Šablon stranice Kontakt.
 *
 * Template Name: Contact
 *
 * @package digitalno-legalno
 */

get_header();
?>

<main id="main-content" <?php post_class( [ 'container-fluid' ] ); ?>>

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'loop-templates/content', 'contact' );
		endwhile;
		else :
			get_template_part( 'loop-templates/content', 'none' );
		endif;
		?>

</main>

<?php
get_footer();