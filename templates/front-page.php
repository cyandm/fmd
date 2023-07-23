<?php

/* Template Name: Front Page */
$product_cat_middle_group = get_field( 'category_on_middle' );
$product_cat_top_group = get_field( 'category_on_top' );
$brands_ltr = get_field( 'brands_ltr' );
$brands_rtl = get_field( 'brands_rtl' );
$blog_posts = new WP_Query( [ 
	'tag' => 'front-page-posts',
	'posts_per_page' => '6'
] );


?>

<?php get_header( null, [ 'border' => false, 'preloader' => false ] ) ?>

<main class="front-page">
	<?= wp_get_attachment_image( get_field( 'feature_image' ), 'full', false, [ 'class' => 'hero-image' ] ); ?>
	<div class="hero-container container">
		<h1>
			<?= get_field( 'home_page_title' ) ?>
		</h1>

		<div class="subtract">
			<div class="inner-subtract">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/Subtract.png' ?>" alt="">

				<div id="scroll-to-bottom" class="spinner">
					<svg viewBox="0 0 112 112">
						<path id="curve" d="
							M 20, 55
							a 25,25 0 1,1 72,0
							a 25,25 0 1,1 -72,0
						" fill="transparent" />
						<text width="500" fill="#fff">
							<textPath xlink:href="#curve">
								Explore our products
							</textPath>
						</text>
					</svg>
					<i class="icon-arrow-down-right">

					</i>
				</div>
			</div>
		</div>

	</div>
	<section class="container product-cat-section">
		<div class="product-cat-group">

			<?php
			if ( $product_cat_top_group ) :

				foreach ( $product_cat_top_group as $product_cat ) :

					$product_cat_img_id = get_field( 'custom_thumbnail', $product_cat->taxonomy . '_' . $product_cat->term_id );
					?>
					<a href="<?= get_term_link( $product_cat ) ?>" class="product-cat-card">
						<?= wp_get_attachment_image( $product_cat_img_id, 'thumbnail', false, [ 'class' => '' ] ); ?>
						<div>
							<p>
								<?= $product_cat->name ?>
							</p>
							<i class="icon-arrow-top-right"></i>
						</div>
					</a>
				<?php endforeach; endif; ?>
		</div>
	</section>
	<section id="scroll-target" class="today-offer container">
		<div class="feature-image">
			<div class="title-controller">
				<h2>Today's <span class="purple-text">Offer</span></h2>
			</div>
			<div class="feature-image-controller cyn-slider-wrapper">
				<div class="img-mask cyn-slide active">
					<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '680', '0' ], false, [ 'class' => 'image' ] ); ?>
				</div>
				<div class="img-mask cyn-slide">
					<?= wp_get_attachment_image( 52, [ '680', '0' ], false, [ 'class' => 'image' ] ); ?>
				</div>
				<div class="img-mask cyn-slide">
					<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '680', '0' ], false, [ 'class' => 'image' ] ); ?>
				</div>
			</div>
			<div class="slider-navigation">
				<i id="cyn-prev-slide" class="icon-arrow-left"></i>
				<i id="cyn-next-slide" class="icon-arrow-right"></i>
			</div>
		</div>
		<div class="product-details">

			<div class="product-content">

				<div class="cyn-slider-wrapper header-wrapper">
					<div class="cyn-slide active">
						<h3>Minimal Parquet flooring</h3>
					</div>
					<div class="cyn-slide">
						<h3>Minimal yellow flooring</h3>
					</div>
					<div class="cyn-slide">
						<h3>Minimal blue flooring</h3>
					</div>
				</div>

				<div class="cyn-slider-wrapper desc-wrapper">
					<p class="cyn-slide active">Solid wood flooring is made of one piece of wood from
						top to bottom and can be used in any room that is on
						or above ground. One of the many benefits of solid wood
						flooring is it can be sanded and refinished many times.
					</p>
					<p class="cyn-slide">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium qui
						ducimus tempora doloribus ea eum quae dolorem minima pariatur, quaerat perspiciatis. Recusandae
						optio fuga nihil nobis a id at quasi.
					</p>
					<p class="cyn-slide">Solid wood flooring is made of one piece of wood from
						top to bottom and can be used in any room that is on
						or above ground. One of the many benefits of solid wood
						flooring is it can be sanded and refinished many times.
					</p>
				</div>


			</div>
			<div class="product-controller">
				<div class="product-info">
					<span>only for a limited time</span>
					<div class="cyn-slider-wrapper price-wrapper">
						<span class="cyn-slide active">
							<span class="price">260$</span>
						</span>
						<span class="cyn-slide">
							<span class="price">270$</span>
						</span>
						<span class="cyn-slide">
							<span class="price">310$</span>
						</span>
					</div>
				</div>

				<div class="cyn-slider-wrapper button-wrapper">
					<a href="#" class="primary-btn cyn-slide active">View product 1</a>
					<a href="#" class="primary-btn cyn-slide">View product 2</a>
					<a href="#" class="primary-btn cyn-slide">View product 3</a>
				</div>
			</div>

			<div class="product-gallery">
				<div class="cyn-slider-wrapper product-gallery-item">
					<img class="cyn-slide active" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>"
						alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail-2.png' ?>" alt="">
				</div>
				<div class="cyn-slider-wrapper product-gallery-item">
					<img class="cyn-slide active" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>"
						alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail-2.png' ?>" alt="">
				</div>
				<div class="cyn-slider-wrapper product-gallery-item">
					<img class="cyn-slide active" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>"
						alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail-2.png' ?>" alt="">
				</div>
				<div class="cyn-slider-wrapper product-gallery-item">
					<img class="cyn-slide active" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>"
						alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
					<img class="cyn-slide" src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail-2.png' ?>" alt="">
				</div>
			</div>
		</div>
	</section>
	<section class="ticker">
		<div class="ticker-wrapper">
			<div class="ticker-item">largest selection of building supplies</div>
			<div class="ticker-item">Lowest Prices</div>
			<div class="ticker-item">Exceptional Customer Service</div>
			<div class="ticker-item">Biggest Selection of Brands</div>
			<div class="ticker-item">In Stock material</div>
		</div>
		<div class="ticker-wrapper">
			<div class="ticker-item">largest selection of building supplies</div>
			<div class="ticker-item">Lowest Prices</div>
			<div class="ticker-item">Exceptional Customer Service</div>
			<div class="ticker-item">Biggest Selection of Brands</div>
			<div class="ticker-item">In Stock material</div>
		</div>
		<div class="ticker-wrapper">
			<div class="ticker-item">largest selection of building supplies</div>
			<div class="ticker-item">Lowest Prices</div>
			<div class="ticker-item">Exceptional Customer Service</div>
			<div class="ticker-item">Biggest Selection of Brands</div>
			<div class="ticker-item">In Stock material</div>
		</div>
	</section>

	<?php if ( $product_cat_middle_group ) : ?>
		<section class="product-categories container">
			<div class="title-section">
				<h2 class="title">
					Product Categories
				</h2>

				<a href="/products" class="primary-btn except-mobile"> View all</a>
			</div>

			<div class="product-categories-wrapper">

				<?php foreach ( $product_cat_middle_group as $product_cat ) {

					get_template_part( '/templates/components/card', null, [ 
						'url' => get_term_link( $product_cat ),
						'card_class' => 'product-category-item',
						'image_id' => get_field( 'custom_thumbnail', $product_cat->taxonomy . '_' . $product_cat->term_id ),
						'card_title' => $product_cat->name,
						'card_description' => $product_cat->count . ' item',
					] );
				} ?>
			</div>
			<a href="/products" class="primary-btn only-mobile"> View all</a>
		</section>
	<?php endif; ?>

	<?php if ( $brands_ltr || $brands_rtl ) : ?>
		<section class="brands ">
			<div class="title-section container">
				<h2 class="title">
					Brands We Carry
				</h2>

				<a href="/brands" class="primary-btn except-mobile"> View All </a>
			</div>

			<?php if ( $brands_ltr ) : ?>
				<div class="brand-ticker">
					<?php for ( $i = 0; $i < 2; $i++ ) : ?>
						<div class="brand-wrapper">

							<?php foreach ( $brands_ltr as $brand ) : ?>
								<a href="<?= get_term_link( $brand ) ?>" class="ticker-item">
									<?= wp_get_attachment_image( get_field( 'custom_thumbnail', $brand->taxonomy . '_' . $brand->term_id ), 'full', false, [ 'class' => 'single-brand' ] ) ?>
								</a>
							<?php endforeach; ?>

						</div>
					<?php endfor; ?>
				</div>
			<?php endif; ?>

			<?php if ( $brands_rtl ) : ?>
				<div dir="rtl" class="brand-ticker rtl">
					<?php for ( $i = 0; $i < 2; $i++ ) : ?>
						<div class="brand-wrapper">

							<?php foreach ( $brands_rtl as $brand ) : ?>
								<a href="<?= get_term_link( $brand ) ?>" class="ticker-item">
									<?= wp_get_attachment_image( get_field( 'custom_thumbnail', $brand->taxonomy . '_' . $brand->term_id ), 'full', false, [ 'class' => 'single-brand' ] ) ?>
								</a>
							<?php endforeach; ?>

						</div>
					<?php endfor; ?>
				</div>
			<?php endif; ?>

			<a href="/brands" class="primary-btn only-mobile"> View all</a>

		</section>
	<?php endif; ?>

	<?php if ( $blog_posts->have_posts() ) : ?>
		<section class="blog container">

			<div class="title-section">
				<h2 class="title">
					<div class="title-controller">
						<h2>let’s learn <br> <span class="purple-text">something new</span></h2>
					</div>
				</h2>

				<div class="shape-btn">
					<a href="/blog" class="primary-btn except-mobile">view all</a>
				</div>
			</div>

			<div class="blog-wrapper">
				<?php
				while ( $blog_posts->have_posts() ) {
					$blog_posts->the_post();
					get_template_part( 'templates/components/card', null, [ 
						'url' => get_the_permalink(),
						'image_id' => get_post_thumbnail_id(),
						'card_title' => get_the_title(),
						'card_description' => get_the_excerpt(),

					] );
				}

				wp_reset_postdata();
				?>
			</div>
			<a href="/blog" class="primary-btn only-mobile"> View all</a>

		</section>
	<?php endif; ?>

	<section class="contact-us container">
		<div class="contact-image">
			<div class="title-controller">
				<h2>Get in <span class="purple-text">Touch</span></h2>
			</div>
			<?= wp_get_attachment_image( get_field( 'contact_us_image' ), [ '680', '0' ], false, [ 'class' => '' ] ); ?>
		</div>
		<div class="contact-form">

			<form action="#">
				<label for="phone-number">
					phone number
					<input type="tel" name="phone-number" placeholder="phone number">
				</label>
				<label for="email">
					email
					<input type="email" name="email" placeholder="email">
				</label>
				<label for="describe">
					what are you looking for?
					<textarea name="describe" placeholder="describe" id="" rows="4"></textarea>
				</label>
				<label for="checkbox">
					<input type="checkbox" name="checkbox" id="">
					i want you to inform me about new products and new offers
				</label>

				<a href="#" class="primary-btn">
					Submit
				</a>
			</form>

		</div>
	</section>
</main>


<?php get_footer() ?>