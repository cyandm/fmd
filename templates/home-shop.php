<?php /* Template Name: Home Shop */?>

<?php
$product_categories = [];
$special_cat_terms = get_terms( [ 'taxonomy' => 'special-cat' ] );

array_push( $product_categories, get_term_by( 'slug', 'moulding', 'product-cat' ) );
array_push( $product_categories, get_term_by( 'slug', 'flooring', 'product-cat' ) );

foreach ( $special_cat_terms as $term ) {
	array_push( $product_categories, $term );
}

?>




<?php get_header() ?>

<main class="home-shop container">
	<?php foreach ( $product_categories as $cat ) {
		get_template_part( '/templates/components/card', null, [ 
			'url' => get_term_link( $cat ),
			'card_class' => 'product-category-item',
			'image_id' => get_field( 'custom_thumbnail', $cat->taxonomy . '_' . $cat->term_id ),
			'card_title' => $cat->name,
			'card_description' => $cat->count . ' item',
		] );
	}
	; ?>
</main>

<?php get_footer(); ?>