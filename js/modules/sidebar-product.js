const sidebarProduct = document.querySelector('aside.sidebar-products');

if (sidebarProduct) {
  const filterWrapperGroup = sidebarProduct.querySelectorAll(
    '.filter-wrapper .title'
  );

  filterWrapperGroup.forEach((el) => {
    el.addEventListener('click', () => {
      el.parentElement.classList.toggle('active');
    });
  });

  const viewFiltersBtn = document.querySelector('.view-filters');
  const exitFilterBtn = document.querySelector('#exit');

  viewFiltersBtn.addEventListener('click', () => {
    sidebarProduct.classList.toggle('active');
  });

  exitFilterBtn.addEventListener('click', () => {
    sidebarProduct.classList.toggle('active');
  });
}
