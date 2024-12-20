<?php
class Shopcozi_Editor_Custom_Control extends WP_Customize_Control{

    public $type = 'wp_editor';
    public $mod;

    public function render_content() {

        $this->mod = strtolower( $this->mod );
        
        if( ! $this->mod = 'html' ) {
            $this->mod = 'tmce';
        }
        ?>
        <div class="wp-js-editor">
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            </label>
            <textarea class="wp-js-editor-textarea large-text" data-editor-mod="<?php echo esc_attr( $this->mod ); ?>" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            <p class="description"><?php echo $this->description ?></p>
        </div>
    <?php
    }
}