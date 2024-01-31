<?php
$second_logo = get_option( 'cyn_second_logo' );
$phone_number_1 = get_option( 'cyn_phone_number_one' );
$phone_number_2 = get_option( 'cyn_phone_number_two' );
$address_text = get_option( 'cyn_address_text' );
$address_url = get_option( 'cyn_address_url' );

$instagram_url = get_option( 'cyn_instagram_url' );
$youtube_url = get_option( 'cyn_youtube_url' );
$facebook_url = get_option( 'cyn_facebook_url' );

?>
<footer class="site-footer">

	<div class="container">

		<div class="menus">
			<div class="us-menu">
				<span> us</span>
				<?php wp_nav_menu( [ 'theme_location' => 'footer-us' ] ) ?>
			</div>
			<div class="what-we-do-menu">
				<span> what we do?</span>


				<?php wp_nav_menu( [ 'theme_location' => 'footer-what-we-do' ] ) ?>
			</div>
			<div class="know-more-menu">
				<span>know more</span>
				<?php wp_nav_menu( [ 'theme_location' => 'footer-know-more' ] ) ?>
			</div>
		</div>

		<div>
			<div class="logo">
				<?php
				if ( $second_logo ) {
					echo "<img src=" . $second_logo . " />";
				} else {
					the_custom_logo();
				}

				?>
			</div>
			<div class="social-media">
				<?php if ( $instagram_url ) : ?>
					<a href="<?= $instagram_url ?>">
						<i class="icon-instagram"></i>
					</a>
				<?php endif; ?>

				<?php if ( $youtube_url ) : ?>
					<a href="<?= $youtube_url ?>">
						<i class="icon-youtube"></i>
					</a>
				<?php endif; ?>

				<?php if ( $facebook_url ) : ?>
					<a href="<?= $facebook_url ?>">
						<i class="icon-facebook"></i>
					</a>
				<?php endif; ?>

			</div>
		</div>

		<div>
			<div class="phone-numbers">
				Our Numbers
				<div>
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
				</div>

			</div>
			<div class="address">
				Our Address

				<div>
					<?php
					if ( $address_text ) :
						echo $address_text;
					endif;
					?>
				</div>
				<div>
					<?php
					if ( $address_url ) :
						echo $address_url;
					endif;
					?>
				</div>
			</div>
		</div>

	</div>

</footer>
<div>
	<?php wp_footer() ?>
</div>
</body>

</html>