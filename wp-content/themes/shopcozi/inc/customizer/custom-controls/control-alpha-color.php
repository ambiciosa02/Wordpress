<?php
class Shopcozi_Alpha_Color_Control extends WP_Customize_Control{

    public $type = 'alpha-color';
    public $palette;
    public $show_opacity;
    public function enqueue() {
    }

    public function render_content() {
        if ( is_array( $this->palette ) ) {
            $palette = implode( '|', $this->palette );
        } else {

            $palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
        }

        $show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
        ?>
        <label>
            <?php
            if ( isset( $this->label ) && '' !== $this->label ) {
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
            }
            if ( isset( $this->description ) && '' !== $this->description ) {
                echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
            } ?>
            <input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
        </label>
    <?php
    }
}