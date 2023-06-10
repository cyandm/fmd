const searchIcon = document.querySelector('div.search i');

if (searchIcon) {
  searchIcon.addEventListener('click', () => {
    searchIcon.nextElementSibling.classList.toggle('show');
  });
}

const mobileMenuHandler = document.querySelector('.mobile-menu i.icon-menu');

if (mobileMenuHandler) {
  mobileMenuHandler.addEventListener('click', () => {
    mobileMenuHandler.nextElementSibling.classList.toggle('show');
  });
}

const liHasChildren = document.querySelectorAll(
  '.mobile-menu li.menu-item-has-children'
);

if (liHasChildren) {
  liHasChildren.forEach((li) => {
    li.addEventListener('click', (e) => {
      li.querySelector('ul.sub-menu').classList.toggle('show');

      //prevent click on parent element
      e.stopPropagation();
    });
  });
}
