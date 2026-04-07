<?php
/**
 * Usluge — ACF Options repeater `services`.
 *
 * Polja:
 * - naziv_usluge
 * - subnaslov
 * - opis_usluge
 * - elementi_usluge (repeater: element, element_opis)
 * - extra_info
 * - slika_usluge
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$u = static function ( $path ) {
	return get_theme_file_uri( $path );
};

$services_icons = array(
	$u( 'images/icons/home-services-scale.svg' ),
	$u( 'images/icons/home-services-file-check.svg' ),
	$u( 'images/icons/home-services-trend.svg' ),
);
$service_element_icons = array(
	array(
		$u( 'images/icons/services-icon-clock.svg' ),
		$u( 'images/icons/services-icon-search-doc.svg' ),
		$u( 'images/icons/services-icon-lock.svg' ),
		$u( 'images/icons/home-feature-shield-check.svg' ),
	),
	array(
		$u( 'images/icons/home-services-file-check.svg' ),
		$u( 'images/icons/services-icon-list-doc.svg' ),
		$u( 'images/icons/home-feature-folder.svg' ),
		$u( 'images/icons/services-icon-cpu.svg' ),
	),
	array(
		$u( 'images/icons/services-icon-heart-pulse.svg' ),
		$u( 'images/icons/services-icon-phone.svg' ),
		$u( 'images/icons/services-icon-search.svg' ),
		$u( 'images/icons/services-icon-plane.svg' ),
	),
);
$default_element_icon = $u( 'images/icons/pricing-feature-check.svg' );

$services_sections = function_exists( 'get_field' ) ? get_field( 'services', 'options' ) : array();
if ( empty( $services_sections ) || ! is_array( $services_sections ) ) {
	return;
}
?>

<?php foreach ( $services_sections as $index => $block ) : ?>
<?php
$title    = isset( $block['naziv_usluge'] ) ? (string) $block['naziv_usluge'] : '';
$subtitle = isset( $block['subnaslov'] ) ? (string) $block['subnaslov'] : '';
$lead     = isset( $block['opis_usluge'] ) ? (string) $block['opis_usluge'] : '';
$footnote = isset( $block['extra_info'] ) ? (string) $block['extra_info'] : '';
$cards    = ( isset( $block['elementi_usluge'] ) && is_array( $block['elementi_usluge'] ) ) ? $block['elementi_usluge'] : array();

$image_url = '';
$image_alt = $title;
if ( isset( $block['slika_usluge'] ) && is_array( $block['slika_usluge'] ) ) {
	$image     = $block['slika_usluge'];
	$image_url = isset( $image['url'] ) ? (string) $image['url'] : '';
	$image_alt = isset( $image['alt'] ) && '' !== $image['alt'] ? (string) $image['alt'] : $image_alt;
}

$is_first    = ( 0 === $index );
$heading_id  = 'services-' . ( $index + 1 ) . '-heading';
$section_cls = 'services-block py-5 py-lg-6 reveal-on-scroll';
if ( 1 === $index % 2 ) {
	$section_cls .= ' bg-light';
}
if ( ! $is_first ) {
	$section_cls .= ' border-top';
}
$loading      = $is_first ? 'eager' : 'lazy';
$image_first  = ( 1 === $index % 2 );
$row_class    = 'row g-4 g-lg-5 align-items-center justify-content-between services-block__row';
$heading_icon = isset( $services_icons[ $index ] ) ? $services_icons[ $index ] : $services_icons[0];
if ( $image_first ) {
	$row_class .= ' flex-lg-row-reverse';
}
?>
<section class="<?php echo esc_attr( $section_cls ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="container">
		<div class="<?php echo esc_attr( $row_class ); ?>">
			<div class="col-30 col-lg-17">
				<div class="services-block__content">
					<div class="services-block__header">
						<span class="services-block__heading-icon-wrap" aria-hidden="true">
							<img src="<?php echo esc_url( $heading_icon ); ?>" alt="" width="32" height="32" class="services-block__heading-icon-img" loading="<?php echo esc_attr( $loading ); ?>" decoding="async">
						</span>
						<div class="services-block__header-text">
							<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="services-block__title">
								<?php echo esc_html( $title ); ?>
							</h2>
							<?php if ( '' !== $subtitle ) : ?>
							<p class="services-block__subtitle"><?php echo esc_html( $subtitle ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php if ( '' !== $lead ) : ?>
					<p class="services-block__lead"><?php echo esc_html( $lead ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $cards ) ) : ?>
					<div class="services-block__grid">
						<?php foreach ( $cards as $card_index => $card ) : ?>
						<?php
						$card_title = isset( $card['element'] ) ? (string) $card['element'] : '';
						$card_text  = isset( $card['element_opis'] ) ? (string) $card['element_opis'] : '';
						$card_icon  = isset( $service_element_icons[ $index ][ $card_index ] ) ? $service_element_icons[ $index ][ $card_index ] : $default_element_icon;
						if ( '' === $card_title && '' === $card_text ) {
							continue;
						}
						?>
						<div class="services-detail-card">
							<div class="services-detail-card__icon-wrap" aria-hidden="true">
								<img src="<?php echo esc_url( $card_icon ); ?>" alt="" width="24" height="24" class="services-detail-card__icon" loading="lazy" decoding="async">
							</div>
							<div class="services-detail-card__body">
								<?php if ( '' !== $card_title ) : ?>
								<h3 class="services-detail-card__title"><?php echo esc_html( $card_title ); ?></h3>
								<?php endif; ?>
								<?php if ( '' !== $card_text ) : ?>
								<p class="services-detail-card__text mb-0"><?php echo esc_html( $card_text ); ?></p>
								<?php endif; ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<?php if ( '' !== $footnote ) : ?>
					<p class="services-block__footnote mb-0"><?php echo esc_html( $footnote ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-30 col-lg-12">
				<?php if ( ! empty( $image_url ) ) : ?>
				<figure class="services-block__figure mb-0">
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="services-block__img" width="800" height="600" loading="<?php echo esc_attr( $loading ); ?>" decoding="async">
				</figure>
				<?php else : ?>
				<div class="services-block__figure services-block__figure--empty mb-0" aria-hidden="true"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endforeach; ?>
