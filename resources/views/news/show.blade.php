@extends('layouts.theme')

@section('content')
{{--    {{$news->title[App::currentLocale()]}}--}}
    <section class="single-news page-container">
        <div class="single-news-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{url('/')}}">Homepage</a></li>
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="{{url('/news')}}">singleNews</a></li>
                        <li class="breadcrumbs-item__current--color breadcrumbs-item">singleNews</li>
                    </ul>
                </div>
                <h2 class="page-title text-title">Мережа магазинів “Family”</h2>
            </div>
            <div class="single-news-item-wrap">
                <div class="single-news-item">
                    <h3 class="single-news-item__title text-24">ЯКИМ БУДЕ КИЇВ ЧЕРЕЗ 10 РОКІВ? ЗА ВЕРСІЄЮ НАШОЇ КОМПАНІЇ, ВІН БУДЕ НАЙКОМФОРТНІШИМ МІСТОМ У СВІТІ. </h3>
                    <p class="single-news-item__descr text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p>
                    <div class="single-news-item__img-wrap"><img class="single-news-item__img" src="{{asset('/assets/images/news/1.jpg')}}" alt=""></div>
                    <h3 class="single-news-item__title text-24">НАШ ПРОЄКТ ВІДЗНАЧИВ ЗА НАШ ПІДХІД ДО БУДІВНИЦТВА КВАРТАЛІВ, НАСИЧЕНУ ІНФРАСТРУКТУРУ ТА ГОЛОВНУ РОДЗИНКУ РАЙОНУ — НАБЕРЕЖНУ ЗАВДОВЖКИ 1 КМ.</h3>
                    <p class="single-news-item__descr text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю.</p>
                    <ul class="single-news-item__list">
                        <li class="single-news-item__list-card text-14">«Гарна набережна, яка відкриється на нашому проєкті, стане окрасою Києва», — зазначає у статті НВ головний архітектор Архіматики Дмитро Васильєв.</li>
                        <li class="single-news-item__list-card text-14">«Гарна набережна, яка відкриється на нашому проєкті</li>
                        <li class="single-news-item__list-card text-14">«Гарна набережна нашого проєкту, стане окрасою Києва», — зазначає</li>
                    </ul><a class="single-news-item__btn btn" href="#">Перейти на офіційний сайт </a>
                </div>
                <div class="single-news-item__date"><span class="single-news-item__date-day text-14">15</span><span class="single-news-item__date-month text-14">Січня</span><span class="single-news-item__date-year text-14">2023</span></div>
            </div>
            <h4 class="single-news__subtitle text-m">Останні новини</h4>
            <div class="news-page-list">
                <div class="news-page-item">
                    <div class="news-page-item-intro-wrap">
                        <div class="news-page-item-intro">
                            <h2 class="news-page-item__title text-24">Новий магазин “ARBER”</h2>
                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>
                        </div>
                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>
                    </div>
                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="{{asset('/assets/images/news/1.jpg')}}" alt=""></div>
                </div>
                <div class="news-page-item">
                    <div class="news-page-item-intro-wrap">
                        <div class="news-page-item-intro">
                            <h2 class="news-page-item__title text-24">Мережа магазинів “Family”</h2>
                            <p class="news-page-item__text text-14">Устаткування марки "НІКА" тепер в Ісландії, м. Рейк'явік. Вітаємо наших партнерів з відкриттям нового магазину. Продукція світового бренду "ASICS" відома своєю високою якістю і зручністю. Філософія компанії ASICS укладена вже в самій її назві, абревіатурі відомого висловлювання: «Anima Sana In Corpore Sano», що в перекладі означає "В здоровому тілі - здоровий дух".</p><a class="news-page-item__btn btn" href="#">Читати новину</a>
                        </div>
                        <div class="news-page-item-date"> <span class="news-page-item-date__day text-14">15</span><span class="news-page-item-date__month text-14">Січня</span><span class="news-page-item-date__year text-14">2023</span></div>
                    </div>
                    <div class="news-page-item__img-wrap"> <img class="news-page-item__img" src="{{asset('/assets/images/news/2.jpg')}}" alt=""></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('footer-scripts')
    {{--    @vite(['resources/js/product-actions.js'])--}}
@endpush
