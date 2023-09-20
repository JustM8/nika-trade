@extends('layouts.theme')

@section('content')
    <section class="product-page page-container" data-product-id="{{$product->id}}">
        <div class="product-page-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="index.html">Homepage</a></li>
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">productPage</a></li>
                        <li class="breadcrumbs-item__current--color breadcrumbs-item">Product</li>
                    </ul>
                </div>
                <h2 class="page-title text-title">{{ $product->title[App::currentLocale()] }}</h2>
            </div>
            <div class="product-page-main">
                <div class="product-page-item-wrap">
                    <div class="product-page-item-img-wrap">
                        <div class="product-page-item-img">
                            @if(Storage::has($product->thumbnail))
                                <img class="product-page-image" src="{{ $product->thumbnailUrl  }}" alt="">
                            @endif

                            <model-viewer class="product-page-image hidden" camera-controls alt="A 3D model of an astronaut" src="./assets/images/product/plant.glb"></model-viewer>
                        </div>
                        <div class="product-page-item-img-switch"><span class="product-page__theme--2d text-14 text-black-100">2D схема</span>
                            <div class="product-page__theme js-product-page__theme">
                                <input class="product-page__switch" id="switch" type="checkbox">
                                <label for="switch"></label>
                            </div><span class="product-page__theme--3d text-14 text-black-100">3D модель</span>
                        </div>
                    </div>
                    <div class="product-page-item-info-wrap">
                        <div class="product-page-item-info">
                            <div class="product-page-item-info__title-row"><span class="product-page-item-info__title-row-code text-14 text-black">Артикул:</span><span class="product-page-item-info__title-row-name text-14 text-black">Назва:</span><span class="product-page-item-info__title-row-price text-14 text-black">Ціна:</span><span class="product-page-item-info__title-row-quantity text-14 text-black">Кількість:</span><span class="product-page-item-info__title-row-blank"></span></div>
                            <div class="product-page-list">
                                <div class="product-page-item-info__row"><span class="product-page-item-info__row-code text-14 text-black">У 005</span><span class="product-page-item-info__row-name text-14 text-black">L-стійка Н=1220мм</span><span class="product-page-item-info__row-price text-14 text-black">810.00 грн</span><span class="product-page-item-info__row-quantity">
                      <div class="buttons product-page-item-info__row-quantity-container">
                        <div class="quantity product-page-item-info__row-quantity-num text-14 text-black">0</div>
                        <div class="product-page-item-info__row-quantity-buttons">
                          <button class="increment-btn product-page-item-info__row-quantity-increment text-14 text-black">
                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
<path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
</svg>
                          </button>
                          <button class="decrement-btn product-page-item-info__row-quantity-decrement text-14 text-black">
                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
<path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
</svg>
                          </button>
                        </div>
                      </div></span>
                                    <button class="product-page-item-info__row-btn">
                                        <svg class="icon--cart" role="presentation">
                                            <use xlink:href="#icon-cart"></use>
                                        </svg><span class="text-14 text-white">Купити</span>
                                    </button>
                                </div>
                            </div>
                        </div><a class="product-page-item-btn text-14 text-black-100" href="">Завантажити каталог продукції</a>
                    </div>
                </div>
                <div class="product-page-info-wrap">
                    <div class="product-page-info-switch">
                        <button class="product-page-info-switch-item active" data-info="details"> <span class="text-14 text-black-100">Опис</span></button>
                        <button class="product-page-info-switch-item" data-info="shipping"> <span class="text-14 text-black-100">Оплата і доставка</span></button>
                    </div>
                    <div class="product-page-info-container">
                        <div class="product-page-info active" data-info="details">

                            <span class="product-page-info-descr__title text-m text-black-100">{{ $product->title[App::currentLocale()] }}</span>
                                {!! $product->description[App::currentLocale()] !!}
                        </div>
                        <div class="product-page-info" data-info="shipping">
                            <span class="product-page-info-descr__title text-m text-black-100">Умови</span>
                            <div class="product-page-info-list">
                                <div class="product-page-info-item text-14 text-text">L-стійка висотою 2420 мм — це конструкція з труби, що має 60х30 мм в перетині й складається із зварених між собою вертикальної стійки з двома рядами перфорованих прорізів по всій висоті та нижньої горизонтальної балки з регульованими опорами. Прорізи використовуються для встановлення різноманітного навісного обладнання: полиць, кронштейнів-вішалок, штанг, гачків, панелей та ін. Стійку можна закріпити до стіни за допомогою спеціальних кронштейнів У 117.</div>
                                <div class="product-page-info-item text-14 text-text">Під час збирання каркасу стійки з'єдуються між собою за допомогою стяжок У 100, У 102 або У 103, по дві стяжки на кожний просвіт. Стандартні розміри просвітів системи (650 мм, 1000 мм і 1200 мм) забезпечуються відповідною довжиною цих стяжок. Кронштейни У 117 мають спеціальні пази, що дозволяють під час встановлення каркасу компенсувати нерівності стіни. Регульовані опори надають можливість компенсувати нерівності підлоги. Передбачена можливість встановлення подіумів з ДСП на нижні горизонтальні балки.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-page-more">
                <span class="product-page-more__title text-m text-black-100">Рекомендовані товари</span>
                <div class="product-page-more-list">
                    @foreach($recommendedProducts as $item)
                    <a class="catalog-single-card" href="{{ route('product.show', $item->slug) }}">
                        <div class="catalog-single-card__img"> <img src="{{ $item->thumbnailUrl }}" alt=""></div>
                        <div class="catalog-single-card-intro"><span class="catalog-single-card-intro__title text-24">{{ $item->title[App::currentLocale()] }}</span></div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


@endsection
@push('footer-scripts')
    @vite(['resources/js/images-actions.js', 'resources/js/nikaModel.build.js'])
    <script>
        window.addEventListener('DOMContentLoaded',function(evt){
            window.obj3d(document.querySelector('[data-object-container]'), "{{ $product->objmodelUrl  }}");
        });
        console.log(document.querySelector('[data-object-container]'));
    </script>
    <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/productPage.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/cartPage.bundle.js')}}"></script>
@endpush


