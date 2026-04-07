<?php
/**
 * Glavni meni (desktop).
 *
 * @package digitalno-legalno
 */
?>
<nav class="navbar p-0 site-nav d-none d-lg-flex"
    aria-label="<?php esc_attr_e( 'Glavna navigacija', 'digitalno-legalno' ); ?>">
    <?php
	  $args = [
		  'theme_location'    => 'main_menu',
          'depth' => 2,
          'container' => false,
		  'menu_class'        => 'navbar-nav flex-row align-items-center gap-2',
		  'fallback_cb'       => false,
		  'walker'            => new WP_Bootstrap_Navwalker(),
	  ];
	  wp_nav_menu($args);
    ?>
</nav>