<?php

if ( ! class_exists( 'cyn_hook' ) ) {
	class cyn_hook {

		function __construct() {
			add_filter( 'get_the_archive_title_prefix', '__return_false' );
		}
	}
}