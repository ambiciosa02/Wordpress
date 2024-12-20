<?php

/* Remove hooks */
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

/* Add new hooks */

add_action('woocommerce_before_shop_loop_item_title', 'shopcozi_template_loop_product_thumbnail', 10);
add_action('woocommerce_shop_loop_item_title', 'shopcozi_template_loop_product_title', 20);
add_action('woocommerce_before_shop_loop_item_title', 'shopcozi_template_loop_product_label', 20);

// Product Image function
function shopcozi_template_loop_product_thumbnail(){
	$option = shopcozi_theme_options();
	global $product;
	$lazy_load = $option['shopcozi_woo_lazy_load'];
	$placeholder_img_src = $option['shopcozi_woo_placeholder_img'];
	
	$prod_galleries = $product->get_gallery_image_ids();
	
	$image_size = apply_filters('shopcozi_loop_product_thumbnail', 'woocommerce_thumbnail');
	
	$dimensions = wc_get_image_size( $image_size );
	
	$has_back_image = $option['shopcozi_woo_effect_product'];
	
	if( !is_array($prod_galleries) || ( is_array($prod_galleries) && count($prod_galleries) == 0 ) ){
		$has_back_image = false;
	}
	 
	if( wp_is_mobile() ){
		$has_back_image = false;
	}
	
	echo '<figure class="product_images ' . ($has_back_image?'has-back-image':'no-back-image') . '">';
	echo '<a href="' . esc_url( get_the_permalink() ) . '">';
		if( !$lazy_load ){
			echo woocommerce_get_product_thumbnail( $image_size );
			
			if( $has_back_image ){
				echo wp_get_attachment_image( $prod_galleries[0], $image_size, 0, array('class' => 'product-image-back') );
			}
		}
		else{
			$front_img_src = '';
			$alt = '';
			if( has_post_thumbnail( $product->get_id() ) ){
				$post_thumbnail_id = get_post_thumbnail_id($product->get_id());
				$image_obj = wp_get_attachment_image_src($post_thumbnail_id, $image_size, 0);
				if( isset($image_obj[0]) ){
					$front_img_src = $image_obj[0];
				}
				$alt = trim(strip_tags( get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true) ));
			}
			else{
				$front_img_src = wc_placeholder_img_src();
			}
			
			echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($front_img_src).'" class="attachment-shop_catalog wp-post-image sc-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
		
			if( $has_back_image ){
				$back_img_src = '';
				$alt = '';
				$image_obj = wp_get_attachment_image_src($prod_galleries[0], $image_size, 0);
				if( isset($image_obj[0]) ){
					$back_img_src = $image_obj[0];
					$alt = trim(strip_tags( get_post_meta($prod_galleries[0], '_wp_attachment_image_alt', true) ));
				}
				else{
					$back_img_src = wc_placeholder_img_src();
				}
				
				echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($back_img_src).'" class="product-image-back sc-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
			}
		}
	echo '</a>';
	echo '</figure>';
}

// Product Title function
function shopcozi_template_loop_product_title(){
	global $product;
	echo '<h2 class="product_title">';
		echo '<a href="' . esc_url($product->get_permalink()) . '">' . esc_html($product->get_title()) . '</a>';
	echo '</h2>';
}

// Product Label function
function shopcozi_template_loop_product_label(){
	global $product;
	$option = shopcozi_theme_options();
	?>
	<div class="product_label">
	<?php 
	if( $product->is_in_stock() ){
		/* New label */
		if( $option['shopcozi_woo_show_new_label'] ){
			$now = current_time( 'timestamp', true );
			$post_date = get_post_time('U', true);
			$num_day = (int)( ( $now - $post_date ) / ( 3600*24 ) );
			$num_day_setting = absint( $option['shopcozi_woo_show_new_label_time'] );
			if( $num_day <= $num_day_setting ){
				echo '<span class="onsale new">'.esc_html($option['shopcozi_woo_new_label_text']).'</span>';
			}
		}
		
		/* Sale label */
		if( $product->is_on_sale() ){
			if( $option['shopcozi_woo_show_sale_label_as'] != 'text' ){

				if( $product->get_type() == 'variable' ){
					$regular_price = $product->get_variation_regular_price('max');
					$sale_price = $product->get_variation_sale_price('min');
				}
				else{
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_price();
				}

				if( $regular_price ){
					if( $option['shopcozi_woo_show_sale_label_as'] == 'number' ){
						$_off_price = round($regular_price - $sale_price, wc_get_price_decimals());
						$price_display = '-' . sprintf(get_woocommerce_price_format(), get_woocommerce_currency_symbol(), $_off_price);
						echo '<span class="onsale amount" data-original="'.$price_display.'">'.$price_display.'</span>';
					}
					if( $option['shopcozi_woo_show_sale_label_as'] == 'percent' ){
						echo '<span class="onsale percent">-'.shopcozi_calc_discount_percent($regular_price, $sale_price).'%</span>';
					}
				}
			}
			else{
				echo '<span class="onsale">'.esc_html($option['shopcozi_woo_sale_label_text']).'</span>';
			}
		}
		
		/* Hot label */
		if( $product->is_featured() ){
			echo '<span class="onsale featured">'.esc_html($option['shopcozi_woo_feature_label_text']).'</span>';
		}
	}
	else{ /* Out of stock */
		echo '<span class="onsale out-of-stock">'.esc_html($option['shopcozi_product_out_of_stock_label_text']).'</span>';
	}
	?>
	</div>
	<?php
}

function shopcozi_calc_discount_percent($regular_price, $sale_price){
	return ( 1 - round($sale_price / $regular_price, 2) ) * 100;
}

/*************************************************************
* Custom group button on product (quickshop, wishlist, compare) 
* Begin tag: 	10000
* Wishlist:  	10001
* Quickshop: 	10002
* Compare:   	10003
* Add To Cart: 	10004
* End tag:   	10005
**************************************************************/

add_action('init', 'shopcozi_wrap_product_group_button', 20);
function shopcozi_wrap_product_group_button(){
	add_action('woocommerce_before_shop_loop_item_title', 'shopcozi_product_group_button_start', 10000 );
	add_action('woocommerce_before_shop_loop_item_title', 'shopcozi_product_group_button_end', 10005 );
}

function shopcozi_product_group_button_start(){	
	echo '<div class="product-group-button">';
}

function shopcozi_product_group_button_end(){
	echo '</div>';
}