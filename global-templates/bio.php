<?php
/**
 * Bio blok osnivača — koristi se na O nama, Kontakt i drugim stranicama.
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$bio_categories = array();

$blog_cat = get_term_by( 'slug', digitalno_legalno_blog_category_slug(), 'category' );
if ( $blog_cat && ! is_wp_error( $blog_cat ) ) {
	$terms = get_terms(
		array(
			'taxonomy'   => 'category',
			'parent'     => (int) $blog_cat->term_id,
			'hide_empty' => true,
			'orderby'    => 'name',
			'order'      => 'ASC',
		)
	);
	if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
		$bio_categories = $terms;
	}
}

if ( empty( $bio_categories ) ) {
	$uncat = get_term_by( 'slug', 'uncategorized', 'category' );
	$exclude = ( $uncat && ! is_wp_error( $uncat ) ) ? array( (int) $uncat->term_id ) : array();
	$fallback = get_terms(
		array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
			'orderby'    => 'name',
			'order'      => 'ASC',
			'exclude'    => $exclude,
		)
	);
	if ( ! is_wp_error( $fallback ) ) {
		$bio_categories = $fallback;
	}
}

$image = get_field('image', 'options');
$image_url = wp_get_attachment_image_url($image['ID'], 'full');
$image_alt = get_post_meta($image['ID'], '_wp_attachment_image_alt', true);
$osnivac = get_field('osnivac', 'options');
$titula = get_field('titula', 'options');
$bio = get_field('bio', 'options');

?>

<section class="about-founder reveal-on-scroll py-5 py-lg-8" aria-labelledby="about-founder-heading">
    <div class="container">
        <div class="position-relative">
            <div class="row g-0 g-md-4 g-lg-5 align-items-start">
                <div class="col-30 col-md-10 col-lg-9">
                    <div class="about-founder__photo" aria-hidden="true">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                            class="img-fluid mx-auto">
                    </div>
                </div>
                <div class="col-25 col-md-20 col-lg-21 text-center text-md-start mt-4 mt-md-0 mx-auto mx-md-0">
                    <h2 id="about-founder-heading" class="about-founder__name">
                        <?php echo esc_html($osnivac); ?>
                    </h2>
                    <p class="about-founder__role">
                        <?php echo esc_html($titula); ?>
                    </p>
                    <p class="about-founder__bio">
                        <?php echo $bio; ?>
                    </p>
                    <?php if ( ! empty( $bio_categories ) ) : ?>
                    <ul class="about-founder__tags list-unstyled d-flex flex-wrap gap-2 mb-0" role="list">
                        <?php foreach ( $bio_categories as $term ) : ?>
                        <?php
							$cat_link = get_term_link( $term );
							if ( is_wp_error( $cat_link ) ) {
								continue;
							}
							?>
                        <li>
                            <a class="badge-outline"
                                href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $term->name ); ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>