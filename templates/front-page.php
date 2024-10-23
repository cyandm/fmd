<?php

/* Template Name: Front Page */
$hero_slider_group = get_field('slider_images');

$product_cat_top_group_1 = get_field('category_on_top_1');
$product_cat_top_group_2 = get_field('category_on_top_2');
$product_cat_top_group = array_merge($product_cat_top_group_1, $product_cat_top_group_2);
$product_cat_middle_group_1 = get_field('category_on_middle_1');
$product_cat_middle_group_2 = get_field('category_on_middle_2');
$product_cat_middle_group = array_merge($product_cat_middle_group_2, $product_cat_middle_group_1);





$brands = get_field('brands_special');

$brands_query = new WP_Query([
	'post_type' => 'brand_post_type',
	'post__in' => $brands,
]);


$blog_posts = new WP_Query(['tag' => 'front-page-posts', 'posts_per_page' => '6']);
$feature_products = get_field('feature_products');

$about_content = get_field('about_content');
$about_link = get_field('about_link');
$about_video_url = get_field('about_video_url');
$about_cover_img_url = get_field('about_cover_img_url');

$work_hours = [
	'monday' => '7am - 5:30pm',
	'tuesday' => '7am - 5:30pm',
	'wednesday' => '7am - 5:30pm',
	'thursday' => '7am - 5:30pm',
	'friday' => '7am - 5:30pm',
	'saturday' => '8am - 5pm',
	'sunday' => 'closed',
];


?>



<?php get_header(null, ['border' => false, 'preloader' => false]) ?>

