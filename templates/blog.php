<?php
/* Template Name: Blog */
?>

<?php get_header( null, [ 'border' => false, 'preloader' => false ] ) ?>

<main class="blog">

	<section class="feature-posts container ">

		<div class="cyn-slider-wrapper">
			<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'hero-blog cyn-slide active' ] ) ?>
			<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => 'hero-blog cyn-slide' ] ) ?>
			<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => 'hero-blog cyn-slide' ] ) ?>
			<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => 'hero-blog cyn-slide' ] ) ?>
		</div>


		<div class="slider-info">
			<div class="slider-navigation">
				<i id="cyn-prev-slide" class="icon-arrow-long-left"></i>
				<i id="cyn-next-slide" class="icon-arrow-long-right"></i>
			</div>

			<div class="post-info">
				<div class="post-content">
					<div class="cyn-slider-wrapper mask-wrapper">
						<h2 class="cyn-slide active">Which atmosphere do you want to have
							in your home?</h2>
						<h2 class="cyn-slide">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </h2>
						<h2 class="cyn-slide">Which atmosphere do you want to have
							in your home?</h2>
						<h2 class="cyn-slide">Lorem ipsum dolor sit amet consectetur, adipisicing elit. </h2>
					</div>

					<div class="cyn-slider-wrapper mask-wrapper">
						<p class="cyn-slide active">That is the most important question in designing a house. The
							choice of colours, atmosphere and materials is determined on
							this basis.in this article we focus on the materials and the
							atmosphere they give out</p>
						<p class="cyn-slide">That is the most important question in designing a house. The
							choice of colours, atmosphere and materials is determined on
							this basis.in this article we focus on the materials and the
							atmosphere they give out</p>
						<p class="cyn-slide">That is the most important question in designing a house. The
							choice of colours, atmosphere and materials is determined on
							this basis.in this article we focus on the materials and the
							atmosphere they give out</p>
						<p class="cyn-slide">That is the most important question in designing a house. The
							choice of colours, atmosphere and materials is determined on
							this basis.in this article we focus on the materials and the
							atmosphere they give out</p>
					</div>

				</div>
				<div class="post-details">
					<div class="post-meta">
						<div class="post-meta-inner-wrapper">
							<span>Author</span>
							<div class="cyn-slider-wrapper mask-wrapper">
								<span class="post-author cyn-slide active">Monica Jackson</span>
								<span class="post-author cyn-slide">Amir Tanazzoh</span>
								<span class="post-author cyn-slide">Monica Jackson</span>
								<span class="post-author cyn-slide">Amir Tanazzoh</span>
							</div>
						</div>
						<div class="post-meta-inner-wrapper">
							<span>Date</span>

							<div class="cyn-slider-wrapper mask-wrapper">
								<span class="post-date cyn-slide active">2022/06/21</span>
								<span class="post-date cyn-slide">2022/04/16</span>
								<span class="post-date cyn-slide">2022/06/21</span>
								<span class="post-date cyn-slide">2022/04/16</span>
							</div>
						</div>
					</div>

					<a href="#" class="primary-btn">
						<i class="icon-arrow-down-right"></i>
					</a>
				</div>
			</div>
		</div>
	</section>


	<section class="blog-container container">

		<?php get_template_part( 'templates/components/sidebar', 'blog' ) ?>

		<div class="blog-content">
			<div class="title-blog">
				All Blog
			</div>
			<section class="blog-content-cards">
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
			</section>
		</div>
	</section>
</main>


<?php get_footer() ?>