<?php

if ( !class_exists( 'Shopcozi_CSS' ) ) :

	class Shopcozi_CSS {
		
		protected $_selector = '';
	
		protected $_selector_output = '';
		
		protected $_css = '';
		
		protected $_output = '';
		
		protected $_media_query = null;
		
		protected $_media_query_output = '';

		public function set_selector( $selector = '' ) {
			if( $this->_selector !== '' ){
				$this->add_selector_rules_to_output();
			}
			$this->_selector = $selector;
			return $this;
		}

		public function add_property( $property, $value, $og_default = false, $unit = false ) {
			
			if ( $unit && '' !== $unit ) {
				$value = $value . $unit;
				if ( '' !== $og_default ) {
					$og_default = $og_default . $unit;
				}
			}
			
			if ( empty( $value ) || $og_default == $value )
				return false;
			
			$this->_css .= $property . ':' . $value . ';';
			return $this;
		}
		
		public function start_media_query( $value ) {
			
			$this->add_selector_rules_to_output();
			
			
			if ( ! empty( $this->_media_query ) ) {
				$this->add_media_query_rules_to_output();
			}
			
			$this->_media_query = $value;
			return $this;
		}
		
		public function stop_media_query() {
			return $this->start_media_query( null );
		}
		
		private function add_media_query_rules_to_output() {
			if( !empty( $this->_media_query_output ) ) {
				$this->_output .= sprintf( '@media %1$s{%2$s}', $this->_media_query, $this->_media_query_output );
				
				$this->_media_query_output = '';
			}
			return $this;
		}
		
		private function add_selector_rules_to_output() {
			if( !empty( $this->_css ) ) {
				$this->_selector_output = $this->_selector;
				$selector_output = sprintf( '%1$s{%2$s}', $this->_selector_output, $this->_css );
				
				if ( ! empty( $this->_media_query ) ) {
					$this->_media_query_output .= $selector_output;
					$this->_css = '';
				} else {
					$this->_output .= $selector_output;
				}

				$this->_css = '';
			}

			return $this;
		}

		public function css_output()
		{
			$this->add_selector_rules_to_output();
			return $this->_output;
		}

	}

endif;