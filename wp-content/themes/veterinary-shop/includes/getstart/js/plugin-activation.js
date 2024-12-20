jQuery(document).ready(function($) {
    'use strict';
    var veterinary_shop_this_obj = veterinary_shop_plugin_activate_plugin;

    $('#wpelemento_importer_editor .plugin-activation-redirect a').addClass('wpi-redirect-to-dashboard');

    $(document).on('click', '.veterinary-shop-plugin-install', function(event) {

        event.preventDefault();
        var button = $(this);
        var slug = button.data('slug');
        button.text(veterinary_shop_this_obj.installing + '...').addClass('updating-message');
        wp.updates.installPlugin({
            slug: slug,
            success: function(data) {
                button.attr('href', data.activateUrl);
                button.text(veterinary_shop_this_obj.activating + '...');
                button.removeClass('button-secondary updating-message veterinary-shop-plugin-install');
                button.addClass('button-primary veterinary-shop-plugin-activate');
                button.trigger('click');
            },
            error: function(data) {
                jQuery('.veterinary-shop-recommended-plugins .veterinary-shop-activation-note').css('display','block');
                //console.log('error', data);
                button.removeClass('updating-message');
                button.text(veterinary_shop_this_obj.error);
            },
        });
    });

    $(document).on('click', '.veterinary-shop-plugin-activate', function(event) {
        var redirect_class = jQuery(this).attr('class');
        var data_plugin = jQuery(this).attr('data-slug');

        let redirect_url = '#';
        if ( data_plugin == 'wpelemento-importer' ) {
          redirect_url = veterinary_shop_this_obj.addon_admin_url;
        } 

        event.preventDefault();
        var button = $(this);
        var url = button.attr('href');
        if (typeof url !== 'undefined') {
            // Request plugin activation.
            jQuery.ajax({
                async: true,
                type: 'GET',
                url: url,
                beforeSend: function() {
                    button.text(veterinary_shop_this_obj.activating + '...');
                    button.removeClass('button-secondary');
                    button.addClass('button-primary activate-now updating-message');
                },
                success: function(data) {
                    if(redirect_class.indexOf('wpi-redirect-to-dashboard') != -1){
                        location.href = redirect_url;
                    }else{
                        location.reload();
                    }
                }
            });
        }
    });

    jQuery('.wpelementoimpoter-dashboard-page-btn').click(function(){
        location.href = veterinary_shop_this_obj.wpelementoimpoter_admin_url;
    });
});
