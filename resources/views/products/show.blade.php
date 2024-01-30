@extends('layouts.theme')

@section('content')
{{--    @dd($breadcrumbs);--}}
    <section class="product-page page-container" data-product-id="{{$product->id}}">
        <div class="product-page-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{ url('/')}}">Homepage</a></li>
                        @foreach($breadcrumbs as $item)
                                <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="{{$item['url']}}">{{$item['name'][App::currentLocale()]}}</a></li>
                        @endforeach

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


                            <div id="nikaModel" data-srс='{{ $product->objmodelUrl  }}' class="product-page-image product-page-image--obj hidden" camera-controls alt="A 3D model of an astronaut"></div>



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
                            <div class="product-page-item-info__title-row">
                                <span class="product-page-item-info__title-row-code text-14 text-black">Артикул: <span></span> </span>
                            <span class="product-page-item-info__title-row-name text-14 text-black">Назва:</span>
                            <span class="product-page-item-info__title-row-price text-14 text-black">Ціна:</span>
                            <!-- <span class="product-page-item-info__title-row-quantity text-14 text-black">Кількість:</span> -->
                            <span class="product-page-item-info__title-row-blank"></span></div>
{{--                            <div class="product-page-list">--}}
{{--                                <div class="product-page-item-info__row">--}}
{{--                                    <span class="product-page-item-info__row-code text-14 text-black">{{ $product->SKU }}</span>--}}
{{--                                    <span class="product-page-item-info__row-name text-14 text-black">{{ $product->title[App::currentLocale()] }}</span>--}}
{{--                                    <span class="product-page-item-info__row-price text-14 text-black">{{ $product->price }} грн</span>--}}
{{--                                    <div class="product-page-item-info__row-btn">--}}
{{--                                        <a data-route="{{ route('cart.add', $product) }}" type="submit" class="product-page-item-info__row-btn-link add-to-cart">--}}
{{--                                            <svg class="icon--cart" role="presentation">--}}
{{--                                                <use xlink:href="#icon-cart"></use>--}}
{{--                                            </svg>--}}
{{--                                            <span class="text-14 text-white">Купити</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            @foreach($childrens as $item)
                            <div class="product-page-list">
                                <div class="product-page-item-info__row">
                                <span class="product-page-item-info__row-code text-14 text-black">{{ $item->SKU }}</span>
                                <span class="product-page-item-info__row-name text-14 text-black">{{ $item->title[App::currentLocale()] }}</span>
                                <span class="product-page-item-info__row-price text-14 text-black">{{ $item->price }} грн</span>
                                    <div class="product-page-item-info__row-btn">
                                            <a data-route="{{ route('cart.add', $item) }}" type="submit" class="product-page-item-info__row-btn-link add-to-cart">
                                                <svg class="icon--cart" role="presentation">
                                                    <use xlink:href="#icon-cart"></use>
                                                </svg>
                                                <span class="text-14 text-white">Купити</span>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    <!-- <a class="product-page-item-btn text-14 text-black-100" href="">Завантажити каталог продукції</a> -->
                    <div class="product-page-item-options">
                        <span class="text-12 text-black">Cтандартні кольори: </span>
                        <span class="text-12 text-black">- Метал: сріблястий металік(RAL 7149 SPX)</span>
                        <span class="text-12 text-black">- ДСП: попелястий (U112 PE)</span>
                        <span class="text-12 text-black">Бажаний колір виробі залишайте в полі "Коментар" під час оформлення замовлення в Кошику</span>

                    </div>
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

                            <div class="product-page-info-list">
                            <div class="product-page-info-item text-14 text-text">
                                {!! $product->description[App::currentLocale()] !!}
</div>
</div>
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
                <span class="product-page-more__title text-m text-black-100"> Цей товар використовується разом із:</span>
                <div class="product-page-more-list">
                    <!-- If we need navigation buttons -->
                    <div class="recommended-products-button-prev round-btn round-btn--black">
                        <svg class="icon--arrow" role="presentation">
                            <use xlink:href="#icon-arrow"></use>
                        </svg>
                    </div>

                    <div class="swiper recommended-products-swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($recommendedProducts as $item)
                                <a class="catalog-single-card swiper-slide" href="{{ route('product.show', $item->slug) }}">
                                    <div class="catalog-single-card__img">
                                        <img src="{{ $item->thumbnailUrl }}" alt="">
                                    </div>
                                    <div class="catalog-single-card-intro">
                                        <span class="catalog-single-card-intro__title text-24">{{ $item->title[App::currentLocale()] }}</span>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>

                    <div class="recommended-products-button-next round-btn round-btn-next round-btn--black">
                        <svg class="icon--arrow" role="presentation">
                            <use xlink:href="#icon-arrow"></use>
                        </svg>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="cart-overlay">
      <div class="cart-overlay-inner">
        <div class="cart-wrap">
            <button class="cart-close"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                <path d="M1 11L11 1L1 11ZM11 11L1 1L11 11Z" fill="#DD405D"/>
                <path d="M11 11L1 1M1 11L11 1L1 11Z" stroke="white" stroke-width="2"/>
                </svg>
            </button>
            <div class="cart-title text-m text-black-100">Додано в кошик</div>
            <div id="cart-popup">
                @if(Cart::instance('cart')->count() > 0)
                    @each('cart.parts.product_view_popup', Cart::instance('cart')->content(), 'row')
                @endif
            </div>
            <div class="cart-descr">
                <span class="cart-descr-title text-14 text-black-100">Ціни вказано з ПДВ за умови самовивозу з виробництва. Діючі ціни можуть не збігатися із вказаними на сайті. Уточнюйте, будь ласка.</span>
                <span class="cart-descr-price text-18 text-black-100"> Разом</span>
                <span class="cart-descr-price-sum text-18 text-black-100"  id="cart-total">{{Cart::total()}} </span>
            </div>
            <div class="cart-buttons-wrap">
                <a class="cart-buttons__back" href="{{ route('catalog.show', $categorySlug) }}">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                    <span class="text-14 text-black-100">Продовжити покупки</span>
                </a>
                <a class="cart-buttons__cart" href="{{url('/cart')}}">
                    <span class="text-14 text-white">Перейти у кошик</span>
                    <svg class="icon--cart" role="presentation">
                        <use xlink:href="#icon-cart"></use>
                    </svg>
                </a>
            </div>
        </div>
      </div>
      <!-- <div id="label"></div>
      <div class="shopping-cart" id="shopping-cart"></div> -->
    </div>


@endsection
@push('footer-scripts')
@vite([ 'resources/js/model.js','resources/js/cart.js', 'resources/js/cartPage.js', 'resources/js/common.js', 'resources/js/product-page.js', ])

    <!-- @vite([ 'resources/js/nikaModel.build.js','resources/js/cart.js', 'resources/js/cartPage.js', 'resources/js/common.js', 'resources/js/product-page.js', ]) -->
    <!-- <script>
        window.addEventListener('DOMContentLoaded',function(evt){
            window.obj3d(document.querySelector('.product-page-image--obj'), "{{ $product->objmodelUrl  }}");
        });
        console.log(document.querySelector('[data-object-container]'));
    </script> -->
    <!-- <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script> -->
<!-- <script defer src="{{asset('/assets/scripts/productPage.bundle.js')}}"></script> -->
<!-- <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.1.1/model-viewer.min.js"></script> -->
<!-- {{--    <script defer src="{{asset('/assets/scripts/cartPage.bundle.js')}}"></script>--}} -->
@endpush


