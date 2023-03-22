document.addEventListener('DOMContentLoaded', function(){
  const header = document.querySelector('.header');
  const fullpageContainer = document.querySelector('#fullpage');

  if (window.matchMedia("(max-width: 461px)").matches) {
    fullpageContainer.insertAdjacentHTML('beforeend', 
    `<section class="homePages__item">
    <div class="homePages__location">
      <div class="homePages__location-after">
         Contact us</div>
      <div class="homePages__location-title">Контакты</div>
      <div class="homePageTabs">
        <div class="homePageTabs__top">
          <div class="homePageTabs__tab active" data-tab="1"><span>Москва</span></div>
          <div class="homePageTabs__tab" data-tab="2"><span>Минск</span></div>
        </div>
        <div class="homePageTabs__body">
          <div class="homePageTabs__item active" data-tab="1">
            <div class="homePageTabs__map">
              <img src="img/home/img-map-moskov.svg" alt="Москва">
            </div>
            <div class="homePageTabs__address">
               Москва, ул. Антонова-Овсеенко, 15, стр. 4</div><a class="homePageTabs__phone" href="tel:+79014280000">
               +7 (901) 428-00-00 </a><a class="homePageTabs__phone" href="tel:+79054280000">
               +7 (905) 428-00-00</a><a class="homePageTabs__btn" href="#">Проложить маршрут</a>
          </div>
          <div class="homePageTabs__item" data-tab="2">
            <div class="homePageTabs__map">
              <img src="img/home/img-map-minsk.svg" alt="Минск">
            </div>
            <div class="homePageTabs__address">
               Минск, ул. Тимирязева, 74</div><a class="homePageTabs__phone" href="tel:+375333323469">
               +375 (33) 332-34-69 </a><a class="homePageTabs__phone" href="tel:+375296550000">
               +375 (29) 655-00-00</a><a class="homePageTabs__btn" href="#">Проложить маршрут</a>
          </div>
        </div>
      </div>
      <div class="homePages__bottom">
        <div class="homePages__socials"> <a href="https://api.whatsapp.com/send/?phone=79054280000&amp;text=Меня_интересует_покупка_Tesla_у_вас_на_сайте&amp;type=phone_number&amp;app_absent=0"><img src="img/whatsapp.svg" alt="WhatsApp"><span>WhatsApp</span></a><a href="https://t.me/Khatskevich7"><img src="img/telegram.svg" alt="Telegram"><span>Telegram</span></a></div>
        <div class="copyright"><a href="#">Реквизиты </a>© 2022 г. Все права защищены</div>
      </div>
    </div>
  </section>`);
  }

  const jsTriggers = document.querySelectorAll('.homePageTabs__tab');
  jsTriggers.forEach(function(trigger) {
    trigger.addEventListener('click', function() {
      const id = this.getAttribute('data-tab');
      const content = document.querySelector('.homePageTabs__item[data-tab="'+id+'"]');
      const activeTrigger = document.querySelector('.homePageTabs__tab.active');
      const activeContent = document.querySelector('.homePageTabs__item.active');
      activeTrigger.classList.remove('active');
      trigger.classList.add('active');
      activeContent.classList.remove('active');
      content.classList.add('active');
    });
  });

  // const fullpage = new fullScroll({
  //   mainElement: "fullpage",
  //   displayDots: false,
  //   animateTime: 0.7,
  //   animateFunction: "ease",
  // });

  // const myFullpage = new fullpage('#fullpage', {
  //   licenseKey: 'XASL9-6MKEJ-0CVIK-P01L6-JVJML',
  //   anchors: ['models','modely','modelx','model3','cybertruck','roadster','contacts'],
  //   sectionSelector: 'section',
  //   css3: true,
  //   verticalCentered: false,
  //   autoScrolling: true,
  //   scrollOverflow: false,
  //   responsiveHeight: 330,
  //   slideSelector: '.homePages__item',
  //   onLeave: function(origin, destination, direction, trigger){
  //     if(destination.index === 5) {
  //       header.classList.add('header--white');
  //     } else {
  //       header.classList.remove('header--white');
  //     }
  //     if(destination.index === 6 || destination.index === 7) {
  //       header.classList.add('header--hide');
  //     } else {
  //       header.classList.remove('header--hide');
  //     }
  //   },
  // });
});