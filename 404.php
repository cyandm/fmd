<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="page-404 container">
	<img src="<?= get_stylesheet_directory_uri() . '/imgs/404.png' ?>" alt="404-page">
	<div>
		<h1>We Can't seem to find the page you're looking for.</h1>
		<a class="primary-btn" href="/">Go to home page</a>
	</div>
</main>

<?php get_footer() ?>