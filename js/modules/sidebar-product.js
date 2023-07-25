jQuery(document).ready(function ($) {
  const sidebarProduct = document.querySelector('aside.sidebar-products');

  if (sidebarProduct) {
    const filterWrapperGroup = sidebarProduct.querySelectorAll(
      '.filter-wrapper .title'
    );

    filterWrapperGroup.forEach((el) => {
      el.addEventListener('click', (e) => {
        e.preventDefault();
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

    /** filters **/
    const checkedInps = $(".filter-item-wrapper .filter-item input[checked]");
    const filterChips = $(".filter-chips .filter-item .icon-close");
    const filterContainer = $("#filter-container");
    const checkboxInps = $(".filter-item-wrapper .filter-item input[type=checkbox]");
    const filterClear = $("#filter-container #filter-actions-clear");
    const filterHidden = $("#filter-container input[name='filter']");
    const submitFilter = $("#filter-container input[type='submit']");

    function setFilterVal() {
      let filterVal = 'off';

      for (let i = 0; i < checkboxInps.length; i++) {
        const element = checkboxInps[i];
        if (element.checked == true) {
          filterVal = "on";
          break;
        }
      }

      $(filterHidden).val(filterVal);
    }

    for (let i = 0; i < checkedInps.length; i++) {
      const element = checkedInps[i];
      const parent = $(element).parents(".filter-wrapper");

      if (!$(parent).hasClass('active')) {
        $(parent).addClass('active');
      }
    }

    $(filterChips).on('click', function (e) {
      e.preventDefault();
      const target = e.currentTarget;
      const dataFilter = $(target).attr('data-filter');
      const checkInp = $(`.filter-item-wrapper .filter-item input[name='${dataFilter}']`);

      $(checkInp).removeAttr('checked');
      setFilterVal();
      $(filterContainer).submit();
    });

    $(filterClear).on("click", function (e) {
      e.preventDefault();
      $(checkboxInps).removeAttr('checked');
      $(filterHidden).val('off');
      $(filterContainer).submit();
    });

    $(submitFilter).on('click', function (e) {
      e.preventDefault();
      setFilterVal();
      $(filterContainer).submit();
    });
  }
});