<?php
/* Template Name: About Us */
?>

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="about-us ">
	<div class="changes-in-scroll container">
		<div class="slide-1">
			<h2 data-content="it was just an idea">it was just an idea</h2>
			<img src="<?= get_stylesheet_directory_uri() . '/imgs/about-us-sketch.png' ?>" alt="">
		</div>
		<div class="slide-2">
			<h2 data-content="until we made it real">until we made it real</h2>
			<img src="<?= get_stylesheet_directory_uri() . '/imgs/about-us-real.png' ?>" alt="">
		</div>
	</div>

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

	<section class="image-slogan">
		<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'image' ] ); ?>

		<div class="ribbon">
			we are the biggest in the industry
		</div>
	</section>

	<section class="content-middle container">
		<div class="content">
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>

			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
		</div>
		<div class="image grid">
			<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ); ?>
			<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ); ?>
			<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ); ?>
		</div>
	</section>
	<section class="call-to-action">
		<a href="" class="secondary-btn">
			<i class="icon-phone"></i>
			<span>call us now</span>
		</a>

		<span>we are here for you 24/7. Call us now</span>
	</section>

	<section class="content-middle container">
		<div class="image">
			<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ); ?>
		</div>

		<div class="content">

			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis sit. Iste beatae magnam
				consectetur quam quidem totam vitae ipsam ratione corrupti! Cumque sapiente accusantium blanditiis at
				fugit libero sequi.</p>
		</div>

	</section>
</main>

<?php get_footer() ?>