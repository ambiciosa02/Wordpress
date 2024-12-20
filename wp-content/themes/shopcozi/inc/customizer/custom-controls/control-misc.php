<?php
class Shopcozi_Misc_Control extends WP_Customize_Control{

    public $settings = 'blogname';
    public $description = '';
    public $group = '';

    public function render_content() {

        switch ( $this->type ) {
            default:
            case 'heading':
                echo '<span class="customize-control-title">'.$this->label.'</span>';
                break;
            case 'custom_message' :
                echo '<p class="description">'.$this->description.'</p>';
                break;
            case 'hr' :
                echo '<hr/>';
                break;
        }
    }
}