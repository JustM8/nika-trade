@extends('layouts.theme')

@section('content')
<section class="catalog page-container">
    <div class="catalog-wrap">
        <div class="page-intro">
            <!-- <div class="page-breadcrumbs">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{ url('/')}}">Головна</a></li>
                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">Каталог</a></li>
                </ul>
            </div> -->
            <h2 class="page-title text-title">{{ __('index.Каталог') }}</h2>
        </div>
        <div class="catalog-list">

        @foreach($rootCategories as $item)
            <div class="catalog-card">
                <div class="catalog-card-intro">
                    <span class="catalog-card-intro__title text-24"><?=$item['name'][App::currentLocale()]?></span>
                    <a class="catalog-card-intro__link" href="{{ route('catalog.show', $item->slug) }}">
                        <span class="catalog-card-intro__link-title">{{ __('index.ДИВИТИСЯ ТОВАРИ') }} </span>
                        <div class="catalog-card-intro__link-svg">
                            <svg class="icon--arrow-item" role="presentation">
                                <use xlink:href="#icon-arrow-item"></use>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="catalog-card__img">
                    <img src="{{asset('/assets/images/equipment/default.jpg')}}" alt=""></div>
                <a class="catalog-card-intro__link catalog-card-intro__link--mobile" href="{{ route('catalog.show', $item->slug) }}">
                    <span class="catalog-card-intro__link-title">{{ __('index.ДИВИТИСЯ ТОВАРИ') }} </span>
                    <div class="catalog-card-intro__link-svg">
                        <svg class="icon--arrow-item" role="presentation">
                            <use xlink:href="#icon-arrow-item"></use>
                        </svg>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
        <button class="catalog-btn btn"> {{ __('index.Замовити індивідуальний проєкт') }}</button>
    </div>
</section>
@endsection
<!-- @push('footer-scripts')
    <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/catalog.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/libs.js')}}"></script>
@endpush -->
@push('footer-scripts')
    @vite(['resources/js/common.js', 'resources/js/catalog.js'])
@endpush