<main class="front-page">

	<?php if ($hero_slider_group['image_1'] && $hero_slider_group['image_2'] && $hero_slider_group['hero-link']): ?>

		<section class="hero-slider hero-container container">

			<a href="<?php echo $hero_slider_group['hero-link'] ?>" class="hero-items">
				<?php echo wp_get_attachment_image($hero_slider_group['image_1'], 'full', '', ['class' => 'hero-image hero-img-first', 'srcset' => wp_get_attachment_url($hero_slider_group['image_1']), 'full']); ?>

				<?php echo wp_get_attachment_image($hero_slider_group['image_2'], 'full', '', ['class' => 'hero-image hero-img-second', 'srcset' => wp_get_attachment_url($hero_slider_group['image_2']), 'full']); ?>
			</a>

			<!-- <div class="swiper-wrapper">

			<?php
			//for ($quantitySlider = 1; $quantitySlider <= 6; $quantitySlider++):
			//if ($hero_slider_group['image_' . $quantitySlider]):
			//$slider_img_id = $hero_slider_group['image_' . $quantitySlider];
			//$mobile_slider_img_id = $hero_slider_group['m_image_' . $quantitySlider];
			//$slider_title = $hero_slider_group['title_' . $quantitySlider];
			?>

					<div class="swiper-slide">

						<?php
						//$class_check = 'hero-image ';
						//if (isset($mobile_slider_img_id[1])) {
						//$class_check .= 'desktop-hero-image';
						//} 
						?>

						<?php //echo wp_get_attachment_image($slider_img_id, 'full', '', ['class' => $class_check, 'srcset' => wp_get_attachment_url($slider_img_id), 'full']); 
						?>

						<?php //if ($mobile_slider_img_id): 
						?>

							<?php //echo wp_get_attachment_image($mobile_slider_img_id, 'full', '', ['class' => 'hero-image mobile-hero-image', 'srcset' => wp_get_attachment_url($mobile_slider_img_id), 'full']); 
							?>

						<?php //endif 
						?>

						<?php //if ($slider_title): 
						?>

							<div class="container hero-heading">
								<?php //echo $slider_title 
								?>
							</div>

						<?php //endif 
						?>

					</div>

				<?php //endif 
				?>

			<?php //endfor 
			?>

		</div> -->

			<!-- <div class="container subtract-parent">
			<div class="subtract">
				<div class="inner-subtract">
					<img src="<? //= get_stylesheet_directory_uri() . '/assets/imgs/Subtract.png' 
								?>"
						alt="">

					<a href="/home-shop">
						<div class="spinner">
							<svg viewBox="0 0 112 112">
								<path id="curve"
									d="
								M 20, 55
								a 25,25 0 1,1 72,0
								a 25,25 0 1,1 -72,0
							"
									fill="transparent" />
								<text width="500"
									fill="#fff">
									<textPath xlink:href="#curve">
										Explore our products
									</textPath>
								</text>
							</svg>
							<i class="icon-arrow-down-right">

							</i>
						</div>
					</a>
				</div>
			</div>

		</div> -->

		</section>

	<?php endif ?>


	<!-- <section class="container product-cat-section">
		<div class="product-cat-group">

			<?php
			//if ($product_cat_top_group) :

			//foreach ($product_cat_top_group as $product_cat) :

			//$product_cat_img_id = get_field('custom_thumbnail', $product_cat->taxonomy . '_' . $product_cat->term_id);
			?>
					<a href="<? //= get_term_link($product_cat) 
								?>"
						class="product-cat-card">
						<? //= wp_get_attachment_image($product_cat_img_id, 'thumbnail', false, ['class' => '']); 
						?>
						<div>
							<p>
								<? //= $product_cat->name 
								?>
							</p>
							<i class="icon-arrow-top-right"></i>
						</div>
					</a>
			<?php //endforeach;
			//endif; 
			?>
		</div>
	</section> -->

	<?php if ($product_cat_middle_group) : ?>
		<section class="product-categories container">
			<div class="title-section">
				<h2 class="title">
					Product Categories
				</h2>

				<a href="/home-shop"
					class="primary-btn except-mobile"> View All</a>
			</div>

			<div class="product-categories-wrapper">

				<?php foreach ($product_cat_middle_group as $product_cat) {

					get_template_part('/templates/components/card', null, [
						'url' => get_term_link($product_cat),
						'card_class' => 'product-category-item',
						'image_id' => get_field('custom_thumbnail', $product_cat->taxonomy . '_' . $product_cat->term_id),
						'card_title' => $product_cat->name,
						'card_description' => $product_cat->count . ' item',
					]);
				} ?>
			</div>
			<a href="/products"
				class="primary-btn only-mobile"> View all</a>
		</section>
	<?php endif; ?>

	<section>
		<div class="ticker">
			<?php for ($i = 0; $i < 5; $i++) : ?>
				<div class="ticker-wrapper">
					<div class="ticker-item"> largest selection of home improvement supplies</div>
					<div class="ticker-item">Exceptional Customer Service</div>
					<div class="ticker-item">In Stock material</div>
				</div>
			<?php endfor; ?>
		</div>
	</section>

	<?php get_template_part('/templates/components/front/special-monthly') ?>

	<?php if ($brands_query->have_posts()) : ?>
		<section class="brands">
			<div class="title-section container">
				<h2 class="title">
					Brands We Carry
				</h2>

				<a href="/home-brands"
					class="primary-btn except-mobile"> View All </a>
			</div>
			<div class="brand-ticker">
				<?php for ($i = 0; $i < 4; $i++) : ?>
					<div class="brand-wrapper">
						<?php while ($brands_query->have_posts()) :
							$brands_query->the_post(); ?>

							<a class="ticker-item"
								href="<?= get_field('link')['url'] ?>">
								<?php the_post_thumbnail('full', ['class' => 'single-brand']) ?>
							</a>

						<? endwhile; ?>
					</div>
				<?php endfor; ?>
			</div>
			<div class="container">
				<a href="/home-brands"
					class="primary-btn only-mobile"> View All </a>
			</div>
		<?php endif; ?>
		</section>
		<?php wp_reset_postdata(); ?>

		<?php if ($about_content) : ?>
			<section class="about container">
				<div class="content-container">
					<div class="video-wrapper">
						<video src="<?= $about_video_url ?>"
							poster="<?= $about_cover_img_url ?>"
							controls
							autoplay
							muted />
					</div>
					<div class="content-wrapper">
						<h2>About <span class="purple-text">Fmd Distributor</span></h2>
						<p class="content">
							<?= $about_content ?>
						</p>
						<a href=<?= $about_link ?>
							class="primary-btn">More</a>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ($blog_posts->have_posts()) : ?>
			<section class="blog container">

				<div class="title-section">
					<h2 class="title">
						<div class="title-controller">
							<h2>let’s learn <br> <span class="purple-text">something new</span></h2>
						</div>
					</h2>

					<div class="shape-btn">
						<a href="/blog"
							class="primary-btn except-mobile">view All</a>
					</div>
				</div>

				<div class="blog-wrapper">
					<?php
					while ($blog_posts->have_posts()) {
						$blog_posts->the_post();
						get_template_part('templates/components/card', null, [
							'url' => get_the_permalink(),
							'image_id' => get_post_thumbnail_id(),
							'card_title' => get_the_title(),
							'card_description' => get_the_excerpt(),

						]);
					}

					wp_reset_postdata();
					?>
				</div>
				<a href="/blog"
					class="primary-btn only-mobile"> View all</a>

			</section>
		<?php endif; ?>

		<section class="contact-us container">
			<div class="contact-image">
				<div class="title-controller">
					<h2>Get in <span class="purple-text">Touch</span></h2>
				</div>
				<?= wp_get_attachment_image(get_field('contact_us_image'), ['1400', '0'], false, ['class' => '']); ?>
			</div>
			<div class="contact-form">

				<form action="#"
					id="contact-us-form">
					<label for="phone-number">
						phone number
						<input type="tel"
							name="phone-number"
							placeholder="phone number">
					</label>
					<label for="email">
						email
						<input type="email"
							name="email"
							placeholder="email">
					</label>
					<label for="describe">
						what are you looking for?
						<textarea name="describe"
							placeholder="describe"
							id=""
							rows="4"></textarea>
					</label>
					<label for="checkbox">
						<input type="checkbox"
							name="checkbox"
							id="">
						i want you to inform me about new products and new offers
					</label>

					<button type="submit"
						id="contact-us-form-submit"
						class="primary-btn">
						Send
					</button>
				</form>

			</div>
		</section>

		<section class="work-hours container">
			<h2 class="title">
				Store <span class="purple-text">hours</span>
			</h2>

			<div class="work-hours-con">
				<div class="img-wrapper">
					<?= wp_get_attachment_image(get_field('work_hours_img'), 'full') ?>
				</div>

				<div class="table-con">
					<table>
						<?php foreach ($work_hours as $day => $time) : ?>
							<tr>
								<td>
									<?= $day ?>
								</td>
								<td>
									<?= $time ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</section>
</main>


<?php get_footer() ?>