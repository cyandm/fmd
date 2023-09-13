<?php
/* Template Name: Contact Us */
?>

<?php
$phone_number_1 = get_option( 'cyn_phone_number_one' );
$phone_number_2 = get_option( 'cyn_phone_number_two' );
$address_text = get_option( 'cyn_address_text' );
$address_url = get_option( 'cyn_address_url' );
?>

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="contact container">
	<section class="contact-us">
		<div class="contact-image">
			<div class="title-controller">
				<h2>Get in <span class="purple-text">Touch</span></h2>
			</div>
			<?= wp_get_attachment_image( get_field( 'hero_image' )['id'], 'full', false, [ 'class' => 'feature-image' ] ) ?>
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

	<section class="how-to-find-us">

		<div class="content">
			<h2>How to <span class="purple-text">find us</span>?</h2>
			<h3>Our Phone Numbers</h3>
			<?php
			if ( $phone_number_1 ) : ?>
				<a href="tel:<?= $phone_number_1 ?>">
					<?= $phone_number_1 ?>
				</a>
			<?php endif;
			?>
			<?php
			if ( $phone_number_2 ) : ?>
				<a href="tel:<?= $phone_number_2 ?>">
					<?= $phone_number_2 ?>
				</a>
			<?php endif;
			?>
			<h3>Our Address</h3>
			<li>
				<?php
				if ( $address_text ) {
					echo $address_text;
				}
				?>
			</li>
			<h3>our location</h3>
			<?php
			if ( $address_url ) :
				echo $address_url;
			endif;
			?>
		</div>

		<div class="image">
			<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/contact-us.png' ?>" alt="">
		</div>
	</section>
</main>


<?php get_footer() ?>