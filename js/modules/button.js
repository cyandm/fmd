const primaryBtns = document.querySelectorAll('.primary-btn');

primaryBtns.forEach((btn) => {
  var btnTl = gsap.timeline({});

  beforeDesignSpan = document.createElement('span');
  afterDesignSpan = document.createElement('span');

  beforeDesignSpan.classList.add('design-before');
  afterDesignSpan.classList.add('design-after');

  btn.appendChild(afterDesignSpan);
  btn.appendChild(beforeDesignSpan);

  btn.addEventListener('mouseenter', () => {
    afterEl = btn.querySelector('.design-after');
    beforeEl = btn.querySelector('.design-before');

    btnTl
      .to(beforeEl, { scale: 35, duration: 1 })
      .to(afterEl, { scale: 35, duration: 1, delay: -0.5 });
  });
  btn.addEventListener('mouseleave', () => {
    btnTl
      .to(afterEl, { scale: 0, duration: 1 })
      .to(beforeEl, { scale: 0, duration: 1, delay: -0.5 });
  });
});
