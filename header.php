<?php
//$args = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body>

	<header class="site-header">
		<div class="container <?php if ( $args && ! $args['border'] )
			echo 'no-border' ?>">
				<div>
					<div class="search">
						<i class="icon-search secondary">

						</i>

						<input class="" type="search" placeholder="search">
					</div>
					<div class="desktop-menu">
					<?php wp_nav_menu( [ 'menu' => 'header-menu' ] ) ?>
				</div>
			</div>

			<div class="mobile-menu">
				<i class="icon-menu"></i>

				<div class="sub-menu">
					<?php wp_nav_menu( [ 'menu' => 'header-menu' ] ) ?>
				</div>
			</div>

			<div>
				<div class="logo">
					<?php the_custom_logo() ?>
				</div>
			</div>

		</div>
	</header>