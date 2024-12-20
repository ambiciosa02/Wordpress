(function($) {
    "use strict";

    jQuery(document).ready(function(){
        jQuery(".select2-container").addClass("elementor-field-textual");

        $('.opener').click(function(e) {
            e.preventDefault();
          
            let $this = $(this);
          
            if ($this.next().hasClass('show')) {
                $this.next().removeClass('show');
                $this.next().slideUp(350);
            } else {
                $this.parent().parent().find('li ul').removeClass('show');
                $this.parent().parent().find('li ul').slideUp(350);
                $this.next().toggleClass('show');
                $this.next().slideToggle(350);
            }
        });
    });

    jQuery(document).on('change','.select2-hidden-accessible',function(){
        jQuery(".select2-container").addClass("elementor-field-textual");
    });

    jQuery(document).on('click', '.site-navigation .wp-mobile-toggle-wrap', function(){
        if ( ! jQuery(this).hasClass('wp-mobile-toggle-open') ){
            jQuery(this).addClass('wp-mobile-toggle-open');
            jQuery(this).next().slideDown('slow');
        }else {
            jQuery(this).removeClass('wp-mobile-toggle-open');
            jQuery(this).next().slideUp('slow');
        }
    });
    function tmpcoder_menu_toggle_action(){
        jQuery('.site-navigation .wp-mobile-toggle-wrap').removeClass('wp-mobile-toggle-open');
        jQuery('.wp-default-primary-menu .page_item_has_children').each(function(){
            jQuery(this).find('> ul').attr('style','');
        });
        if ( jQuery(window).width() >= 1024 ){
            jQuery('.site-navigation .wp-mobile-toggle-wrap').next().show();
        }else{
            jQuery('.site-navigation .wp-mobile-toggle-wrap').next().hide();
            
        }
    }
    jQuery(document).ready(function(){
        tmpcoder_menu_toggle_action();
    });
    jQuery(window).resize(function(){
        tmpcoder_menu_toggle_action();
    });
    jQuery('.page_item_has_children').each(function(){
        jQuery(this).find('> a').after('<span class="opener"></span>');
    });
})(jQuery);

/*---- Preloader Start -----*/
jQuery(window).on("load", function() {
  "use strict";
    // Preloader
    jQuery('#preloader').delay(350).fadeOut('slow');
});
 /*---- Preloader End -----*/