<?php
/**
 * Tagovi za pojedinačnu objavu.
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$tags = get_the_tags();
if ( empty( $tags ) || is_wp_error( $tags ) ) {
	return;
}
?>

<div class="single-post__tags">
    <ul class="about-founder__tags list-unstyled d-flex flex-wrap gap-2 mb-0" role="list"
        aria-label="<?php esc_attr_e( 'Tagovi članka', 'digitalno-legalno' ); ?>">
        <?php foreach ( $tags as $tag ) : ?>
        <?php
			$tag_link = get_tag_link( $tag );
			if ( is_wp_error( $tag_link ) ) {
				continue;
			}
			?>
        <li>
            <a class="badge-outline"
                href="<?php echo esc_url( $tag_link ); ?>"><?php echo esc_html( $tag->name ); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>