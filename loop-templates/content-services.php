<?php
/**
 * Usluge — ACF Options repeater `services`.
 *
 * Polja:
 * - naziv_usluge
 * - subnaslov
 * - opis_usluge
 * - elementi_usluge (repeater: element, element_opis)
 * - extra_info
 * - slika_usluge
 *
 * @package digitalno-legalno
 */

defined( 'ABSPATH' ) || exit;

get_template_part( 'global-templates/services' );

get_template_part( 'global-templates/faq' ); ?>