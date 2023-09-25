<?php /* Template Name: Home Shop */?>


<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<?php
$options = new cyn_options();

$parentId = isset( $args['parent-id'] ) ? $args['parent-id'] : 0;
$productCats = $options->cyn_getProductTerms( $parentId, false, 'product-cat' );
?>

<main class="home-shop container">
	<div class="home-shop-wrapper">
		<div class="products-wrapper">
			<?php foreach ( $productCats as $pCatKey => $productCat ) : ?>
				<?php if ( $productCat['count'] > 0 ) : ?>
					<?php
					$catQuery = new WP_Query( [ 
						'post_type' => "product",
						'posts_per_page' => 4,
						'tax_query' => [ 
							[ 
								'taxonomy' => "product-cat",
								'field' => "id",
								'terms' => $productCat["id"],
							]
						]
					] );
					?>
					<div class="products-cat-wrapper">
						<header class="title">
							<div>
								<p class="h2">
									<?= $productCat['name'] ?>
								</p>
								<p>
									<?= $productCat['count'] . ' products' ?>
								</p>
							</div>
							<a href=<?= $productCat['url'] ?> class="primary-btn">View All</a>
						</header>

						<main>
							<div class="sample-products">
								<?php while ( $catQuery->have_posts() ) :
									$catQuery->the_post(); ?>
									<a href="<?= get_the_permalink(); ?>">
										<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title() ?>">
									</a>
								<?php endwhile; ?>
							</div>
							<div class="product-category-image">
								<?php
								$imgID = 0;
								if ( function_exists( 'get_field' ) ) {
									$imgID = get_field( 'custom_thumbnail', 'product-cat_' . $productCat["id"] );
								}
								?>
								<?= wp_get_attachment_image( $imgID, 'full', false, [ 'class' => '' ] ) ?>
							</div>
						</main>
						<a href=<?= $productCat['url'] ?> class="only-mobile primary-btn">View All</a>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</main>


<?php get_footer(); ?>