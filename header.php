<?php
/**
 * Zaglavlje HTML dokumenta i gornja traka sajta.
 *
 * @package digitalno-legalno
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>


<body <?php body_class();?>>
    <?php wp_body_open(); ?>

    <a class="skip-link" href="#main-content"><?php esc_html_e( 'Preskoči na sadržaj', 'digitalno-legalno' ); ?></a>

    <header class="site-header sticky-top py-3">
        <div
            class="container d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
            <?php get_template_part( 'global-templates/logo' ); ?>
            <?php get_template_part( 'global-templates/navbar' ); ?>
            <?php get_template_part( 'global-templates/nav-cta' ); ?>
        </div>
    </header>


    <?php
    if ( is_front_page() ) {
        get_template_part( 'global-templates/hero-home' );
    } elseif ( is_page() || is_category() ) {
        get_template_part( 'global-templates/hero-pages' );
    }
    ?>