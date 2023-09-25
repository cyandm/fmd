<?php
$featureImg = wp_get_attachment_image( get_post_thumbnail_id( $args['product'] ), 'large', false, [ 'class' => '' ] );

?>

<a href=<?= get_the_permalink( $args['product'] ); ?> class="product-card">
	<?php if ( $featureImg > 0 ) : ?>
		<?= $featureImg ?>
	<?php else : ?>
		<img width="400" height="400" src=<?= get_stylesheet_directory_uri() . '/imgs/placeholder.png' ?>>
	<?php endif; ?>
	<div class="product-content">
		<span>
			<?php echo get_the_title( $args['product'] ); ?>
		</span>
		<span class="white-btn">View</span>
	</div>
</a>