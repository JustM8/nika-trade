@extends('layouts.theme')

@section('content')
    {{--    @dd($breadcrumbs);--}}
    <section class="product-page page-container" data-product-id="{{$product->id}}">
        <div class="product-page-wrap">
            <div class="page-intro" data-title="{{$rootParent->slug}}" >
                <!-- <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{ url('/')}}">Головна</a></li>
                        @foreach($breadcrumbs as $item)
                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="{{$item['url']}}">{{$item['name'][App::currentLocale()]}}</a></li>
                        @endforeach

                </ul>
            </div> -->
                <h2 class="page-title text-title">{{ $product->title[App::currentLocale()] }}</h2>
            </div>
            <div class="product-page-main">
                <div class="product-page-main-inner">
                    <div class="catalog-single-btn-mobile-wrap">
                        <button class="catalog-single-btn-mobile btn">
                            <svg class="icon--equipment-btn" role="presentation">
                                <use xlink:href="#icon-equipment-btn"></use>
                            </svg><span>{{ __('show.Обладнання') }}</span>
                        </button>
                    </div>
                    <div class="catalog-single-filters-wrap">

                        {{--                    @dd($menu);--}}
                        @foreach($menu as $item)
                            <div class="catalog-single-filter">
                                <a class="catalog-single-filter__title text-s" href="{{ route('catalog.show', $item['slug']) }}"> <?=$item['name']?></a>
                                @if(!empty($item['children']))
                                    @foreach($item['children'] as $underItem)
                                        <div class="catalog-single-filter-card">
                                            <div class="catalog-single-filter-card__title text-14 {{ isset($underItem['children']) && in_array($currentCategorySlug, array_column($underItem['children'], 'slug')) ? 'active' : '' }}"><?=$underItem['name']?></div>
                                            <div class="catalog-single-filter-card-list {{ isset($underItem['children']) && in_array($currentCategorySlug, array_column($underItem['children'], 'slug')) ? 'active' : '' }}" >
                                                @if(!empty($underItem['children']))
                                                    @foreach($underItem['children'] as $underUnderItem)
                                                        <a class="catalog-single-filter-card-list-item text-14 @if($underUnderItem['slug'] == $currentCategorySlug) active @endif " href="{{ route('catalog.show', $underUnderItem['slug']) }}"><?=$underUnderItem['name']?></a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach

                    </div>
                    <div class="product-page-item-wrap">
                        <div class="product-page-item-img-wrap">
                            <div class="product-page-item-img">
                                @if(Storage::has($product->thumbnail))
                                    <img class="product-page-image" src="{{ $product->thumbnailUrl  }}" alt="">
                                @endif


                                <div id="nikaModel" data-src-obj='{{ $product->objmodelUrl  }}' data-src-mtl='{{ $product->objmodelUrl2  }}' class="product-page-image product-page-image--obj hidden" camera-controls alt="A 3D model of an astronaut"></div>



                            </div>
                            <div class="product-page-item-img-switch"><span class="product-page__theme--2d text-14 text-black-100">{{ __('show.2D схема') }}</span>
                                <div class="product-page__theme js-product-page__theme">
                                    <input class="product-page__switch" id="switch" type="checkbox">
                                    <label for="switch"></label>
                                </div><span class="product-page__theme--3d text-14 text-black-100">{{ __('show.3D модель') }}</span>
                            </div>
                        </div>
                        <div class="product-page-item-info-wrap">
                            <div class="product-page-item-info product-page-item-info--desktop">
                                <div class="product-page-item-info__title-row">
                                    <span class="product-page-item-info__title-row-code text-14 text-black">{{ __('show.Артикул:') }} <span></span> </span>
                                    <span class="product-page-item-info__title-row-name text-14 text-black">{{ __('show.Назва:') }}</span>
                                    <span class="product-page-item-info__title-row-price text-14 text-black">{{ __('show.Ціна:') }}</span>
                                    <!-- <span class="product-page-item-info__title-row-quantity text-14 text-black">Кількість:</span> -->
                                    <span class="product-page-item-info__title-row-blank"></span></div>
                                @foreach($childrens as $item)
                                    <div class="product-page-list">
                                        <div class="product-page-item-info__row">
                                            <span class="product-page-item-info__row-code text-14 text-black">{{ $item->SKU }}</span>
                                            <span class="product-page-item-info__row-name text-14 text-black">{{ $item->title[App::currentLocale()] }}</span>
                                            <span class="product-page-item-info__row-price text-14 text-black">{{ $item->price }} {{ __('show.грн') }}</span>
                                            <div class="product-page-item-info__row-btn">
                                                <a data-route="{{ route('cart.add', $item) }}" type="submit" class="product-page-item-info__row-btn-link add-to-cart">
                                                    <svg class="icon--cart" role="presentation">
                                                        <use xlink:href="#icon-cart"></use>
                                                    </svg>
                                                    <span class="text-14 text-white">{{ __('show.Купити') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @foreach($childrens as $item)

                            <div class="product-page-item-info product-page-item-info--mobile">
                                <div class="product-page-item-info__title-row">
                                    <span class="product-page-item-info__title-row-code text-14 text-black">{{ __('show.Артикул:') }} <span></span> </span>
                                    <span class="product-page-item-info__title-row-name text-14 text-black">{{ __('show.Назва:') }}</span>
                                    <span class="product-page-item-info__title-row-price text-14 text-black">{{ __('show.Ціна:') }}</span>
                                    <!-- <span class="product-page-item-info__title-row-quantity text-14 text-black">Кількість:</span> -->
                                    <span class="product-page-item-info__title-row-blank"></span></div>
                                
                                    <div class="product-page-list">
                                        <div class="product-page-item-info__row">
                                            <span class="product-page-item-info__row-code text-14 text-black">{{ $item->SKU }}</span>
                                            <span class="product-page-item-info__row-name text-14 text-black">{{ $item->title[App::currentLocale()] }}</span>
                                            <span class="product-page-item-info__row-price text-14 text-black">{{ $item->price }} {{ __('show.грн') }}</span>
                                            <div class="product-page-item-info__row-btn">
                                                <a data-route="{{ route('cart.add', $item) }}" type="submit" class="product-page-item-info__row-btn-link add-to-cart">
                                                    <svg class="icon--cart" role="presentation">
                                                        <use xlink:href="#icon-cart"></use>
                                                    </svg>
                                                    <span class="text-14 text-white">{{ __('show.Купити') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            @endforeach

                            <div class="product-page-item-options">
                                <span class="text-12 text-black">{{ __('show.Cтандартні кольори:') }} </span>
                                <span class="text-12 text-black">{{ __('show.- Метал: сріблястий металік(RAL 7149 SPX)') }}</span>
                                <span class="text-12 text-black">{{ __('show.- ДСП: попелястий (U112 PE)') }}</span>
                                <span class="text-12 text-black">{{ __('show.Бажаний колір виробі залишайте в полі "Коментар" під час оформлення замовлення в Кошику') }}</span>

                            </div>
                        </div>
                    </div>



                </div>

                <div class="product-page-info-wrap">
                    <div class="product-page-info-switch">
                        <button class="product-page-info-switch-item active" data-info="details"> <span class="text-14 text-black-100">{{ __('show.Опис') }}</span></button>
                        <button class="product-page-info-switch-item" data-info="shipping"> <span class="text-14 text-black-100">{{ __('show.Оплата і доставка') }}</span></button>
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
                            <span class="product-page-info-descr__title text-m text-black-100">{{ __('show.Умови') }}</span>
                            <div class="product-page-info-list">
                                <div class="product-page-info-item text-14 text-text">{{ __('show.L-стійка висотою 2420 мм — це конструкція з труби, що має 60х30 мм в перетині й складається із зварених між собою вертикальної стійки з двома рядами перфорованих прорізів по всій висоті та нижньої горизонтальної балки з регульованими опорами. Прорізи використовуються для встановлення різноманітного навісного обладнання: полиць, кронштейнів-вішалок, штанг, гачків, панелей та ін. Стійку можна закріпити до стіни за допомогою спеціальних кронштейнів У 117.') }}</div>
                                <div class="product-page-info-item text-14 text-text">{{ __('show.Під час збирання каркасу стійки з`єдуються між собою за допомогою стяжок У 100, У 102 або У 103, по дві стяжки на кожний просвіт. Стандартні розміри просвітів системи (650 мм, 1000 мм і 1200 мм) забезпечуються відповідною довжиною цих стяжок. Кронштейни У 117 мають спеціальні пази, що дозволяють під час встановлення каркасу компенсувати нерівності стіни. Регульовані опори надають можливість компенсувати нерівності підлоги. Передбачена можливість встановлення подіумів з ДСП на нижні горизонтальні балки.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-page-more">
                <span class="product-page-more__title text-m text-black-100"> {{ __('show.Цей товар використовується разом із:') }}</span>
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
        <div class="cart-overlay-inner" data-lenis-prevent>
            <div class="cart-wrap">
                <button class="cart-close" data-cart-close><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M1 11L11 1L1 11ZM11 11L1 1L11 11Z" fill="#DD405D"/>
                        <path d="M11 11L1 1M1 11L11 1L1 11Z" stroke="white" stroke-width="2"/>
                    </svg>
                </button>
                <div class="cart-title text-m text-black-100">{{ __('show.Додано в кошик') }}</div>
                <div id="cart-popup">
                    @if(Cart::instance('cart')->count() > 0)
                        @each('cart.parts.product_view_popup', Cart::instance('cart')->content(), 'row')
                    @endif
                </div>
                <div class="cart-descr">
                    <span class="cart-descr-title text-14 text-black-100">{{ __('show.Ціни вказано з ПДВ за умови самовивозу з виробництва. Діючі ціни можуть не збігатися із вказаними на сайті. Уточнюйте, будь ласка.') }}</span>
                    <span class="cart-descr-price text-18 text-black-100"> {{ __('show.Разом') }}</span>
                    <span class="cart-descr-price-sum text-18 text-black-100"  id="cart-total">{{Cart::total()}} </span>
                </div>
                <div class="cart-buttons-wrap">
                    <a class="cart-buttons__back" data-cart-close>
                        <svg class="icon--arrow" role="presentation">
                            <use xlink:href="#icon-arrow"></use>
                        </svg>
                        <span class="text-14 text-black-100">{{ __('show.Продовжити покупки') }}</span>
                    </a>
                    <a class="cart-buttons__cart" href="{{url('/cart')}}">
                        <span class="text-14 text-white">{{ __('show.Перейти у кошик') }}</span>
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
    @vite([ 'resources/js/model.js','resources/js/cart.js', 'resources/js/common.js', 'resources/js/product-page.js', ])
@endpush


