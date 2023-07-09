if (document.querySelector('aside.sidebar-blog')) {
  blogCategoryHandler = document.querySelector('.mobile-category-handler');
  blogCategory = document.querySelector('.blog-opener');

  blogCategoryHandler.addEventListener('click', () => {
    blogCategory.classList.toggle('active');
  });
}
