<?php

if (!class_exists('cyn_register')) {
	class cyn_register
	{

		function __construct()
		{
			add_action('init', [$this, 'cyn_add_product_post_type']);
			add_action('init', [$this, 'cyn_register_specials']);
			add_action('init', [$this, 'cyn_add_product_cat_taxonomy']);
			add_action('init', [$this, 'cyn_add_brand_taxonomy']);
			add_action('init', [$this, 'cyn_register_product_filters']);
			add_action('init', [$this, 'cyn_register_special_cats']);
			add_action('init', [$this, 'cyn_register_contact_forms']);

			add_action('pre_get_posts', [$this, 'cyn_archive_pre_get_posts']);
		}

		public function cyn_archive_pre_get_posts($query)
		{
			$archiveCondition = is_archive() && $query->is_main_query() && !is_admin();
			$searchCondition = is_search() && !is_admin();

			if ($archiveCondition || $searchCondition) {
				$cynOptions = new cyn_options();

				$getCats     = $cynOptions->cyn_getProductTerms(false, true, 'product-cat');
				$getBrand    = $cynOptions->cyn_getProductTerms(false, true, 'brand');
				$getFilters  = $cynOptions->cyn_getProductTerms(false, true, 'filters');
				$catTerms    = array();
				$brandTerms  = array();
				$filterTerms = array();
				$tax_query   = isset($query->tax_query->queries) ? $query->tax_query->queries : array();
				$tax_query['relation'] = "AND";

				foreach ($getCats as $catId)
					if (isset($_GET["cat-" . $catId]))
						$catTerms[] = $catId;
				foreach ($getBrand as $catId)
					if (isset($_GET["cat-" . $catId]))
						$brandTerms[] = $catId;
				foreach ($getFilters as $filterId)
					if (isset($_GET["cat-" . $filterId]))
						$filterTerms[] = $filterId;

				if (count($catTerms) > 0) {
					$tax_query[] = array(
						'taxonomy' => 'product-cat',
						'field' => "id",
						'terms' => $catTerms
					);
				}

				if (count($brandTerms) > 0) {
					$tax_query[] = array(
						'taxonomy' => 'brand',
						'field' => "id",
						'terms' => $brandTerms
					);
				}

				if (count($filterTerms) > 0) {
					$tax_query[] = array(
						'taxonomy' => 'filters',
						'field' => "id",
						'terms' => $filterTerms,
					);
				}

				if ($archiveCondition)
					$query->set('tax_query', $tax_query);
			}

			if ($searchCondition)
				return $tax_query;
		}

		function cyn_add_product_post_type()
		{
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
				'rewrite' => array('slug' => 'products'),
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => 20,
				'supports' => array('title', 'editor', 'author', 'thumbnail'),
				'taxonomies' => array('product-cat', 'brand'),
				'show_in_rest' => true
			];

			register_post_type('product', $args);
			flush_rewrite_rules();
		}

		function cyn_add_product_cat_taxonomy()
		{
			$labels = [
				'name' => 'Product Categories'
			];

			$args = [
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => ['slug' => 'product-cat'],
			];

			register_taxonomy('product-cat', ['product'], $args);
		}

		function cyn_add_brand_taxonomy()
		{
			$labels = [
				'name' => 'Brands'
			];

			$args = [
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => ['slug' => 'brand'],
			];

			register_taxonomy('brand', ['product'], $args);
		}

		public function cyn_register_product_filters()
		{
			$taxonomyName = "filters";

			$labels = array(
				'name' => _x('Filters', 'taxonomy general name', 'textdomain'),
				'singular_name' => _x('Filter', 'taxonomy singular name', 'textdomain'),
				'search_items' => __('Search Filters', 'textdomain'),
				'all_items' => __('All Filters', 'textdomain'),
				'parent_item' => __('Parent Filter', 'textdomain'),
				'parent_item_colon' => __('Parent Filter:', 'textdomain'),
				'edit_item' => __('Edit Filter', 'textdomain'),
				'update_item' => __('Update Filter', 'textdomain'),
				'add_new_item' => __('Add New Filter', 'textdomain'),
				'new_item_name' => __('New Filter Name', 'textdomain'),
				'menu_name' => __('Filter', 'textdomain'),
			);
			$args = array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'filter'),
			);

			register_taxonomy($taxonomyName, ['product'], $args);
		}

		public function cyn_register_specials()
		{
			$postType = "specials";
			$GLOBALS["specials-post-type"] = $postType;

			$labels = [
				'name' => _x('Specials', 'Post type general name', 'Specials'),
				'singular_name' => _x('Specials', 'Post type singular name', 'Specials'),
				'menu_name' => _x('Specials', 'Admin Menu text', 'Specials'),
				'name_admin_bar' => _x('Specials', 'Add New on Toolbar', 'Specials'),
				'add_new' => __('Add New', 'Specials'),
				'add_new_item' => __('Add New Specials', 'Specials'),
				'new_item' => __('New Specials', 'Specials'),
				'edit_item' => __('Edit Specials', 'Specials'),
				'view_item' => __('View Specials', 'Specials'),
				'all_items' => __('All specials', 'Specials'),
				'search_items' => __('Search Specials', 'Specials'),
				'parent_item_colon' => __('Parent Specials:', 'Specials'),
				'not_found' => __('No Specials found.', 'Specials'),
				'not_found_in_trash' => __('No Specials found in Trash.', 'Specials'),
				'featured_image' => _x('Specials Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'Specials'),
				'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'Specials'),
				'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'Specials'),
				'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'Specials'),
				'archives' => _x('Specials archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'Specials'),
				'insert_into_item' => _x('Insert into Specials', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'Specials'),
				'uploaded_to_this_item' => _x('Uploaded to this Specials', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'Specials'),
				'filter_items_list' => _x('Filter Specials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'Specials'),
				'items_list_navigation' => _x('Specials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'Specials'),
				'items_list' => _x('Specials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'Specials'),
			];
			$args = [
				'labels' => $labels,
				'description' => 'Specials custom post type.',
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'specials'),
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => 20,
				'supports' => ['editor', 'title', 'thumbnail', 'excerpt'],
				'show_in_rest' => false
			];

			return register_post_type($postType, $args);
		}

		public function cyn_register_special_cats()
		{
			$taxonomyName = "special-cat";
			$GLOBALS["special-cat-tax"] = $taxonomyName;
			$postTypes = array($GLOBALS["specials-post-type"]);

			$labels = array(
				'name' => _x('Categories', 'taxonomy general name', 'textdomain'),
				'singular_name' => _x('Category', 'taxonomy singular name', 'textdomain'),
				'search_items' => __('Search Categories', 'textdomain'),
				'all_items' => __('All Categories', 'textdomain'),
				'parent_item' => __('Parent Category', 'textdomain'),
				'parent_item_colon' => __('Parent Category:', 'textdomain'),
				'edit_item' => __('Edit Category', 'textdomain'),
				'update_item' => __('Update Category', 'textdomain'),
				'add_new_item' => __('Add New Category', 'textdomain'),
				'new_item_name' => __('New Category Name', 'textdomain'),
				'menu_name' => __('Category', 'textdomain'),
			);
			$args = array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'special-cat'),
			);

			register_taxonomy($taxonomyName, $postTypes, $args);
		}

		public function cyn_register_contact_forms()
		{
			$postType = "contact-form";
			$GLOBALS["contact-form-post-type"] = $postType;

			$labels = [
				'name' => _x('Contact Us form', 'Post type general name', 'Contact Us form'),
				'menu_name' => _x('Contact Us form', 'Admin Menu text', 'Contact Us form'),
			];
			$args = [
				'labels' => $labels,
				'description' => 'Contact Us form custom post type.',
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'contact-form'),
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => 20,
				'supports' => ['title', 'editor'],
				'show_in_rest' => false
			];

			return register_post_type($postType, $args);
		}
	}
}
