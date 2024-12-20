<?php
/**
* Custom Functions.
*
* @package Omega Storefront
*/

if( !function_exists( 'omega_storefront_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function omega_storefront_sanitize_sidebar_option( $omega_storefront_input ){

        $omega_storefront_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $omega_storefront_input,$omega_storefront_metabox_options ) ){

            return $omega_storefront_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'omega_storefront_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function omega_storefront_sanitize_checkbox( $omega_storefront_checked ) {

		return ( ( isset( $omega_storefront_checked ) && true === $omega_storefront_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'omega_storefront_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function omega_storefront_sanitize_select( $omega_storefront_input, $omega_storefront_setting ) {
        $omega_storefront_input = sanitize_text_field( $omega_storefront_input );
        $omega_storefront_choices = $omega_storefront_setting->manager->get_control( $omega_storefront_setting->id )->choices;
        return ( array_key_exists( $omega_storefront_input, $omega_storefront_choices ) ? $omega_storefront_input : $omega_storefront_setting->default );
    }

endif;