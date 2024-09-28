<?php
/* Template Name: Brands */
?>

<?php

$brands = get_terms( [ 
	'taxonomy' => 'brand',
	'hide_empty' => false
] );

?>

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>


<main class="brands container">
	<div class="brands-wrapper">
		<?php foreach ( $brands as $brand ) : ?>

			<a href="<?= get_term_link( $brand ) ?>">
				<?= wp_get_attachment_image( get_field( 'custom_thumbnail', $brand->taxonomy . '_' . $brand->term_id ), 'full', false, [ 'class' => 'single-brand' ] ) ?>
			</a>

		<?php endforeach; ?>
	</div>
</main>


<?php get_footer() ?>