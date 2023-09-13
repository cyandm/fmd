/* --- Cyan Slider --- */
const sliderWrappers = document.querySelectorAll('.cyn-slider-wrapper');
const navigation = document.querySelector('.slider-navigation');

if (navigation && sliderWrappers) {
  const nextNav = navigation.querySelector('#cyn-next-slide');
  const prevNav = navigation.querySelector('#cyn-prev-slide');

  sliderWrappers.forEach((wrapper) => {
    const slides = wrapper.querySelectorAll('.cyn-slide');
    slides[0].classList.add('active');

    nextNav.addEventListener('click', () => {
      for (const [index, elm] of slides.entries()) {
        if (elm.classList.contains('active')) {
          if (index == slides.length - 1) {
            //Go to First Slide
            elm.classList.remove('active');
            slides[0].classList.add('active');
          } else {
            //Go to Next Slide
            elm.classList.remove('active');
            slides[index + 1].classList.add('active');
          }
          break;
        }
      }
    });

    prevNav.addEventListener('click', () => {
      for (const [index, elm] of slides.entries()) {
        if (elm.classList.contains('active')) {
          if (index == 0) {
            //Go to Last Slide
            elm.classList.remove('active');
            slides[slides.length - 1].classList.add('active');
          } else {
            //Go to Prev Slide
            elm.classList.remove('active');
            slides[index - 1].classList.add('active');
          }
          break;
        }
      }
    });
  });
}

/* Blog Slider */

const mainBlog = document.querySelector('main.blog');

if (mainBlog) {
}
