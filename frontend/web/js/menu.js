(function() {

  const target = document.querySelector('.headerNav__backdrop');
  const headerNavs = document.querySelectorAll('.headerNav');
  const links = document.querySelectorAll('.headerNav__item');
  const headerNavMenu = document.querySelector('.headerNav__menu');
  const modalMenu = document.querySelector('.modalMenu');
  const modalMenuClose = modalMenu.querySelector('.modalMenu__close');
  const copy = document.querySelector('.modal-phone__copy');
  const body = document.querySelector('body');
  const createOverlay = document.createElement('div');
  createOverlay.classList.add('overlay');
  body.append(createOverlay);
  const overlay = document.querySelector('.overlay');

  headerNavMenu?.addEventListener('click', function(){
    overlay.classList.toggle('open');
    modalMenu.classList.toggle('open');
    body.classList.toggle('hidden');
  });

  overlay?.addEventListener('click', function(){
    headerNavMenu?.click();
  });
  
  modalMenuClose?.addEventListener('click', function(){
    headerNavMenu?.click();
  });

  function mouseoverFunc() {
    const width = this.getBoundingClientRect().width;
    const height = this.getBoundingClientRect().height;
    const left = this.getBoundingClientRect().left + window.pageXOffset;
    const top = this.getBoundingClientRect().top + window.pageYOffset;
    target.style.opacity = '1';
    target.style.width = `${width}px`;
    target.style.height = `${height}px`;
    target.style.left = `${left}px`;
    target.style.top = `${top}px`;
    target.style.transform = "none";
  }

  function mouseleaveFunc() {
    target.style.opacity = '0';
  }

  for (let i = 0; i < links.length; i++) {
    links[i].addEventListener("mouseover", mouseoverFunc);
  }

  for (let i = 0; i < headerNavs.length; i++) {
    headerNavs[i].addEventListener("mouseleave", mouseleaveFunc);
  }

  copy.addEventListener('click', function(){
    let copyNumber = this.closest('.headerNav').querySelector('.headerNav__phone span').textContent.replace(/\s/g, "");
    let spanPhone = this.closest('.headerNav').querySelector('.modal-phone__copy span');
    const copyContent = async () => {
      try {
        await navigator.clipboard.writeText(copyNumber);
        spanPhone.textContent = 'Скопирован!';
        setTimeout(() => {
          spanPhone.textContent = 'Скопировать номер';
        }, 1500);
      } catch (err) {
        spanPhone.textContent = 'Не скопирован!';
        console.error('Failed to copy: ', err);
      }
    }
    copyContent();
  });

})();