<?php /* Template Name: Home Brand */ ?>


<?php
$brand_cats = get_field( 'brand_categories' );

?>

<?php get_header() ?>

<main class="brands container">
	<?php foreach ( $brand_cats as $index => $brand_cat ) : ?>
		<section>
			<h2>
				<?php echo $brand_cat->name ?>
			</h2>

			<div>
				<?php
				$brands_q = new WP_Query( [ 
					'post_type' => 'brand_post_type',
					'posts_per_page' => -1,
					'tax_query' => [ 
						[
						'taxonomy' => 'b_category',
						'field' => 'term_id',
						'terms' => [ $brand_cat->term_id ]	
						]
					]
				] );
				?>

				<?php
				if ( $brands_q->have_posts() ) : ?>
					<div class="brands-wrapper">

						<?php while ( $brands_q->have_posts() ) :
							$brands_q->the_post();
							?>

							<a href="<?= get_field( 'link' )['url'] ?>">
								<?php the_post_thumbnail( 'full', [ 'class' => 'single-brand' ] ) ?>
							</a>

						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endforeach; ?>
</main>

<?php get_footer() ?>