<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Veterinary Shop
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>
<?php if(get_theme_mod('veterinary_shop_preloader_hide', false )){ ?>
	<div class="loader">
		<div class="preloader">
			<div class="diamond">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
<?php } ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'veterinary-shop' ); ?></a>

<div class="main-header">
	<div class="top-header py-2 text-center">
		<div class="container">
			<?php if ( get_theme_mod('veterinary_shop_header_advertisement_text') ) : ?>
				<p class="mb-0"><i class="fa-solid fa-volume-high me-3"></i><?php echo esc_html( get_theme_mod('veterinary_shop_header_advertisement_text' ) ); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<header id="site-navigation" class="header text-center px-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-12 align-self-center text-center text-md-start">
					<div class="logo text-start mb-3 mb-md-0">
						<div class="logo-image text-center">
							<?php the_custom_logo(); ?>
						</div>
						<div class="logo-content text-center">
							<?php
								if ( get_theme_mod('veterinary_shop_display_header_title', true) == true ) :
									echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
									echo esc_attr(get_bloginfo('name'));
									echo '</a>';
								endif;
								if ( get_theme_mod('veterinary_shop_display_header_text', false) == true ) :
									echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
								endif;
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-7 col-md-6 col-6 align-self-center">
					<button class="menu-toggle my-1 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
						<span aria-hidden="true"><i class="fa-solid fa-bars"></i></span>
					</button>
					<nav id="main-menu" class="close-panal">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'container' => 'false'
							));
						?>
						<button class="close-menu my-2 p-2" type="button">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
						</button>
					</nav>
				</div>
				<div class="col-lg-2 col-md-2 col-6 align-self-center text-right d-flex justify-content-around align-items-center">
					<?php if ( get_theme_mod('veterinary_shop_search_enable', 'on' ) == true ) : ?>
						<div class="search-cont py-2">
							<button type="button" class="search-cont-button"><i class="fas fa-search"></i></button>
						</div>
						<div class="outer-search">
							<div class="inner-search">
								<?php get_search_form(); ?>
							</div>
							<button type="button" class="closepop search-cont-button-close" >X</button>
						</div>
					<?php endif; ?>
					<?php if ( get_theme_mod('veterinary_shop_header_button_url')) : ?>
						<div class="wishlist-btn">
							<a href="<?php echo esc_url( get_theme_mod('veterinary_shop_header_button_url' ) ); ?>"><i class="fa-solid fa-heart"></i></a>
						</div>
					<?php endif; ?>	
					<div class="my-cart">
						<?php if ( class_exists( 'woocommerce' ) ) {?>
							<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','veterinary-shop' ); ?>"><i class="fa-solid fa-cart-shopping me-1"></i></a>
						<?php }?>
					</div>
				</div>
			</div>	
		</div>
	</header>
</div>