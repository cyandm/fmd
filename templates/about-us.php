<?php
/* Template Name: About Us */
?>

<!-- @change start -->
<?php
$phone_number_1 = get_option( 'cyn_phone_number_one' );
?>
<!-- @change end -->

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="about-us ">
	<div class="changes-in-scroll container">
		<div class="slide-1">
			<h2 data-content="it was just an idea">it was just an idea</h2>
			<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/about-us-sketch.png' ?>" alt="">
		</div>
		<div class="slide-2">
			<h2 data-content="until we made it real">until we made it real</h2>
			<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/about-us-real.png' ?>" alt="">
		</div>
	</div>

	<section class="ticker">

		<?php for ( $i = 0; $i < 3; $i++ ) : ?>
			<div class="ticker-wrapper">
				<!-- @change start -->
				<div class="ticker-item">largest selection of finishing supplies</div>
				<!-- @change end -->
				<div class="ticker-item">Lowest Prices</div>
				<div class="ticker-item">Exceptional Customer Service</div>
				<div class="ticker-item">Biggest Selection of Brands</div>
				<div class="ticker-item">In Stock material</div>
			</div>
		<?php endfor; ?>
	</section>

	<section class="image-slogan">
		<?= wp_get_attachment_image( get_field( 'feature_image' ), 'full', false, [ 'class' => 'image' ] ); ?>

		<div class="ribbon">
			<?php the_field( 'slogan' ) ?>
		</div>
	</section>

	<section class="content-middle container">
		<div class="content">
			<?php the_field( 'left-text-paragraph' ) ?>
		</div>
		<div class="image grid">

			<?php
			$images_right = get_field( 'images_right' );

			foreach ( $images_right as $image ) {
				echo wp_get_attachment_image( $image, 'full', false, [ 'class' => '' ] );
			}

			?>
		</div>
	</section>
	<section class="call-to-action">
		<!-- @change start -->
		<a href="<?= 'tel:' . $phone_number_1 ?>" class="secondary-btn">
		<!-- @change end -->
			
			<i class="icon-phone"></i>
			<span>call us now</span>
		</a>

		<span>we are here for you 24/7. Call us now</span>
	</section>

	<section class="content-middle container">
		<div class="image">
			<?= wp_get_attachment_image( get_field( 'image_left' ), 'full', false, [ 'class' => '' ] ); ?>
		</div>

		<div class="content">

			<?php the_field( 'right-text-paragraph' ) ?>

		</div>

	</section>
</main>

<?php get_footer() ?>