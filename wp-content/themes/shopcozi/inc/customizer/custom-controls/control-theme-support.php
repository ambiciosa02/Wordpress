<?php
class Shopcozi_Theme_Support extends WP_Customize_Control{
    public function render_content() {

        printf(sprintf(__('Upgrade to <a href="%1$s">%2$S</a> to be able to change the section order and styling!','shopcozi'),
            esc_url('https://www.britetechs.com/theme/shopcozi-pro/'),
            'Shopcozi Pro'
        ));
    }
}