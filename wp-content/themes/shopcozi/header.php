<?php 
/**
 * The header for the shopcozi theme
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Shopcozi
 * 
 * @since Shopcozi 0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php 
    if ( function_exists('wp_body_open') ) {
      wp_body_open();
    }else{
      do_action('wp_body_open');
    }
  ?>
  <?php do_action( 'shopcozi_site_before' ); ?>

	<div id="page" class="site">

  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content','shopcozi'); ?></a>
  
  <?php do_action( 'shopcozi_site_inner_before' ); ?>

	<?php do_action('shopcozi_header'); ?>

  <div id="content" class="content">

    <?php do_action( 'shopcozi_page_content_before' ); ?>