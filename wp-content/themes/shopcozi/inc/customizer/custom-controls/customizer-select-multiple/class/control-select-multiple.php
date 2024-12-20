<?php
define( 'Shopcozi_Multiselect_Version', '1.0.0' );
class Shopcozi_Multiselect_Control extends WP_Customize_Control {
	
	public $type = 'select-multiple';
	public $custom_class = '';

	public function __construct( WP_Customize_Manager $manager, $id, array $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( array_key_exists( 'custom_class', $args ) ) {
			$this->custom_class = esc_attr( $args['custom_class'] );
		}
	}

	public function enqueue() {
		wp_enqueue_script( 'customizer-select-multiple',get_template_directory_uri() . '/inc/customizer/custom-controls/customizer-select-multiple/js/script-customizer-select-multiple.js',array('jquery'),Shopcozi_Multiselect_Version,true);
	}
	
	public function json() {
		$json                 = parent::json();
		$json['choices']      = $this->choices;
		$json['link']         = $this->get_link();
		$json['value']        = (array) $this->value();
		$json['id']           = $this->id;
		$json['custom_class'] = $this->custom_class;

		return $json;
	}

	public function content_template() {
	?>
		<#
		if ( ! data.choices ) {
			return;
		} #>

		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<#
			var custom_class = ''
			if ( data.custom_class ) {
				custom_class = 'class='+data.custom_class
			} #>
			<select multiple="multiple" {{{ data.link }}} {{ custom_class }}>
				<# _.each( data.choices, function( label, choice ) {
					var selected = data.value.includes( choice.toString() ) ? 'selected="selected"' : ''
					#>
					<option value="{{ choice }}" {{ selected }} >{{ label }}</option>
				<# } ) #>
			</select>
		</label>
		<?php
	}
}