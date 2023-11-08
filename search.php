<?php
global $wp_query;
global $wpdb;
$cynOptions = new cyn_options();
$cynRegister = new cyn_register();

$searchQueryS = get_search_query();

$dbSearchQueryT = $wpdb->get_col(
	"SELECT id FROM $wpdb->posts WHERE
  (post_type='product' OR post_type='specials') AND
  post_title LIKE '%$searchQueryS%'"
);

$dbSearchQueryM = $wpdb->get_col(
	"SELECT post_id FROM $wpdb->postmeta WHERE
  (meta_key='product_code' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_sid' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_color_code' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_installation' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_finish' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_sqft_box' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_sqft_pallet' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_box_pallet' AND meta_value LIKE '%$searchQueryS%') OR
  (meta_key='product_desc' AND meta_value LIKE '%$searchQueryS%')"
);

$dbSearchQueryTerm = array();
$dbSearchQueryTaxIds = $wpdb->get_results(
	"SELECT $wpdb->term_taxonomy.term_taxonomy_id FROM $wpdb->term_taxonomy
  INNER JOIN $wpdb->terms
    ON $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id
    AND $wpdb->terms.name LIKE '%$searchQueryS%'",
	"ARRAY_A"
);

foreach ( $dbSearchQueryTaxIds as $tax ) {
	$taxId = $tax['term_taxonomy_id'];
	$dbSearchQueryObjects = $wpdb->get_results(
		"SELECT object_id FROM $wpdb->term_relationships
    WHERE term_taxonomy_id LIKE '$taxId'",
		"ARRAY_A"
	);

	foreach ( $dbSearchQueryObjects as $objectId ) {
		$objId = $objectId['object_id'];
		if ( ! in_array( $objId, $dbSearchQueryTerm ) ) {
			$dbSearchQueryTerm[] = $objId;
		}
	}
}

$dbSearchQuery = array_unique( array_merge( $dbSearchQueryT, $dbSearchQueryM, $dbSearchQueryTerm ) );
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$filters = $cynRegister->cyn_archive_pre_get_posts( [] );

$searchQueryArgs = array(
	'post_type' => [ "product", "specials" ],
	'post__in' => $dbSearchQuery,
	'paged' => $paged,
	'tax_query' => $filters
);

$searchWpQuery = new WP_Query( $searchQueryArgs );


$productCats = $cynOptions->cyn_getProductTerms( false, false, 'product-cat' );
$brandsCats = $cynOptions->cyn_getProductTerms( false, false, 'brand' );
$filtersCats = $cynOptions->cyn_getProductTerms( false, false, 'filters' );
$allChips = array_merge( $productCats, $brandsCats, $filtersCats );
$formUrl = "./";
?>

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ) ?>

<main class="search-page archive-product container">
	<?php get_template_part( '/templates/components/sidebar', 'product', [ 
		'title' => get_the_archive_title(),
		'form-url' => $formUrl
	] ); ?>

	<div class="product-container">

		<div class="filter-chips">
			<?php foreach ( $allChips as $key => $chip ) : ?>
				<?php if ( isset( $_GET[ 'cat-' . $chip['id'] ] ) ) : ?>
					<span class="filter-item">
						<span class="filter-title">
							<?php echo $chip['name'] ?>
						</span>
						<i class="icon-close" style="cursor: pointer;" data-filter="<?php echo 'cat-' . $chip['id']; ?>"></i>
					</span>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php if ( count( $searchQueryArgs['post__in'] ) <= 0 ) : ?>
			<div class="not-find">
				<p>sorry ! we could’nt find anything</p>
				<img src="<?php echo get_stylesheet_directory_uri() . '/imgs/not-found.png' ?>">
			</div>
		<?php elseif ( $searchWpQuery->have_posts() ) : ?>
			<div class="title">
				<h1 class="h1">search results for:
					<?php the_search_query(); ?>
				</h1>
			</div>

			<div class="product-wrapper">
				<?php while ( $searchWpQuery->have_posts() ) :
					$searchWpQuery->the_post(); ?>
					<?php
					$postType = get_post_type();
					$postId = get_the_ID();

					if ( $postType == 'specials' )
						$postLink = get_post_type_archive_link( 'specials' ) . "?sp=" . $postId;
					else
						$postLink = get_the_permalink();

					?>

					<a href="<?php echo $postLink; ?>" class="product-card">
						<?= wp_get_attachment_image( get_post_thumbnail_id(), 'full', false, [ 'class' => '' ] ) ?>

						<div class="product-content">
							<span>
								<?php echo get_the_title(); ?>
							</span>
							<span class="white-btn">View</span>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
			<?php
			echo "<div class='pagination-links'>" . paginate_links(
				array(
					'total' => $searchWpQuery->max_num_pages,
					'prev_text' => __( '<i class="icon-arrow-left"></i>' ),
					'next_text' => __( '<i class="icon-arrow-right"></i>' )
				)
			) . "</div>";
			?>
		<?php endif; ?>
	</div>
</main>

<?php get_footer() ?>