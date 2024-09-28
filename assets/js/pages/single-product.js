import Swiper from 'swiper/bundle';

const productThumbnails = new Swiper('.product-thumbnails', {
  slidesPerView: 4,
  spaceBetween: 16,
  navigation: {
    nextEl: '.slider-navigation .icon-arrow-long-right',
    prevEl: '.slider-navigation .icon-arrow-long-left',
  },
});

const productSlider = new Swiper('.product-slider', {
  slidesPerView: 1,
  spaceBetween: 16,

  thumbs: {
    swiper: productThumbnails,
  },

  navigation: {
    nextEl: '.slider-navigation .icon-arrow-long-right',
    prevEl: '.slider-navigation .icon-arrow-long-left',
  },
});

if (document.querySelector('main.single-product')) {
  /* Slider Start */

  /* Slider End */

  /* Tabs Start */
  const headerTabs = document.querySelectorAll('.header-tabs > span');
  const contentTabs = document.querySelectorAll('.content-tabs > div');
  const contentTabsWrapper = document.querySelector('.content-tabs');
  const headerTabsWrapper = document.querySelector('.header-tabs');

  headerTabs.forEach((headerTab, index) => {
    headerTab.addEventListener('click', (e) => {
      headerTabs.forEach((elem) => {
        elem.classList.toggle('active', elem === headerTab);
      });

      contentTabs.forEach((contentTab) => {
        const shouldActive = headerTab.dataset.tab === contentTab.dataset.tab;
        contentTab.classList.toggle('active', shouldActive);
      });

      if (index !== 0) {
        contentTabsWrapper.style.borderTopLeftRadius = 0;
        headerTabsWrapper.style.borderBottomLeftRadius = 0;
      } else {
        contentTabsWrapper.style.borderTopLeftRadius = 26 + 'px';
        headerTabsWrapper.style.borderBottomLeftRadius = 26 + 'px';
      }
    });
  });
  /* Tabs End */

  /* Articles Start */

  const relatedBlogs = document.querySelectorAll(
    '.related-blogs .blogs-wrapper > .card'
  );

  relatedBlogs.forEach((blog) => {
    blog.addEventListener('mouseover', () => {
      relatedBlogs.forEach((innerBlog) => {
        innerBlog.classList.toggle('active', blog === innerBlog);
      });
    });
  });

  /* Articles End */
}
