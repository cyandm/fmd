<?php
$options = new cyn_options();

$parentId = isset($args['parent-id']) ? $args['parent-id'] : 0;
$productCats = $options->cyn_getProdactTerms($parentId, false, 'product-cat');
?>

<main class="home-shop">
	<div class="home-shop-wrapper">
		<div class="products-wrapper">
			<?php foreach ($productCats as $pCatKey => $productCat) : ?>
				<?php if ($productCat['count'] > 0) : ?>
					<?php
					$catQueryArgs = array(
						'post_type' => "product",
						'posts_per_page' => 4,
						'tax_query' => array(
							array(
								'taxonomy' => "product-cat",
								'field' => "id",
								'terms' => $productCat["id"],
							)
						)
					);
					$catQuery = new WP_Query($catQueryArgs);
					?>
					<div class="products-cat-wrapper">
						<header class="title">
							<div>
								<p class="h2"><?php echo $productCat['name'] ?></p>
								<p><?php echo $productCat['count'] . ' products' ?></p>
							</div>
							<a href="<?php echo $productCat['url'] ?>" class="primary-btn">View All</a>
						</header>

						<main>
							<div class="sample-products">
								<?php while ($catQuery->have_posts()) : $catQuery->the_post(); ?>
									<a href="<?php echo get_the_permalink(); ?>">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title() ?>">
									</a>
								<?php endwhile; ?>
							</div>
							<div class="product-category-image">
								<?php
								$imgID = 0;
								if (function_exists('get_field')) {
									$imgID = get_field('custom_thumbnail', 'product-cat_' . $productCat["id"]);
								}
								?>
								<?= wp_get_attachment_image($imgID, 'full', false, ['class' => '']) ?>
							</div>
						</main>
						<a href="#" class="only-mobile primary-btn">View All</a>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</main>