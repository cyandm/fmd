/* Scroll to bottom */

const scrollToBottom = document.querySelector('#scroll-to-bottom');
const scrollTarget = document.querySelector('#scroll-target');

if (scrollTarget && scrollToBottom) {
  scrollToBottom.addEventListener('click', () => {
    scrollTarget.scrollIntoView({
      behavior: 'smooth',
      block: 'start',
    });
  });
}

/* product hover */

const productCatCards = document.querySelectorAll('.product-cat-card');
const firstCatCard = document.querySelector('.product-cat-card.hover');

if (productCatCards && firstCatCard) {
  productCatCards.forEach((productCatCard) => {
    productCatCard.addEventListener('mouseenter', () => {
      firstCatCard.classList.remove('hover');
      productCatCard.classList.add('hover');
    });
    productCatCard.addEventListener('mouseleave', () => {
      productCatCard.classList.remove('hover');
      firstCatCard.classList.add('hover');
    });
  });
}

/* --- Cyan Slider --- */

const navigation = document.querySelector('.slider-navigation');
const sliderWrappers = document.querySelectorAll('.cyn-slider-wrapper');

if (navigation && sliderWrappers) {
  const nextNav = navigation.querySelector('.icon-arrow-right');
  const prevNav = navigation.querySelector('.icon-arrow-left');

  sliderWrappers.forEach((wrapper) => {
    const slides = wrapper.querySelectorAll('.cyn-slide');

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

/* Ticker */
const ticker = document.querySelector('.ticker');
const tickerWrapperGroup = document.querySelectorAll('.ticker-wrapper');

if (ticker) {
  setInterval(() => {
    ticker.scrollLeft += 1;
  }, 20);

  setInterval(() => {
    sampleTicker = tickerWrapperGroup[0].cloneNode(true);
    ticker.appendChild(sampleTicker);
    ticker.firstChild.remove();
  }, 10000);
}

/* Brand Ticker */

const brandTickerGroup = document.querySelectorAll('.brand-ticker');
const brandWrapperGroup = document.querySelectorAll('.brand-wrapper');

if (brandTickerGroup) {
  brandTickerGroup.forEach((brandTicker) => {
    if (brandTicker.classList.contains('rtl')) {
      setInterval(() => {
        brandTicker.scrollLeft -= 1;
      }, 20);
    } else {
      setInterval(() => {
        brandTicker.scrollLeft += 1;
      }, 20);
    }

    setInterval(() => {
      sampleBrand = brandWrapperGroup[0].cloneNode(true);
      brandTicker.appendChild(sampleBrand);
      brandTicker.firstChild.remove();
    }, 10000);
  });
}
