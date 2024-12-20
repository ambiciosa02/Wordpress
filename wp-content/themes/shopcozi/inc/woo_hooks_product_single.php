<?php 

/* Single Product Remove hooks */
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);

/* Single Product Add new hooks */
add_action('woocommerce_single_product_summary', 'shopcozi_single_product_group_button_start', 31);
add_action('woocommerce_single_product_summary', 'shopcozi_single_product_group_button_end', 36);

add_action('woocommerce_single_product_summary','shopcozi_before_price_tag_open',11);
add_action('woocommerce_single_product_summary','woocommerce_template_single_price',12);
add_action('woocommerce_single_product_summary','shopcozi_after_price_tag_close',16);

/*************************************************************
* Group button on single product (wishlist, compare, ask about product)
* Begin tag: 31
* Wishlist: 31
* Compare: 35
* Ask about product: 40
* End tag: 41
*************************************************************/
function shopcozi_single_product_group_button_start(){
?>
<div class="single-product-buttons">
<?php
}

function shopcozi_single_product_group_button_end(){
?>
</div>
<?php
}

/*************************************************************
* Group price on single product (price, countdown)
* Begin tag: 11
* Price: 12
* Countdown: 15
* End tag: 16
*************************************************************/
function shopcozi_before_price_tag_open(){
  echo '<div class="sc_price_wrapper">';
}

function shopcozi_after_price_tag_close(){
  echo '</div>';
}