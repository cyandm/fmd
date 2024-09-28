<?php
global $wp_query;

?>


<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>
<main class="blog">
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