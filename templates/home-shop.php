<?php /* Template Name: Home Shop */ ?>

<?php
$brand_categories = empty( get_field( 'brand-categories' ) ) ? [] : get_field( 'brand-categories' );
$product_categories = empty( get_field( 'product-categories' ) ) ? [] : get_field( 'product-categories' );
$special_categories = empty( get_field( 'special-categories' ) ) ? [] : get_field( 'special-categories' );


$categories = array_merge( $brand_categories, $product_categories, $special_categories );



?>




<?php get_header() ?>

<main class="home-shop container">
	<?php foreach ( $categories as $cat ) {
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