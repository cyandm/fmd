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
?>

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ); ?>

<main class="archive-specials container">
	<?php if ( $wpQuery->have_posts() ) : ?>
		<div class="specials-archive-wrapper">
			<?php while ( $wpQuery->have_posts() ) :
				$wpQuery->the_post(); ?>
				<?php
				$postId = get_the_ID();
				?>
				<article class="specials-article">
					<header class="title">
						<div>
							<p class="h2">
								<?php echo get_the_title() ?>
							</p>
						</div>
						<a href="tel:<?= $phone_number_1 ?>" class="primary-btn">Call now</a>
					</header>

					<main>
						<div class="gallery-group">
							<div>
								<?= wp_get_attachment_image( get_post_thumbnail_id(), 'full', false, [ 'class' => '' ] ) ?>
							</div>

							<div>
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
					<a href="tel:<?= $phone_number_1 ?>" class="only-mobile primary-btn">Call now</a>
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
			<img src="<?php echo get_stylesheet_directory_uri() . '/imgs/not-found.png' ?>">
		</div>
	<?php endif; ?>
</main>

<?php get_footer() ?>