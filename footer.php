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
				<?php the_custom_logo() ?>
			</div>
			<div class="social-media">
				<i class="icon-instagram"></i>
				<i class="icon-telegram"></i>
			</div>
		</div>

		<div>
			<div class="phone-numbers">
				Our Numbers
			</div>
			<div class="address">
				Our Address
			</div>
		</div>

	</div>

</footer>
<wpscripts>
	<?php wp_footer() ?>
</wpscripts>
</body>

</html>