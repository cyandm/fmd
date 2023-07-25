<?php
$options = new cyn_options();
$productConditions = !(isset($args['products']) && $args['products'] == false);

if ($productConditions)
	$productCats = $options->cyn_getProdactTerms(0, false, 'product-cat');
$brandsCats  = $options->cyn_getProdactTerms(false, false, 'brand');
$filtersCats = $options->cyn_getProdactTerms(false, false, 'filters');

$formUrl = isset($args['form-url']) ? $args['form-url'] : get_post_type_archive_link('product');
?>

<aside class="sidebar-products">

	<div class="top-sidebar">
		<a href="#" id="exit" class="primary-btn">
			<i class="icon-arrow-long-left"></i>
		</a>
		<span>
			<?= $args['title'] ?>
		</span>
		<?php get_template_part('templates/components/search-form') ?>
	</div>

	<form class="filter-container" id="filter-container" action="<?php echo $formUrl; ?>">
		<div class="filter-actions">
			<input type="submit" class="primary-btn" value="Apply Filter" />
			<button type="button" id="filter-actions-clear" class="disable-btn">Clear</button>
		</div>

		<?php if (isset($productCats)) : ?>
			<div class="filter-wrapper">
				<div class="title ">
					<span>Products</span>
					<i class="icon-arrow-down"></i>
				</div>

				<div class="filter-item-container">
					<div class="filter-item-wrapper">
						<?php foreach ($productCats as $key => $cat) : ?>
							<?php if ($cat['count'] > 0) : ?>
								<?php $checked = isset($_GET['cat-' . $key]); ?>
								<div class="filter-item">
									<span><?php echo $cat['name'] ?></span>
									<input name="<?php echo 'cat-' . $key ?>" value="on" type="checkbox" <?php echo $checked ? 'checked' : "" ?>>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if (isset($brandsCats)) : ?>
			<div class="filter-wrapper">
				<div class="title ">
					<span>Brands</span>
					<i class="icon-arrow-down"></i>
				</div>

				<div class="filter-item-container">
					<div class="filter-item-wrapper">
						<?php foreach ($brandsCats as $key => $cat) : ?>
							<?php $checked = isset($_GET['cat-' . $key]); ?>
							<div class="filter-item">
								<span><?php echo $cat['name'] ?></span>
								<input name="<?php echo 'cat-' . $key ?>" value="on" type="checkbox" <?php echo $checked ? 'checked' : "" ?>>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if (isset($filtersCats)) : ?>
			<?php foreach ($filtersCats as $filtersCat) : ?>
				<?php
				$filtersId = $filtersCat['id'];
				$parent = $filtersCat['parent'];
				?>
				<?php if ($parent == 0) : ?>
					<div class="filter-wrapper">
						<div class="title ">
							<span><?php echo $filtersCat['name'] ?></span>
							<i class="icon-arrow-down"></i>
						</div>

						<div class="filter-item-container">
							<div class="filter-item-wrapper">
								<?php foreach ($filtersCats as $key => $cat) : ?>
									<?php if ($filtersId == $cat['parent']) : ?>
										<?php $checked = isset($_GET['cat-' . $key]); ?>
										<div class="filter-item">
											<span><?php echo $cat['name'] ?></span>
											<input name="<?php echo 'cat-' . $key ?>" value="on" type="checkbox" <?php echo $checked ? 'checked' : "" ?>>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if (is_search()) : ?>
			<input type="hidden" name="s" value="<?php the_search_query(); ?>">
		<?php endif; ?>
		<input type="hidden" name="filter" value="on">
	</form>

</aside>

<a class="view-filters primary-btn" href="#">View Filters</a>