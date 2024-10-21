<?php
$postId = get_the_ID();
$phone_number_1 = get_option( 'cyn_phone_number_one' );
$categories = get_the_terms( $postId, 'special-cat' );

$is_door = array_search( 'doors', array_column( $categories, 'slug' ) );

$brands = get_field( 'brands_special');
$brands_query = new WP_Query( [ 
	'post_type' => 'brand_post_type',
	'post__in' => $brands,
] );


if ( $is_door === false ) {
	wp_redirect( '/' );
}

?>

<?php get_header() ?>

<section class="brands specials-brand">


	<?php if ( $brands_query->have_posts() ) : ?>
		<div class="brand-ticker">

			<?php for ( $i = 0; $i < 4; $i++ ) : ?>
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

<main class="container">
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

	<?php the_excerpt() ?>

</main>


<?php get_footer() ?>