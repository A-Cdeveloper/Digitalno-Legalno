<?php
/**
 * CTA „Zakaži razgovor“ iznad podnožja (ACF Options).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$book_call_title       = get_field( 'naslov', 'options' );
$book_call_description = get_field( 'intro', 'options' );
$book_call_button_text = get_field( 'button_text', 'options' );
$book_call_button_link = get_field( 'button_link', 'options' );

if ( ! is_404() && ! is_singular( 'post' ) && ! is_page( 'kontakt' ) ) :
	?>

<section class="pre-footer-cta text-center bg-brand-blue container-fluid" aria-labelledby="pre-footer-cta-heading">
    <div class="container">
		<h2 id="pre-footer-cta-heading"><?php echo esc_html( $book_call_title ); ?>
		</h2>
		<p><?php echo esc_html( $book_call_description ); ?>
		</p>
		<a class="btn btn-light text-brand-blue pre-footer-cta__btn"
			href="<?php echo esc_url( $book_call_button_link ); ?>">
			<?php echo esc_html( $book_call_button_text ); ?>
        </a>
	</div>
</section>
	<?php
endif;