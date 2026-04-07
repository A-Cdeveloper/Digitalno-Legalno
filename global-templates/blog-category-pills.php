<?php
/**
 * Blog arhiva — pill navigacija (Svi + direktne podkategorije roditelja iz digitalno_legalno_blog_category_slug()).
 *
 * @package digitalno-legalno
 */

$blog_cat = get_term_by( 'slug', digitalno_legalno_blog_category_slug(), 'category' );

if ( ! $blog_cat || is_wp_error( $blog_cat ) ) {
	return;
}

$queried = get_queried_object();
if ( ! $queried instanceof WP_Term || 'category' !== $queried->taxonomy ) {
	return;
}

$children = get_terms(
	array(
		'taxonomy'   => 'category',
		'parent'     => (int) $blog_cat->term_id,
		'hide_empty' => false,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);

if ( is_wp_error( $children ) ) {
	$children = array();
}

$all_url = get_term_link( $blog_cat );
if ( is_wp_error( $all_url ) ) {
	return;
}

/* „Svi“ aktivno samo na arhivi roditeljske kategorije (npr. compliance-resursi). */
$is_parent = ( (int) $queried->term_id === (int) $blog_cat->term_id );
?>

<nav class="blog-pills mb-4 mb-lg-5" aria-label="<?php esc_attr_e( 'Filtriranje članaka po kategoriji', 'digitalno-legalno' ); ?>">
	<ul class="blog-pills__list list-unstyled d-flex flex-wrap gap-2 mb-0">
		<li>
			<a class="blog-pills__link<?php echo $is_parent ? ' is-active' : ''; ?>" href="<?php echo esc_url( $all_url ); ?>">
				<?php esc_html_e( 'Svi', 'digitalno-legalno' ); ?>
			</a>
		</li>
		<?php foreach ( $children as $term ) : ?>
			<?php
			$link = get_term_link( $term );
			/* Aktivna stavka: ta kategorija ili bilo koja njena podkategorija u arhivi. */
			$active = ( (int) $queried->term_id === (int) $term->term_id )
				|| term_is_ancestor_of( (int) $term->term_id, (int) $queried->term_id, 'category' );
			if ( is_wp_error( $link ) ) {
				continue;
			}
			?>
			<li>
				<a class="blog-pills__link<?php echo $active ? ' is-active' : ''; ?>" href="<?php echo esc_url( $link ); ?>">
					<?php echo esc_html( $term->name ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>
