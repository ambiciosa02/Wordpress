<!-- Start: Header
============================= -->
<?php

$home_decor_shop_header_btn_text = get_theme_mod('home_decor_shop_header_btn_text');
$home_decor_shop_header_btn_link = get_theme_mod('home_decor_shop_header_btn_link');
$home_decor_shop_header_myaccount_feild = get_theme_mod('home_decor_shop_header_myaccount_feild');
$home_decor_shop_header_wishlist_feild = get_theme_mod('home_decor_shop_header_wishlist_feild');
$home_decor_shop_header_timer_text_feild = get_theme_mod('home_decor_shop_header_timer_text_feild');
$home_decor_shop_header_timer_feild = get_theme_mod('home_decor_shop_header_timer_feild');

?>
<?php if ( true == get_theme_mod( 'home_decor_shop_top_header_display_setting', 'on' ) ) : ?>
<div id="header-top">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 align-self-center">
         	<ul>
         		<?php if ( ! empty( $home_decor_shop_header_myaccount_feild ) ) : ?>
						<li><span class="dashicons dashicons-admin-users me-1"></span><a href="<?php echo esc_url( $home_decor_shop_header_myaccount_feild ); ?>"><?php echo esc_html('My Account','home-decor-shop' ); ?></a></li>
					<?php endif; ?>
         	</ul>
         </div>
         <div class="col-lg-4 col-md-4 align-self-center text-center">
				<div class="logo main">
					<?php if ( function_exists( 'home_decor_shop_logo_title_description' ) ) : home_decor_shop_logo_title_description(); endif; ?>
				</div>
         </div>
         <div class="col-lg-4 col-md-4 align-self-center text-md-end text-center">
         	<ul>
         		<?php if ( ! empty( $home_decor_shop_header_wishlist_feild ) ) : ?>
						<li class="me-4"><span class="dashicons dashicons-heart me-1"></span><a href="<?php echo esc_url( $home_decor_shop_header_wishlist_feild ); ?>"><?php echo esc_html('Wishlist','home-decor-shop' ); ?></a></li>
					<?php endif; ?>
         	
					<?php if ( class_exists( 'woocommerce' ) ) {?>
						<li><a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','home-decor-shop' ); ?>"><span class="dashicons dashicons-cart me-1"></span><?php esc_html_e('Cart','home-decor-shop'); ?> ( <span class="cart-item-box"><?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span> )</a><li>
					<?php }?>
				</ul>
         </div>
      </div>
   </div>
</div>
<?php endif; ?>

<header id="header" role="banner" style="background-image: url( <?php header_image(); ?> ); background-size: 100%;">
	<div class="navbar-area <?php echo esc_attr(home_decor_shop_sticky_header()); ?> normal-h py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 align-self-center mb-3 mb-md-0">
					<?php if ( ! empty( $home_decor_shop_header_timer_feild ) ) : ?>
             		<div id="countdown-timer">
             			<?php if ( ! empty( $home_decor_shop_header_timer_text_feild ) ) : ?>
								<p class="mb-0 me-2"><?php echo esc_html( $home_decor_shop_header_timer_text_feild ); ?></p>
							<?php endif; ?>
		               <input type="hidden" name="new-year-date" id="new-year-date" value="<?php echo esc_attr( $home_decor_shop_header_timer_feild ); ?>">
			            <div class="time-box me-2"><strong id="days" class="bold-number">118 </strong> <p class="slim-countdown-text mb-0"><?php esc_html_e('D','home-decor-shop'); ?></p><span class="timer"></span></div>
			            <div class="time-box me-2"><strong id="hours" class="bold-number"> 14 </strong> <p class="slim-countdown-text mb-0"><?php esc_html_e('H','home-decor-shop'); ?></p><span class="timer"></span></div>
			            <div class="time-box me-2"><strong id="mins" class="bold-number"> 36 </strong> <p class="slim-countdown-text mb-0"><?php esc_html_e('M','home-decor-shop'); ?></p><span class="timer"></span></div>
			            <div class="time-box"><strong id="seconds" class="bold-number"> 24 </strong> <p class="slim-countdown-text mb-0"><?php esc_html_e('S','home-decor-shop'); ?></p><span class="timer"></span></div>
             		</div>
              	<?php endif; ?>
				</div>
				<div class="col-lg-6 col-md-3 col-4 align-self-center">
					<div class="toggle-menu gb_menu text-md-start">
						<button onclick="home_decor_shop_navigation_open()" class="gb_toggle p-2"><p class="mb-0"><?php esc_html_e('Menu','home-decor-shop'); ?></p></button>
					</div>
					<div id="gb_responsive" class="nav side_gb_nav">
						<nav id="top_gb_menu" class="gb_nav_menu" role="navigation" aria-label="<?php esc_attr_e( 'Menu', 'home-decor-shop' ); ?>">
							<?php 
							    wp_nav_menu( array( 
									'theme_location' => 'primary_menu',
									'container_class' => 'gb_navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav mb-0 px-0">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
							    ) ); 
							?>
							<a href="javascript:void(0)" class="closebtn gb_menu" onclick="home_decor_shop_navigation_close()">x<span class="screen-reader-text"><?php esc_html_e('Close Menu','home-decor-shop'); ?></span></a>
						</nav>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-8 align-self-center text-md-end text-center">
					<?php if ( ! empty( $home_decor_shop_header_btn_text ) ||  ! empty( $home_decor_shop_header_btn_link )) : ?>
						<div class="btn">
							<a href="<?php echo esc_url( $home_decor_shop_header_btn_link ); ?>"><?php echo esc_html( $home_decor_shop_header_btn_text ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>