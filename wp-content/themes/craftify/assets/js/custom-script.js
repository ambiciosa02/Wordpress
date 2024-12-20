(function ($){
	$(document).ready(function(){
		$( '.wc-block-product-gallery-large-image-next-previous--button' ).click(function(){
            setTimeout(function(){
                var src = $( '.wc-block-woocommerce-product-gallery-large-image__image--active-image-slide' ).attr( 'src' );

                $( '.wc-block-product-gallery-thumbnails__thumbnail' ).removeClass( 'selected' );
                $( '.wc-block-product-gallery-thumbnails__thumbnail' ).each( function(){
                    var ts = $( this ).find( 'img' ).attr( 'src' );
                    if( ts == src ){
                        $( this ).addClass( 'selected' );
                    }
                });

            }, 500);
        });

        function setDefaultSwatchActive() {
            $('.wc-booster-swatches-selector').each(function() {
                var $wrapper = $(this);
                var id = $wrapper.data('id');
                var defaultVal = $('#' + id).val();
                $wrapper.find('li').each(function() {
                    var $swatch = $(this).find('a');
                    if ($swatch.data('value') == defaultVal) {
                        $(this).addClass('selected');
                    }
                });
            });
        }

        setDefaultSwatchActive();

    });
})(jQuery);