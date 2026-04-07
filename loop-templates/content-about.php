<?php
/**
 * O nama — priča + osnivač (bio u global-templates/bio.php).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$about_box = get_field('about_box');
?>

<section class="about-story reveal-on-scroll py-5 py-lg-8" aria-labelledby="about-story-heading">
    <div class="container">
        <h2 id="about-story-heading" class="visually-hidden">
            <?php esc_html_e( 'Digitalno legalno o nama', 'digitalno-legalno' ); ?>
        </h2>
        <div class="col-30 col-lg-22 mx-auto">
            <?php if($about_box): ?>

            <?php echo get_field('about_box'); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
$kako_radimo = get_field( 'kako_radimo' );
if ( ! empty( $kako_radimo ) && is_array( $kako_radimo ) ) :
	?>
<section class="about-how-we-work reveal-on-scroll py-5 py-lg-8 border-top bg-light"
    aria-labelledby="about-how-we-work-heading">
    <div class="container">
        <h2 id="about-how-we-work-heading" class="section-heading mb-4 mb-lg-6">
            <?php esc_html_e( 'Kako radimo?', 'digitalno-legalno' ); ?>
        </h2>
        <div class="col-30 col-lg-22 mx-auto">
            <div class="row gy-4 gy-md-4 gx-md-4 about-how-we-work__grid">
                <?php foreach ( $kako_radimo as $step ) : ?>
                <?php
					$cap = isset( $step['caption'] ) ? (string) $step['caption'] : '';
					$desc = isset( $step['description'] ) ? (string) $step['description'] : '';
					if ( '' === $cap && '' === $desc ) {
						continue;
					}
					?>
                <div class="col-30 col-md-15">
                    <article class="about-how-card h-100">
                        <?php if ( '' !== $cap ) : ?>
                        <h3 class="about-how-card__title"><?php echo esc_html( $cap ); ?></h3>
                        <?php endif; ?>
                        <?php if ( '' !== $desc ) : ?>
                        <p class="about-how-card__text mb-0"><?php echo esc_html( $desc ); ?></p>
                        <?php endif; ?>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_template_part( 'global-templates/bio' ); ?>