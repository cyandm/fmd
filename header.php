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
		<div class="container">
			<div>
				<div class="search">
					<i class="icon-search">

					</i>
				</div>
				<div class="menu">
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