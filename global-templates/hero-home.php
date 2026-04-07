<?php
/**
 * Hero sekcija početne stranice (ACF polja trenutne stranice).
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

$caption       = get_field( 'caption' );
$glavni_naslov = get_field( 'glavni_naslov' );
$podnaslov     = get_field( 'podnaslov' );
$intro         = get_field( 'intro' );
$buttons       = get_field( 'buttons' );
?>


<section class="home-hero container-fluid py-3  py-lg-3 py-xl-5 text-white" aria-labelledby="home-hero-heading">
    <div class="container py-2 py-lg-5 text-center text-lg-start position-relative">
        <div class="row">
            <div class="col-30 col-lg-25 home-hero__content">

                <?php if ($caption): ?>
                <p class="home-hero__eyebrow">
                    <?php echo esc_html($caption); ?>
                </p>
                <?php endif; ?>
                <?php if ($glavni_naslov): ?>
                <h1 id="home-hero-heading" class="my-3 display-1 text-white">
                    <span class="home-hero__title-line d-block animate__animated animate__fadeInDown">
                        <?php echo esc_html($glavni_naslov); ?>
                    </span>
                    <?php if ($podnaslov): ?>
                    <span
                        class="subheading home-hero__title-sub d-block display-2 mt-2 mt-md-0 animate__animated animate__fadeInUp animate__delay-1s">
                        <?php echo esc_html($podnaslov); ?>
                    </span>
                    <?php endif; ?>
                </h1>
                <?php endif; ?>
                <?php if ($intro): ?>
                <p class="mb-6 home-hero__lead animate__animated animate__fadeIn animate__delay-2s">
                    <?php echo esc_html($intro); ?>
                </p>
                <?php endif; ?>
                <div
                    class="home-hero__actions d-flex flex-wrap gap-4 justify-content-center justify-content-lg-start animate__animated animate__fadeInUp animate__delay-3s">
                    <?php if ($buttons): ?>
                    <?php foreach ($buttons as $index => $button): 
                       
                        if ($index == 0) {
                            $class = 'btn btn-light text-primary';
                        } else {
                            $class = 'btn btn-outline-light';
                        }
                        ?>
                    <a class="<?php echo esc_attr($class); ?>" href="<?php echo esc_url($button['link']); ?>">
                        <?php echo esc_html($button['text']); ?>
                    </a>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>