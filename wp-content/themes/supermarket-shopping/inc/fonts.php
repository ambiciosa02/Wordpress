<?php

/*
 * Props to the BLDR Theme: https://wordpress.org/themes/bldr/
 * */

function supermarket_shopping_custom_styles($supermarket_shopping_custom) {


	//Fonts

	$supermarket_shopping_headings_font = esc_html(get_theme_mod('supermarket_shopping_headings_text'));

	$supermarket_shopping_body_font = esc_html(get_theme_mod('supermarket_shopping_body_text'));

	if ( $supermarket_shopping_headings_font ) {

		$supermarket_shopping_font_pieces = explode(":", $supermarket_shopping_headings_font);

		$supermarket_shopping_custom .= "h1, h2, h3, h4, h5, h6 { font-family: {$supermarket_shopping_font_pieces[0]}; }"."\n";

	}

	if ( $supermarket_shopping_body_font ) {

		$supermarket_shopping_font_pieces = explode(":", $supermarket_shopping_body_font);

		$supermarket_shopping_custom .= "body, button, input, select, textarea { font-family: {$supermarket_shopping_font_pieces[0]} !important; }"."\n";

	}

	//Output all the styles

	wp_add_inline_style( 'supermarket-shopping-style', $supermarket_shopping_custom );

}

add_action( 'wp_enqueue_scripts', 'supermarket_shopping_custom_styles' );


//Sanitizes Fonts
function supermarket_shopping_sanitize_fonts( $input ) {
	$supermarket_shopping_valid = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	if ( array_key_exists( $input, $supermarket_shopping_valid ) ) {
		return $input;
	} else {
		return '';
	}
}