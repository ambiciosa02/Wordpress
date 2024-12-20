<?php
/**
* Customizer Custom Classes.
* @package Omega Storefront
*/

if ( ! function_exists( 'omega_storefront_sanitize_number_range' ) ) :
    function omega_storefront_sanitize_number_range( $omega_storefront_input, $omega_storefront_setting ) {
        $omega_storefront_input = absint( $omega_storefront_input );
        $omega_storefront_atts = $omega_storefront_setting->manager->get_control( $omega_storefront_setting->id )->input_attrs;
        $omega_storefront_min = ( isset( $omega_storefront_atts['min'] ) ? $omega_storefront_atts['min'] : $omega_storefront_input );
        $omega_storefront_max = ( isset( $omega_storefront_atts['max'] ) ? $omega_storefront_atts['max'] : $omega_storefront_input );
        $omega_storefront_step = ( isset( $omega_storefront_atts['step'] ) ? $omega_storefront_atts['step'] : 1 );
        return ( $omega_storefront_min <= $omega_storefront_input && $omega_storefront_input <= $omega_storefront_max && is_int( $omega_storefront_input / $omega_storefront_step ) ? $omega_storefront_input : $omega_storefront_setting->default );
    }
endif;

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Omega_Storefront_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    public $notice = '';
    public $nonotice = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );
        $json['notice']  = esc_attr( $this->notice );
        $json['nonotice']  = esc_attr( $this->nonotice );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <# if ( data.notice ) { #>
                <h3 class="accordion-section-notice">
                    {{ data.title }}
                </h3>
            <# } #>

            <# if ( !data.notice ) { #>
                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            <# } #>
            
        </li>
    <?php }
}