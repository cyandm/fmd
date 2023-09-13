<?php
var_dump( get_queried_object() );

if ( $wp_query->posts ) {

	if ( $wp_query->posts[0]->post_type == 'post' ) {
		get_template_part( '/templates/blog' );
	} else if ( $wp_query->posts[0]->post_type == 'product' ) {
		get_template_part( '/archive-product' );
	} else if ( $wp_query->posts[0]->post_type == 'product' ) {
		get_template_part( '/archive-product' );
	}

} else {
	get_template_part( '/404' );
}