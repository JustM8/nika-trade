@extends('layouts.theme')

@section('content')
    <section class="intro-main-screen">
        <div class="intro-swiper-wrap">
            <div class="swiper intro-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide intro-swiper-slide" data-swiper-autoplay='5000'>
                        <img class="intro-swiper-slide__img" src="./assets/images/homepage/intro/slide2.jpg" alt="">

                    </div>
                    <div class="swiper-slide intro-swiper-slide" data-swiper-autoplay='5000'>
                        <img class="intro-swiper-slide__img" src="./assets/images/homepage/intro/slide1.jpg" alt="">

                    </div>
                    <div class="swiper-slide intro-swiper-slide" data-swiper-autoplay='5000'>
                        <img class="intro-swiper-slide__img" src="./assets/images/homepage/intro/slide3.jpg" alt="">

                    </div>
                </div>
            </div>
            <div class="homepage-catalog-list-wrap container">
                <div class="homepage-catalog-list">
                @foreach($rootCategories as $item)
                    <a class="homepage-catalog-card" href="{{ route('catalog.show', $item['slug']) }}">
                        <div class="homepage-catalog-card-intro">
                            <span class="homepage-catalog-card-intro__title"><?=$item['name'][App::currentLocale()]?></span>
                            @if($item['description'] != null)
                            <span class="homepage-catalog-card-intro__descr text-18"><?=$item['description'][App::currentLocale()]?></span>
                            @endif
                        </div>
                        <div class="homepage-catalog-card__arrow">
                            <svg class="icon--arrow-item" role="presentation">
                            <use xlink:href="#icon-arrow-item"></use>
                            </svg>
                        </div>
                    </a>
                @endforeach

                </div>
            </div>
            <!-- <div class="intro-swiper-nav">
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
            </div> -->
            <!-- <a class="intro-next-section" href="#">
                <svg class="icon--arrow-to-section" role="presentation">
                    <use xlink:href="#icon-arrow-to-section"></use>
                </svg>
            </a> -->
        </div>
    </section>

    <!-- <section class="directions">
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
    </section> -->
    <section class="about" id="about">
        <div class="about-wrap section-container">
            <h2 class="about-title text-title">Про компанію</h2>
            <div class="about-list">
                <p class="about-list-item text-s">Компанія «Ніка» присутня на українському ринку торгового обладнання з 1992 року. Це єдиний організм із власним виробництвом, службою продажів, дизайн-студією, службою доставки й монтажу.</p>
                <p class="about-list-item text-s">Наші конструкції пройшли перевірку тисячами виконаних замовлень. Вони естетичні й функціональні. Ми здійснюємо індивідуальне проєктування забудови об’єктів, спрямоване на максимальне задоволення потреб клієнта. </p>
                <p class="about-list-item text-s">Компанія «Ніка» також пропонує широкий асортимент стандартних виробів, які можна використовувати для самостійної забудови торгових зал, виставок та офісів. Основний асортимент представлений на цьому сайті.</p>
            </div>
        </div>
    </section>
    <section class="clients" id="clients">
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
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/1.1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/3.1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/2.1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/4.1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/6.1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/5.1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/7.1.png" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/1.jpg" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/2.jpg" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                             <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/3.jpg" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                             <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/4.jpg" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/5.jpg" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/6.jpg" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                             <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/7.jpg" alt=""></div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/8.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/9.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/10.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/11.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/12.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/13.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/14.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/15.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/16.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/17.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/18.jpg" alt="">
                        </div>
                        <div class="swiper-slide clients-swiper-slide">
                            <img class="clients-swiper-slide__img" src="./assets/images/homepage/clients/19.jpg" alt="">
                        </div>
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
                                <a href="{{ route('news.show', $new->slug) }}">
                                <div class="news-gallery-slide__img">
                                    <img src="{{ $new->thumbnailUrl  }}" alt="" img-paralax></div>
                                <p class="news-gallery-slide__text text-m">{{$new->title[App::currentLocale()]}}</p>

                                </a>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                <a class="news-page-item__btn btn" href="{{ url('/news') }}">Ще новини</a>
            </div>
        </div>
    </section>

@endsection
@push('footer-scripts')
    @vite(['resources/js/common.js', 'resources/js/homepage.js'])
@endpush
