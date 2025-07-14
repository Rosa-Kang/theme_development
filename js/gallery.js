/**
 * File: gallery.js
 *
 * Templates: front-page.php
 *
 * Slider (swiper.js)
 *
 */
(function ($) {
  $(function () {

  //Start of Testimonials Slider ------------------
  var testimonialSwiper = new Swiper('.testimonialSwiper', {
    loop: true,
    grabCursor: true,
    speed: 1000,
    navigation: {
      nextEl: '.swiper-button-next-dark',
      prevEl: '.swiper-button-prev-dark',
      clickable: true,
    },
  });
  //End of Testimonials Slider ------------------

  //Start of Best Sellers Slider ------------------
  var bestSellerSwiper = new Swiper('.bestSellerSwiper', {
    slidesPerView: 3,
    spaceBetween: 32,
    centeredSlides: true,
    grabCursor: true,
    loop: true,
    speed: 1000,
    breakpoints: {
      768: {
        slidesPerView: 1,
      }
    },
    autoplay: {
    delay: 3000,
    disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next-dark',
      prevEl: '.swiper-button-prev-dark',
      clickable: true,
    },
  });
  //End of Testimonials Slider ------------------

  //Start of Hero Slider ------------------
  var heroSwiper = new Swiper('.heroSwiper', {
    slidesPerView: 1,
    loop: true,
    grabCursor: true,
    speed: 1000,
    effect: "fade",
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  //End of Hero Slider ------------------

  }); // End of Doc Ready -------------------
})(jQuery);
