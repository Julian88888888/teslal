const CURRENT_API = "https://www.cbr-xml-daily.ru/daily_json.js";
let CURRENT_VALUE = null;
const xhr = new XMLHttpRequest();
if ((xhr.open("GET", "https://www.cbr-xml-daily.ru/daily_json.js", !1), xhr.send(), 200 != xhr.status)) console.log("\u041E\u0448\u0438\u0431\u043A\u0430", xhr.statusText);
else {
    const a = JSON.parse(xhr.responseText);
    CURRENT_VALUE = Math.ceil(a.Valute.USD.Previous);
}
class Tesla {
    constructor(a, b, c, d, e) {
        (this.price = a), (this.range = b), (this.speed = c), (this.mph = d), (this.title = e);
    }
}
class ModelS extends Tesla {
    constructor(...a) {
        super(...a), (this.title = "Model S");
    }
}
class ModelY extends Tesla {
    constructor(...a) {
        super(...a), (this.title = "Model Y");
    }
}
class Model3 extends Tesla {
    constructor(...a) {
        super(...a), (this.title = "Model 3");
    }
}
class ModelX extends Tesla {
    constructor(...a) {
        super(...a), (this.title = "Model X");
    }
}
const MODEL_S = new ModelS(),
    MODEL_X = new ModelX(),
    MODEL_Y = new ModelY(),
    MODEL_3 = new Model3();
let choosedModel,
    currentInfo,
    CURRENT,
    typeWheelsOne,
    typeWheelsTwo,
    priceOutput,
    map = { "model-s": MODEL_S, "model-x": MODEL_X, "model-y": MODEL_Y, "model-3": MODEL_3 },
    choosedColor = {},
    choosedWheel = {},
    choosedInterior = {},
    choosedControl = {},
    featureCarColor = document.querySelector(".featureCar__item.color span"),
    featureCarInterior = document.querySelector(".featureCar__item.interior span"),
    featureCarWheel = document.querySelector(".featureCar__item.wheels span"),
    featureCarMod = document.querySelector(".featureCar__item.mod span"),
    tabPricesRuble = document.querySelector(".tabPrices__currency.ruble span"),
    tabPricesUsd = document.querySelector(".tabPrices__currency.usd span");
const inputsWidthModels = [...document.querySelectorAll(".prices__input")],
    detailInputs = [...document.querySelectorAll(".filterCar__input")];
