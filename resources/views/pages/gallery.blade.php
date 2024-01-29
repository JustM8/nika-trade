@extends('layouts.theme')

@section('content')
    <section class="gallery page-container">
        <div class="gallery-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{url('/')}}">Homepage</a></li>
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">gallery</a></li>
                        <li class="breadcrumbs-item__current--color breadcrumbs-item">Gallery</li>
                    </ul>
                </div>
                <h2 class="page-title text-title">Галерея</h2>
            </div>
            <div class="gallery-list">
                @foreach($page['data'] as $item)
                <div class="gallery-item">
                    @if(Storage::has($item->thumbnail) && !empty($item->thumbnail))
                        <img src="{{ $item->thumbnailUrl}}" class="gallery-item__img" id="thumbnail-preview" alt="">
                    @endif
                    <div class="gallery-item__overlay">
                        <div class="gallery-item__overlay-info"> <span class="gallery-item__overlay-info--bold text-14">Магазин: </span><span class="gallery-item__overlay-info--light text-14">{{$item->data[App::currentLocale()][0]['row']}}</span></div>
                        <div class="gallery-item__overlay-info"> <span class="gallery-item__overlay-info--bold text-14">Адреса: </span><span class="gallery-item__overlay-info--light text-14">{{$item->data[App::currentLocale()][1]['row']}}</span></div>
                        <div class="gallery-item__overlay-info"> <span class="gallery-item__overlay-info--bold text-14">Рік: </span><span class="gallery-item__overlay-info--light text-14">{{$item->data[App::currentLocale()][2]['row']}}</span></div>
                        <div class="gallery-item__overlay-info"> <span class="gallery-item__overlay-info--bold text-14">Система: </span><span class="gallery-item__overlay-info--light text-14">{{$item->data[App::currentLocale()][3]['row']}}</span></div>
                    </div>
                </div>
                @endforeach

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
