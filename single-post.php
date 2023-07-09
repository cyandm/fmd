<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="single-post container">
	<?php get_template_part( 'templates/components/sidebar', 'blog' ) ?>

	<section class="main-content">
		<div class="post-wrapper">
			<div class="post-info">
				<a href="" class="primary-btn">
					<i class="icon-arrow-long-left"></i>
				</a>
				<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'feature-image' ] ) ?>
				<div class="title">
					<h1>
						<?= get_the_title() ?>
					</h1>
				</div>
				<div class="post-meta">
					<div class="post-meta-inner-wrapper">
						<span>Author : </span>
						<span>
							<?= get_the_author() ?>
						</span>
					</div>
					<div class="post-meta-inner-wrapper">
						<span>Date : </span>
						<span>
							<?= get_the_date() ?>
						</span>
					</div>
				</div>
			</div>
			<div class="post-content">
				<?= get_the_content() ?>
			</div>
		</div>

		<div class="related-blogs-container">
			<h2>Related Blogs</h2>
			<div class="related-blogs-wrapper">
				<div class="blog-item card">
					<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'hero-blog cyn-slide active' ] ) ?>
					<div class="card-information">
						<div>
							<p class="card-title">Columns</p>
							<p class="card-description"> 140 items</p>
						</div>

						<a href="#">
							<i class="icon-arrow-down-right"></i>
						</a>
					</div>
				</div>
				<div class="blog-item card">
					<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'hero-blog cyn-slide active' ] ) ?>
					<div class="card-information">
						<div>
							<p class="card-title">Columns</p>
							<p class="card-description"> 140 items</p>
						</div>

						<a href="#">
							<i class="icon-arrow-down-right"></i>
						</a>
					</div>
				</div>
				<div class="blog-item card">
					<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'hero-blog cyn-slide active' ] ) ?>
					<div class="card-information">
						<div>
							<p class="card-title">Columns</p>
							<p class="card-description"> 140 items</p>
						</div>

						<a href="#">
							<i class="icon-arrow-down-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

	</section>
</main>

<?php get_footer() ?>