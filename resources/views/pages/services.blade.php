@extends('layouts.theme')
@section('content')
    <section class="services page-container">
        <div class="services-wrap">
            <div class="page-intro">
                <!-- <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item">
                            <a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{url('/')}}">Головна</a></li>
                        <li class="breadcrumbs-item">
                            <a class="breadcrumbs-item__link" href="#">Інформація для замовника</a>
                        </li>
                    </ul>
                </div> -->
                <h2 class="page-title text-title">Інформація для замовника</h2>
            </div>
            <div class="services-list">
{{--                start item--}}
               @foreach($page['data'] as $item)
                <div class="services-item">
                    <div class="services-item__title-wrap">
                        <h3 class="services-item__title text-m">{{$item->data[App::currentLocale()]['title']}}</h3>
                        <div class="services-item__title-arrow">
                            <svg class="icon--contacts-arrow" role="presentation">
                                <use xlink:href="#icon-contacts-arrow"></use>
                            </svg>
                        </div>
                    </div>

                    <!-- <div class="services-item__img-wrap">
                        @if(Storage::has($item->thumbnail) && !empty($item->thumbnail))
                            <img src="{{ $item->thumbnailUrl}}" class="services-item__img" id="thumbnail-preview" alt="">
                        @endif
                        <div class="services-item__img-descr-wrap">
                            <p class="services-item__img-descr text-s">{{$item->data[App::currentLocale()]['post_title']}}</p>
                        </div>
                    </div> -->
                    <div class="services-item__descr-wrap">
                        {!! $item->data[App::currentLocale()]['description'] !!}
                        @if($item->data[App::currentLocale()]['designer'] == true)
                        <div class="services-item__alert">
                            <svg class="icon--alert services-item__alert-svg" role="presentation">
                                <use xlink:href="#icon-alert"></use>
                            </svg>
                            <span class="services-item__alert-text text-14">
                                Виїзд дизайнера по м. Києву на об'єкт:
                            </span>
                            <span class="services-item__alert-text--red text-14">{{$item->data[App::currentLocale()]['designer_price']}} грн.</span>
                        </div>
                        @endif
                    </div>
                    <!-- <div class="services-btn-wrap">
                        <button class="btn btn--full">Замовити індивідуальний проєкт</button>
                    </div> -->
                </div>
                @endforeach
{{--                end item --}}
            </div>
        </div>
    </section>
@endsection
@push('footer-scripts')
    @vite(['resources/js/common.js', 'resources/js/services.js'])
@endpush
