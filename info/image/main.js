
fadeOut();

function loader(){
  document.querySelector('.loader-container').classList.add('active');
}

function fadeOut(){
  setTimeout(loader, 2000);
}

var swiper = new Swiper(".popular-content", {
    slidesPerView:1,
    spaceBetween: 10,
    autoplay: {
      delay: 5400,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    breakpoints: {
        280: {
            slidesPerView:1,
            spaceBetween: 10,
        },
        320: {
            slidesPerView:2,
            spaceBetween: 10,
        },
        510: {
            slidesPerView:2,
            spaceBetween: 10,
        },
        758: {
            slidesPerView:3,
            spaceBetween: 15,
        },
    }
  });

  var swiper = new Swiper(".banner", {
    slidesPerView:1,
    spaceBetween: 50,
    autoplay: {
      delay: 5400,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
  });
  