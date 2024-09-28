<?php
$featureImg = wp_get_attachment_image( get_post_thumbnail_id( $args['product'] ), 'large', false, [ 'class' => '' ] );
$coverImg = wp_get_attachment_image( get_field( 'gallery_cover_img' ), 'large', false, [ 'class' => '' ] );

$product_cat = get_the_terms( get_the_ID(), 'product-cat' );
// $product_type = $product_cat[0]->name;
// var_dump($product_cat)


?>

<a href=<?= get_the_permalink( $args['product'] ); ?>
   class="product-card <?= $product_cat ? $product_cat[0]->name : '' ?>">
	<?php if ( $featureImg ) : ?>
		<?= $featureImg ?>
	<?php elseif ( $coverImg ) : ?>
		<?= $coverImg ?>
	<?php else : ?>
		<img width="400"
			 height="400"
			 src=<?= get_stylesheet_directory_uri() . '/assets/imgs/placeholder.png' ?>>
	<?php endif; ?>
	<div class="product-content">
		<span>
			<?php echo get_the_title( $args['product'] ); ?>
		</span>
		<span class="white-btn">View</span>
	</div>
</a>