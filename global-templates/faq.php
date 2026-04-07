<?php
/**
 * FAQ sekcija — ACF Options repeater `faqs` (question / answer).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$faq_items = function_exists( 'get_field' ) ? get_field( 'faqs', 'options' ) : array();

if ( empty( $faq_items ) || ! is_array( $faq_items ) ) {
	return;
}
?>

<section class="faq py-5 py-lg-8 bg-light border-top reveal-on-scroll" aria-labelledby="faq-heading">
    <div class="container">
        <h2 id="faq-heading" class="section-heading">
            <?php esc_html_e( 'Najčešće postavljena pitanja', 'digitalno-legalno' ); ?>
        </h2>
        <div class="faq__inner mx-auto">
            <div class="faq__list">
                <?php foreach ( $faq_items as $i => $faq ) : ?>
                <?php
					$question = isset( $faq['question'] ) ? (string) $faq['question'] : '';
					$answer   = isset( $faq['answer'] ) ? (string) $faq['answer'] : '';
					if ( '' === $question && '' === $answer ) {
						continue;
					}
					$faq_id  = 'faq-panel-' . ( $i + 1 );
					$is_open = ( 0 === $i );
					?>
                <details class="faq__details" id="<?php echo esc_attr( $faq_id ); ?>"
                    <?php echo $is_open ? ' open' : ''; ?>>
                    <summary class="faq__summary">
                        <span class="faq__question"><?php echo esc_html( $question ); ?></span>
                    </summary>
                    <div class="faq__body">
                        <?php echo esc_html( $answer ); ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>