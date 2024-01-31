if (document.querySelector('aside.sidebar-blog')) {
	blogCategoryHandler = document.querySelector('.mobile-category-handler');
	blogCategory = document.querySelector('.blog-opener');

	if (blogCategory && blogCategoryHandler) {
		blogCategoryHandler.addEventListener('click', () => {
			blogCategory.classList.toggle('active');
		});
	}
}
