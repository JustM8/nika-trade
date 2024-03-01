@extends('layouts.theme')

@section('content')
{{--    @dd($news);--}}
    <section class="news-page page-container">
        <div class="news-page-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="index.html">Головна</a></li>
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">Новини</a></li>
                    </ul>
                </div>
                <h2 class="page-title text-title">Новини</h2>
            </div>
            <div class="news-page-list">

                    @foreach($news as $new)
                    <div class="news-page-item">
                    <div class="news-page-item-intro-wrap">
                        <div class="news-page-item-intro">
                            <h2 class="news-page-item__title text-24">{{$new->title[App::currentLocale()]}}</h2>
                            <p class="news-page-item__text text-14">{!! $new->description['description_top'][App::currentLocale()]!!}</p>
{{--                            {!! $new->description['description_top'][App::currentLocale()]!!}--}}
                            <a class="news-page-item__btn btn" href="{{ route('news.show', $new->slug) }}">Читати новину</a>
                        </div>
                        <div class="news-page-item-date">
                            <span class="news-page-item-date__day text-14">15</span>
                            <span class="news-page-item-date__month text-14">Січня</span>
                            <span class="news-page-item-date__year text-14">2023</span>
                        </div>
                    </div>
                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="{{ $new->thumbnailUrl  }}" alt=""></div>
                </div>
                @endforeach

{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Мережа магазинів “Family”</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/2.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Новий магазин “SPORT CITY” у Одесі</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/3.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">ТРЦ Retroville на Виноградарі</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/4.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Новий магазин “USUPSO”</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/5.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Шановні партнери</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/6.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Новий офіс “Сантехнічної торгової компанії”</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/7.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Магазин “SPORTCITY”</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/8.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Новий магазин «Точка» </h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/9.jpg" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="news-page-item">--}}
{{--                    <div class="news-page-item-intro-wrap">--}}
{{--                        <div class="news-page-item-intro">--}}
{{--                            <h2 class="news-page-item__title text-24">Торгівельне обладнання для магазину “ASICS TIGER”</h2>--}}
{{--                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>--}}
{{--                        </div>--}}
{{--                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="./assets/images/news/10.jpg" alt=""></div>--}}
{{--                </div>--}}

            </div>
        </div>
    </section>
@endsection
@push('footer-scripts')
    @vite([ 'resources/js/common.js', 'resources/js/news.js'])
@endpush
