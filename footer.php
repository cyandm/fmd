<?php
$second_logo = get_option( 'cyn_second_logo' );
$phone_number_1 = get_option( 'cyn_phone_number_one' );
$phone_number_2 = get_option( 'cyn_phone_number_two' );
$address_text = get_option( 'cyn_address_text' );
$address_url = get_option( 'cyn_address_url' );
?>
<footer class="site-footer">

	<div class="container">

		<div class="menus">
			<div class="us-menu">
				<span> us</span>
				<?php wp_nav_menu( [ 'menu' => 'Footer - Us' ] ) ?>
			</div>
			<div class="what-we-do-menu">
				<span> what we do?</span>


				<?php wp_nav_menu( [ 'menu' => 'Footer - What We Do?' ] ) ?>
			</div>
			<div class="know-more-menu">
				<span>know more</span>
				<?php wp_nav_menu( [ 'menu' => 'Footer - Know More' ] ) ?>
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
				<i class="icon-instagram"></i>
				<i class="icon-telegram"></i>
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
<wpscripts>
	<?php wp_footer() ?>
</wpscripts>
</body>

</html>