/* Scroll to bottom */

const scrollToBottom = document.querySelector('#scroll-to-bottom');
const scrollTarget = document.querySelector('#scroll-target');

if (scrollTarget && scrollToBottom) {
  scrollToBottom.addEventListener('click', () => {
    window.scrollTo({
      top: scrollTarget.offsetTop - 60,
      left: 0,
      behavior: 'smooth',
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
  }, 8000);
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
    }, 8000);
  });
}