detectChoosedModel();
function filterWheelsArt() {
    const a = document.querySelectorAll(".filterCar__look.wheels .filterCar__item");
    [...a].forEach((a) => {
        a.style.display = a.querySelector(".filterCar__input").getAttribute("data-mod").split(",").includes(currentInfo.getAttribute("data-mod")) ? "block" : "none";
    });
    let b = [...a].filter((a) => a.querySelector(".filterCar__input").getAttribute("data-mod").split(",").includes(currentInfo.getAttribute("data-mod")) && a.querySelector(".filterCar__input").checked);
    if (!b.length) return void ([...a].filter((a) => "block" == a.style.display)[0].querySelector(".filterCar__input").checked = !0);
}
function detectChoosedModel() {
    (choosedModel = inputsWidthModels.filter((a) => a.checked)[0].value),
        (currentInfo = inputsWidthModels.filter((a) => a.checked)[0]),
        (CURRENT = map[choosedModel]),
        inputsWidthModels.forEach((a) => {
            a.addEventListener("change", () => {
                (choosedModel = a.value), (currentInfo = a), (CURRENT = map[choosedModel]), filterWheelsArt(), detectDetail(), pasteInfoToBlocks(), loadSlider(), personModelInfo();
            });
        });
}
function detectDetail() {
    let a = document.querySelector(".outputPrice__value");
    detailInputs
        .filter((a) => a.checked)
        .forEach((b) => {
            switch (b.name) {
                case "price":
                    (featureCarMod.textContent = b.getAttribute("data-mod")),
                        (typeWheelsOne = b.getAttribute("data-type-one")),
                        (typeWheelsTwo = b.getAttribute("data-type-two")),
                        (priceOutput = parseInt(b.nextElementSibling.querySelector(".prices__count").innerText.replace(/[^\d]/g, ""))),
                        a.setAttribute("data-output-price", priceOutput);
                case "paint":
                    (choosedColor.value = b.getAttribute("data-state")),
                        (choosedColor.descr = b.getAttribute("data-descr")),
                        (choosedColor.price = b.getAttribute("data-paint-price")),
                        (featureCarColor.textContent = b.getAttribute("data-descr")),
                        (choosedColor.folder = choosedColor.value);
                case "wheels":
                    (choosedWheel.value = b.getAttribute("data-state")),
                        (choosedWheel.descr = b.getAttribute("data-descr")),
                        (choosedWheel.price = b.getAttribute("data-wheels-price")),
                        (featureCarWheel.textContent = b.getAttribute("data-descr")),
                        (choosedWheel.folder = "tempest" == choosedWheel.value ? `type${typeWheelsOne}` : `type${typeWheelsTwo}`);
                case "Interior":
                    (choosedInterior.value = b.getAttribute("data-state")),
                        (choosedInterior.descr = b.getAttribute("data-descr")),
                        (featureCarInterior.textContent = b.getAttribute("data-descr")),
                        (choosedInterior.price = b.getAttribute("data-interior-price")),
                        (choosedInterior.folder = choosedInterior.value);
                case "control":
                    (choosedControl.value = b.getAttribute("data-state")), (choosedControl.descr = b.getAttribute("data-descr")), (choosedControl.folder = "yoke" == choosedControl.value ? (document.querySelector(".prices__input.filterCar__input:checked").getAttribute("data-modification") == "plaid" ? "type4" : "type2") : (document.querySelector(".prices__input.filterCar__input:checked").getAttribute("data-modification") == "plaid" ? "type3" : "type1"));
            }
        });
}
detailInputs.forEach((a) => {
    a.addEventListener("input", () => {
        detectDetail(), loadSlider(), pasteInfoToBlocks();
    });
});
function pasteInfoToBlocks() {
    function a(a, b) {
        let c = a.querySelector(".filterCar__mobile img");
        c.src = b;
    }
    function b(a, b, c) {
        let d = a.querySelector(".filterCar__value");
        (c = c && 0 < c ? `$${c}` : ""), (d.innerText = `${b} ${c}`);
    }
    function c(a) {
        return a.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function d(a, b) {
        let d = +a.getAttribute("data-output-price");
        (a.textContent = `${c((d + b) * CURRENT_VALUE)} ₽`), (tabPricesUsd.textContent = `${c(d + b)}`), (tabPricesRuble.textContent = `${c((d + b) * CURRENT_VALUE)}`);
    }
    let e = document.querySelector(".filterCar__look.paint"),
        f = document.querySelector(".filterCar__look.Interior"),
        g = document.querySelector(".filterCar__look.wheels"),
        h = document.querySelector(".filterCar__look.control"),
        i = document.querySelector(".outputPrice__value"),
        j = +choosedColor.price + +choosedInterior.price + +choosedWheel.price;
    a(e, `img/filter/${choosedModel}/wheels/${choosedWheel.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/2.jpg`),
        a(f, `img/filter/${choosedModel}/handlebar/${choosedControl.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/1.jpg`),
        a(g, `img/filter/${choosedModel}/wheels/${choosedWheel.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/4.jpg`),
        d(i, j),
        b(e, choosedColor.descr, choosedColor.price),
        b(f, choosedInterior.descr, choosedInterior.price),
        b(g, choosedWheel.descr, choosedWheel.price),
        h && b(h, choosedControl.descr, !1);
}
function loadSlider() {
    const a = document.querySelector(".swiper-wrapper.swiperConfig__inner"),
        b = a.querySelectorAll(".swiper-slide");
    b.forEach((a) => {
        const b = a.querySelector("img"),
            c = a.getAttribute("data-swiper-slide-index");
        switch (+c) {
            case 0:
                return void (b.src = `img/filter/${choosedModel}/wheels/${choosedWheel.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/1.jpg`);
            case 1:
                return void (b.src = `img/filter/${choosedModel}/wheels/${choosedWheel.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/2.jpg`);
            case 2:
                return void (b.src = `img/filter/${choosedModel}/wheels/${choosedWheel.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/3.jpg`);
            case 3:
                return void (b.src = `img/filter/${choosedModel}/wheels/${choosedWheel.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/4.jpg`);
            case 4:
                return void (b.src = `img/filter/${choosedModel}/handlebar/${choosedControl.folder}/Interior/${choosedInterior.folder}/${choosedColor.folder}/1.jpg`);
        }
    });
}
function personModelInfo() {
    const a = document.querySelector(".detailsCar__feature"),
        b = a.querySelector(".speed"),
        c = a.querySelector(".range"),
        d = a.querySelector(".mph"),
        e = document.querySelector(".detailsCar__title");
    (b.innerText = currentInfo.getAttribute("data-mph")), (c.innerText = currentInfo.getAttribute("data-mi")), (d.innerText = currentInfo.getAttribute("data-sec")), (e.innerText = CURRENT.title);
}
const swiperConfig = document.querySelectorAll(".swiperConfig");
swiperConfig.forEach((a) => {
    const b = new Swiper(a, {
            spaceBetween: 20,
            slidesPerView: 1,
            mousewheel: !0,
            keyboard: !0,
            effect: "fade",
            loop: !0,
            on: {
                init: () => {
                    detectChoosedModel(), detectDetail(), personModelInfo(), pasteInfoToBlocks(), loadSlider();
                },
            },
            navigation: { nextEl: ".swiperConfig__prev", prevEl: ".swiperConfig__next" },
            breakpoints: { 320: { slidesPerView: "auto", spaceBetween: 0, enabled: !1 }, 769: { slidesPerView: 1 } },
        }),
        c = new IntersectionObserver(
            (a, c) => {
                a.forEach((a) => {
                    a.isIntersecting && ("start" === a.target.getAttribute("data-observer") ? b.slideTo(5) : "end" === a.target.getAttribute("data-observer") && b.slideTo(1), c.unobserve(a.target));
                });
            },
            { rootMargin: "10px 0px 10px 0px" }
        );
    if (window.matchMedia("(min-width: 1100px)").matches) {
        const a = document.querySelector(".detailsCar__info");
        a.addEventListener("scroll", () => {
            setTimeout(() => {
                document.querySelectorAll("[data-observer]").forEach((a) => c.observe(a));
            }, 1e3);
        });
    }
});
const modalCars = document.querySelectorAll(".modalCars");
modalCars.forEach((a) => {
    new Swiper(a, {
        spaceBetween: 20,
        slidesPerView: "auto",
        centeredSlides: !0,
        mousewheel: !0,
        keyboard: !0,
        speed: 1e3,
        navigation: { nextEl: ".modalCars__next", prevEl: ".modalCars__prev" },
        pagination: { el: ".modalCars__dots", clickable: !0 },
    });
});
const popupCars = document.querySelector(".modal-cars"),
    overlay = document.querySelector(".overlay"),
    modalCarsClose = document.querySelectorAll(".modalCars__close"),
    openModalGallery = document.querySelectorAll("[data-modal-gallery]");
openModalGallery?.forEach((a) => {
    a.addEventListener("click", () => {
        (overlay.style.display = "block"), popupCars?.classList.add("active");
    });
}),
    modalCarsClose?.forEach((a) => {
        a.addEventListener("click", () => {
            popupCars?.classList.remove("active"), (overlay.style.display = "none");
        });
    }),
    overlay?.addEventListener("click", function () {
        popupCars?.classList.remove("active"), (this.style.display = "none");
    });
function siblings(a) {
    let b = [],
        c = a;
    for (; c.previousSibling; ) (c = c.previousSibling), 1 == c.nodeType && b.push(c);
    for (c = a; c.nextSibling; ) (c = c.nextSibling), 1 == c.nodeType && b.push(c);
    return b;
}
const tabs = document.querySelectorAll(".tabPrices__tab"),
    tabContentItem = document.querySelectorAll(".tabPrices__item");
function arr(a) {
    for (let b = 0; b < a.length; b++) a[b].classList.remove("active");
}
tabs.forEach((a, b) => {
    a.addEventListener("click", function () {
        this.classList.add("active"), tabContentItem[b].classList.add("active");
        let c = siblings(a),
            d = siblings(tabContentItem[b]);
        arr(c), arr(d);
    });
});
