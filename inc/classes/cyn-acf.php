<?php

if ( ! class_exists( 'cyn_acf' ) ) {
	class cyn_acf {
		function __construct() {
			define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
			define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );
			include_once( MY_ACF_PATH . 'acf.php' );

			add_filter( 'acf/settings/url', function ($url) {
				return MY_ACF_URL;
			} );
			add_filter( 'acf/settings/show_updates', '__return_false', 100 );
			// add_filter('acf/settings/show_admin', '__return_false');

			$this->cyn_acf_actions();
		}



		public function cyn_acf_actions() {
			add_action( 'acf/init', [ $this, 'cyn_product_post_type' ] );
			add_action( 'acf/init', [ $this, 'cyn_contact_us_page' ] );
			add_action( 'acf/init', [ $this, 'cyn_about_us_page' ] );
		}

		public function cyn_product_post_type() {
			$productGalleryGroup = array(
				[ 
					'key' => 'gallery_img_key_0',
					'label' => 'Gallery Cover Image',
					'name' => 'gallery_cover_img',
					'instructions' => 'Shown in home page layout',
					'type' => 'image',
					'return_format' => 'id',
					'wrapper' => [ 
						'width' => '100',
					],
				],
			);

			for ( $i = 0; $i < 12; $i++ ) {
				$j = $i;
				$j++;
				$productGalleryGroup[] = [ 
					'key' => 'gallery_img_key_' . $j,
					'label' => 'Gallery Image ' . $j,
					'name' => 'gallery_img_' . $j,
					'type' => 'image',
					'return_format' => 'id',
					'wrapper' => [ 
						'width' => '50',
					],
				];
			}

			acf_add_local_field_group( [ 
				'key' => 'product_post_type_key',
				'title' => 'Product Details',
				'fields' => [ 
					[ 
						'key' => 'specification_tab_key',
						'name' => 'specification_tab',
						'label' => 'Specification',
						'type' => 'tab',
						'endpoint' => 1,
					],

					[ 
						'key' => 'product_sid_key',
						'label' => 'Product SID',
						'name' => 'product_sid',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]

					],
					[ 
						'key' => 'product_code_key',
						'label' => 'Product Code',
						'name' => 'product_code',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]

					],
					[ 
						'key' => 'product_color_code_key',
						'label' => 'Product Color Code',
						'name' => 'product_color_code',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]
					],
					[ 
						'key' => 'product_finish_key',
						'label' => 'Product Finish',
						'name' => 'product_finish',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]
					],
					[ 
						'key' => 'product_installation_key',
						'label' => 'Product Installation',
						'name' => 'product_installation',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]
					],
					[ 
						'key' => 'product_sqft_box_key',
						'label' => 'Product Sqft/Box',
						'name' => 'product_sqft_box',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]
					],
					[ 
						'key' => 'product_sqft_pallet_key',
						'label' => 'Product Sqft/Pallet',
						'name' => 'product_sqft_pallet',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]
					],
					[ 
						'key' => 'product_box_pallet_key',
						'label' => 'Product Box/Pallet',
						'name' => 'product_box_pallet',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '25'
						]
					],

					[ 
						'key' => 'product_length_key',
						'label' => 'Product Length',
						'name' => 'length',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '50'
						]
					],

					[ 
						'key' => 'product_width_key',
						'label' => 'Product Width',
						'name' => 'width',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '50'
						]
					],
					[ 
						'key' => 'product_thickness_key',
						'label' => 'Product Thickness',
						'name' => 'thickness',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '50'
						]
					],
					[ 
						'key' => 'product_height_key',
						'label' => 'Product Height',
						'name' => 'height',
						'type' => 'text',
						'wrapper' => [ 
							'width' => '50'
						]
					],

					[ 
						'key' => 'product_details_tab_key',
						'name' => 'product_details_tab',
						'label' => 'Details',
						'type' => 'tab',
						'endpoint' => 0,
					],

					[ 
						'key' => 'product_desc_key',
						'label' => 'Product Description',
						'name' => 'product_desc',
						'type' => 'wysiwyg',
						'wrapper' => [ 
							'width' => '50'
						]
					],
					[ 
						'key' => 'product_technical_key',
						'label' => 'Product Technical',
						'name' => 'product_tech',
						'type' => 'wysiwyg',
						'wrapper' => [ 
							'width' => '50'
						]
					],

					[ 
						'key' => 'slider_tab_key',
						'label' => 'Gallery',
						'name' => '',
						'type' => 'tab',
						'endpoint' => 0
					],

					[ 
						'key' => 'product_gallery_group_key',
						'label' => 'Product Gallery',
						'name' => 'product_gallery_group',
						'type' => 'group',
						'layout' => 'block',
						'sub_fields' => $productGalleryGroup,
					],

					[ 
						'key' => 'related_tab_key',
						'label' => 'Related',
						'name' => '',
						'type' => 'tab',
						'endpoint' => 0
					],

					[ 
						'key' => 'related_group_key',
						'label' => 'Related',
						'name' => 'related_group',
						'type' => 'group',
						'sub_fields' => [ 
							[ 
								'key' => 'related_products_key',
								'label' => 'Related Products',
								'name' => 'related_products',
								'type' => 'post_object',
								'return_format' => 'id',
								'post_type' => [ 
									0 => 'product',
								],
								'post_status' => [ 
									0 => 'publish'
								],
								'multiple' => 1,
								'ui' => 1,
								'wrapper' => [ 
									'width' => '50'
								]
							],
							[ 
								'key' => 'related_articles_key',
								'label' => 'Related Articles',
								'name' => 'related_articles',
								'type' => 'post_object',
								'return_format' => 'id',
								'post_type' => [ 
									0 => 'post',
								],
								'post_status' => [ 
									0 => 'publish'
								],
								'multiple' => 1,
								'ui' => 1,
								'wrapper' => [ 
									'width' => '50'
								]
							],
							[ 
								'key' => 'product_brand_tax_key',
								'label' => 'Brands',
								'name' => 'product_brand_tax',
								'type' => 'taxonomy',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '50',
								),
								'taxonomy' => 'brand',
								'add_term' => 1,
								'save_terms' => 1,
								'load_terms' => 1,
								'return_format' => 'id',
								'field_type' => 'multi_select',
								'allow_null' => 1,
								'multiple' => 0,
							],
							[ 
								'key' => 'product_filters_tax_key',
								'label' => 'Filters',
								'name' => 'product_filters_tax',
								'type' => 'taxonomy',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '50',
								),
								'taxonomy' => 'filters',
								'add_term' => 1,
								'save_terms' => 1,
								'load_terms' => 1,
								'return_format' => 'id',
								'field_type' => 'multi_select',
								'allow_null' => 1,
								'multiple' => 0,
							],
						]
					],

				],
				'location' => [ 
					[ 
						[ 
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'product'
						]
					],
				]
			] );

			/** specials post type **/
			acf_add_local_field_group(
				array(
					'key' => 'specials_post_type_key',
					'title' => 'Specials Details',
					'fields' => array(
						[ 
							'key' => 'slider_tab_key',
							'label' => 'Gallery',
							'name' => '',
							'type' => 'tab',
							'endpoint' => 1
						],

						[ 
							'key' => 'specials_gallery_group_key',
							'label' => 'Specials Gallery',
							'name' => 'specials_gallery_group',
							'type' => 'group',
							'layout' => 'block',
							'sub_fields' => array(
								[ 
									'key' => 'special_gallery_img_key_0',
									'label' => 'Gallery Image 1',
									'name' => 'special_gallery_img_0',
									'type' => 'image',
									'return_format' => 'id',
									'wrapper' => [ 
										'width' => '50',
									],
								],
								[ 
									'key' => 'special_gallery_img_key_1',
									'label' => 'Gallery Image 2',
									'name' => 'special_gallery_img_1',
									'type' => 'image',
									'return_format' => 'id',
									'wrapper' => [ 
										'width' => '50',
									],
								],
								[ 
									'key' => 'special_gallery_img_key_2',
									'label' => 'Gallery Image 3',
									'name' => 'special_gallery_img_2',
									'type' => 'image',
									'return_format' => 'id',
									'wrapper' => [ 
										'width' => '50',
									],
								],
								[ 
									'key' => 'special_gallery_img_key_3',
									'label' => 'Gallery Image 4',
									'name' => 'special_gallery_img_3',
									'type' => 'image',
									'return_format' => 'id',
									'wrapper' => [ 
										'width' => '50',
									],
								],
							),
						],
					),
					'location' => array(
						[ 
							[ 
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'specials'
							]
						],
					)
				)
			);
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
				)
			);
		}
	}
}