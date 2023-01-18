document.addEventListener('DOMContentLoaded', function(){

  const swiperDetails = document.querySelectorAll('.swiperDetails');
  const modalCars = document.querySelectorAll('.modalCars');
  const popupCars = document.querySelector('.modal-cars');
  const modalCarsClose = document.querySelectorAll('.modalCars__close');
  const overlay = document.querySelector('.overlay');
  const openGallery = document.querySelector('.openGallery');

  openGallery?.addEventListener('click', ()=> {
    overlay.style.display = 'block';
    popupCars?.classList.add('active');
  });

  modalCarsClose?.forEach(btn => {
    btn.addEventListener('click', ()=> {
      popupCars?.classList.remove('active');
      overlay.style.display = 'none';
    });
  })
  

  overlay?.addEventListener('click', ()=> {
    popupCars?.classList.remove('active');
  });
  
  overlay?.addEventListener('click', function() {
    this.style.display = 'none';
  });

  // Swiper Details
  swiperDetails.forEach((slider, index) => {
    new Swiper(slider, {
      spaceBetween: 20,
      slidesPerView: 1,
      loop: true,
      autoplay: {
        delay: 6000,
        disableOnInteraction: false
      },
      navigation: {
        nextEl: '.swiperDetails__next',
        prevEl: '.swiperDetails__prev',
      }
    });
  });


  // Swiper modalCars
  modalCars.forEach((slider, index) => {
    new Swiper(slider, {
      spaceBetween: 20,
      slidesPerView: 'auto',
      centeredSlides: true,
      speed: 1000,
      navigation: {
        nextEl: '.modalCars__next',
        prevEl: '.modalCars__prev',
      },
      pagination: {
        el: '.modalCars__dots',
        clickable: true,
      },
    });
  });

});