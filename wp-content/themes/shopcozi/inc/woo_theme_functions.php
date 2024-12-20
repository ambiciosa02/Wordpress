<?php
function shopcozi_add_to_cart_fragment( $fragments ) {
           global $woocommerce;
   
           $cart_value = sprintf ( __( '<span class="count_value cart_value">%d</span>', 'shopcozi'), WC()->cart->get_cart_contents_count() );
           $cart_inner_tag = sprintf('<a class="cart-total" href="%1$s" title="%2$s"><i class="fa-solid fa-cart-shopping"></i>%3$s</a>',
                           esc_url( wc_get_cart_url() ),
                           esc_attr('View cart', 'shopcozi'),
                          $cart_value
                  );
  
          ob_start();
          echo $cart_inner_tag;
          $fragments['.cart-total'] = ob_get_clean();

          return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'shopcozi_add_to_cart_fragment' ); 

function shopcozi_mini_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();
    ?>
    <div class="shopping_cart">
      <?php get_template_part('woocommerce/cart/mini','cart'); ?>
    </div>
    <?php
    $fragments['.shopping_cart'] = ob_get_clean();
    return $fragments;
} 
add_filter( 'woocommerce_add_to_cart_fragments', 'shopcozi_mini_cart_fragment' );