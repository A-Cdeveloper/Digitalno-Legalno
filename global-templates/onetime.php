<?php
/**
 * Paketi — jednokratne usluge (bez mesečne obaveze).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$one_time_services = function_exists( 'get_field' ) ? get_field( 'onetime_services', 'options' ) : array();
if ( empty( $one_time_services ) || ! is_array( $one_time_services ) ) {
	return;
}
?>

<div class="packages-oneoff__grid">
    <?php foreach ( $one_time_services as $item ) : ?>
    <article class="packages-oneoff-card">
        <h4 class="packages-oneoff-card__title">
            <?php echo esc_html( isset( $item['naziv_usluge'] ) ? $item['naziv_usluge'] : '' ); ?>
        </h4>
        <p class="packages-oneoff-card__desc mb-0">
            <?php echo esc_html( isset( $item['opis_usluge'] ) ? $item['opis_usluge'] : '' ); ?>
        </p>
        <?php if ( empty( $item['cena'] ) ) : ?>
        <p class="packages-oneoff-card__soon mb-0">
            <?php esc_html_e( 'Uskoro u ponudi', 'digitalno-legalno' ); ?>
        </p>
        <?php else : ?>
        <p class="packages-oneoff-card__price mb-0"><?php echo esc_html( $item['cena'] ); ?></p>
        <?php endif; ?>
    </article>
    <?php endforeach; ?>
</div>
