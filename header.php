<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible"
			  content="IE=edge">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>

	<body>

		<header class="site-header <?= ( $args && ! $args['border'] ) ? 'no-border' : '' ?>">
			<div class="container ">
				<div class="logo-con">
					<div class="logo">
						<?php the_custom_logo() ?>
					</div>
				</div>

				<div class="search-menu-con">
					<form class="search"
						  action="/"
						  method="get">
						<i class="icon-search secondary"> </i>

						<input class=""
							   type="search"
							   placeholder="search"
							   value="<?php the_search_query(); ?>"
							   name="s"
							   id="search" />
					</form>

					<div class="desktop-menu">
						<?php wp_nav_menu( [ 'theme_location' => 'header' ] ) ?>
					</div>
				</div>

				<div class="mobile-menu">
					<i class="icon-menu"></i>

					<div class="sub-menu">
						<form class="mobile-search"
							  action="/"
							  method="get">
							<i class="icon-search"></i>
							<input class=""
								   type="search"
								   placeholder="search"
								   value="<?php the_search_query(); ?>"
								   name="s"
								   id="search" />
						</form>
						<?php wp_nav_menu( [ 'theme_location' => 'header' ] ) ?>
					</div>
				</div>
		</header>


		<?php if ( $args && $args['preloader'] ) : ?>
			<div class="preloader">

				<span class="title">Welcome To FMD</span>

			</div>
		<?php endif; ?>