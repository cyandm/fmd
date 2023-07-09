<?php

if ( ! class_exists( 'cyn_acf' ) ) {
	class cyn_acf {
		function __construct() {
			add_filter( 'acf/settings/url', function ($url) {
				return MY_ACF_URL;
			} );
			add_filter( 'acf/settings/show_updates', '__return_false', 100 );
			//add_filter( 'acf/settings/show_admin', '__return_false' );

			/* acf actions */
			$this->cyn_acf_actions();
		}


		public function cyn_acf_actions() {
			add_action( 'acf/init', [ $this, 'cyn_front_page' ] );
			add_action( 'acf/init', [ $this, 'cyn_single_product' ] );
			add_action( 'acf/init', [ $this, 'cyn_contact_us_page' ] );
			add_action( 'acf/init', [ $this, 'cyn_about_us_page' ] );
		}

		public function cyn_front_page() {
			acf_add_local_field_group( [ 
				'key' => 'front_page_key',
				'title' => 'Page Content',
				'fields' => [ 
					[ 
						'label' => 'Hero Image',
						'name' => 'hero_image',
						'key' => 'hero_image_key',
						'type' => 'image',
						'return_format' => 'object',
						'preview_size' => 'thumbnail',
					],
					[ 
						'label' => 'Hero Title',
						'name' => 'hero_title',
						'key' => 'hero_title_key',
						'type' => 'wysiwyg'
					]
				],
				'location' => [ 
					[ 
						[ 
							'param' => 'page_template',
							'operator' => '==',
							'value' => 'templates/front-page.php'
						]
					]
				],
				'hide_on_screen' => [ 
					0 => 'permalink',
					1 => 'the_content',
					2 => 'excerpt',
					3 => 'discussion',
					4 => 'comments',
					5 => 'revisions',
					6 => 'slug',
					7 => 'author',
					8 => 'format',
					9 => 'page_attributes',
					10 => 'featured_image',
					11 => 'categories',
					12 => 'tags',
					13 => 'send-trackbacks',
				],
			] );
		}

		public function cyn_single_product() {
			acf_add_local_field_group( [ 
				'key' => 'single_product_information_key',
				'title' => 'Product information',
				'fields' => [ 
					[ 
						'key' => 'specification_tab_key',
						'name' => 'specification_tab',
						'label' => 'Specification',
						'type' => 'tab',
						'endpoint' => 1,
					],
					[ 
						'key' => 'specification_tab_group_key',
						'name' => 'specification_tab_group',
						'type' => 'group',
						'layout' => 'row',
						'sub_fields' => [ 
							[ 
								'key' => 'product_code_key',
								'label' => 'Product Code',
								'name' => 'product_code',
								'type' => 'text',
							],
							[ 
								'key' => 'Finish_key',
								'label' => 'Finish',
								'name' => 'Finish',
								'type' => 'text',
							],
							[ 
								'key' => 'Installation_key',
								'label' => 'Installation',
								'name' => 'Installation',
								'type' => 'text',
							],
							[ 
								'key' => 'brand_key',
								'label' => 'Brand',
								'name' => 'brand',
								'type' => 'taxonomy',
								'taxonomy' => 'brand',
								'field_type' => 'multi_select',
								'add_term' => 1,
								'return_format' => 'object',
								'allow_null' => 0,
							],
							[ 
								'key' => 'product_cat_key',
								'label' => 'Product Category',
								'name' => 'product_cat',
								'type' => 'taxonomy',
								'taxonomy' => 'product-cat',
								'field_type' => 'multi_select',
								'add_term' => true,
								'return_format' => 'object',
								'allow_null' => 0,
							],
						]
					],
					[ 
						'key' => 'product_details_tab_key',
						'name' => 'product_details_tab',
						'label' => 'Product Details',
						'type' => 'tab',
						'endpoint' => 0,
					],
					[ 
						'key' => 'product_details_group_key',
						'name' => 'product_details_group',
						'type' => 'group',
						'layout' => 'row',
						'sub_fields' => [ 
							[ 
								'key' => 'product_details_key',
								'name' => 'product_details',
								'label' => 'Product Details',
								'type' => 'wysiwyg',
							],
							[ 
								'key' => 'product_technical_key',
								'name' => 'product_technical',
								'label' => 'Product Technical',
								'type' => 'wysiwyg',
							]
						]
					],
					[ 
						'key' => 'product_related_tab_key',
						'name' => 'product_related_tab',
						'label' => 'Related',
						'type' => 'tab',
						'endpoint' => 0
					],
					[ 
						'key' => 'product_related_group_key',
						'name' => 'product_related_group',
						'type' => 'group',
						'layout' => 'row',
						'sub_fields' => [ 
							[ 
								'key' => 'related_product_key',
								'name' => 'related_products',
								'label' => 'Related Products',
								'type' => 'post_object',
								'multiple' => 1,
								'post_type' => 'product',
								'post_status' => 'publish',
								'allow_null' => 0
							],
							[ 
								'key' => 'related_post_key',
								'name' => 'related_posts',
								'label' => 'Related Posts',
								'type' => 'post_object',
								'multiple' => 1,
								'post_type' => 'post',
								'post_status' => 'publish',
								'allow_null' => 0
							]
						]
					]
				],
				'location' => [ 
					[ 
						[ 
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'product'
						]
					]
				],
				'hide_on_screen' => [ 
					1 => 'the_content',
					2 => 'excerpt',
					3 => 'discussion',
					4 => 'comments',
					5 => 'revisions',
					6 => 'slug',
					7 => 'author',
					8 => 'format',
					9 => 'page_attributes',
					10 => 'send-trackbacks',
				]
			] );

			acf_add_local_field_group( [ 
				'key' => 'single_product_gallery_key',
				'title' => 'Product Gallery',
				'fields' => [ 
					[ 
						'key' => 'product_gallery_key',
						'name' => 'product_gallery',
						'type' => 'group',
						'sub_fields' => [ 
							[ 
								'key' => 'image_1_key',
								'name' => 'image_1',
								'type' => 'image',
								'return_format' => 'object'
							],
							[ 
								'key' => 'image_2_key',
								'name' => 'image_2',
								'type' => 'image',
								'return_format' => 'object'
							],
							[ 
								'key' => 'image_3_key',
								'name' => 'image_3',
								'type' => 'image',
								'return_format' => 'object'
							],
							[ 
								'key' => 'image_4_key',
								'name' => 'image_4',
								'type' => 'image',
								'return_format' => 'object'
							],
							[ 
								'key' => 'image_5_key',
								'name' => 'image_5',
								'type' => 'image',
								'return_format' => 'object'
							],
							[ 
								'key' => 'image_6_key',
								'name' => 'image_6',
								'type' => 'image',
								'return_format' => 'object'
							],
							[ 
								'key' => 'image_7_key',
								'name' => 'image_7',
								'type' => 'image',
								'return_format' => 'object'
							],
							[ 
								'key' => 'image_8_key',
								'name' => 'image_8',
								'type' => 'image',
								'return_format' => 'object'
							],
						]
					]
				],
				'location' => [ 
					[ 
						[ 
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'product'
						]
					]
				],
				'hide_on_screen' => [ 
					1 => 'the_content',
					2 => 'excerpt',
					3 => 'discussion',
					4 => 'comments',
					5 => 'revisions',
					6 => 'slug',
					7 => 'author',
					8 => 'format',
					9 => 'page_attributes',
					10 => 'send-trackbacks',
				],
				'position' => 'side'
			] );
		}

		public function cyn_contact_us_page() {
			acf_add_local_field_group( [ 
				'key' => 'cyn-contact-us-key',
				'title' => 'Page Settings',
				'fields' => [ 
					[ 
						'label' => 'Hero Image',
						'name' => 'hero_image',
						'key' => 'hero_image_key',
						'type' => 'image',
						'return_format' => 'object',
						'preview_size' => 'thumbnail',
					],
				],
				'location' => [ 
					[ 
						[ 
							'param' => 'page_template',
							'operator' => '==',
							'value' => 'templates/contact-us.php'
						]
					]
				],
				'hide_on_screen' => [ 
					1 => 'the_content',
					2 => 'excerpt',
					3 => 'discussion',
					4 => 'comments',
					5 => 'revisions',
					6 => 'slug',
					7 => 'author',
					8 => 'format',
					9 => 'page_attributes',
					10 => 'send-trackbacks',
				]
			] );
		}

		public function cyn_about_us_page() {
			acf_add_local_field_group(
				array(
					'key' => 'group_64aad273646ce',
					'title' => 'Page Settings',
					'fields' => array(
						array(
							'key' => 'field_64aad2737d0c4',
							'label' => 'Feature image',
							'name' => 'feature_image',
							'aria-label' => '',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'id',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
							'preview_size' => 'medium',
						),
						array(
							'key' => 'field_64aad2d17d0c5',
							'label' => 'Slogan',
							'name' => 'slogan',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 'We Are The Biggest In The Industry',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
						),
						array(
							'key' => 'field_64aad2e47d0c6',
							'label' => 'Left Text Paragraph',
							'name' => 'left-text-paragraph',
							'aria-label' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
						array(
							'key' => 'field_64aad3157d0c7',
							'label' => 'Images Right',
							'name' => 'images_right',
							'aria-label' => '',
							'type' => 'group',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'layout' => 'block',
							'sub_fields' => array(
								array(
									'key' => 'field_64aad3217d0c8',
									'label' => 'Image 1',
									'name' => 'image-1',
									'aria-label' => '',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'id',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
									'preview_size' => 'medium',
								),
								array(
									'key' => 'field_64aad3377d0c9',
									'label' => 'Image 2',
									'name' => 'image-2',
									'aria-label' => '',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '30',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'id',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
									'preview_size' => 'medium',
								),
								array(
									'key' => 'field_64aad3417d0ca',
									'label' => 'Image 3',
									'name' => 'image-3',
									'aria-label' => '',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '70',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'id',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
									'preview_size' => 'medium',
								),
							),
						),
						array(
							'key' => 'field_64aad3cc7d0d0',
							'label' => 'Image Left',
							'name' => 'image_left',
							'aria-label' => '',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'id',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
							'preview_size' => 'medium',
						),
						array(
							'key' => 'field_64aad3617d0cb',
							'label' => 'Right Text Paragraph',
							'name' => 'right-text-paragraph',
							'aria-label' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
					),
					'location' => array(
						array(
							array(
								'param' => 'page_template',
								'operator' => '==',
								'value' => 'templates/about-us.php',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => array(
						0 => 'permalink',
						1 => 'the_content',
						2 => 'excerpt',
						3 => 'discussion',
						4 => 'comments',
						5 => 'revisions',
						6 => 'slug',
						7 => 'author',
						8 => 'format',
						9 => 'page_attributes',
						10 => 'featured_image',
						11 => 'categories',
						12 => 'tags',
						13 => 'send-trackbacks',
					),
					'active' => true,
					'description' => '',
					'show_in_rest' => 0,
				) );
		}
	}
}