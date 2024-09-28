const searchIcon = document.querySelector('form.search i');

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

/* Preloader */
const preloader = document.querySelector('.preloader');

/*if (preloader) {
  var tl = gsap.timeline({
    defaults: { duration: 1, delay: 0.3, ease: 'linear' },
  });

  window.addEventListener('load', () => {
    tl.to('.preloader .title', { y: 0, opacity: 1 });
    tl.to('.preloader', { yPercent: -100 });
    tl.fromTo('.hero-image', { opacity: 0 }, { opacity: 1 });
    tl.from('.site-header', { opacity: 0, y: -100 });
    tl.fromTo(
      '.site-header .icon-search',
      { opacity: 0 },
      { opacity: 1, duration: 0.3 }
    );
    tl.fromTo(
      '.site-header .desktop-menu',
      { opacity: 0 },
      { opacity: 1, duration: 0.15 }
    );
    tl.fromTo(
      '.site-header .logo',
      { opacity: 0 },
      { opacity: 1, duration: 0.15 }
    );
    tl.fromTo(
      'h1 p:nth-child(1)',
      { y: -30, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.3 }
    );
    tl.fromTo(
      'h1 p:nth-child(2)',
      { y: -30, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.3 }
    );
    tl.fromTo('.subtract', { yPercent: 100 }, { yPercent: 0, duration: 0.3 });
    tl.fromTo('.subtract .spinner', { scale: 0 }, { scale: 1, duration: 0.5 });
    tl.fromTo(
      '.product-cat-group .product-cat-card:nth-child(1)',
      { y: 60, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.3 }
    );
    tl.fromTo(
      '.product-cat-group .product-cat-card:nth-child(2)',
      { y: 60, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.3 }
    );
    tl.fromTo(
      '.product-cat-group .product-cat-card:nth-child(3)',
      { y: 60, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.3 }
    );
  });
}
*/
