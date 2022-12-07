export default function SwiperModule() {
  const swiperAboutEmployee = new Swiper(".about-employees__list .swiper", {
    loop: true,
    speed: 600,
    autoplay: {
      delay: 4500,
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 48,
      },
    },
  });
  const swiperTestimonial = new Swiper(".testimonial-slider .swiper", {
    loop: true,
    parallax: true,
    speed: 600,
    autoplay: {
      delay: 4500,
    },
  });

  const sliderGoing = document.querySelectorAll(".slider-tab");

  sliderGoing.forEach((item) => {
    const slider = item.querySelector(".swiper");
    const next = item.querySelector(".slider-ctr .next");
    const prev = item.querySelector(".slider-ctr .prev");
    const pagination = item.querySelector(".slider-ctr .swiper-pagination");
    const swiperSlider = new Swiper(slider, {
      speed: 1200,
      loop: true,
      effect: "coverflow",
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        scale: 1,
        stretch: 0,
        depth: 400,
        modifier: 1,
        slideShadows: false,
      },

      autoplay: {
        delay: 3000,
      },
      navigation: {
        nextEl: next,
        prevEl: prev,
      },
      pagination: {
        el: pagination,
        clickable: true,
      },
    });
  });

  const sliderMentor = document.querySelectorAll(
    ".mentor-tab__content .content-box"
  );

  sliderMentor.forEach((item) => {
    const slider = item.querySelector(".swiper");
    const next = item.querySelector(".slider-ctr .next");
    const prev = item.querySelector(".slider-ctr .prev");
    const pagination = item.querySelector(".slider-ctr .swiper-pagination");
    const swiperSlider = new Swiper(slider, {
      speed: 600,
      loop: true,
      slidesPerView: 1.5,
      spaceBetween: 24,
      autoplay: {
        delay: 3000,
      },
      navigation: {
        nextEl: next,
        prevEl: prev,
      },
      pagination: {
        el: pagination,
        clickable: true,
      },
      breakpoints: {
        575: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
      },
    });
  });
}
