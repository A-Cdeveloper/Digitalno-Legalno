<?php
/**
 * Pojedinačna objava — breadcrumb, naslov, meta, sadržaj.
 *
 * @package digitalno-legalno
 */

$display = function_exists( 'digitalno_legalno_post_display_category' ) ? digitalno_legalno_post_display_category() : null;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
	<?php get_template_part( 'global-templates/single', 'breadcrumb' ); ?>

	<header class="single-post__header mb-4">
		<h1 class="single-post__title"><?php the_title(); ?></h1>
		<div class="single-post__meta">
			<time class="single-post__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<?php if ( $display ) : ?>
				<?php
				$term_link = get_term_link( $display );
				if ( ! is_wp_error( $term_link ) ) :
					?>
					<span class="single-post__meta-dot" aria-hidden="true">•</span>
					<a class="single-post__category" href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $display->name ); ?></a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</header>

	<div class="single-post__content entry-content">
		<?php the_content(); ?>
	</div>
</article>
