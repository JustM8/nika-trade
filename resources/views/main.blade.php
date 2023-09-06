@extends('layouts.theme')

@section('content')
    <section class="intro-main-screen">
        <div class="intro-swiper-wrap">
            <div class="swiper intro-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide intro-swiper-slide"> <img class="intro-swiper-slide__img" src="./assets/images/homepage/intro/slide1.jpg" alt="">
                        <h1 class="intro-swiper-slide__title text-title">Виставкове обладнання</h1>
                    </div>
                    <div class="swiper-slide intro-swiper-slide"> <img class="intro-swiper-slide__img" src="./assets/images/homepage/intro/slide1.jpg" alt="">
                        <h1 class="intro-swiper-slide__title text-title">Виставкове обладнання</h1>
                    </div>
                    <div class="swiper-slide intro-swiper-slide"> <img class="intro-swiper-slide__img" src="./assets/images/homepage/intro/slide1.jpg" alt="">
                        <h1 class="intro-swiper-slide__title text-title">Виставкове обладнання</h1>
                    </div>
                </div>
            </div>
            <div class="intro-swiper-nav">
                <div class="intro-swiper-button-prev round-btn">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                </div>
                <div class="intro-swiper-button-next round-btn round-btn-next">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                </div>
            </div><a class="intro-next-section" href="#">
                <svg class="icon--arrow-to-section" role="presentation">
                    <use xlink:href="#icon-arrow-to-section"></use>
                </svg></a>
        </div>
    </section>
    <section class="directions">
        <div class="directions-wrap section-container">
            <h2 class="directions-title text-title">Напрямки роботи  </h2>
            <div class="directions-list-wrap">
                <h2 class="directions-list-title text-m">Ми працюємо в трьох основних напрямках:</h2>
                <div class="directions-list">
                    <p class="directions-list-item text-s">Торговельне обладнання зі спеціалізацією на товарах промислової групи для магазинів одягу, взуття, дитячих, спортивних та канцелярських товарів, магазинів побутової та комп'ютерної техніки, ювелірних магазинів, аптек тощо;</p>
                    <p class="directions-list-item text-s">Виставкове обладнання виставкові стенди, що включають просторові конструкції з металевих ферм, рецепції і рекламні стійки, двоповерхові стенди, тематичні стенди за індивідуальним дизайном;</p>
                    <p class="directions-list-item text-s">Офісні меблі за індивідуальними проектами з використанням металевих каркасів столів, меблевих опор та іншої фурнітури власного виробництва.</p>
                </div>
            </div>
            <p class="directions-additional-text text-m">Основу нашого виробництва складає торгове обладнання, а саме універсальні збірно-розбірні металеві каркаси для пристінної і острівної забудови з широким асортиментом навісних елементів, гондоли, прилавки, вітрини, рекламні стійки, рецепції і т.д.</p>
        </div>
    </section>
    <section class="news">
        <div class="news-wrap section-container">
            <div class="news-title-wrap">
                <div class="news-swiper-button-prev round-btn round-btn--black">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                </div>
                <h2 class="news-title text-title">Новини</h2>
                <div class="news-swiper-button-next round-btn round-btn-next round-btn--black">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                </div>
            </div>
            <div class="news-gallery">
                <div class="news-gallery-swiper-wrap">
                    <div class="news-gallery-swiper swiper">
                        <div class="swiper-wrapper news-gallery-swiper-wrapper">
                            @foreach($news as $new)
                            <div class="swiper-slide news-gallery-slide">
                                <div class="news-gallery-slide__img"> <img src="{{ $new->thumbnailUrl  }}" alt="" img-paralax></div>
                                <p class="news-gallery-slide__text text-m">{{$new->title[App::currentLocale()]}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="about-wrap section-container">
            <h2 class="about-title text-title">Про компанію</h2>
            <div class="about-list">
                <p class="about-list-item text-s">Всі наші конструкції спрямовані на максимальне задоволення потреб клієнта і пройшли перевірку тисячами виконаних замовлень. Вони естетичні і функціональні. Якість продукції з маркою «НІКА» не поступається європейському. Власна виробнича база дозволяє компанії працювати оперативно і ефективно, надавати клієнтам потрібне торгове обладнання. Київ є містом розташування головного офісу компанії «НІКА», у передмісті знаходиться виробнича база.</p>
                <p class="about-list-item text-s">Ще одним позитивним моментом є простота і зручність роботи з нашим обладнанням. Будь-хто може самостійно зібрати і перебудувати наші металеві стелажі, встановити на них навісні елементи. Всі вироби стандартної номенклатури, які користуються найбільшим попитом, постійно є на складі. Ви можете придбати їх через наш інтернет-магазин торгового обладнання.</p>
                <p class="about-list-item text-s">Відмінною рисою компанії «НІКА» є те, що ми надаємо повний комплекс послуг, який включає створення дизайн-проекту, виготовлення торговельного обладнання, його доставку та монтаж в приміщенні замовника. Крім того, ми здійснюємо консультативну та гарантійну підтримку наших проектів і після монтажу, при необхідності проводимо реконструкцію обладнання.</p>
            </div>
        </div>
    </section>
    <section class="clients">
        <div class="clients-wrap section-container">
            <h2 class="clients-title text-title">Наші клієнти</h2>
            <div class="clients-swiper-wrap">
                <div class="clients-swiper-button-prev round-btn round-btn--black">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                </div>
                <div class="swiper clients-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/2.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/3.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/4.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/5.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/2.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/3.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/4.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide"> <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/5.png" alt=""></div>
                    </div>
                </div>
                <div class="clients-swiper-button-next round-btn round-btn-next round-btn--black">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('footer-scripts')
<script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
<script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
<script defer src="{{asset('/assets/scripts/libs.js')}}"></script>
<script defer src="{{asset('/assets/scripts/homepage.bundle.js')}}"></script>
@endpush
