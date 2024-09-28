<?php

$all_blog_category_websites = get_categories();


global $wp_query;
isset( $wp_query->query['pagename'] ) && $blogCondition = $wp_query->query['pagename'];
isset( $wp_query->query['category_name'] ) && $categoryCondition = $wp_query->query['category_name'];

/* Recommend Query */
$recommend_blogs = new WP_Query( [ 
	'post_type' => 'post',
	'tag' => 'recommend',
	'posts_per_page' => 4
] );
?>


<aside class="sidebar-blog">
	<?php get_template_part( 'templates/components/search-form' ) ?>


	<?php if ( $all_blog_category_websites ) : ?>
		<div class="categories-container">
			<h3 class="sidebar-title">Categories</h3>
			<div class="categories-wrapper desktop">

				<a href="/blog" link="nofollow" class="category-info 
				<?php
				if ( $blogCondition && $blogCondition == 'blog' ) {
					echo 'active';
				} ?>">
					<span class="category-name">All</span>
					<span class="category-count">
						<?= wp_count_posts( 'post' )->publish ?>
					</span>
				</a>

				<?php foreach ( $all_blog_category_websites as $blog_category ) : ?>
					<?php $category_link = get_category_link( $blog_category ) ?>
					<a href="<?= $category_link ?>" class="category-info <?php

					  if ( $categoryCondition && $categoryCondition == $blog_category->slug ) {
						  echo 'active';
					  }
					  ?>">
						<span class="category-name">
							<?= $blog_category->name ?>
						</span>
						<span class="category-count">
							<?= $blog_category->category_count ?>
						</span>
					</a>
				<?php endforeach; ?>

			</div>
			<div class="categories-wrapper mobile">
				<div class="category-info mobile-category-handler">
					<span class="category-name">
						<?php
						if ( 'templates/blog.php' == get_page_template_slug() ) {
							echo 'All';
						} else {
							echo get_the_archive_title();
						}
						?>
					</span>
					<i class="icon-arrow-down"></i>
				</div>

				<div class="blog-opener">
					<a href="/blog" class="category-info 
					<?php echo ( site_url() . '/blog/' == $current_url ? 'active' : '' ) ?>">

						<span class="category-name">All</span>
						<span class="category-count">
							<?= wp_count_posts( 'post' )->publish ?>
						</span>
					</a>

					<?php foreach ( $all_blog_category_websites as $blog_category ) : ?>
						<?php $category_link = get_category_link( $blog_category ) ?>
						<a rel="nofollow" href="<?= $category_link ?>"
							class="category-info <?php echo ( $category_link == $current_url ? 'active' : '' ) ?>">
							<span class="category-name">
								<?= $blog_category->name ?>
							</span>
							<span class="category-count">
								<?= $blog_category->category_count ?>
							</span>
						</a>
					<?php endforeach; ?>
				</div>


			</div>
		</div>
	<?php endif; ?>
	<div class="recommend-container">

		<h3 class="sidebar-title">recommended</h3>


		<?php if ( $recommend_blogs->have_posts() ) : ?>
			<div class="recommend-wrapper">

				<?php while ( $recommend_blogs->have_posts() ) : ?>
					<?php $recommend_blogs->the_post() ?>
					<a rel="nofollow" href="<?= get_permalink() ?>" class="recommend-item">
						<?= wp_get_attachment_image( get_post_thumbnail_id(), [ 300, 300 ], false, [ 'class' => '' ] ) ?>
						<div class="info">
							<span class="title">
								<?= get_the_title() ?>
							</span>
							<span class="date">
								<?= get_the_date() ?>
							</span>
						</div>
					</a>
				<?php endwhile; ?>
			</div>

		<?php endif; ?>

	</div>
</aside>

<?php wp_reset_postdata(); ?>