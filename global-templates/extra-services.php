<?php
/**
 * Dodatne usluge — ACF Options repeater `extra_services`.
 *
 * Polja (po redu u repeateru):
 * - naziv_usluge
 * - subnaslov
 * - kratki_opis_usluge
 * - extralink (ACF Link ili URL) — cela kartica je klik (`<a class="extra-services-card__inner">`), uvek `target="_blank"` + `rel="noopener noreferrer"`.
 *
 * Očekuje se npr. dva reda: „Eksterni DPO“, „Startuj Legalno“. Drugi red (index 1) dobija `extra-services-card--dark`.
 *
 * Tipografija kartice: .extra-services-block__title, __subtitle, __lead (scss/_services.scss).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$u = static function ( $path ) {
	return get_theme_file_uri( $path );
};

$extra_icons = array(
	$u( 'images/icons/home-feature-shield-check.svg' ),
	$u( 'images/icons/home-services-file-check.svg' ),
);
$default_icon = $u( 'images/icons/pricing-feature-check.svg' );

$rows = function_exists( 'get_field' ) ? get_field( 'extra_services', 'options' ) : array();
if ( empty( $rows ) || ! is_array( $rows ) ) {
	return;
}

/**
 * Izvlači URL i opcioni naslov iz ACF Link polja ili običnog URL stringa.
 *
 * @param mixed $raw Vrednost `extralink`.
 * @return array{0: string, 1: string} URL, ACF naslov linka (opciono, za pristupačnost).
 */
$extra_services_resolve_link = static function ( $raw ) {
	if ( empty( $raw ) ) {
		return array( '', '' );
	}
	if ( is_array( $raw ) && ! empty( $raw['url'] ) ) {
		return array( (string) $raw['url'], isset( $raw['title'] ) ? (string) $raw['title'] : '' );
	}
	if ( is_string( $raw ) ) {
		$t = trim( $raw );
		if ( '' !== $t ) {
			return array( $t, '' );
		}
	}
	return array( '', '' );
};
?>

<div class="extra-services py-5 py-lg-6 reveal-on-scroll">
    <div class="container">
        <div class="row gy-4 gx-0 gx-lg-4 gy-lg-4 justify-content-center">
            <?php foreach ( $rows as $index => $row ) : ?>
            <?php
				$title    = isset( $row['naziv_usluge'] ) ? (string) $row['naziv_usluge'] : '';
				$subtitle = isset( $row['subnaslov'] ) ? (string) $row['subnaslov'] : '';
				$text     = isset( $row['kratki_opis_usluge'] ) ? (string) $row['kratki_opis_usluge'] : '';

				list( $link_url_raw ) = $extra_services_resolve_link( isset( $row['extralink'] ) ? $row['extralink'] : null );
				$link_url = '' !== $link_url_raw ? esc_url( $link_url_raw ) : '';
				$is_linked = '' !== $link_url;

				if ( '' === $title && '' === $subtitle && '' === $text && ! $is_linked ) {
					continue;
				}
				$heading_id   = 'extra-services-' . ( (int) $index + 1 );
				$icon         = isset( $extra_icons[ $index ] ) ? $extra_icons[ $index ] : $default_icon;
				$card_classes = 'extra-services-card h-100';
				if ( 1 === (int) $index ) {
					$card_classes .= ' extra-services-card--dark';
				}
				$article_aria = '';
				if ( '' !== $title ) {
					$article_aria = sprintf( ' aria-labelledby="%s"', esc_attr( $heading_id ) );
				}
				?>
            <div class="col-30 col-md-15">
                <article class="<?php echo esc_attr( $card_classes ); ?>"<?php echo $article_aria; ?>>
                    <?php if ( $is_linked ) : ?>
                    <a class="extra-services-card__inner" href="<?php echo esc_url( $link_url ); ?>" target="_blank"
                        rel="noopener noreferrer">
                        <?php else : ?>
                        <div class="extra-services-card__inner">
                            <?php endif; ?>
                        <div class="services-block__header">
                            <span class="services-block__heading-icon-wrap" aria-hidden="true">
                                <img src="<?php echo esc_url( $icon ); ?>" alt="" width="32" height="32"
                                    class="services-block__heading-icon-img" loading="lazy" decoding="async">
                            </span>
                            <div class="services-block__header-text">
                                <?php if ( '' !== $title ) : ?>
                                <h2 id="<?php echo esc_attr( $heading_id ); ?>" class="extra-services-block__title">
                                    <?php echo esc_html( $title ); ?>
                                </h2>
                                <?php endif; ?>
                                <?php if ( '' !== $subtitle ) : ?>
                                <p class="extra-services-block__subtitle"><?php echo esc_html( $subtitle ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ( '' !== $text ) : ?>
                        <p class="extra-services-block__lead mb-0"><?php echo esc_html( $text ); ?></p>
                        <?php endif; ?>
                    <?php if ( $is_linked ) : ?>
                    </a>
                    <?php else : ?>
                        </div>
                    <?php endif; ?>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>