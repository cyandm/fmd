<?php
$postId = get_the_ID();
$phone_number_1 = get_option( 'cyn_phone_number_one' );
$categories = get_the_terms( $postId, 'special-cat' );
$gallery = get_field( 'gallery' );
$is_door = array_search( 'doors', array_column( $categories, 'slug' ) );

if ( $is_door === false ) {
	wp_redirect( '/' );
}

?>

<?php get_header() ?>

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

<section class="brands specials-brand">
	<?php if ( $gallery ) : ?>
		<div class="brand-ticker">
			<?php for ( $i = 0; $i < 4; $i++ ) : ?>
				<div class="brand-wrapper">

					<?php foreach ( $gallery as $image ) :
						if ( $image === false )
							continue;
						?>
						<div class="ticker-item">
							<?= wp_get_attachment_image( $image, 'full', false, [ 'class' => 'single-brand' ] ) ?>
						</div>
					<?php endforeach; ?>

				</div>
			<?php endfor; ?>
		</div>
	<?php endif; ?>
</section>
<?php get_footer() ?>