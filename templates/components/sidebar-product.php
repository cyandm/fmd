<aside class="sidebar-products">

	<div class="top-sidebar">
		<a href="#" id="exit" class="primary-btn">
			<i class="icon-arrow-long-left"></i>
		</a>
		<span>
			<?= $args['title'] ?>
		</span>
		<?php get_template_part( 'templates/components/search-form' ) ?>
	</div>

	<form class="filter-container" action="/products">
		<div class="filter-actions">
			<input type="submit" href="#" class="primary-btn" value="Apply Filter" />
			<a href="#" class="disable-btn">Clear</a>
		</div>

		<div class="filter-wrapper">
			<div class="title ">
				<span>Products</span>
				<i class="icon-arrow-down"></i>
			</div>

			<div class="filter-item-container">
				<div class="filter-item-wrapper">
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
				</div>

			</div>
		</div>

		<div class="filter-wrapper">
			<div class="title ">
				<span>Products</span>
				<i class="icon-arrow-down"></i>
			</div>

			<div class="filter-item-container">
				<div class="filter-item-wrapper">
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
					<div class="filter-item">
						<span>flooring</span>
						<input type="checkbox">
					</div>
				</div>

			</div>
		</div>
	</form>


</aside>

<a class="view-filters primary-btn" href="#">View Filters</a>