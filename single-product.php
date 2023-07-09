<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="single-product">
	<section class="top-page container">
		<div>
			<a href="#" class="primary-btn">
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
							<tr>
								<th>mmd</th>
								<td colspan="2">reza</td>
							</tr>
							<tr>
								<th>mmd</th>
								<td colspan="2">reza</td>
							</tr>
							<tr>
								<th rowspan="3">Dimensions</th>
								<td class="half-width">thickness</td>
								<td class="half-width">26mm</td>
							</tr>
							<tr>
								<td class="half-width">height</td>
								<td class="half-width">2cm</td>
							</tr>
							<tr>
								<td class="half-width">width</td>
								<td class="half-width">4cm</td>
							</tr>
							<tr>
								<th>mmd</th>
								<td colspan="2">reza</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div data-tab="description" class="description">
					<h2>item describtion</h2>
					This collection of hand-stained, wide-plank flooring features Character Grade Hard Maple at its
					finest.
					The hand staining lends expression to the fine, uniform grain of Maple, bringing it to life in a way
					that only hand craftsmanship can.
					Occasional knots, cracks and just the right amount of natural color variation add visual interest,
					and the subtle hand-scraped texture provides a surface that your family can live comfortably on
					without worrying about the occasional ding or dent.
					With a palette that includes both modern, neutral colors and classic rich hues, Roadhouse offers
					options for every space.
					Timeless, just like the classic American roadhouses that are each color's namesake.
				</div>

			</div>
		</div>

		<div class="product-gallery">
			<div class="product-slider swiper">
				<div class="swiper-wrapper">
					<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'swiper-slide' ] ) ?>
				</div>

				<div class="slider-navigation">
					<i class="icon-arrow-long-left"></i>
					<i class="icon-arrow-long-right"></i>
				</div>
			</div>

			<div class="product-thumbnails swiper">
				<div class="swiper-wrapper">
					<?= wp_get_attachment_image( 55, 'small', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 56, 'small', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 55, 'small', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 56, 'small', false, [ 'class' => 'swiper-slide' ] ) ?>
					<?= wp_get_attachment_image( 55, 'small', false, [ 'class' => 'swiper-slide' ] ) ?>
				</div>
			</div>
		</div>
	</section>

	<section class="call-to-action">
		<div class="container">
			<span>Price: </span>
			<a href="" class="secondary-btn">
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
				<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ) ?>
			</div>
			<div class="image-wrapper">
				<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => '' ] ) ?>
			</div>
			<div class="image-wrapper">
				<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ) ?>
			</div>
			<div class="image-wrapper">
				<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => '' ] ) ?>
			</div>
		</div>
	</section>

	<section class="related-products container">
		<div class="title">
			<span>you might like this products too</span>
			<a href="#" class="primary-btn except-mobile">View All</a>
		</div>

		<div class="products-wrapper">
			<div class="product-card">
				<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ) ?>

				<div class="product-content">
					<span>product name</span>
					<a href="#" class="white-btn">View</a>
				</div>
			</div>
			<div class="product-card">
				<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => '' ] ) ?>

				<div class="product-content">
					<span>product name</span>
					<a href="#" class="white-btn">View</a>
				</div>
			</div>
			<div class="product-card">
				<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ) ?>

				<div class="product-content">
					<span>product name</span>
					<a href="#" class="white-btn">View</a>
				</div>
			</div>
			<div class="product-card">
				<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => '' ] ) ?>

				<div class="product-content">
					<span>product name</span>
					<a href="#" class="white-btn">View</a>
				</div>
			</div>
		</div>

		<a href="#" class="primary-btn only-mobile">View All</a>
	</section>

	<section class="related-blogs container">
		<div class="title">
			<span>
				you might like to know more
			</span>

			<a href="#" class="primary-btn except-mobile">View All</a>
		</div>

		<div class="blogs-wrapper">
			<a href="#" class="card">
				<?= wp_get_attachment_image( 56, [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<i class="icon-arrow-down-right"></i>
				</div>
			</a>
			<a href="#" class="card">
				<?= wp_get_attachment_image( 55, [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<i class="icon-arrow-down-right"></i>
				</div>
			</a>
			<a href="#" class="card active">
				<?= wp_get_attachment_image( 56, [ '1440', '0' ], false, [ 'class' => '' ] ); ?>
				<div class="card-information">
					<div>
						<p class="card-title">Columns</p>
						<p class="card-description"> 140 items</p>
					</div>

					<i class="icon-arrow-down-right"></i>
				</div>
			</a>
		</div>

		<a href="#" class="primary-btn only-mobile">View All</a>
	</section>
</main>

<?php get_footer() ?>