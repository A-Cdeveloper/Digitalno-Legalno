<?php
/**
 * Podnožje sajta.
 *
 * @package digitalno-legalno
 */

get_template_part( 'global-templates/book-call' );
?>

<footer class="site-footer bg-brand-navy">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between gap-3">
            <p class="site-footer__copy mb-0 order-2 order-lg-1">
                <?php echo esc_html( '©' . date_i18n( 'Y' ) . ' ' . get_bloginfo( 'name' ) ); ?>.
                <?php esc_html_e( 'Sva prava zadržana.', 'digitalno-legalno' ); ?>
            </p>
            <nav class="order-1 order-lg-2"
                aria-label="<?php esc_attr_e( 'Navigacija u podnožju', 'digitalno-legalno' ); ?>">
                <?php
            wp_nav_menu( [
                'theme_location' => 'meta_menu',
                'depth'          => 1,
                'container'      => false,
                'menu_class'     => 'site-footer__menu mb-0',
                'fallback_cb'    => false,
            ] );
            ?>
            </nav>
        </div>
    </div>
</footer>




<?php wp_footer(); ?>




</body>

</html>