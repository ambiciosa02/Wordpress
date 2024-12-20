<?php
function shopcozi_for_plus( $wp_customize ){
		$wp_customize->register_section_type( 'Shopcozi_Section_Plus' );
		$wp_customize->add_section( new Shopcozi_Section_Plus( $wp_customize, 'plus-shopcozi' , array(
			'title'    => esc_html__( 'Upgrade To Pro', 'shopcozi' ),
			'plus_text' => esc_html__( 'Click Here', 'shopcozi' ),
			'plus_url'  => 'https://www.britetechs.com/theme/shopcozi-pro/',
			'priority'     => 42,
		) ) );
}

if(SHOPCOZI_THEME_NAME=="Shopcozi"){
	add_action( 'customize_register', 'shopcozi_for_plus' );
}