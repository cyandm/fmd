<?php

if ( ! class_exists( 'cyn_admin' ) ) {
	class cyn_admin {
		function __construct() {
			add_action( 'admin_enqueue_scripts', [ $this, 'cyn_add_admin_style' ] );
		}

		function cyn_add_admin_style() {
			wp_enqueue_style( 'cyn-admin-styles', get_template_directory_uri() . '/css/admin.css' );
		}
	}
}