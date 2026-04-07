<?php
/**
 * Sadržaj početne stranice (ACF + opcije usluga).
 *
 * Glavni naslov je u global-templates/hero-home.php. Ikone: images/icons/*.svg.
 *
 * @package digitalno-legalno
 */
$icon_contract = get_theme_file_uri( 'images/icons/home-recognize-contract.svg' );
$icon_help     = get_theme_file_uri( 'images/icons/home-recognize-help.svg' );
$icon_chart    = get_theme_file_uri( 'images/icons/home-recognize-chart.svg' );

$icon_svc_legal   = get_theme_file_uri( 'images/icons/home-services-scale.svg' );
$icon_svc_docs    = get_theme_file_uri( 'images/icons/home-services-file-check.svg' );
$icon_svc_finance = get_theme_file_uri( 'images/icons/home-services-trend.svg' );


$intro_caption = get_field( 'intro_caption' );
$intro_boxes   = get_field( 'intro_boxes' );
$intro_icons   = array( $icon_contract, $icon_help, $icon_chart );


$home_services = get_field( 'services', 'options' );
$help_icons    = array( $icon_svc_legal, $icon_svc_docs, $icon_svc_finance );

?>


<section class="home-recognize py-5 py-lg-6 py-xl-8 bg-light reveal-on-scroll" aria-labelledby="home-recognize-heading">
    <div class="container">
        <?php if ( $intro_caption ) : ?>
        <h2 id="home-recognize-heading" class="section-heading">
            <?php echo esc_html( $intro_caption ); ?>
        </h2>
        <?php endif; ?>
        <div class="row gy-4 gy-md-4 gx-md-4 justify-content-center">


            <?php if ( $intro_boxes ) : ?>
            <?php foreach ( $intro_boxes as $index => $box ) : ?>
            <?php $icon = isset( $intro_icons[ $index ] ) ? $intro_icons[ $index ] : $icon_contract; ?>
            <div class="col-30 col-md-15 col-lg-10">
                <article class="home-card home-recognize-card h-100">
                    <div class="home-recognize-card__icon" aria-hidden="true">
                        <img src="<?php echo esc_url( $icon ); ?>" alt="" width="40" height="40" loading="lazy"
                            decoding="async" class="home-card__icon-img">
                    </div>
                    <h3 class="home-card__title">
                        <?php echo esc_html( $box['intro_box_caption'] ); ?></h3>
                    <p class="home-card__text mb-0">
                        <?php echo esc_html( $box['intro_box_description'] ); ?>
                    </p>
                </article>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>


<section class="home-services py-5 py-lg-6 py-xl-8 border-top reveal-on-scroll" aria-labelledby="home-services-heading">
    <div class="container">
        <h2 id="home-services-heading" class="section-heading">
            <?php esc_html_e( 'Naše usluge', 'digitalno-legalno' ); ?>
        </h2>
        <?php if ( ! empty( $home_services ) && is_array( $home_services ) ) : ?>
        <div class="row gy-4 gy-md-4 gx-md-4 justify-content-center">
            <?php foreach ( $home_services as $index => $box ) : ?>
            <?php $icon = isset( $help_icons[ $index ] ) ? $help_icons[ $index ] : $icon_svc_legal; ?>
            <div class="col-30 col-md-15 col-lg-10">
                <article class="home-card home-services-card h-100">
                    <div class="home-card__icon-wrap" aria-hidden="true">
                        <img src="<?php echo esc_url( $icon ); ?>" alt="" width="25" height="25" loading="lazy"
                            decoding="async" class="home-card__icon-img home-card__icon-img--sm">
                    </div>
                    <h3 class="home-card__title mb-1">
                        <?php echo esc_html( isset( $box['naziv_usluge'] ) ? $box['naziv_usluge'] : '' ); ?>
                    </h3>
                    <p class="home-services-card__subtitle">
                        <?php echo esc_html( isset( $box['subnaslov'] ) ? $box['subnaslov'] : '' ); ?>
                    </p>
                    <p class="home-card__text mb-0">
                        <?php echo esc_html( isset( $box['kratki_opis_usluge'] ) ? $box['kratki_opis_usluge'] : '' ); ?>
                    </p>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <p class="text-center mt-4 mt-lg-5 mb-0">
            <a class="btn btn-outline-primary" href="<?php echo esc_url( home_url( '/usluge' ) ); ?>">
                <?php esc_html_e( 'Saznaj više o uslugama', 'digitalno-legalno' ); ?>
                <span class="home-section__cta-arrow" aria-hidden="true">→</span>
            </a>
        </p>
    </div>
</section>

<section class="pricing py-5 py-lg-6 py-xl-8 border-top bg-light reveal-on-scroll" aria-labelledby="pricing-heading">

    <h2 id="pricing-heading" class="section-heading mb-4">
        <?php esc_html_e( 'Izaberi paket koji odgovara tvom biznisu', 'digitalno-legalno' ); ?>
    </h2>

    <?php get_template_part( 'global-templates/packages' ); ?>
    <p class="text-center mt-4 mt-lg-5 mb-0">
        <a class="btn btn-outline-primary" href="<?php echo esc_url( home_url( '/paketi#packages-compare' ) ); ?>">
            <?php esc_html_e( 'Uporedi pakete', 'digitalno-legalno' ); ?>
            <span class="home-section__cta-arrow" aria-hidden="true">→</span>
        </a>
    </p>


</section>

<?php get_template_part( 'global-templates/facts' ); ?>

<?php get_template_part( 'global-templates/last-articles' ); ?>