var sliderThree = new Swiper(".categories", {
  slidesPerView: 4,
  spaceBetween: 10,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 3,
    },
    375: {
      slidesPerView: 4,
    },
    767: {
      slidesPerView: 5,
    },
  },
});

var sliderThree = new Swiper(".offer", {
  slidesPerView: 1.5,
  spaceBetween: 20,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    375: {
      slidesPerView: 1.2,
    },
    425: {
      slidesPerView: 1.5,
    },
    768: {
      slidesPerView: 2,
    },
  },
});

var sliderThree = new Swiper(".similer-product", {
  slidesPerView: 2,
  spaceBetween: 15,
  loop: true,
});

var sliderOne = new Swiper(".slider-1", {
  slidesPerView: 1,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var swiper = new Swiper(".product-1", {
  slidesPerView: 1.6,
  loop: true,

  pagination: {
    el: ".swiper-pagination",
    type: "progressbar",
  },
});

var swiper = new Swiper(".product-2", {
  slidesPerView: 3,
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
