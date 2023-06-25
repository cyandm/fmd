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
