<?php
/*
 * Example
    array(
        'type'       => 'number',
        'heading'    => esc_html__( 'Number field', 'smilepure' ),
        'param_name' => 'number_field',
        'value'      => 100,
        'min'        => 10,
        'max'        => 100,
        'step'       => 1,
        'suffix'     => 'px',
    ),
*/
if ( ! class_exists( 'Smilepure_VC_Number_Param' ) ) {

	class Smilepure_VC_Number_Param {

		public function __construct() {
			if ( class_exists( 'WpbakeryShortcodeParams' ) ) {
				WpbakeryShortcodeParams::addField( 'number', array(
					$this,
					'render',
				), SMILEPURE_THEME_URI . '/vc-extend/vc-params/number/functions.js' );
			}
		}

		public function render( $settings, $value ) {
			$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
			$min        = isset( $settings['min'] ) ? $settings['min'] : '';
			$max        = isset( $settings['max'] ) ? $settings['max'] : '';
			$step       = isset( $settings['step'] ) ? $settings['step'] : '';
			$suffix     = isset( $settings['suffix'] ) ? $settings['suffix'] : '';

			$output = '<div class="tm_number">';
			$output .= '<input type="button" value="-" class="minus" />';
			$output .= '<input type="number" min="' . esc_attr( $min ) . '"' . ' max="' . esc_attr( $max ) . '"' . ' step="' . esc_attr( $step ) . '"' . ' class="wpb_vc_param_value ' . esc_attr( $param_name ) . '"' . ' name="' . esc_attr( $param_name ) . '"' . ' value="' . esc_attr( $value ) . '" />';
			$output .= '<input type="button" value="+" class="plus" />' . '<span>' . $suffix . '</span>';
			$output .= '</div>';

			return $output;
		}

	}

	new Smilepure_VC_Number_Param();
}
