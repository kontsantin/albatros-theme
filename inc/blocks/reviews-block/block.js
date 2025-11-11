jQuery(document).ready(function ($) {
    // Инициализация слайдера Swiper
    const swiper = new Swiper(".reviews-swiper", {
      direction: "horizontal",
      loop: false,
      slidesPerView: 3,
      spaceBetween: 20,
      
  
      // Навигационные стрелки
      navigation: {
        nextEl: ".reviews__swiper-button-next",
        prevEl: ".reviews__swiper-button-prev",
      },
  
      pagination: {
        el: ".swiper-pagination",
      },
  
      // Событие, которое срабатывает при каждом изменении слайда
      on: {
        slideChange: function () {
          updateButtons();
        },
      },
      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 1,
          spaceBetween: 20,
          autoHeight: 'true',
        },
        // when window width is >= 480px
        650: {
          slidesPerView: 2,
          spaceBetween: 20,
          autoHeight: 'false',
        },
        // when window width is >= 640px
        992: {
          slidesPerView: 3,
          spaceBetween: 20,
          autoHeight: 'false',
        },
      },
    });
  
    const prevButton = document.querySelector(".reviews__swiper-button-prev");
    const nextButton = document.querySelector(".reviews__swiper-button-next");
  
    // Функция для обновления состояния кнопок
    function updateButtons() {
      if (swiper.activeIndex === 0) {
        prevButton.classList.add("disable");
      } else {
        prevButton.classList.remove("disable");
      }
  
      if (
        swiper.activeIndex ===
        swiper.slides.length - swiper.params.slidesPerView
      ) {
        nextButton.classList.add("disable");
      } else {
        nextButton.classList.remove("disable");
      }
    }
  
    // Инициализация состояния кнопок при загрузке страницы
    updateButtons();
  });
  
  // читать больше кнопки
  

  
  