<?php
/**
 * Uporedna tabela paketa (isti ACF source kao kartice, drugi layout).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$icon_check = get_theme_file_uri( 'images/icons/pricing-feature-check.svg' );
$icon_no    = get_theme_file_uri( 'images/icons/packages-feature-no.svg' );

$packages_options = function_exists( 'get_field' ) ? get_field( 'packages', 'options' ) : array();
$packages_options = is_array( $packages_options ) ? array_slice( $packages_options, 0, 3 ) : array();

$compare_rows = array(
	array(
		'label' => __( 'Pravna pitanja mesečno', 'digitalno-legalno' ),
		'key'   => 'pravna_pitanja_mesecno',
	),
	array(
		'label' => __( 'Review ugovora', 'digitalno-legalno' ),
		'key'   => 'review_ugovora',
	),
	array(
		'label' => __( 'Mesečni Compliance Brief', 'digitalno-legalno' ),
		'key'   => 'compliance_brief',
	),
	array(
		'label' => __( 'Biblioteka dokumenata', 'digitalno-legalno' ),
		'key'   => 'biblioteka_dokumenata',
	),
	array(
		'label' => __( 'Check-in poziv', 'digitalno-legalno' ),
		'key'   => 'check-in',
	),
	array(
		'label' => __( 'Strateški poziv', 'digitalno-legalno' ),
		'key'   => 'strateski_poziv',
	),
	array(
		'label' => __( 'Finansijski health check', 'digitalno-legalno' ),
		'key'   => 'finansijski_health_check',
	),
	array(
		'label' => __( 'Popust na jednokratne usluge', 'digitalno-legalno' ),
		'key'   => 'popust_na_jednokratne_usluge',
	),
);

foreach ( $compare_rows as $row_index => $row ) {
	$cells = array();
	foreach ( $packages_options as $plan ) {
		$value = isset( $plan[ $row['key'] ] ) ? $plan[ $row['key'] ] : '';

		if ( 'compliance_brief' === $row['key'] ) {
			$cells[] = ( is_string( $value ) && 'da' === strtolower( trim( $value ) ) );
			continue;
		}

		if ( '' === $value || null === $value || false === $value || 0 === $value || '0' === $value ) {
			$cells[] = false;
		} else {
			$cells[] = (string) $value;
		}
	}

	while ( count( $cells ) < 3 ) {
		$cells[] = false;
	}

	$compare_rows[ $row_index ]['cells'] = $cells;
}
?>


<div class="packages-compare__table-wrap">
    <table class="packages-compare__table">
        <thead>
            <tr>
                <th scope="col"><?php esc_html_e( 'Stavka', 'digitalno-legalno' ); ?></th>
                <th scope="col"><?php esc_html_e( 'Osnova', 'digitalno-legalno' ); ?></th>
                <th scope="col"><?php esc_html_e( 'Standard', 'digitalno-legalno' ); ?></th>
                <th scope="col"><?php esc_html_e( 'Premium', 'digitalno-legalno' ); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $compare_rows as $row ) : ?>
            <tr>
                <th scope="row"><?php echo esc_html( $row['label'] ); ?></th>
                <?php foreach ( $row['cells'] as $cell ) : ?>
                <?php $is_icon = ( true === $cell || false === $cell ); ?>
                <td
                    class="<?php echo esc_attr( $is_icon ? 'packages-compare__cell packages-compare__cell--icon' : '' ); ?>">
                    <?php if ( true === $cell ) : ?>
                    <img src="<?php echo esc_url( $icon_check ); ?>" width="18" height="18"
                        class="packages-compare__check" loading="lazy" decoding="async"
                        alt="<?php echo esc_attr__( 'Uključeno', 'digitalno-legalno' ); ?>">
                    <?php elseif ( false === $cell ) : ?>
                    <img src="<?php echo esc_url( $icon_no ); ?>" width="18" height="18" class="packages-compare__no"
                        loading="lazy" decoding="async"
                        alt="<?php echo esc_attr__( 'Nije uključeno', 'digitalno-legalno' ); ?>">
                    <?php else : ?>
                    <?php echo esc_html( $cell ); ?>
                    <?php endif; ?>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>