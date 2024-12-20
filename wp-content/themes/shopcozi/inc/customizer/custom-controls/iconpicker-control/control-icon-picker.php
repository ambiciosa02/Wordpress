<?php
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Shopcozi_Iconpicker_Control extends WP_Customize_Control {

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			</label>
			<?php
		}

		/**
		 * Enqueue required scripts and styles.
		 */
		public function enqueue() {
			wp_enqueue_script( 'shopcozi-fontawesome-iconpicker', get_template_directory_uri() . '/inc/customizer/custom-controls/iconpicker-control/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'shopcozi-iconpicker-control', get_template_directory_uri() . '/inc/customizer/custom-controls/iconpicker-control/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );

			wp_enqueue_style( 'shopcozi-fontawesome-iconpicker', get_template_directory_uri() . '/inc/customizer/custom-controls/iconpicker-control/assets/css/fontawesome-iconpicker.min.css' );
			//wp_enqueue_style( 'shopcozi-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css' );
		}

	}
}