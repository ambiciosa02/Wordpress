<?php
function home_decor_shop_premium_setting( $wp_customize ) {
	
	/*=========================================
	Page Layout Settings Section
	=========================================*/
	$wp_customize->add_section(
        'upgrade_premium',
        array(
            'title' 		=> __('Upgrade to Pro','home-decor-shop'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	Add Buttons
	=========================================*/
	
	class Home_Decor_Shop_WP_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'upgrade_premium';

	   function render_content() {
		?>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Upgrade to Pro','home-decor-shop' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( HOME_DECOR_SHOP_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo','home-decor-shop' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( HOME_DECOR_SHOP_DOCS_FREE ); ?>" target="_blank"><?php esc_html_e( 'Free Documentation','home-decor-shop' ); ?> </a></li>
				</ul>
			</div>
			<div class="premium_info discount-box">
				<ul>
					<li class="discount-text"><?php esc_html_e( 'Special Discount of 35% Use Code “winter35”','home-decor-shop' ); ?></li>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( HOME_DECOR_SHOP_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Wordpress Theme Bundle','home-decor-shop' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting('premium_info_buttons', array(
	   'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'home_decor_shop_sanitize_text',
	));
		
	$wp_customize->add_control( new Home_Decor_Shop_WP_Button_Customize_Control( $wp_customize, 'premium_info_buttons', array(
		'section' => 'upgrade_premium',
    ))
);
}
add_action( 'customize_register', 'home_decor_shop_premium_setting' );