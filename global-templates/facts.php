<?php
/**
 * Sekcija sa karticama (činjenice / razlozi) — ACF polja na stranici.
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$icon_shield = get_theme_file_uri( 'images/icons/home-feature-shield-check.svg' );
$icon_chat   = get_theme_file_uri( 'images/icons/home-feature-chat.svg' );
$icon_folder = get_theme_file_uri( 'images/icons/home-feature-folder.svg' );
$icon_globe  = get_theme_file_uri( 'images/icons/home-feature-globe.svg' );


$facts_box_caption = get_field( 'facts_box_caption' );
$facts_boxes = get_field( 'facts_boxes' );
$facts_icons = array( $icon_shield, $icon_chat, $icon_folder, $icon_globe );


?>

<section class="facts py-5 py-lg-6 py-xl-8 border-top reveal-on-scroll" aria-labelledby="facts-heading">
    <div class="container">
        <?php if($facts_box_caption): ?>
        <h2 id="facts-heading" class="section-heading">
            <?php esc_html_e( 'Šta nas izdvaja', 'digitalno-legalno' ); ?>
        </h2>
        <?php endif; ?>
        <?php if($facts_boxes): ?>
        <div class="row gy-4 gy-md-4 gx-md-4 justify-content-center">
            <?php foreach ( $facts_boxes as $index => $box ) : ?>
            <?php $icon = isset( $facts_icons[ $index ] ) ? $facts_icons[ $index ] : $icon_shield; ?>
            <div class="col-30 col-md-14 col-lg-7">
                <article class="home-card facts-card h-100">
                    <div class="facts-card__icon" aria-hidden="true">
                        <img src="<?php echo esc_url( $icon ); ?>" alt="" width="40" height="40" loading="lazy"
                            decoding="async" class="facts-card__icon-img">
                    </div>
                    <h3 class="facts-card__title"><?php echo esc_html( $box['fact_box_caption'] ); ?></h3>
                    <p class="facts-card__body"><?php echo esc_html( $box['fact_box_description'] ); ?></p>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>