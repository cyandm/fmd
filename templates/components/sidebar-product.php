<?php
$options = new cyn_options();
$productConditions = ! ( isset( $args['products'] ) && $args['products'] == false );
$thisTerm = isset( $args['this-term'] ) ? $args['this-term'] : get_term_by( "slug", get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

if ( $productConditions )
	$productCats = $options->cyn_getProductTerms( 0, false, 'product-cat' );
$brandsCats = $options->cyn_getProductTerms( false, false, 'brand' );
$filtersCats = $options->cyn_getProductTerms( false, false, 'filters' );
$filterSlugs = array_column( $filtersCats, "slug", "id" );
$typesCatId = array_search( "type", $filterSlugs );
$productTypes = [];

foreach ( $filtersCats as $key => $filter ) {
	if ( $filter['parent'] == $typesCatId )
		$productTypes[ $key ] = $filter;
}
$_getTypes = [];
foreach ( $productTypes as $cat ) {
	if ( isset( $_GET[ 'cat-' . $cat['id'] ] ) )
		$_getTypes[] = $cat['id'];
}

usort( $brandsCats, function ($a, $b) {
	return $a['name'] <=> $b['name'];
} );
usort( $brandsCats, function ($a, $b) {
	if ( str_contains( $a['slug'], 'parma-floor' ) || str_contains( $b['slug'], 'parma-floor' ) )
		return 1;
	return 0;
} );
usort( $filtersCats, function ($a, $b) {
	return $a['name'] <=> $b['name'];
} );

$formUrl = isset( $args['form-url'] ) ? $args['form-url'] : get_post_type_archive_link( 'product' );

$mouldingCats = array(
	"casing",
	"baseboard",
	"crown-moulding",
	'mouldings'
);
$isMouldingCat = $thisTerm != false && in_array( $thisTerm->slug, $mouldingCats );

$mouldingFilters = array(
	"thickness",
	"width",
	"height",
	"material"
);

$formUrl = $isMouldingCat ? '/product-cat/mouldings' : $formUrl;

function boxChecks( $items ) {
	?>
	<div class="filter-item">
		<span>
			<?= $items['name'] ?>
		</span>
		<?php $checked = isset( $_GET[ 'cat-' . $items['id'] ] ); ?>
		<input name="<?= 'cat-' . $items['id'] ?>"
			   value="on"
			   type="checkbox"
		   	<?= $checked ? 'checked' : "" ?>>
	</div>
	<?php
}
?>

<aside class="sidebar-products">

	<div class="top-sidebar">
		<a href="#"
		   id="exit"
		   class="primary-btn">
			<i class="icon-arrow-long-left"></i>
		</a>
		<span>
			<?= $args['title'] ?>
		</span>
		<?php get_template_part( 'templates/components/search-form' ) ?>
	</div>
	<?php if ( ! $isMouldingCat ) : ?>
		<form class="filter-container"
			  id="filter-container"
			  action="<?= $formUrl; ?>">
			<div class="filter-actions">
				<input type="submit"
					   class="primary-btn"
					   value="Apply Filter" />
				<button type="button"
						id="filter-actions-clear"
						class="disable-btn">Clear</button>
			</div>

			<?php if ( isset( $productTypes ) && count( $productTypes ) > 0 && ! $isMouldingCat ) : ?>
				<div class="filter-wrapper">
					<div class="title ">
						<span>Types</span>
						<i class="icon-arrow-down"></i>
					</div>

					<div class="filter-item-container">
						<div class="filter-item-wrapper">
							<?php
							foreach ( $productTypes as $key => $cat ) :
								if ( $cat['count'] > 0 ) :
									boxChecks( $cat );
								endif;
							endforeach;
							?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( isset( $brandsCats ) ) : ?>
				<div class="filter-wrapper">
					<div class="title ">
						<span>Brands</span>
						<i class="icon-arrow-down"></i>
					</div>

					<div class="filter-item-container">
						<div class="filter-item-wrapper">
							<?php
							foreach ( $brandsCats as $key => $cat ) :
								if ( $cat['count'] > 0 ) :
									if ( count( $_getTypes ) > 0 ) {
										$queryArgs = array(
											'post_type' => 'product',
											'tax_query' => array(
												array(
													'taxonomy' => 'filters',
													'field' => "id",
													'terms' => $_getTypes
												),
												array(
													'taxonomy' => 'brand',
													'field' => "id",
													'terms' => $cat['id']
												)
											)
										);
										$query = new WP_Query( $queryArgs );

										if ( $query->have_posts() ) :
											boxChecks( $cat );
										endif;
										wp_reset_postdata();
									} else {
										boxChecks( $cat );
									}
								endif;
							endforeach;
							?>
						</div>
					</div>
				</div>
			<?php endif; ?>


			<?php if ( isset( $filtersCats ) ) : ?>
				<?php foreach ( $filtersCats as $filtersCat ) : ?>
					<?php
					$filtersId = $filtersCat['id'];
					$parent = $filtersCat['parent'];
					$filterSlug = $filtersCat['slug'];

					if ( $isMouldingCat && ! in_array( $filterSlug, $mouldingFilters ) )
						continue;
					?>
					<?php if ( $parent == 0 && $filterSlug != 'type' ) : ?>
						<div class="filter-wrapper">
							<div class="title">
								<span>
									<?= $filtersCat['name'] ?>
								</span>
								<i class="icon-arrow-down"></i>
							</div>

							<div class="filter-item-container">
								<div class="filter-item-wrapper">
									<?php
									foreach ( $filtersCats as $key => $cat ) :
										if ( $filtersId == $cat['parent'] && $cat['count'] > 0 ) :
											if ( count( $_getTypes ) > 0 ) {
												$queryArgs = array(
													'post_type' => 'product',
													'tax_query' => array(
														array(
															'taxonomy' => 'filters',
															'field' => "id",
															'terms' => $_getTypes
														),
														array(
															'taxonomy' => 'filters',
															'field' => "id",
															'terms' => $cat['id']
														)
													)
												);
												$query = new WP_Query( $queryArgs );

												if ( $query->have_posts() ) :
													boxChecks( $cat );
												endif;
												wp_reset_postdata();
											} else {
												boxChecks( $cat );
											}
										endif;
									endforeach;
									?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

			<?php if ( is_search() ) : ?>
				<input type="hidden"
					   name="s"
					   value="<?php the_search_query(); ?>">
			<?php endif; ?>
			<input type="hidden"
				   name="filter"
				   value="on">
		</form>
	<?php else : ?>
		<form class="filter-container"
			  id="filter-container"
			  action="<?= $formUrl; ?>">
			<div class="filter-actions">
				<input type="submit"
					   class="primary-btn"
					   value="Apply Filter" />
				<button type="button"
						id="filter-actions-clear"
						class="disable-btn">Clear</button>
			</div>



			<?php if ( isset( $filtersCats ) ) : ?>
				<?php foreach ( $filtersCats as $filtersCat ) :
					$filtersId = $filtersCat['id'];
					$parent = $filtersCat['parent'];
					$filterSlug = $filtersCat['slug'];

					if ( $isMouldingCat && ! in_array( $filterSlug, $mouldingFilters ) )
						continue;
					?>
					<?php if ( $parent == 0 && $filterSlug != 'type' ) : ?>
						<div class="filter-wrapper">
							<div class="title">
								<span>
									<?= $filtersCat['name'] ?>
								</span>
								<i class="icon-arrow-down"></i>
							</div>

							<div class="filter-item-container">
								<div class="filter-item-wrapper">
									<?php
									foreach ( $filtersCats as $key => $cat ) :
										if ( $filtersId == $cat['parent'] && $cat['count'] > 0 ) :
											if ( count( $_getTypes ) > 0 ) {
												$queryArgs = array(
													'post_type' => 'product',
													'tax_query' => array(
														array(
															'taxonomy' => 'filters',
															'field' => "id",
															'terms' => $_getTypes
														),
														array(
															'taxonomy' => 'filters',
															'field' => "id",
															'terms' => $cat['id']
														)
													)
												);
												$query = new WP_Query( $queryArgs );

												if ( $query->have_posts() ) :
													boxChecks( $cat );
												endif;
												wp_reset_postdata();
											} else {
												boxChecks( $cat );
											}
										endif;
									endforeach;
									?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

			<?php if ( is_search() ) : ?>
				<input type="hidden"
					   name="s"
					   value="<?php the_search_query(); ?>">
			<?php endif; ?>
			<input type="hidden"
				   name="filter"
				   value="on">
		</form>
	<?php endif; ?>

</aside>

<a class="view-filters primary-btn"
   href="#">View Filters</a>