<?php
/**
 * Stranica Paketi — kartice cena + tabela „Šta je uključeno“.
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="pricing py-5 py-lg-8 border-top bg-light reveal-on-scroll" aria-labelledby="packages-pricing-heading">
    <?php get_template_part( 'global-templates/packages' ); ?>
</section>


<section id="packages-compare" class="packages-compare py-5 py-lg-8 border-top reveal-on-scroll"
    aria-labelledby="packages-compare-heading">
    <div class="col-15 mx-auto">
        <h2 id="packages-compare-heading" class="section-heading">
            <?php esc_html_e( 'Šta je uključeno', 'digitalno-legalno' ); ?>
        </h2>
        <?php get_template_part( 'global-templates/compare-packages' ); ?>
    </div>
</section>

<section class="packages-oneoff py-5 py-lg-8 border-top reveal-on-scroll bg-light"
    aria-labelledby="packages-oneoff-heading">
    <div class="col-16 mx-auto">
        <h2 id="packages-oneoff-heading" class="section-heading">
            <?php esc_html_e( 'Jednokratne usluge', 'digitalno-legalno' ); ?>
        </h2>
        <?php get_template_part( 'global-templates/onetime' ); ?>
    </div>
</section>