<?php
namespace Craftify;
if( !class_exists( 'Helper' ) ){

	class Helper{

		public function get_uri( $p ){
			return get_template_directory_uri() . '/' . $p;
		}

		public function get_path( $p ){
			return get_template_directory() . '/' . $p;
		}

		public function get_version(){
			return wp_get_theme()->get( 'Version' );
		}
	}
}