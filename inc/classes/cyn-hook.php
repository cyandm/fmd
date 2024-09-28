<?php

if ( ! class_exists( 'cyn_hook' ) ) {
	class cyn_hook {

		function __construct() {
			add_filter( 'get_the_archive_title_prefix', '__return_false' );
			add_filter( 'excerpt_length', [ $this, 'cyn_custom_excerpt_length' ] );


		}


		public function cyn_custom_excerpt_length( $length ) {
			return 5;
		}
	}
}