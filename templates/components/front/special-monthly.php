<?php
$home_id = get_option('page_on_front');
$is_active = get_field('special_monthly_is_active', $home_id);

$special_group = [];

for ($i = 1; $i <= 4; $i++) {
	array_push(
		$special_group,
		[
			'feature_image' => get_field('special_monthly_' . $i . '_feature_image'),
			'title' => get_field('special_monthly_' . $i . '_title'),
			'description' => get_field('special_monthly_' . $i . '_description'),
			'slogan' => get_field('special_monthly_' . $i . '_slogan'),
			'price' => get_field('special_monthly_' . $i . '_price'),
			'url' => get_field('special_monthly_' . $i . '_url'),
			'gallery_image_1' => get_field('special_monthly_' . $i . '_gallery_image_1'),
			'gallery_image_2' => get_field('special_monthly_' . $i . '_gallery_image_2'),
			'gallery_image_3' => get_field('special_monthly_' . $i . '_gallery_image_3'),
			'gallery_image_4' => get_field('special_monthly_' . $i . '_gallery_image_4'),
		],
	);
}

if (! $is_active)
	return;
?>

<section id="scroll-target"
	class="today-offer container">
	<div class="feature-image">
		<div class="title-controller">
			<h2>Monthly <span class="purple-text">Specials</span></h2>
		</div>
		<div class="feature-image-controller cyn-slider-wrapper">

			<?php foreach ($special_group as $group) :
				if (empty($group['url']))
					continue;
			?>
				<div class="img-mask cyn-slide">
					<a href=<?= $group['url'] ?>>
						<?= wp_get_attachment_image($group['feature_image'], ['680', '0'], false, ['class' => 'image']); ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="slider-navigation">
			<i id="cyn-prev-slide"
				class="icon-arrow-left"></i>
			<i id="cyn-next-slide"
				class="icon-arrow-right"></i>
		</div>
	</div>
	<div class="product-details">

		<div class="product-content">

			<div class="cyn-slider-wrapper header-wrapper">
				<?php foreach ($special_group as $group) :
					if (empty($group['title']))
						continue;

				?>
					<div class="cyn-slide">
						<h3>
							<?= $group['title'] ?>
						</h3>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="cyn-slider-wrapper desc-wrapper">
				<?php foreach ($special_group as $group) :
					if (empty($group['description']))
						continue;

				?>
					<p class="cyn-slide">
						<?= $group['description'] ?>
					</p>
				<?php endforeach; ?>
			</div>


		</div>
		<div class="product-controller">
			<div class="product-info">
				<div class="cyn-slider-wrapper slogan-wrapper">
					<?php foreach ($special_group as $group) :
						if (empty($group['slogan']))
							continue;

					?>
						<div class="cyn-slide">
							<span><?php echo $group['slogan'] ?></span>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="cyn-slider-wrapper price-wrapper">
					<?php foreach ($special_group as $group) :
						if (empty($group['price']))
							continue;
					?>
						<span class="cyn-slide">
							<span class="price">
								<?= '$' . $group['price'] ?>
							</span>
						</span>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="cyn-slider-wrapper button-wrapper">
				<?php foreach ($special_group as $group) :
					if (empty($group['url']))
						continue;

				?>
					<a href=<?= $group['url'] ?>
						class="primary-btn cyn-slide">View All</a>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="product-gallery">
			<?php for ($i = 1; $i < 5; $i++) : ?>
				<div class="cyn-slider-wrapper product-gallery-item">
					<?php foreach ($special_group as $group) {
						$img_id = $group["gallery_image_$i"];
						if (empty($img_id))
							continue;

						echo $img_id ?
							wp_get_attachment_image($img_id, 'full', false, ['class' => 'cyn-slide'])
							: '<img class="cyn-slide" src= ' . get_stylesheet_directory_uri() . '/assets/imgs/placeholder.png />';
					} ?>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>