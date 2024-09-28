<?php
add_action( 'acf/include_fields', 'cyn_register_acf' );

function cyn_register_acf() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	cyn_register_acf_home_shop();
}


function cyn_register_acf_home_shop() {

	$fields = [ 
		cyn_acf_add_taxonomy( 'product-categories', 'product categories', 'product-cat', 'object' ),
		cyn_acf_add_taxonomy( 'brand-categories', 'brand categories', 'brand', 'object' ),
	];


	$location = [ 
		[ 
			[ 
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/home-shop.php'
			],
		],
	];


	cyn_register_acf_group( 'settings', $fields, $location );
}