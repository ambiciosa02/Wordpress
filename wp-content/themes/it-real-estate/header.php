<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IT_Residence
 */
if (!defined('ABSPATH')) {
    exit('No direct access allowed!');
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'it-real-estate' ); ?></a>
    <header id="masthead" class="site-header default">
        <?php itre_get_top_bar(); ?>
        
        <div id="header-image">
            <?php
                itre_hero_area();
                if (is_front_page() || is_post_type_archive('property')) {
                    itre_property_filter_form();
                }
            ?>
        </div>
    </header><!-- #masthead -->
	<?php do_action('itre_after_header'); ?>
	<div id="content">
