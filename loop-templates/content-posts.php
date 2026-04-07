<?php
/**
 * Blog listing — kartica pregleda (category arhiva).
 *
 * @package digitalno-legalno
 */

$display    = function_exists( 'digitalno_legalno_post_display_category' ) ? digitalno_legalno_post_display_category() : null;
$badge_name = $display ? $display->name : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
	<a class="blog-card__link" href="<?php the_permalink(); ?>">
		<div class="blog-card__row">
			<?php if ( $badge_name !== '' ) : ?>
				<span class="blog-card__badge"><?php echo esc_html( $badge_name ); ?></span>
			<?php else : ?>
				<span class="blog-card__badge blog-card__badge--muted"><?php esc_html_e( 'Članak', 'digitalno-legalno' ); ?></span>
			<?php endif; ?>
			<span class="blog-card__arrow" aria-hidden="true">
				<svg class="blog-card__arrow-svg" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</span>
		</div>
		<h2 class="blog-card__title"><?php the_title(); ?></h2>
		<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 36, '…' ) ); ?></p>
		<div class="blog-card__meta">
			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		</div>
	</a>
</article>
