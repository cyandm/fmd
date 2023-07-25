<?php
/* Data In This Page */
$author_name = get_the_author_meta( 'display_name', get_post_field( 'post_author', get_the_ID() ) );

$current_post_cats_id = [];
foreach ( get_the_category() as $cat ) {
	array_push( $current_post_cats_id, $cat->term_id );
}

$related_blog = new WP_Query( [ 
	'post_type' => 'post',
	'posts_per_page' => 3,
	'category__in' => $current_post_cats_id,
	'post__not_in' => [ get_the_ID() ],
] );

?>


<!-- Start Page Template -->

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="single-post container">
	<?php get_template_part( 'templates/components/sidebar', 'blog' ) ?>

	<section class="main-content">
		<div class="post-wrapper">
			<div class="post-info">
				<a href="javascript:window.history.back();" class="primary-btn">
					<i class="icon-arrow-long-left"></i>
				</a>
				<?= wp_get_attachment_image( get_post_thumbnail_id(), 'full', false, [ 'class' => 'feature-image' ] ) ?>
				<div class="title">
					<h1>
						<?= get_the_title() ?>
					</h1>
				</div>
				<div class="post-meta">
					<div class="post-meta-inner-wrapper">
						<span>Author : </span>
						<span>
							<?= $author_name ?>
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

		<?php
		if ( $related_blog->have_posts() ) : ?>
			<div class="related-blogs-container">
				<h2>Related Blogs</h2>
				<div class="related-blogs-wrapper">

					<?php
					while ( $related_blog->have_posts() ) {
						$related_blog->the_post();

						get_template_part( '/templates/components/card', null, [ 
							'url' => get_permalink(),
							'card_class' => 'blog',
							'image_id' => get_post_thumbnail_id(),
							'image_size' => [ 400, 300 ],
							'card_title' => get_the_title(),
							'card_description' => get_the_excerpt()
						] );
					}
					?>
				</div>
			</div>

		<?php endif; ?>



	</section>
</main>

<?php get_footer() ?>