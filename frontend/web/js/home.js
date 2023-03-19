document.addEventListener("DOMContentLoaded",function(){const a=document.querySelector(".header"),b=document.querySelector("#fullpage");window.matchMedia("(max-width: 461px)").matches&&b.insertAdjacentHTML("beforeend",`<section class="homePages__item" data-anchor="location">
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
            <div class="homePageTabs__map"><img src="img/home/img-map-moskov.svg" alt="Москва"></div>
            <div class="homePageTabs__address">
               Москва, ул. Антонова-Овсеенко, 15, стр. 4</div><a class="homePageTabs__phone" href="tel:+79014280000">
               +7 (901) 428-00-00 </a><a class="homePageTabs__phone" href="tel:+79054280000">
               +7 (905) 428-00-00</a><a class="homePageTabs__btn" href="#">Проложить маршрут</a>
          </div>
          <div class="homePageTabs__item" data-tab="2">
            <div class="homePageTabs__map"><img src="img/home/img-map-minsk.svg" alt="Минск"></div>
            <div class="homePageTabs__address">
               Минск, ул. Тимирязева, 74</div><a class="homePageTabs__phone" href="tel:+375333323469">
               +375 (33) 332-34-69 </a><a class="homePageTabs__phone" href="tel:+375296550000">
               +375 (29) 655-00-00</a><a class="homePageTabs__btn" href="#">Проложить маршрут</a>
          </div>
        </div>
      </div>
      <div class="homePages__socials"> <a href="https://api.whatsapp.com/send/?phone=79054280000&amp;text=Меня_интересует_покупка_Tesla_у_вас_на_сайте&amp;type=phone_number&amp;app_absent=0"><img src="img/whatsapp.svg" alt="WhatsApp">WhatsApp</a><a href="https://t.me/Khatskevich7"><img src="img/telegram.svg" alt="Telegram">Telegram</a></div>
      <div class="copyright"><a href="#">Реквизиты </a>© 2022 г. Все права защищены</div>
    </div>
  </section>`);const c=document.querySelectorAll(".homePageTabs__tab");c.forEach(function(a){a.addEventListener("click",function(){const b=this.getAttribute("data-tab"),c=document.querySelector(".homePageTabs__item[data-tab=\""+b+"\"]"),d=document.querySelector(".homePageTabs__tab.active"),e=document.querySelector(".homePageTabs__item.active");d.classList.remove("active"),a.classList.add("active"),e.classList.remove("active"),c.classList.add("active")})}),$("#fullpage").fullpage({sectionSelector:"section",slideSelector:".homePages__item",scrollingSpeed:400,afterLoad:function(b){"roadster"===b?a.classList.add("header--white"):a.classList.remove("header--white"),"contacts"===b||"location"===b?a.classList.add("header--hide"):a.classList.remove("header--hide")}})});