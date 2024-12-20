<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Own_Shop_Rating_Notice {
    private $past_date;

    public function __construct() {
        $this->past_date = false == get_option('own_shop_maybe_later_time') ? strtotime( '-5 days' ) : strtotime('-15 days');

        if ( current_user_can('administrator') ) {
            if ( empty(get_option('own_shop_rating_dismiss_notice')) && empty(get_option('own_shop_rating_already_rated')) ) {
                add_action( 'admin_init', [$this, 'own_shop_check_theme_install_time'] );
            }
        }

        if ( is_admin() ) {
            add_action( 'admin_head', [$this, 'own_shop_enqueue_scripts' ] );
        }

        add_action( 'wp_ajax_own_shop_rating_dismiss_notice', [$this, 'own_shop_rating_dismiss_notice'] );
        add_action( 'wp_ajax_own_shop_rating_already_rated', [$this, 'own_shop_rating_already_rated'] );
        add_action( 'wp_ajax_own_shop_rating_maybe_later', [$this, 'own_shop_rating_maybe_later'] );
    }

    public function own_shop_check_theme_install_time() {   
        $install_date = get_option('own_shop_activation_time');

        if ( false !== $install_date && $this->past_date >= $install_date ) {
            add_action( 'admin_notices', [$this, 'own_shop_render_rating_notice' ]);
        }
    }

    public function own_shop_rating_maybe_later() {
        update_option('own_shop_maybe_later_time', true);
        update_option('own_shop_activation_time', strtotime('now'));
    }
    
    public function own_shop_rating_dismiss_notice() {
        update_option( 'own_shop_rating_dismiss_notice', true );
    }

    function own_shop_rating_already_rated() {    
        update_option( 'own_shop_rating_already_rated' , true );
    }

    public function own_shop_render_rating_notice() {
        if ( is_admin() ) {

            echo '<div class="notice own-shop-rating-notice is-dismissible" style="border-left-color: #0073aa!important; display: flex; align-items: center;">
                        <div class="own-shop-rating-notice-logo">
                        <img class="own-shop-logo" src="'.get_theme_file_uri().'/inc/activation/img/logo-spiracle.png">
                        </div>
                        <div>
                            <h3>Thank you for using Own Shop WordPress Theme to build this website!</h3>
                            <p>Could you please do us a BIG favor and give it a 5-star rating on WordPress? Just to help us spread the word and boost our motivation.</p>
                            <p>
                                <a href="https://wordpress.org/support/theme/own-shop/reviews/?filter=5" target="_blank" class="own-shop-you-deserve-it button button-primary">OK, you deserve it!</a>
                                <a class="own-shop-maybe-later"><span class="dashicons dashicons-clock"></span> Maybe Later</a>
                                <a class="own-shop-already-rated"><span class="dashicons dashicons-yes"></span> I Already did</a>
                            </p>
                        </div>
                </div>';
        }
    }

    public function own_shop_enqueue_scripts() { 
        echo "
        <script>
        jQuery( document ).ready( function() {

            jQuery(document).on( 'click', '.own-shop-rating-notice .notice-dismiss', function(e) {
                e.preventDefault();
                jQuery(document).find('.own-shop-rating-notice').slideUp();
                jQuery.post({
                    url: ajaxurl,
                    data: {
                        action: 'own_shop_rating_dismiss_notice',
                    }
                })
            });

            jQuery(document).on( 'click', '.own-shop-maybe-later', function() {
                jQuery(document).find('.own-shop-rating-notice').slideUp();
                jQuery.post({
                    url: ajaxurl,
                    data: {
                        action: 'own_shop_rating_maybe_later',
                    }
                })
            });
        
            jQuery(document).on( 'click', '.own-shop-already-rated', function() {
                jQuery(document).find('.own-shop-rating-notice').slideUp();
                jQuery.post({
                    url: ajaxurl,
                    data: {
                        action: 'own_shop_rating_already_rated',
                    }
                })
            });
        });
        </script>

        <style>
            .own-shop-rating-notice {
              padding: 0 15px;
            }

            .own-shop-rating-notice-logo {
                margin-right: 20px;
                width: 100px;
                height: 100px;
            }

            .own-shop-rating-notice-logo img {
                max-width: 100%;
            }

            .own-shop-rating-notice h3 {
              margin-bottom: 0;
            }

            .own-shop-rating-notice p {
              margin-top: 3px;
              margin-bottom: 15px;
            }

            .own-shop-already-rated,
            .own-shop-maybe-later {
              text-decoration: none;
              margin-left: 12px;
              font-size: 14px;
              cursor: pointer;
            }

            .own-shop-already-rated .dashicons,
            .own-shop-maybe-later .dashicons {
              vertical-align: sub;
            }

            .own-shop-logo {
                height: 100%;
                width: auto;
            }

        </style>
        ";
    }
}

new Own_Shop_Rating_Notice();