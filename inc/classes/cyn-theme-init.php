<?php

if ( ! class_exists( 'cyn-theme-init' ) ) {
	class cyn_theme_init {


		private $deploy, $ver;
		function __construct( $deploy = false, $ver = '0.0.0' ) {
			$this->deploy = $deploy;
			$this->ver = $ver;

			add_action( 'init', [ $this, 'cyn_theme_init' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'cyn_enqueue_files' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'cyn_admin_files' ] );
			add_action( 'wp_logout', [ $this, 'cyn_logout_user' ] );
			add_action( 'after_setup_theme', [ $this, 'cyn_theme_setup' ] );
			add_action( 'wp_head', [ $this, 'cyn_enqueue_head' ] );

			add_filter( 'wp_check_filetype_and_ext', [ $this, 'cyn_allow_svg' ], 10, 4 );
			add_filter( 'upload_mimes', [ $this, 'cyn_mime_types' ] );
			add_filter( 'wp_mail', [ $this, 'email_filter' ], 10, 1 );
		}


		public function cyn_enqueue_files() {

			wp_enqueue_style( 'cyn-style', get_stylesheet_directory_uri() );

			if ( $this->deploy ) {
				wp_enqueue_style( 'cyn-compiled', get_stylesheet_directory_uri() . '/assets/css/final.css', [], $this->ver );
				wp_enqueue_script( 'cyn-global', get_stylesheet_directory_uri() . '/assets/js/dist/scripts.bundle.min.js', [ 'jquery' ], $this->ver, true );

			} else {
				wp_enqueue_style( 'cyn-compiled', get_stylesheet_directory_uri() . '/assets/css/compiled.css' );
				wp_enqueue_script( 'cyn-global', get_stylesheet_directory_uri() . '/assets/js/dist/scripts.bundle.js', [ 'jquery' ], false, true );
			}

			wp_dequeue_style( 'wp-block-library' );

			wp_dequeue_script( 'global-styles' );
		}

		public function cyn_remove_unneccesaries() {
			// REMOVE WP EMOJI
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );

			remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
			remove_action( 'wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles' );
			remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
		}

		public function cyn_admin_files() {
			wp_enqueue_style( 'cyn-admin', get_stylesheet_directory_uri() . '/css/admin.css' );
		}

		public function cyn_logout_user() {
			wp_redirect( home_url() );
			exit();
		}

		public function cyn_theme_setup() {
			add_theme_support( 'custom-logo' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'automatic-feed-links' );

			register_nav_menus( [ 
				'header' => 'Header',
				'footer-us' => 'Footer | Us',
				'footer-what-we-do' => 'Footer | What We Do?',
				'footer-know-more' => 'Footer | Know More'
			] );
		}

		public function cyn_theme_init() {
			add_filter( 'use_block_editor_for_post', '__return_false' );
			add_filter( 'login_errors', function () {
				return null;
			} );
			$this->cyn_remove_unneccesaries();
		}

		public function cyn_allow_svg( $data, $file, $filename, $mimes ) {
			$filetype = wp_check_filetype( $filename, $mimes );

			return [ 
				'ext' => $filetype['ext'],
				'type' => $filetype['type'],
				'proper_filename' => $data['proper_filename']
			];

		}

		public function cyn_mime_types( $mimes ) {
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}

		public function cyn_enqueue_head() {
			echo "<script>";
			echo "
				var cyn_head_script = {
					url: '" . admin_url( 'admin-ajax.php' ) . "',
					nonce: '" . wp_create_nonce( 'ajax-nonce' ) . "'
				}
			";
			echo "</script>";
		}

		public function email_filter( $args ) {
			add_filter( 'wp_mail_content_type', function () {
				return "text/html";
			} );
		}


	}
}