<?php
global $wp_query;
$post_type = $wp_query->post->post_type;

if ( $post_type ) {
	get_template_part( 'templates/archive/' . $post_type );
} else {
	echo 'not template found!';
}

