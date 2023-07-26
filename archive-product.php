<?php
global $wp_query;
$options = new cyn_options();

$filtersConditions = isset($_GET['filter']) && $_GET['filter'] == 'on';

$productCats = $options->cyn_getProdactTerms(false, false, 'product-cat');
$brandsCats  = $options->cyn_getProdactTerms(false, false, 'brand');
$filtersCats = $options->cyn_getProdactTerms(false, false, 'filters');
$allChips    = array_merge($productCats, $brandsCats, $filtersCats);
?>

<?php get_header(null, ['border' => true, 'preloader' => false]); ?>

<main class="archive-product container">
	<?php get_template_part('/templates/components/sidebar', 'product', [
		'title' => get_the_archive_title()
	]) ?>

	<div class="product-container">

		<div class="filter-chips">
			<?php foreach ($allChips as $key => $chip) : ?>
				<?php if (isset($_GET['cat-' . $chip['id']])) : ?>
					<span class="filter-item">
						<span class="filter-title"><?php echo $chip['name'] ?></span>
						<i class="icon-close" style="cursor: pointer;" data-filter="<?php echo 'cat-' . $chip['id']; ?>"></i>
					</span>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<?php if ($filtersConditions) : ?>
			<?php if ($wp_query->have_posts()) : ?>
				<div class="product-wrapper">
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<a href="<?php echo get_the_permalink(); ?>" class="product-card">
							<?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => '']) ?>

							<div class="product-content">
								<span><?php echo get_the_title(); ?></span>
								<span class="white-btn">View</span>
							</div>
						</a>
					<?php endwhile; ?>
				</div>
				<?php
				echo "<div class='pagination-links'>" . paginate_links(
					array(
						'total' => $wp_query->max_num_pages,
						'prev_text' => __('<i class="icon-arrow-left"></i>'),
						'next_text' => __('<i class="icon-arrow-right"></i>')
					)
				) . "</div>";
				?>
			<?php else : ?>
				<div class="not-find">
					<p>sorry ! we could’nt find anything</p>
					<img src="<?php echo get_stylesheet_directory_uri() . '/imgs/not-found.png' ?>">
				</div>
			<?php endif; ?>
		<?php else : ?>
			<div class="product-wrapper">
				<?php get_template_part('/templates/home-shop', '', []); ?>
			</div>
		<?php endif; ?>

	</div>
</main>

<?php get_footer() ?>