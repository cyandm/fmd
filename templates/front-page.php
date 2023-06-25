<?php
/* Template Name: Front Page */
?>

<?php get_header( null, [ 'border' => false ] ) ?>

<main class="front-page">
	<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], 'full', false, [ 'class' => 'hero-image' ] ); ?>
	<div class="hero-container container">
		<h1>
			<?= get_field( 'hero_title' ) ?>
		</h1>

		<div class="subtract">
			<div class="inner-subtract">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/Subtract.png' ?>" alt="">

				<div class="spinner">
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
	<section class="today-offer container">
		<div class="feature-image">
			<div class="title-controller">
				<h2>Today's <span class="purple-text">Offer</span></h2>
			</div>
			<div class="feature-image-controller">
				<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], [ '680', '0' ], false, [ 'class' => '' ] ); ?>
			</div>
			<div class="slider-navigation">
				<i class="icon-arrow-left"></i>
				<i class="icon-arrow-right"></i>
			</div>
		</div>
		<div class="product-details">
			<div class="product-content">
				<h3>Minimal Parquet flooring</h3>
				<p>Solid wood flooring is made of one piece of wood from
					top to bottom and can be used in any room that is on
					or above ground. One of the many benefits of solid wood
					flooring is it can be sanded and refinished many times.
				</p>
			</div>
			<div class="product-controller">
				<div class="product-info">
					<span>only for a limited time</span>
					<span class="price">260$</span>
				</div>

				<a href="#" class="primary-btn">View product</a>
			</div>

			<div class="product-gallery">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
				<img src="<?= get_stylesheet_directory_uri() . '/imgs/thumbnail.png' ?>" alt="">
			</div>
		</div>
	</section>
</main>


<?php get_footer() ?>