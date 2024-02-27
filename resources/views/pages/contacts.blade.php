@extends('layouts.theme')

@section('content')
    <section class="contacts-page page-container">
        <div class="contacts-page-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item">
                            <a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="index.html">Homepage</a>
                        </li>
                        <li class="breadcrumbs-item">
                            <a class="breadcrumbs-item__link" href="#">contactsPage</a>
                        </li>
                        <li class="breadcrumbs-item__current--color breadcrumbs-item">Contacts</li>
                    </ul>
                </div>
                <h2 class="page-title text-title">Контакти</h2>
            </div>
            <div class="contacts-page-list-wrap">
                <div class="contacts-page-list">
                    <div class="contacts-page-list-item">
                        <div class="contacts-page-list-item-title-wrap">
                            <div class="contacts-page-list-item-title">
                                <span class="text-m text-black">м. Київ </span>
                                <span class="contacts-page-list-item-subtitle text-14 text-black">(головний офіс)</span>
                            </div>
                            <div class="contacts-page-list-item-title-arrow">
                                <svg class="icon--contacts-arrow" role="presentation">
                                    <use xlink:href="#icon-contacts-arrow"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="contacts-page-list-item-content">
                            <button class="contacts-page-list-item__btn"> <span class="text-14 text-white">Зворотній зв'язок</span></button>
                            <div class="contacts-page-list-item-content-details">
                                <div class="contacts-page-list-item-content-details__svg-wrap">
                                    <svg class="icon--contacts-phone" role="presentation">
                                        <use xlink:href="#icon-contacts-phone"></use>
                                    </svg>
                                </div>
                                <div class="contacts-page-list-item-content-details__link-wrap">
                                    <a class="contacts-page-list-item-content-details__link text-14 text-black" href="tel:+38(044)496-69-97">+38 (044) 496-69-97</a>
                                    <a class="contacts-page-list-item-content-details__link text-14 text-black" href="tel:+380504478965"> +38 (050) 447-89-65</a>
                                </div>
                                
                            </div>
                            <div class="contacts-page-list-item-content-details">
                                <div class="contacts-page-list-item-content-details__svg-wrap">
                                    <svg class="icon--contacts-mail" role="presentation">
                                        <use xlink:href="#icon-contacts-mail"></use>
                                    </svg>
                                </div>
                                <a class="contacts-page-list-item-content-details__link text-14 text-black" href="mailto:nika@nika-trade.net.ua">nika@nika-trade.net.ua</a>
                            </div>
                            <div class="contacts-page-list-item-content-details">
                                <div class="contacts-page-list-item-content-details__svg-wrap">
                                    <svg class="icon--contacts-map" role="presentation">
                                        <use xlink:href="#icon-contacts-map"></use>
                                    </svg>
                                </div>
                                <a class="contacts-page-list-item-content-details__link text-14 text-black" href="https://maps.app.goo.gl/fTCceRveJW8T62NL8" target="_blank">Київ, Україна, 04080 вул. Вікентія Хвойки, 15/15</a>
                            </div>
                        </div>
                    </div>
                    <div class="contacts-page-list-item">
                        <div class="contacts-page-list-item-title-wrap">
                            <div class="contacts-page-list-item-title"><span class="text-m text-black">м. Дніпро </span><span class="contacts-page-list-item-subtitle text-14 text-black">(представництво)</span></div>
                            <div class="contacts-page-list-item-title-arrow">
                                <svg class="icon--contacts-arrow" role="presentation">
                                    <use xlink:href="#icon-contacts-arrow"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="contacts-page-list-item-content">
                            <button class="contacts-page-list-item__btn"> 
                                <span class="text-14 text-white">Зворотній зв'язок</span>
                            </button>
                            <div class="contacts-page-list-item-content-details">
                                <div class="contacts-page-list-item-content-details__svg-wrap">
                                    <svg class="icon--contacts-phone" role="presentation">
                                        <use xlink:href="#icon-contacts-phone"></use>
                                    </svg>
                                </div>
                                <div class="contacts-page-list-item-content-details__link-wrap">
                                    <a class="contacts-page-list-item-content-details__link text-14 text-black" href="tel:+38(056)238-69-90">+38 (056) 238-69-90</a>
                                    <a class="contacts-page-list-item-content-details__link text-14 text-black" href="tel:+380504121600"> +38 (050) 412-16-00</a>
                                </div>
                            </div>
                            <div class="contacts-page-list-item-content-details">
                                <div class="contacts-page-list-item-content-details__svg-wrap">
                                    <svg class="icon--contacts-mail" role="presentation">
                                        <use xlink:href="#icon-contacts-mail"></use>
                                    </svg>
                                </div>
                                <a class="contacts-page-list-item-content-details__link text-14 text-black" href="mailto:alexnika.dp@gmail.com">alexnika.dp@gmail.com</a>
                            </div>
                            <div class="contacts-page-list-item-content-details">
                                <div class="contacts-page-list-item-content-details__svg-wrap">
                                    <svg class="icon--contacts-map" role="presentation">
                                        <use xlink:href="#icon-contacts-map"></use>
                                    </svg>
                                </div>
                                <a class="contacts-page-list-item-content-details__link text-14 text-black" href="https://maps.app.goo.gl/op2b3rmbbiQjuVaT9" target="_blank">Дніпро, Україна, 49000 вул. Князя Володимира Великого (кол. Плеханова), 18, 1 поверх</a>
                            </div>
                        </div>
                    </div>
                    <div class="contacts-page-list-item">
                        <div class="contacts-page-list-item-title-wrap">
                            <div class="contacts-page-list-item-title">
                                <span class="text-m text-black">Ми в Епіцентрі</span>
                            </div>
                            <div class="contacts-page-list-item-title-arrow">
                                <svg class="icon--contacts-arrow" role="presentation">
                                    <use xlink:href="#icon-contacts-arrow"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="contacts-page-list-item-content contacts-page-list-item-content-epicentr">
                            <div class="contacts-page-list-item-content-columns-wrap">
                                <div class="contacts-page-list-item-content-column">
                                    <div class="contacts-page-list-item-content-column__logo">
                                        <svg class="icon--epicentr" role="presentation">
                                            <use xlink:href="#icon-epicentr"></use>
                                        </svg>
                                    </div>
                                    <div class="contacts-page-list-item-content-column__title text-18 text-black">Консультант</div>
                                    <div class="contacts-page-list-item-content-column-profile">
                                        <div class="contacts-page-list-item-content-column-profile__svg">
                                            <svg class="icon--profile" role="presentation">
                                                <use xlink:href="#icon-profile"></use>
                                            </svg>
                                        </div>
                                        <div class="contacts-page-list-item-content-column-profile-info"><span class="contacts-page-list-item-content-column-profile-info__name text-14 text-black">Христенко Юрій</span><a class="contacts-page-list-item-content-column-profile-info__number text-14 text-black" href="tel:+38(050)310-50-09">+38 (050) 310-50-09</a></div>
                                    </div>
                                </div>
                                <div class="contacts-page-list-item-content-column">
                                    <span class="contacts-page-list-item-content-column__title text-18 text-black">Адреси гіпермаркетів "Епіцентр", в яких продається продукція ТОВ "НІКА КОМПАНІ":</span>
                                    <div class="contacts-page-list-item-content-column-list">

                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Бровари</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/aZBgmjCCjWJLiZxv5" target="_blank">
                                                    <span class="text-14 text-black-100">м. Бровари, вул. Київська, 253 </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Івано-франківськ</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/9YaMAuJ7rXRoUzak6" target="_blank">
                                                    <span class="text-14 text-black-100">м. Івано-Франківськ, вул. Івасюка, 17 </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Київ</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/qC8FqtELTyqKWnK4A" target="_blank">
                                                    <span class="text-14 text-black-100">м. Київ, вул. Братиславська, 11 </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/wtgLJnA7R5USGu1XA" target="_blank">
                                                    <span class="text-14 text-black-100">м. Київ, вул. Кільцева, 1Б</span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/YsyN3QAFTgTT3wW37" target="_blank">
                                                    <span class="text-14 text-black-100">м. Київ, пр-т Григоренка, 40</span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/kqimFg5kyRBEwZrz6" target="_blank">
                                                    <span class="text-14 text-black-100">м. Київ, вул. Берковецька , 6В </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/kp4nf3UNCfQhuLGJ9" target="_blank">
                                                    <span class="text-14 text-black-100">м. Київ, вул. Полярна, 20Д</span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                                
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/e25ebUmwRZ5Rd3ho7" target="_blank">
                                                    <span class="text-14 text-black-100">м. Київ, вул. С. Бандери, 11А </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Одеса</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/MidfBGFHf28HLbKj7" target="_blank">
                                                    <span class="text-14 text-black-100">"Епіцентр" м. Одеса, Овідіопольське шосе, 1 </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/38XNuqwHbf6hQUse6" target="_blank">
                                                    <span class="text-14 text-black-100">Одеська обл., Овідіопольський р-н, с. Лиманка, пр-т Небесної Сотні, 99</span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Рівне</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/tS8cq7sZTQC71c6w6" target="_blank">
                                                    <span class="text-14 text-black-100">м. Рівне, вул. Кулика і Гудачека, 17</span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Суми</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/hLgUWC3EVfkzZdAe7" target="_blank">
                                                    <span class="text-14 text-black-100">м. Суми, вул. Героїв Крут, 1/3 </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Харків</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/u52xsWnaenkb6XEU8" target="_blank">
                                                    <span class="text-14 text-black-100">"Епіцентр" м. Харків, вул. Героїв Праці, 9А </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="contacts-page-list-item-content-column-list-item">
                                            <div class="contacts-page-list-item-content-column-list-item__city text-14 text-black">Чернівці</div>
                                            <div class="contacts-page-list-item-content-column-list-item-content">
                                                <a class="contacts-page-list-item-content-column-list-item__adress" href="https://goo.gl/maps/vRWg59oemwkJFwD8A" target="_blank">
                                                    <span class="text-14 text-black-100">м. Чернівці, вул. Хотинська, 10  </span>
                                                    <svg class="icon--arrow-item-contacts" role="presentation">
                                                        <use xlink:href="#icon-arrow-item-contacts"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>    
                                 
                                    </div>
                                </div>
                                <div class="contacts-page-list-item-content-column">
                                    <span class="contacts-page-list-item-content-column__title text-18 text-black">Історія співпраці</span>
                                    <div class="contacts-page-list-item-content-column-text">
                                        <span class="text-14 text-text">Співпраця ТОВ "НІКА Компані" з мережею будівельно-господарських гіпермаркетів "Епіцентр" почалася 2009 року. Продукція нашої компанії реалізується у відділах "Вироби з металу" в різних містах України.</span>
                                        <span class="text-14 text-text">Покупцям пропонуються переважно елементи системи "Універсал", що забезпечують експонування практично будь-яких товарів промислової групи. Крім того, в гіпермаркетах "Епіцентр" представлені ферми для збирання просторових конструкцій, інформаційні стійки, острівні каркаси для торгових зал тощо.</span>
                                </div>
                            </div>
                            </div>
                            <div class="contacts-page-list-item-content-column-swiper-wrap">
                                <div class="contacts-page-list-item-content-column-swiper-nav-wrap">
                                    <div class="contacts-page-list-item-content-column-swiper-nav__title text-m text-black">Наші відділи в Епіцентрі </div>
                                    <div class="contacts-page-list-item-content-column-swiper-nav-buttons">
                                        <div class="contacts-page-list-item-content-column-swiper-nav__prev round-btn round-btn--black">
                                            <svg class="icon--arrow" role="presentation">
                                                <use xlink:href="#icon-arrow"></use>
                                            </svg>
                                        </div>
                                        <div class="contacts-page-list-item-content-column-swiper-nav__next round-btn round-btn--black">
                                            <svg class="icon--arrow" role="presentation">
                                                <use xlink:href="#icon-arrow"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="contacts-page-list-swiper-wrap">
                                    <div class="contacts-page-list-swiper swiper">
                                        <div class="swiper-wrapper contacts-page-list-swiper-wrapper">
                                            <div class="swiper-slide contacts-page-list-slide"><a class="contacts-page-list-slide-link" href="">
                                                    <div class="contacts-page-list-slide__img"> <img src="./assets/images/contacts/1.jpg" alt="" img-paralax></div></a></div>
                                            <div class="swiper-slide contacts-page-list-slide"><a class="contacts-page-list-slide-link" href="">
                                                    <div class="contacts-page-list-slide__img"> <img src="./assets/images/contacts/2.jpg" alt="" img-paralax></div></a></div>
                                            <div class="swiper-slide contacts-page-list-slide"><a class="contacts-page-list-slide-link" href="">
                                                    <div class="contacts-page-list-slide__img"> <img src="./assets/images/contacts/3.jpg" alt="" img-paralax></div></a></div>
                                            <div class="swiper-slide contacts-page-list-slide"><a class="contacts-page-list-slide-link" href="">
                                                    <div class="contacts-page-list-slide__img"> <img src="./assets/images/contacts/4.jpg" alt="" img-paralax></div></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
<script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
<script defer src="{{asset('/assets/scripts/libs.js')}}"></script>
<script defer src="{{asset('/assets/scripts/contacts.bundle.js')}}"></script> -->
@endsection
@push('footer-scripts')
    @vite(['resources/js/common.js', 'resources/js/contacts.js'])
@endpush
