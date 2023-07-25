<?php
$front_page_id = get_option('page_on_front');
$productId = get_the_ID();

/************* Specification */
$specification = array();

$brandTerm = get_the_terms($productId, 'brand');
$brandImg = null;
if (is_array($brandTerm) && count($brandTerm) > 0) {
	$brand_id = $brandTerm[0]->term_id;
	$brandImg = get_field('brand_logo', 'brand' . '_' . $brand_id);

	$specification['Brand'] = $brandTerm[0]->name;
}

$typeTerm = get_the_terms($productId, 'product-cat');
foreach ($typeTerm as $tTerm) {
	if ($tTerm->parent > 0) {
		$parent = get_term($tTerm->parent);
		$specification['Type'] = $parent->name;
		$specification['Collection'] = $tTerm->name;
		break;
	}
}

$specification['Product Sid']   = get_field('product_sid', $productId);
$specification['Product code']  = get_field('product_code', $productId);
$specification['color code']    = get_field('product_color_code', $productId);
$specification['finish']        = get_field('product_finish', $productId);
$specification['installation']  = get_field('product_installation', $productId);
$specification['sqft / box']    = get_field('product_sqft_box', $productId);
$specification['sqft / pallet'] = get_field('product_sqft_pallet', $productId);
$specification['box / pallet']  = get_field('product_box_pallet', $productId);

$filterTerm = get_the_terms($productId, 'filters');
if (is_array($filterTerm)) {
	foreach ($filterTerm as $fTerm) {
		if ($fTerm->parent > 0) {
			$parent = get_term($fTerm->parent);
			$specification[strtolower($parent->name)] = $fTerm->name;
		}
	}
}

/************* Gallery */
$imgs = [];
$gallery = get_field('product_gallery_group', $productId);

if (!empty(get_the_post_thumbnail_url()))
	$imgs[] = get_the_post_thumbnail_url();

if (!empty($gallery)) {
	foreach ($gallery as $imgUrl) {
		if (!empty($imgUrl))
			$imgs[] = $imgUrl;
	}
}

function render_slides()
{
	global $imgs;
	foreach ($imgs as $img) {
		echo "<img class=\"swiper-slide\" src=\"$img\" />";
	}
}

/************* Related */
$related = get_field('related_group', $productId);
?>

<?php get_header(null, ['border' => true, 'preloader' => false]) ?>

<main class="single-product">
	<section class="top-page container">
		<div>
			<a href="javascript:window.history.back();" class="primary-btn">
				<i class="icon-arrow-long-left"></i>
			</a>
		</div>
		<h1>
			<?= get_the_title() ?>
		</h1>
	</section>

	<section class="product-info container">
		<div class="product-details">
			<div class="header-tabs">
				<span data-tab="specification" class="active">Specification</span>
				<span data-tab="description" class="">Description</span>
			</div>
			<div class="content-tabs">
				<div data-tab="specification" class="specification active">
					<table>
						<tbody>
							<?php foreach ($specification as $item => $value) : ?>
								<?php if (!empty($value)) : ?>
									<?php if ($item != 'width' && $item != 'thickness' && $item != 'height') : ?>
										<tr>
											<th><?php echo $item ?></th>
											<td colspan="2"><?php echo $value ?></td>
										</tr>
									<?php endif; ?>
								<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<th rowspan="3">Dimensions</th>
								<td class="half-width">width</td>
								<td class="half-width"><?php echo isset($specification['width']) ? $specification['width'] : 'N/A'; ?></td>
							</tr>
							<tr>
								<td class="half-width">thickness</td>
								<td class="half-width"><?php echo isset($specification['thickness']) ? $specification['thickness'] : 'N/A'; ?></td>
							</tr>
							<tr>
								<td class="half-width">height</td>
								<td class="half-width"><?php echo isset($specification['height']) ? $specification['height'] : 'N/A'; ?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div data-tab="description" class="description">
					<h2>item describtion</h2>
					<p>
						<?php echo !empty(get_field('product_desc')) ? get_field('product_desc') : ''; ?>
					</p>
				</div>
			</div>
		</div>

		<div class="product-gallery">
			<?php
			if (!empty($brandImg))
				echo "<img id='product-brand-logo' src='$brandImg'>";
			?>

			<div class="product-slider swiper">
				<div class="swiper-wrapper">
					<?php render_slides() ?>
				</div>

				<div class="slider-navigation">
					<i class="icon-arrow-long-left"></i>
					<i class="icon-arrow-long-right"></i>
				</div>
			</div>

			<div class="product-thumbnails swiper" style="width: 100%;">
				<div class="swiper-wrapper">
					<?php render_slides() ?>
				</div>
			</div>
		</div>
	</section>

	<section class="call-to-action">
		<?php $phone_number_1 = get_option('cyn_phone_number_one'); ?>
		<div class="container">
			<span>Price: </span>
			<a href="tel:<?php echo isset($phone_number_1) ? $phone_number_1 : ''; ?>" class="secondary-btn">
				<i class="icon-phone"></i>
				call us now
			</a>
			<span>
				we are here for you 24/7. call us now
			</span>
		</div>
	</section>

	<section class="transitions container">
		<span class='title'>
			transitions that comes with this product
		</span>

		<div class="transitions-wrapper">
			<div class="image-wrapper">
				<img src=" <?php echo get_template_directory_uri() . '/imgs/End_Cap_1.png' ?> " alt="">
				<p>End Cap</p>
			</div>
			<div class="image-wrapper">
				<img src=" <?php echo get_template_directory_uri() . '/imgs/Quarter_Round_1.png' ?> " alt="">
				<p>Quarter Round</p>
			</div>
			<div class="image-wrapper">
				<img src=" <?php echo get_template_directory_uri() . '/imgs/Reducer_1.png' ?> " alt="">
				<p>Reducer</p>
			</div>
			<div class="image-wrapper">
				<img src=" <?php echo get_template_directory_uri() . '/imgs/Stair_Nose_1.png' ?> " alt="">
				<p>Stair Nose</p>
			</div>
			<div class="image-wrapper">
				<img src=" <?php echo get_template_directory_uri() . '/imgs/T-Molding_1.png' ?> " alt="">
				<p>T-Molding</p>
			</div>
		</div>
	</section>

	<?php if (isset($related['related_products']) && $related['related_products'] != false) : ?>
		<section class="related-products container">
			<div class="title">
				<span>you might like this products too</span>
			</div>

			<div class="products-wrapper">
				<?php foreach ($related['related_products'] as $pId) : ?>
					<a href="<?php echo get_the_permalink($pId); ?>" class="product-card">
						<?= wp_get_attachment_image(get_post_thumbnail_id($pId), 'full', false, ['class' => '']) ?>

						<div class="product-content">
							<span><?php echo get_the_title($pId); ?></span>
							<span class="white-btn">View</span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if (isset($related['related_articles']) && $related['related_articles'] != false) : ?>
		<section class="related-blogs container">
			<div class="title">
				<span>
					you might like to know more
				</span>
			</div>

			<div class="blogs-wrapper">
				<?php foreach ($related['related_articles'] as $pId) : ?>
					<?php
					get_template_part('templates/components/card', null, [
						'url' => get_permalink($pId),
						'image_id' => get_post_thumbnail_id($pId),
						'card_title' => get_the_title($pId),
						'card_description' => get_the_excerpt($pId)
					]);
					?>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>
</main>

<?php get_footer() ?>