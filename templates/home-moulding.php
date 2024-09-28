<?php /* Template Name: Home Moulding */ ?>

<?php
$product_categories = get_field( 'categories' );

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