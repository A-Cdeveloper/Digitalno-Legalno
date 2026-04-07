<?php
/**
 * Blok sa cenama / paketima — ACF repeater `packages`.
 *
 * Opcije: early_bird_text (opciono — baner iznad kartica samo ako je popunjeno). Repeater packages: …
 * Drugi paket u listi uvek je istaknut (najpopularniji) + badge u kodu.
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$icon_pricing_check = get_theme_file_uri( 'images/icons/pricing-feature-check.svg' );

$packages = function_exists( 'get_field' ) ? get_field( 'packages', 'options' ) : null;

if ( empty( $packages ) || ! is_array( $packages ) ) {
	return;
}

$early_bird_notice = '';
if ( function_exists( 'get_field' ) ) {
	$early_bird_notice = get_field( 'early_bird_text', 'options' );
}
$early_bird_notice = is_string( $early_bird_notice ) ? trim( $early_bird_notice ) : '';
?>

<?php if ( '' !== $early_bird_notice ) : ?>
<div class="packages-early-bird-notice mb-4 mb-lg-5 col-25 col-lg-25 col-xxl-18 mx-auto" role="status">
    <span class="packages-early-bird-notice__icon" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="#f5d547" stroke="#3d3a33" stroke-width="1.1" stroke-linejoin="round"
                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
        </svg>
    </span>
    <p class="packages-early-bird-notice__text mb-0"><?php echo esc_html( $early_bird_notice ); ?></p>
</div>
<?php endif; ?>

<div class="row g-5 g-md-4 align-items-stretch justify-content-center col-30 col-lg-25 col-xxl-18 mx-auto">
    <?php foreach ( $packages as $index => $plan ) : ?>
    <?php
		$name     = isset( $plan['naziv_paketa'] ) ? $plan['naziv_paketa'] : '';
		$price    = isset( $plan['regularna_cena_'] ) ? $plan['regularna_cena_'] : '';
		$early    = isset( $plan['early_bird'] ) ? $plan['early_bird'] : '';
		$usluge   = array();
		$pravna_pitanja_mesecno       = isset( $plan['pravna_pitanja_mesecno'] ) ? $plan['pravna_pitanja_mesecno'] : '';
		$review_ugovora               = isset( $plan['review_ugovora'] ) ? $plan['review_ugovora'] : '';
		$compliance_brief             = isset( $plan['compliance_brief'] ) ? $plan['compliance_brief'] : '';
		$biblioteka_dokumenata        = isset( $plan['biblioteka_dokumenata'] ) ? $plan['biblioteka_dokumenata'] : '';
		$check_in                     = isset( $plan['check-in'] ) ? $plan['check-in'] : '';
		$strateski_poziv              = isset( $plan['strateski_poziv'] ) ? $plan['strateski_poziv'] : '';
		$finansijski_health_check     = isset( $plan['finansijski_health_check'] ) ? $plan['finansijski_health_check'] : '';
		$popust_jednokratne_usluge    = isset( $plan['popust_na_jednokratne_usluge'] ) ? $plan['popust_na_jednokratne_usluge'] : '';

		if ( '' !== $pravna_pitanja_mesecno && null !== $pravna_pitanja_mesecno ) {
			$usluge[] = __( 'Pravna pitanja mesečno', 'digitalno-legalno' ) . ': ' . (string) $pravna_pitanja_mesecno;
		}
		if ( '' !== $review_ugovora && null !== $review_ugovora && false !== $review_ugovora && 0 !== $review_ugovora && '0' !== $review_ugovora ) {
			$usluge[] = __( 'Review ugovora', 'digitalno-legalno' ) . ': ' . (string) $review_ugovora;
		}
		if ( is_string( $compliance_brief ) && 'da' === strtolower( trim( $compliance_brief ) ) ) {
			$usluge[] = __( 'Mesečni Compliance Brief', 'digitalno-legalno' );
		}
		if ( '' !== $biblioteka_dokumenata && null !== $biblioteka_dokumenata ) {
			$usluge[] = (string) $biblioteka_dokumenata . ' ' . __( 'biblioteka dokumenata', 'digitalno-legalno' );
		}
		if ( '' !== $check_in && null !== $check_in && false !== $check_in && 0 !== $check_in && '0' !== $check_in ) {
			$usluge[] = __( 'Check-in poziv', 'digitalno-legalno' ) . ': ' . (string) $check_in;
		}
		if ( '' !== $strateski_poziv && null !== $strateski_poziv && false !== $strateski_poziv && 0 !== $strateski_poziv && '0' !== $strateski_poziv ) {
			$usluge[] = __( 'Strateški poziv', 'digitalno-legalno' ) . ': ' . (string) $strateski_poziv;
		}
		if ( '' !== $finansijski_health_check && null !== $finansijski_health_check && false !== $finansijski_health_check && 0 !== $finansijski_health_check && '0' !== $finansijski_health_check ) {
			$usluge[] = __( 'Finansijski health check', 'digitalno-legalno' ) . ': ' . lcfirst( (string) $finansijski_health_check );
		}
		if ( '' !== $popust_jednokratne_usluge && null !== $popust_jednokratne_usluge ) {
			$usluge[] = (string) $popust_jednokratne_usluge . ' ' . __( 'popust na jednokratne usluge', 'digitalno-legalno' );
		}
		$featured = ( 1 === (int) $index );
		?>
    <div class="col-25 col-md-14 col-xl-10">
        <article
            class="<?php echo esc_attr( 'pricing-card h-100' . ( $featured ? ' pricing-card--featured' : '' ) ); ?>">
            <?php if ( $featured ) : ?>
            <p class="pricing-card__badge"><?php echo esc_html__( 'NAJPOPULARNIJI', 'digitalno-legalno' ); ?></p>
            <?php endif; ?>
            <?php if ( $name ) : ?>
            <h3 class="pricing-card__name"><?php echo esc_html( $name ); ?></h3>
            <?php endif; ?>
            <?php if ( $price !== '' && $price !== null ) : ?>
            <p class="pricing-card__price-row mb-0">
                <span class="pricing-card__price"><?php echo esc_html( (string) $price ); ?></span>
                <span class="pricing-card__period">
                    <?php esc_html_e( 'EUR/mes', 'digitalno-legalno' ); ?></span>
            </p>
            <?php endif; ?>
            <?php if ( $early !== '' && $early !== null ) : ?>
            <p class="pricing-card__early mb-0">
                <?php
				printf(
					/* translators: %s: discounted Early Bird price in EUR */
					esc_html__( 'Early Bird: %s EUR', 'digitalno-legalno' ),
					esc_html( (string) $early )
				);
				?>
            </p>
            <?php endif; ?>
            <?php if ( ! empty( $usluge ) ) : ?>
            <ul class="pricing-card__features">
                <?php foreach ( $usluge as $naziv ) : ?>
                <li class="pricing-card__feature">
                    <img src="<?php echo esc_url( $icon_pricing_check ); ?>" alt="" width="18" height="18"
                        loading="lazy" decoding="async" class="pricing-card__feature-icon">
                    <span><?php echo esc_html( $naziv ); ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </article>
    </div>
    <?php endforeach; ?>
</div>