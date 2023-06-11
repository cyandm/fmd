<?php

if ( ! class_exists( 'cyn_customize' ) ) {
	class cyn_customize {
		function __construct() {
			add_action( 'customize_register', [ $this, 'basic_settings' ] );
		}

		public function basic_settings( $wp_customize ) {


			$wp_customize->add_section( 'basic_settings', [ 
				'title' => 'Theme Basic Settings',
				'priority' => 1
			] );

			//ADD Second Custom Logo 
			$wp_customize->add_setting( 'cyn_second_logo',
				[ 
					'type' => 'option'
				] );
			$wp_customize->add_control( new WP_Customize_Upload_Control(
				$wp_customize,
				'cyn_second_logo',
				array(
					'label' => 'Upload Your Second Logo',
					'section' => 'basic_settings',
					'settings' => 'cyn_second_logo'
				)
			) );

			//ADD Phone Numbers
			$wp_customize->add_setting( 'cyn_phone_number_one',
				[ 
					'type' => 'option'
				]
			);

			$wp_customize->add_control( new WP_Customize_Upload_Control(
				$wp_customize,
				'cyn_phone_number_one',
				array(
					'label' => 'Phone Number 1',
					'section' => 'basic_settings',
					'type' => 'tel',
					'settings' => 'cyn_phone_number_one'
				)
			) );
			$wp_customize->add_setting( 'cyn_phone_number_two',
				[ 
					'type' => 'option',
				]
			);

			$wp_customize->add_control( new WP_Customize_Upload_Control(
				$wp_customize,
				'cyn_phone_number_two',
				array(
					'label' => 'Phone Number 2',
					'section' => 'basic_settings',
					'type' => 'tel',
					'settings' => 'cyn_phone_number_two'
				)
			) );

			//ADD Address Section
			$wp_customize->add_setting( 'cyn_address_text',
				[ 
					'type' => 'option'
				]
			);
			$wp_customize->add_control( new WP_Customize_Upload_Control(
				$wp_customize,
				'cyn_address_text',
				array(
					'label' => 'Address Text',
					'section' => 'basic_settings',
					'type' => 'text',
					'settings' => 'cyn_address_text'
				)
			) );
			$wp_customize->add_setting( 'cyn_address_url',
				[ 
					'type' => 'option'
				]
			);
			$wp_customize->add_control( new WP_Customize_Upload_Control(
				$wp_customize,
				'cyn_address_url',
				array(
					'label' => 'Address Text iframe',
					'description' => 'this element used for google map iframe',
					'section' => 'basic_settings',
					'type' => 'textarea',
					'settings' => 'cyn_address_url'
				)
			) );


		}

	}
}