document.addEventListener('DOMContentLoaded', function(){

  const swiperDetails = document.querySelectorAll('.swiperDetails');
  const swiperModel = document.querySelectorAll('.swiperModel');
  const modalCars = document.querySelectorAll('.modalCars');
  const popupCars = document.querySelector('.modal-cars');
  const modalCarsClose = document.querySelectorAll('.modalCars__close');
  const overlay = document.querySelector('.overlay');
  const openModalGallery = document.querySelectorAll('[open-modal-gallery]');


  openModalGallery?.forEach(btn => {
    btn.addEventListener('click', ()=> {
      overlay.style.display = 'block';
      popupCars?.classList.add('active');
    });
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

  swiperDetails.forEach((slider, index) => {
    new Swiper(slider, {
      spaceBetween: 20,
      slidesPerView: 1,
      loop: true,
      navigation: {
        nextEl: '.swiperDetails__next',
        prevEl: '.swiperDetails__prev',
      }
    });
  });


  swiperModel.forEach((slider, index) => {
    const sliderModel = new Swiper(slider, {
      spaceBetween: 0,
      mousewheel: true,
      keyboard: true,
      effect: 'fade',
      breakpoints: {
        320: {
          allowTouchMove: false
        },
        414: {
          slidesPerView: 1,
        }
      },
      pagination: {
        bulletClass: 'swiperModel__dot',
        bulletActiveClass: 'swiperModel__dot-active',
        bulletElement: 'div',
        el: '.swiperModel__dots',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiperDetails__prev',
        prevEl: '.swiperDetails__next',
      }
    });
   
    const InteriorObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            switch (entry.target.getAttribute('data-model')) {
              case 'corps':
                sliderModel.slideTo(1);
                break;
              case 'interior':
                sliderModel.slideTo(5);
                break;
              case 'wheels':
                sliderModel.slideTo(3);
                break;
              case 'form' && 'start':
                sliderModel.slideTo(0);
                break;
            }
            observer.unobserve(entry.target);
          }
        });
      },
      { rootMargin: '-50% 0% -50% 0%' }
    );

    if(window.matchMedia('(min-width: 1100px)').matches) {
      const block = document.querySelector('.detailsCar__info');
      block.addEventListener('scroll', ()=> {
        setTimeout(() => {
          document.querySelectorAll('[data-model]').forEach(obs => InteriorObserver.observe(obs));
        }, 200);
      });
    }
  
    document.querySelectorAll('.thumbSwiper__item').forEach((thumb, index) => {
      thumb.addEventListener('click', function(){
        sliderModel.slideTo(index);
      });
    });
  });

  if(window.matchMedia('(max-width: 1100px)').matches) {
    const parentElement = document.querySelector('.thumbSwiper');
    const newElement = document.querySelector('.modelPrices .detailsCar__title').outerHTML;
    parentElement.insertAdjacentHTML('afterbegin', newElement);
  }

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