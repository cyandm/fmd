<?php
global $wp_query;

if ( isset( $args ) && isset( $args['custom_q'] ) ) {
	$wp_query = new WP_Query( $args['custom_q'] );
}



echo '<pre dir=ltr>';
var_export( $wp_query->found_posts );
wp_die();


$options = new cyn_options();

$thisTerm = get_term_by( "slug", get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$parentTermId = wp_get_term_taxonomy_parent_id( $thisTerm->term_id, get_query_var( 'taxonomy' ) );
$parentTerm = false;
$parentTermConditions = ! ( $parentTermId > 0 && $parentTermId != false );
$filtersConditions = isset( $_GET["filter"] ) && $_GET["filter"] == "on";

$productCats = $options->cyn_getProductTerms( false, false, 'product-cat' );
$brandsCats = $options->cyn_getProductTerms( false, false, 'brand' );
$filtersCats = $options->cyn_getProductTerms( false, false, 'filters' );
$allChips = array_merge( $productCats, $brandsCats, $filtersCats );
$formUrl = get_term_link( $thisTerm );
?>

<?php get_header( null, [ 'border' => true, 'preloader' => false ] ); ?>

<main class="archive-product container">
	<?php get_template_part( '/templates/components/sidebar', 'product', [ 
		'title' => get_the_archive_title(),
		'products' => false,
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


		<?php if ( $wp_query->have_posts() ) : ?>
			<div class="product-wrapper">
				<?php while ( $wp_query->have_posts() ) :
					$wp_query->the_post(); ?>
					<?php get_template_part( '/templates/components/product-card', '', [ 'product' => get_the_ID() ] ); ?>
				<?php endwhile; ?>
			</div>
			<?php
			echo "<div class='pagination-links'>" . paginate_links(
				array(
					'total' => $wp_query->max_num_pages,
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
	</div>
</main>

<?php get_footer() ?>