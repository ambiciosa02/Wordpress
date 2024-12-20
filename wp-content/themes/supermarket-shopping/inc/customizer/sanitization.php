<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Supermarket Shopping
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

function supermarket_shopping_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/* Sanitization Text*/
function supermarket_shopping_sanitize_text( $text ) {
	return wp_filter_post_kses( $text );
}

function supermarket_shopping_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function supermarket_shopping_sanitize_select( $input, $setting ) {
  $input = sanitize_key( $input );
  $choices = $setting->manager->get_control( $setting->id )->choices;
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function supermarket_shopping_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function supermarket_shopping_sanitize_phone_number( $phone ) {
    return preg_replace( '/[^\d+]/', '', $phone );
}

// Sanitization callback function for logo width
function supermarket_shopping_sanitize_logo_width($input) {
  $input = absint($input); // Convert to integer
  // Ensure the value is between 1 and 150
  return ($input >= 1 && $input <= 300) ? $input : 150; // Default to 270 if out of range
}

function supermarket_shopping_sanitize_copyright_position( $input ) {
  $valid = array( 'right', 'left', 'center' );

  if ( in_array( $input, $valid, true ) ) {
      return $input;
  } else {
      return 'right';
  }
}