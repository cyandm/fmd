<?php

if ( ! class_exists( 'cyn_acf' ) ) {
	class cyn_acf {
		function __construct() {
			add_filter( 'acf/settings/url', function ($url) {
				return MY_ACF_URL;
			} );
			add_filter( 'acf/settings/show_updates', '__return_false', 100 );
			add_filter( 'acf/settings/show_admin', '__return_false' );
		}


		public function cyn_acf_actions() {
			add_action( 'acf/init', [ $this, 'cyn_front_page' ] );
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
	}
}