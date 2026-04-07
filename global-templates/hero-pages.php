<?php
/**
 * Hero za unutrašnje stranice i arhive kategorija.
 *
 * Na kategoriji: ACF sa trenutnog terma ili, ako je prazno, sa roditelja (hero na roditelju važi i za podkategorije).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$acf_context = null;

if ( is_category() ) {
	$term = get_queried_object();
	if ( $term instanceof WP_Term ) {
		$acf_context = digitalno_legalno_category_hero_acf_context( $term );
	}
} elseif ( is_singular() ) {
	$acf_context = get_queried_object_id();
}

if ( $acf_context ) {
	$caption       = get_field( 'caption', $acf_context );
	$glavni_naslov = get_field( 'glavni_naslov', $acf_context );
	$intro         = get_field( 'intro', $acf_context );
} else {
	$caption       = get_field( 'caption' );
	$glavni_naslov = get_field( 'glavni_naslov' );
	$intro         = get_field( 'intro' );
}
?>

<section class="page-hero container-fluid py-4 py-lg-5 text-white" aria-labelledby="page-hero-heading">
    <div class="container py-1 py-lg-3 text-center text-lg-start position-relative">
        <div class="row">

            <?php if ( $caption ) : ?>
            <p class="page-hero__eyebrow animate__animated animate__fadeIn">
                <?php echo esc_html( $caption ); ?>
            </p>
            <?php endif; ?>
            <?php if ( $glavni_naslov ) : ?>
            <h1 id="page-hero-heading"
                class="page-hero__title my-2 my-md-3 display-2 animate__animated animate__fadeInUp animate__slow">
                <?php echo esc_html( $glavni_naslov ); ?>
            </h1>
            <?php endif; ?>
            <?php if ( $intro ) : ?>
            <p class="page-hero__lead mb-0 animate__animated animate__fadeIn animate__delay-1s">
                <?php echo esc_html( $intro ); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</section>