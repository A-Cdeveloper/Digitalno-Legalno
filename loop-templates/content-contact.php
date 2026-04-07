<?php
/**
 * Stranica Kontakt — forma i bio blok.
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="about-story reveal-on-scroll py-5 py-lg-8 bg-light" aria-labelledby="about-story-heading">
    <div class="col-25 col-md-20 col-xl-10 mx-auto">
        <h2 id="contact-form-heading" class="section-heading text-start">
            <?php esc_html_e( 'Zakaži razgovor', 'digitalno-legalno' ); ?>
        </h2>
        <?php echo do_shortcode('[contact-form-7 id="b91be0f" title="Kontakt formular"]'); ?>
    </div>
</section>

<?php get_template_part( 'global-templates/bio' ); ?>