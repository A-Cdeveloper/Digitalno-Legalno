<?php
/**
 * Podrazumevani šablon stranice (sadržaj iz editora).
 *
 * Bez "Template Name" — ovo je fallback `page.php`; u editoru ostaje "Podrazumevani šablon".
 *
 * @package digitalno-legalno
 */

get_header();
?>

<main id="main-content" class="single-main flex-grow-1 container-fluid bg-light">
    <div class="container py-4 py-lg-6">
        <?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'loop-templates/content', 'page' );
			endwhile;
		else :
			get_template_part( 'loop-templates/content', 'none' );
		endif;
		?>
    </div>
</main>

<?php
get_footer();