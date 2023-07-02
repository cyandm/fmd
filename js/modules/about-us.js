gsap.registerPlugin(ScrollTrigger);

const aboutTimeLine = gsap.timeline({
  scrollTrigger: {
    trigger: '.changes-in-scroll',
    start: 'top 80px',
    end: '+2600px',
    pin: true,
    scrub: 1,
  },
});

aboutTimeLine
  .to('.slide-1', {
    opacity: 0,
    onStart: () => {
      document.querySelector('.slide-1 h2').classList.add('is-animating');
    },
  })
  .fromTo(
    '.slide-2',
    { opacity: 0 },
    {
      opacity: 1,
      onStart: () => {
        document.querySelector('.slide-2 h2').classList.add('animated');
      },
    }
  );
