<?php
/* Template Name: Front Page */
?>

<?php get_header( null, [ 'border' => false, 'preloader' => false ] ) ?>

<main class="front-page">
	<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], 'full', false, [ 'class' => 'hero-image' ] ); ?>
	<div class="hero-container container">
		<h1>
			<?= get_field( 'hero_title' ) ?>
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
	<div class="container product-cat-section">
		<div class="product-cat-group">
			<div class="product-cat-card hover">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
				<div>
					<p>Flooring</p>
					<i class="icon-arrow-top-right"></i>
				</div>
			</div>
			<div class="product-cat-card">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
				<div>
					<p>Flooring</p>
					<i class="icon-arrow-top-right"></i>
				</div>
			</div>
			<div class="product-cat-card">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
				<div>
					<p>Flooring</p>
					<i class="icon-arrow-top-right"></i>
				</div>
			</div>

		</div>
	</div>
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
	<section class="product-categories container">
		<div class="title-section">
			<h2 class="title">
				Product Categories
			</h2>

			<a href="#" class="primary-btn except-mobile"> View all</a>
		</div>

		<div class="product-categories-wrapper">
			<div class="product-category-item card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class="product-category-item card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class="product-category-item card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class="product-category-item card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>

		</div>
		<a href="#" class="primary-btn only-mobile"> View all</a>
	</section>
	<section class="brands ">
		<div class="title-section container">
			<h2 class="title">
				Brands We Carry
			</h2>

			<a href="#" class="primary-btn except-mobile"> View All </a>
		</div>


		<div class="brand-ticker">
			<div class="brand-wrapper">
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
			</div>
			<div class="brand-wrapper">
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
			</div>
		</div>
		<div dir="rtl" class="brand-ticker rtl">
			<div class="brand-wrapper">
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
			</div>
			<div class="brand-wrapper">
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
				<div class="ticker-item">
					<img class="single-brand" src="<?= get_stylesheet_directory_uri() . '/imgs/brand.png' ?>" alt="">
				</div>
			</div>
		</div>
		<a href="#" class="primary-btn only-mobile"> View all</a>

	</section>
	<section class="blog container">

		<div class="title-section">
			<h2 class="title">
				<div class="title-controller">
					<h2>let’s learn <br> <span class="purple-text">something new</span></h2>
				</div>
			</h2>

			<div class="shape-btn">
				<a href="#" class="primary-btn except-mobile">view all</a>
			</div>
		</div>

		<div class="blog-wrapper">
			<div class=" card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class=" card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class=" card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class=" card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class=" card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
			<div class=" card">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<a href="#">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
		</div>
		<a href="#" class="primary-btn only-mobile"> View all</a>

	</section>
	<section class="contact-us container">
		<div class="contact-image">
			<div class="title-controller">
				<h2>Get in <span class="purple-text">Touch</span></h2>
			</div>
			<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '680', '0' ], false, [ 'class' => '' ] ); ?>
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