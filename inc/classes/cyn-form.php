<?php

if ( ! class_exists( 'cyn_form' ) ) {
	class cyn_form {
		function __construct() {
			add_action( 'wp_ajax_send_contact_us_form', [ $this, 'cyn_send_form' ] );
			add_action( 'wp_ajax_nopriv_send_contact_us_form', [ $this, 'cyn_send_form' ] );
		}

		public function cyn_send_form() {
			if ( ! wp_verify_nonce( $_POST['_nonce'], 'ajax-nonce' ) )
				return wp_send_json_error( [ 'verify_nonce' => false ], 403 );

			global $wpdb;
			$tName = $wpdb->prefix . 'cyn_contactus';

			$data = $_POST['data'];
			$dbData = array(
				'user_email' => sanitize_email( $data['email'] ),
				'user_phone' => sanitize_text_field( $data['phone-number'] ),
				'user_describe' => sanitize_textarea_field( $data['describe'] ),
				'agreement' => sanitize_text_field( $data['agreement'] )
			);

			$msgContent = "
                Email: " . $dbData['user_email'] . "\n
                Phone: " . $dbData['user_phone'] . "\n
                agreement: " . $dbData['agreement'] . "\n
                Message: " . $dbData['user_describe'] . "
            ";
			$newPost = array(
				'post_type' => $GLOBALS["contact-form-post-type"],
				'post_title' => $dbData['user_email'],
				'post_content' => $msgContent,
				'post_status' => 'publish',
				'post_author' => 1,
			);

			$insetPost = wp_insert_post( $newPost );

			if ( is_wp_error( $insetPost ) )
				return wp_send_json_error( [ 'insert_row' => false ], 500 );


			$sendEmail = wp_mail(
				'amirtanazzoh@gmail.com',
				'Contact Us',
				$msgContent
			);

			if ( $sendEmail == false )
				return wp_send_json_error( [ 'send_email' => false ], 500 );

			return wp_send_json( [ 'success' => true ], 201 );
		}
	}
}