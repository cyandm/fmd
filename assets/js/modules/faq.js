const faq_ask = document.querySelectorAll(".question");
const faq_answer = document.querySelectorAll(".answer");
const faq_tab = document.querySelectorAll(".faq-tab");

faq_ask?.forEach((event) => {
  event.addEventListener("click", () => {
    // event.classList.remove("active");
    event.parentElement.classList.toggle("active");
  });
});
faq_tab?.forEach((e) => {
  e.addEventListener("click", () => {
    e.parentElement.classList.toggle("active");
  });
});
