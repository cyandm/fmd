<?php

if ( ! class_exists( 'cyn_register' ) ) {
	class cyn_register {

		function __construct() {
			add_action( 'init', [ $this, 'cyn_add_product_post_type' ] );
			add_action( 'init', [ $this, 'cyn_add_product_cat_taxonomy' ] );
			add_action( 'init', [ $this, 'cyn_add_brand_taxonomy' ] );
		}

		function cyn_add_product_post_type() {
			$labels = [ 
				'name' => 'Products',
				'singular_name' => 'product'
			];

			$args = [ 
				'labels' => $labels,
				'description' => 'Product custom post type.',
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'products' ),
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => 20,
				'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
				'taxonomies' => array( 'product-cat', 'brand' ),
				'show_in_rest' => true
			];

			register_post_type( 'product', $args );
			flush_rewrite_rules();

		}

		function cyn_add_product_cat_taxonomy() {
			$labels = [ 
				'name' => 'Product Categories'
			];

			$args = [ 
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => [ 'slug' => 'product-cat' ],
			];

			register_taxonomy( 'product-cat', [ 'product' ], $args );
		}

		function cyn_add_brand_taxonomy() {
			$labels = [ 
				'name' => 'Brands'
			];

			$args = [ 
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => [ 'slug' => 'brand' ],
			];

			register_taxonomy( 'brand', [ 'product' ], $args );
		}
	}
}