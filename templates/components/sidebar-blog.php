<aside class="sidebar-blog">
	<?php get_template_part( 'templates/components/search-form' ) ?>


	<div class="categories-container">
		<h3 class="sidebar-title">Categories</h3>
		<div class="categories-wrapper desktop">
			<div class="category-info active">
				<span class="category-name">All</span>
				<span class="category-count">209</span>
			</div>
			<div class="category-info">
				<span class="category-name">to know more</span>
				<span class="category-count">124</span>
			</div>
			<div class="category-info">
				<span class="category-name">interior</span>
				<span class="category-count">168</span>
			</div>
			<div class="category-info">
				<span class="category-name">DIY</span>
				<span class="category-count">150</span>
			</div>


		</div>
		<div class="categories-wrapper mobile">
			<div class="category-info">
				<span class="category-name">to know more</span>
				<i class="icon-arrow-down"></i>
			</div>
		</div>
	</div>

	<div class="recommend-container">

		<h3 class="sidebar-title">recommended</h3>

		<div class="recommend-wrapper">
			<div class="recommend-item">
				<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ) ?>
				<div class="info">
					<span class="title">Decide About Wall Colors</span>
					<span class="date">2023/05/23</span>
				</div>
			</div>

			<div class="recommend-item">
				<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => '' ] ) ?>
				<div class="info">
					<span class="title">Decide About Wall Colors</span>
					<span class="date">2023/05/23</span>
				</div>
			</div>

			<div class="recommend-item">
				<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ) ?>
				<div class="info">
					<span class="title">Decide About Wall Colors</span>
					<span class="date">2023/05/23</span>
				</div>
			</div>

			<div class="recommend-item">
				<?= wp_get_attachment_image( 56, 'full', false, [ 'class' => '' ] ) ?>
				<div class="info">
					<span class="title">Decide About Wall Colors</span>
					<span class="date">2023/05/23</span>
				</div>
			</div>
		</div>
	</div>
</aside>