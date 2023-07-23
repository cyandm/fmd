<?php
/* Template Name: Blog */

$recommend_blogs = new WP_Query( [ 
	'tag' => 'recommend',
	'posts_per_page' => 4
] );


?>

<?php get_header( null, [ 'border' => ! $recommend_blogs->have_posts(), 'preloader' => false ] ) ?>

<main class="blog">

	<?php if ( $recommend_blogs->have_posts() ) : ?>
		<section class="feature-posts container ">

			<div class="cyn-slider-wrapper">
				<?php while ( $recommend_blogs->have_posts() ) : ?>
					<?php $recommend_blogs->the_post() ?>
					<?= wp_get_attachment_image( get_post_thumbnail_id(), [ 2000, 2000 ], false, [ 'class' => 'hero-blog cyn-slide' ] ) ?>
				<?php endwhile; ?>
			</div>


			<div class="slider-info">
				<div class="slider-navigation">
					<i id="cyn-prev-slide" class="icon-arrow-long-left"></i>
					<i id="cyn-next-slide" class="icon-arrow-long-right"></i>
				</div>

				<div class="post-info">
					<div class="post-content">
						<div class="cyn-slider-wrapper mask-wrapper">
							<?php while ( $recommend_blogs->have_posts() ) : ?>
								<?php $recommend_blogs->the_post() ?>
								<h2 class="cyn-slide">
									<?= get_the_title() ?>
								</h2>
							<?php endwhile; ?>
						</div>

						<div class="cyn-slider-wrapper mask-wrapper">
							<?php while ( $recommend_blogs->have_posts() ) : ?>
								<?php $recommend_blogs->the_post() ?>
								<p class="cyn-slide">
									<?= get_the_excerpt() ?>
								</p>
							<?php endwhile; ?>

						</div>

					</div>
					<div class="post-details">
						<div class="post-meta">
							<div class="post-meta-inner-wrapper">
								<span>Author</span>
								<div class="cyn-slider-wrapper mask-wrapper">
									<?php while ( $recommend_blogs->have_posts() ) : ?>
										<?php $recommend_blogs->the_post() ?>
										<span class="post-author cyn-slide">
											<?= get_the_author() ?>
										</span>
									<?php endwhile; ?>
								</div>
							</div>
							<div class="post-meta-inner-wrapper">
								<span>Date</span>

								<div class="cyn-slider-wrapper mask-wrapper">
									<?php while ( $recommend_blogs->have_posts() ) : ?>
										<?php $recommend_blogs->the_post() ?>
										<span class="post-date cyn-slide">
											<?= get_the_date() ?>
										</span>
									<?php endwhile; ?>
								</div>
							</div>
						</div>

						<div class="cyn-slider-wrapper">
							<?php while ( $recommend_blogs->have_posts() ) : ?>
								<?php $recommend_blogs->the_post() ?>
								<a href="<?= get_the_permalink() ?>" class="primary-btn cyn-slide">
									<i class="icon-arrow-down-right"></i>
								</a>
							<?php endwhile; ?>
						</div>

					</div>
				</div>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<section class="blog-container container">

		<?php get_template_part( 'templates/components/sidebar', 'blog' ) ?>

		<?php if ( have_posts() ) : ?>
			<div class="blog-content">
				<div class="title-blog">
					<?php
					if ( get_the_archive_title() == 'Archives' ) {
						echo 'All Blog';
					} else {
						echo get_the_archive_title();
					}
					?>
				</div>
				<section class="blog-content-cards">
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'templates/components/card', null, [ 
							'url' => get_permalink(),
							'image_size' => 400,
							'image_id' => get_post_thumbnail_id(),
							'card_title' => get_the_title(),
							'card_description' => get_the_excerpt()
						] );
					}
					?>
				</section>
				<?php
				echo "<div class='pagination-links'>" . paginate_links(
					array(
						'total' => $wp_query->max_num_pages,
						'prev_text' => __( '<i class="icon-arrow-left"></i>' ),
						'next_text' => __( '<i class="icon-arrow-right"></i>' )
					)
				) . "</div>";
				?>
			</div>
		<?php endif; ?>
	</section>
</main>


<?php get_footer() ?>