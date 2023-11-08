const sidebarProduct = document.querySelector('aside.sidebar-products');

if (sidebarProduct) {
  const filterWrapperGroup = sidebarProduct.querySelectorAll('.filter-wrapper');

  filterWrapperGroup.forEach((el) => {
    const title = el.querySelector('.title');

    title.addEventListener('click', (e) => {
      e.preventDefault();
      el.classList.toggle('active');
    });

    const checkedInput = el.querySelector('input[checked]');
    checkedInput && el.classList.add('active');
  });

  const viewFiltersBtn = document.querySelector('.view-filters');
  const exitFilterBtn = document.querySelector('#exit');

  viewFiltersBtn.addEventListener('click', () => {
    sidebarProduct.classList.toggle('active');
  });

  exitFilterBtn.addEventListener('click', () => {
    sidebarProduct.classList.toggle('active');
  });

  const filterChips = document.querySelectorAll(
    '.filter-chips .filter-item .icon-close'
  );
  const filterContainer = sidebarProduct.querySelector('#filter-container');
  const checkboxInps = sidebarProduct.querySelectorAll(
    '.filter-item-wrapper .filter-item input[type=checkbox]'
  );
  const filterClear = filterContainer.querySelector('#filter-actions-clear');
  const filterHidden = filterContainer.querySelector("input[name='filter']");
  const submitFilter = filterContainer.querySelector("input[type='submit']");

  function setFilterVal() {
    let filterVal = 'off';

    for (let i = 0; i < checkboxInps.length; i++) {
      const element = checkboxInps[i];
      if (element.checked == true) {
        filterVal = 'on';
        break;
      }
    }

    filterHidden.value = filterVal;
  }

  if (filterChips) {
    filterChips.forEach((el) => {
      el.addEventListener('click', (e) => {
        e.preventDefault();
        const target = e.currentTarget;
        const dataFilter = target.dataset['filter'];
        const checkInp = document.querySelector(`input[name='${dataFilter}']`);

        checkInp.removeAttribute('checked');
        setFilterVal();
        filterContainer.submit();
      });
    });
  }

  filterClear.addEventListener('click', function (e) {
    e.preventDefault();
    checkboxInps.forEach((el) => {
      el.checked = false;
    });
    filterHidden.value = 'off';
    filterContainer.submit();
  });

  submitFilter.addEventListener('click', (e) => {
    e.preventDefault();
    setFilterVal();
    filterContainer.submit();
  });
}
