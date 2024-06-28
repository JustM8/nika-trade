@extends('layouts.theme')

@section('content')
{{--    @dd($page);--}}
<section class="gallery page-container">
      <div class="gallery-wrap">
        <div class="page-intro">
          <div class="page-breadcrumbs">
            <ul class="breadcrumbs">
              <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="index.html">{{ __('gallery.Homepage') }}</a></li>
              <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">{{ __('gallery.gallery') }}</a></li>
              <li class="breadcrumbs-item__current--color breadcrumbs-item">{{ __('gallery.Gallery') }}</li>
            </ul>
          </div>
          <h2 class="page-title text-title">{{ __('gallery.Галерея') }}</h2>
        </div>
        <div class="tabs">
          <div class="tabs__list" role="tablist" aria-label="products">
              @foreach ($page['data'] as $cat)
                 <button role="tab" data-id="{{$cat['id']}}" data-tab="{{$cat['parent']}}">{{$cat['name']}}</button>
              @endforeach
          </div>
          <div class="tabs__panel" role="tabpanel" aria-labelledby="0">
            <div class="tabs__info">
              <div class="tabs__name">{{ __('gallery.Система “Універсал”') }}</div>
              <div class="tabs__description">{{ __('gallery.L-стійка висотою 2420 мм — це конструкція з труби, що має 60х30 мм в перетині й складається із зварених між собою вертикальної стійки з двома рядами перфорованих прорізів по всій висоті та нижньої горизонтальної балки з регульованими опорами. Прорізи використовуються для встановлення різноманітного навісного обладнання: полиць, кронштейнів-вішалок, штанг, гачків, панелей та ін. Стійку можна закріпити до стіни за допомогою спеціальних кронштейнів У 117.') }}</div>
            </div>
            <div class="tabs__wrapper-sliders">


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
