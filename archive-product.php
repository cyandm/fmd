<?php get_header( null, [ 'border' => true, 'preloader' => false ] ); ?>


<main class="archive-product container">
	<?php get_template_part( '/templates/components/sidebar', 'product', [ 
		'title' => get_the_archive_title()
	] ) ?>

	<div class="product-container">

		<div class="filter-chips">
			<span class="filter-item">
				<span class="filter-title">mmd</span>
				<i class="icon-close"></i>
			</span>
		</div>

		<div class="product-wrapper">
			<?php for ( $i = 0; $i < 12; $i++ ) : ?>
				<a href="#" class="product-card">
					<?= wp_get_attachment_image( 55, 'full', false, [ 'class' => '' ] ) ?>

					<div class="product-content">
						<span>product name</span>
						<span class="white-btn">View</span>
					</div>
				</a>
			<?php endfor; ?>
		</div>

	</div>
</main>

<?php get_footer() ?>