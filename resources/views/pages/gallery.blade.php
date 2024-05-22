@extends('layouts.theme')

@section('content')
<section class="gallery page-container"> 
      <div class="gallery-wrap">
        <div class="page-intro"> 
          <div class="page-breadcrumbs">
            <ul class="breadcrumbs">
              <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="index.html">Homepage</a></li>
              <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">gallery</a></li>
              <li class="breadcrumbs-item__current--color breadcrumbs-item">Gallery</li>
            </ul>
          </div>
          <h2 class="page-title text-title">Галерея</h2>
        </div>
        <div class="tabs">
          <div class="tabs__list" role="tablist" aria-label="products">
            <button role="tab" aria-selected="true" id="0">Система “Універсал”</button>
            <button role="tab" aria-selected="false" id="1">Система “Універсал 30”</button>
            <button role="tab" aria-selected="false" id="2">Система “Універсал 60”</button>
            <button role="tab" aria-selected="false" id="3">Система “гондоли”</button>
            <button role="tab" aria-selected="false" id="4">Система “екопанелі”</button>
            <button role="tab" aria-selected="false" id="5">Система “Універсал м”</button>
            <button role="tab" aria-selected="false" id="6">Система “скала”</button>
            <button role="tab" aria-selected="false" id="7">Система “universal wall”</button>
            <button role="tab" aria-selected="false" id="8">Система “50x50”</button>
            <button role="tab" aria-selected="false" id="9">Система “стендер”</button>
            <button role="tab" aria-selected="false" id="10">Система “техномаг”</button>
            <button class="purple" role="tab" aria-selected="false" id="11">Система “constructive”</button>
            <button class="purple" role="tab" aria-selected="false" id="12">Система “структура”</button>
            <button class="purple" role="tab" aria-selected="false" id="13">Стійки та рецепції</button>
            <button class="blue" role="tab" aria-selected="false" id="14">Елементи офісних меблів</button>
            <button class="blue" role="tab" aria-selected="false" id="15">Фурнітура</button>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="0">
            <div class="tabs__info">
              <div class="tabs__name">Система “Універсал”</div>
              <div class="tabs__description">L-стійка висотою 2420 мм — це конструкція з труби, що має 60х30 мм в перетині й складається із зварених між собою вертикальної стійки з двома рядами перфорованих прорізів по всій висоті та нижньої горизонтальної балки з регульованими опорами. Прорізи використовуються для встановлення різноманітного навісного обладнання: полиць, кронштейнів-вішалок, штанг, гачків, панелей та ін. Стійку можна закріпити до стіни за допомогою спеціальних кронштейнів У 117.</div>
            </div>
            <div class="tabs__wrapper-sliders">
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="1" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “Універсал 30”</div>
              <div class="tabs__description">L-стійка висотою 2420 мм — це конструкція з труби, що має 60х30 мм в перетині й складається із зварених між собою вертикальної стійки з двома рядами перфорованих прорізів по всій висоті та нижньої горизонтальної балки з регульованими опорами. Прорізи використовуються для встановлення різноманітного навісного обладнання: полиць, кронштейнів-вішалок, штанг, гачків, панелей та ін. Стійку можна закріпити до стіни за допомогою спеціальних кронштейнів У 117.</div>
            </div>
            <div class="tabs__wrapper-sliders">
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал 30”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал 30”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал 30”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="2" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “Універсал 60”</div>
              <div class="tabs__description">L-стійка висотою 2420 мм — це конструкція з труби, що має 60х30 мм в перетині й складається із зварених між собою вертикальної стійки з двома рядами перфорованих прорізів по всій висоті та нижньої горизонтальної балки з регульованими опорами. Прорізи використовуються для встановлення різноманітного навісного обладнання: полиць, кронштейнів-вішалок, штанг, гачків, панелей та ін. Стійку можна закріпити до стіни за допомогою спеціальних кронштейнів У 117.</div>
            </div>
            <div class="tabs__wrapper-sliders">
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал 60”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал 60”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
              <div class="tabs__swiper"> 
                <div class="tabs__info-shop">
                  <div class="tabs__info-shop-name">Магазин Мілітарі</div>
                  <div class="tabs__info-shop-item"> одяг та оснащення</div>
                  <div class="tabs__info-shop-item"> <span>Адреса: </span>м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д</div>
                  <div class="tabs__info-shop-item"> <span>Рік: </span>2014</div>
                  <div class="tabs__info-shop-item"> <span>Система: </span>Система “Універсал 60”</div>
                </div>
                <div class="swiper-wrapper"> 
                  <div class="swiper-slide"> <img src="./assets/images/gallery/3.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/2.jpg"></div>
                  <div class="swiper-slide"> <img src="./assets/images/gallery/1.jpg"></div>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
                <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
                  <svg class="icon--arrow" role="presentation">
                    <use xlink:href="#icon-arrow"></use>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="3" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “гондоли”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="4" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “екопанелі”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="5" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “Універсал м”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="6" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “скала”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="7" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “universal wall”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="8" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “50x50”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="9" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “стендер”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="10" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “техномаг”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="11" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “constructive”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="12" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Система “структура”</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="13" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Стійки та рецепції</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="14" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Елементи офісних меблів</div>
              <div class="tabs__description"></div>
            </div>
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="15" hidden>
            <div class="tabs__info">
              <div class="tabs__name">Фурнітура</div>
              <div class="tabs__description"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

    <!-- <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/libs.js')}}"></script> -->
@push('footer-scripts')
    @vite(['resources/js/common.js', 'resources/js/gallery.js'])
@endpush
