<?php
global $wp_query;
$phone_number_1 = get_option( 'cyn_phone_number_one' );

if ( isset( $_GET['sp'] ) ) {
	$spId = (int) $_GET['sp'];
	$wpQueryArgs = array(
		'post_type' => $GLOBALS["specials-post-type"],
		'p' => $spId
	);
	$wpQuery = new WP_Query( $wpQueryArgs );
} else {
	$wpQuery = $wp_query;
}

$term = get_queried_object();
$brands = get_field( 'brands_special', $term->taxonomy . '_' . $term->term_id );

$brands_query = new WP_Query( [ 
	'post_type' => 'brand_post_type',
	'post__in' => $brands,
] );

?>


<?php get_header( null, [ 'border' => true, 'preloader' => false ] ); ?>

<section class="brands specials-brand">


	<?php if ( $brands_query->have_posts() ) : ?>
		<div class="brand-ticker">

			<?php for ( $i = 0; $i < 8; $i++ ) : ?>
				<div class="brand-wrapper">
					<?php while ( $brands_query->have_posts() ) :
						$brands_query->the_post(); ?>

						<a class="ticker-item"
						   href="<?= get_field( 'link' )['url'] ?>">
							<?php the_post_thumbnail( 'full', [ 'class' => 'single-brand' ] ) ?>
						</a>

					<? endwhile; ?>
				</div>
			<?php endfor; ?>
		</div>

	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

</section>

<main class="archive-specials container">
	<?php if ( $wpQuery->have_posts() ) : ?>
		<div class="specials-archive-wrapper">
			<?php while ( $wpQuery->have_posts() ) :
				$wpQuery->the_post(); ?>
				<?php $postId = get_the_ID(); ?>

				<article class="specials-article">
					<header class="title">
						<div>
							<h3 class="h2">
								<?php echo get_the_title() ?>
							</h3>
						</div>
						<a href="tel:<?= $phone_number_1 ?>"
						   class="secondary-btn except-mobile">Talk to an expert</a>
					</header>

					<main>
						<div class="gallery-group">
							<div class="l">
								<?= wp_get_attachment_image( get_post_thumbnail_id(), 'full', false, [ 'class' => '' ] ) ?>
							</div>

							<div class="r">
								<?php
								$galleryGroup = get_field( 'specials_gallery_group', $postId );
								if ( isset( $galleryGroup ) )
									foreach ( $galleryGroup as $field )
										if ( isset( $field ) )
											echo wp_get_attachment_image( $field, 'full', false, [ 'class' => '' ] );
								?>
							</div>
						</div>
						<div class="content">
							<?php the_content() ?>
						</div>
					</main>

					<a href="tel:<?= $phone_number_1 ?>"
					   class="only-mobile secondary-btn">Talk to an expert</a>
				</article>
			<?php endwhile; ?>
		</div>

		<?php
		echo "<div class='pagination-links'>" . paginate_links(
			array(
				'total' => $wpQuery->max_num_pages,
				'prev_text' => __( '<i class="icon-arrow-left"></i>' ),
				'next_text' => __( '<i class="icon-arrow-right"></i>' )
			)
		) . "</div>";
		?>
	<?php else : ?>
		<div class="">
			<p>sorry ! we could’nt find anything</p>
			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/not-found.png' ?>">
		</div>
	<?php endif; ?>
</main>

<?php get_footer() ?>