<?php
// Yith WCWL
if ( defined( 'YITH_WCWL' ) && ! function_exists( 'shopcozi_yith_wcwl_ajax_update_count' ) ) {
 function shopcozi_yith_wcwl_ajax_update_count() {
  wp_send_json( array(
      'count' => yith_wcwl_count_all_products()
  ) );
 }
 add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'shopcozi_yith_wcwl_ajax_update_count' );
 add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'shopcozi_yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'shopcozi_yith_wcwl_enqueue_custom_script' ) ) {
 function shopcozi_yith_wcwl_enqueue_custom_script() {
  wp_add_inline_script(
      'jquery-yith-wcwl',
      "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.favorite_value').html( data.count );
            } );
          } );
        } );

        // Compare count add and remove function
        jQuery(document)
          .on( 'click', '.product a.compare:not(.added)', function(e){
            e.preventDefault();
                jQuery.ajax({
                    type: 'POST',
                    url: yith_woocompare.ajaxurl.toString().replace( '%%endpoint%%', 'yith_woocompare_add_count' ),
                    data: {
                      action: 'yith_woocompare_add_count'
                    },
                    dataType: 'json',
                    success: function(data){
                      jQuery('.compare_value').html(data);
                    }
                });
          })
          .on('click', '.yith-woocompare-widget li a.remove, .yith-woocompare-widget a.clear-all', function (e) {
            e.preventDefault();
            jQuery.ajax({
                  type: 'POST',
                  url: yith_woocompare.ajaxurl.toString().replace( '%%endpoint%%', 'yith_woocompare_update_count' ),
                  data: {
                    action: 'yith_woocompare_update_count'
                  },
                  dataType: 'json',
                  success: function(data){
                    jQuery('.compare_value').html(data);
                  }
              });
          });

      "
  );
 }
 add_action( 'wp_enqueue_scripts', 'shopcozi_yith_wcwl_enqueue_custom_script', 20 );
}

// End Yith WCWL

// YITH Compare button

function shopcozi_yith_woocompare_button( $button_text ){

    if(!is_single()){
      return '<i class="fa fa-exchange"></i>';
    }else{
      return $button_text;
    }
    
}
add_filter('wpml_translate_single_string','shopcozi_yith_woocompare_button');

function shopcozi_yith_woocompare_add_count(){
    global $yith_woocompare;
    echo count($yith_woocompare->obj->products_list) + 1;
    die();
}
add_filter('wc_ajax_yith_woocompare_add_count','shopcozi_yith_woocompare_add_count' );
add_filter('wc_ajax_nopriv_yith_woocompare_add_count','shopcozi_yith_woocompare_add_count' );

function shopcozi_yith_woocompare_update_count(){
    global $yith_woocompare;
    echo count($yith_woocompare->obj->products_list) - 1;
    die();
}
add_filter('wc_ajax_yith_woocompare_update_count','shopcozi_yith_woocompare_update_count' );
add_filter('wc_ajax_nopriv_yith_woocompare_update_count','shopcozi_yith_woocompare_update_count' );

// End YITH Compare button

/* Wishlist */

if( class_exists('YITH_WCWL') ){

  function shopcozi_add_wishlist_button_to_product_list(){
    echo '<div class="button-in wishlist">';
    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
    echo '</div>';
  }
  
  if( 'yes' == get_option( 'yith_wcwl_show_on_loop', 'no' ) ){
    add_action( 'woocommerce_after_shop_loop_item', 'shopcozi_add_wishlist_button_to_product_list', 75 );
    
    add_filter( 'yith_wcwl_loop_positions', '__return_empty_array' ); /* Remove button which added by plugin */
  }
  
  add_filter('yith_wcwl_add_to_wishlist_params', 'shopcozi_yith_wcwl_add_to_wishlist_params');
  function shopcozi_yith_wcwl_add_to_wishlist_params( $additional_params ){
    if( isset($additional_params['container_classes']) && $additional_params['exists'] ){
      $additional_params['container_classes'] .= ' added';
    }
    $additional_params['label'] = '<span class="sc-tooltip button-tooltip" data-title="'.esc_attr__('Add to wishlist', 'shopcozi').'">' . esc_html__('Wishlist', 'shopcozi') . '</span>';
    return $additional_params;
  }
  
  add_filter('yith_wcwl_browse_wishlist_label', 'shopcozi_yith_wcwl_browse_wishlist_label', 10, 2);
  function shopcozi_yith_wcwl_browse_wishlist_label( $text = '', $product_id = 0 ){
    if( $product_id ){
      return '<span class="sc-tooltip button-tooltip" data-title="'.esc_attr__('Add to wishlist', 'shopcozi').'">' . esc_html__('Wishlist', 'shopcozi') . '</span>';
    }
    return $text;
  }

  function shopcozi_yith_wcwl_add_to_wishlist_button_classes($classes){
    $classes = str_replace('button alt', '', $classes);
    return $classes;
  }
  add_filter('yith_wcwl_add_to_wishlist_button_classes', 'shopcozi_yith_wcwl_add_to_wishlist_button_classes', 20, 1);  
}

/* Compare */
if( class_exists('YITH_Woocompare') ){
  add_action('init', 'shopcozi_yith_compare_handle', 30);
  function shopcozi_yith_compare_handle(){
    global $yith_woocompare;
    $is_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX );
    if( $yith_woocompare->is_frontend() || $is_ajax ){
      if( get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ){
        if( $is_ajax ){
          if( defined('YITH_WOOCOMPARE_DIR') && !class_exists('YITH_Woocompare_Frontend') ){
            $compare_frontend_class = YITH_WOOCOMPARE_DIR . 'includes/class.yith-woocompare-frontend.php';
            if( file_exists($compare_frontend_class) ){
              require_once $compare_frontend_class;
            }
            $yith_woocompare->obj = new YITH_Woocompare_Frontend();
          }
        }
        remove_action( 'woocommerce_after_shop_loop_item', array( $yith_woocompare->obj, 'add_compare_link' ), 20 );
        add_action( 'woocommerce_after_shop_loop_item', 'shopcozi_add_compare_button_to_product_list', 80 );
      }
      
      add_filter( 'option_yith_woocompare_button_text', 'shopcozi_compare_button_text_filter', 99 );
    }
  }
  
  function shopcozi_add_compare_button_to_product_list(){
    global $yith_woocompare, $product;
    echo '<div class="button-in compare">';
    echo '<a class="compare" href="'.$yith_woocompare->obj->add_product_url( $product->get_id() ).'" data-product_id="'.$product->get_id().'">'.get_option('yith_woocompare_button_text').'</a>';
    echo '</div>';
  }
  
  function shopcozi_compare_button_text_filter( $button_text ){
    return '<span class="sc-tooltip button-tooltip" data-title="'.esc_attr__('Add to compare', 'shopcozi').'">'.esc_html($button_text).'</span>';
  }
}