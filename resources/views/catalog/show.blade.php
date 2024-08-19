@extends('layouts.theme')

@section('content')
    @php($lastElement = end($breadcrumbs))
    @if($childrens->isEmpty())
        <section class="catalog-single page-container">
            <div class="catalog-single-wrap">
                <div class="page-intro" data-category="{{$rootParent->slug}}">
                    <!-- <div class="page-breadcrumbs">
                        <ul class="breadcrumbs">
                            <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{ url('/')}}">Головна</a></li>
                            @foreach($breadcrumbs as $item)
                        @if($item['id'] == $lastElement['id'])
                            <li class="breadcrumbs-item__current--color breadcrumbs-item">{{$item['name'][App::currentLocale()]}}</li>
                                @else
                            <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="{{$item['url']}}">{{$item['name'][App::currentLocale()]}}</a></li>
                                @endif
                    @endforeach
                    </ul>
                </div> -->
                    <h2 class="page-title text-title"><?=$category['name'][App::currentLocale()]?></h2>
                </div>
                <div class="catalog-single-main">
                    <div class="catalog-single-btn-mobile-wrap active">
                        <button class="catalog-single-btn-mobile btn">
                            <svg class="icon--equipment-btn" role="presentation">
                                <use xlink:href="#icon-equipment-btn"></use>
                            </svg><span>{{ __('show.Обладнання') }}</span>
                        </button>
                    </div>
                    <div class="catalog-single-filters-wrap">

                        @foreach($menu as $item)
                            <div class="catalog-single-filter">

                                <!--тут додати посилання на категорію-->

                                <a class="catalog-single-filter__title text-s" href="{{ route('catalog.show', $item['slug']) }}">{{$item['name']}}</a>
                                @if(!empty($item['children']))
                                    @foreach($item['children'] as $underItem)
                                        <div class="catalog-single-filter-card">
                                            <div class="catalog-single-filter-card__title text-14 {{ isset($underItem['children']) && in_array($category->slug, array_column($underItem['children'], 'slug')) ? 'active' : '' }}"><?=$underItem['name']?></div>
                                            <div class="catalog-single-filter-card-list {{ isset($underItem['children']) && in_array($category->slug, array_column($underItem['children'], 'slug')) ? 'active' : '' }}" >
                                                @if(!empty($underItem['children']))
                                                    @foreach($underItem['children'] as $underUnderItem)
                                                        <a class="catalog-single-filter-card-list-item text-14 @if($underUnderItem['slug'] == $category->slug) active @endif " href="{{ route('catalog.show', $underUnderItem['slug']) }}"><?=$underUnderItem['name']?></a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach

                    </div>
                    <div class="catalog-single-list">
                        @if($products->isNotEmpty())
                            @foreach($products as $product)
                                <a class="catalog-single-card" href="{{ route('product.show', $product) }}">
                                    <div class="catalog-single-card__img"> <img src="{{ $product->thumbnailUrl }}" alt=""></div>
                                    <div class="catalog-single-card-intro"><span class="catalog-single-card-intro__title text-24">{{ $product->title[App::currentLocale()] }}</span></div>
                                </a>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="catalog-single-info-wrap">
                    <!-- <p class="catalog-single-info__title text-m"> Ціни вказано з ПДВ за умови самовивозу з виробництва. Діючі ціни можуть відрізнятись від вказаних на цій сторінці, уточнюйте!      </p> -->
                    <div class="catalog-single-info">
                        <div class="catalog-single-info__text-wrap">
                            <p class="catalog-single-info__text text-14">
                                @if(isset($category) && is_array($category->description_l) && array_key_exists(App::currentLocale(), $category->description_l))
                                    {{ $category->description_l[App::currentLocale()] }}
                                @endif
                            </p>
                        </div>
                        <div class="catalog-single-info__text-wrap">
                            <p class="catalog-single-info__text text-14">
                                @if(isset($category) && is_array($category->description_r) && array_key_exists(App::currentLocale(), $category->description_r))
                                    {{ $category->description_r[App::currentLocale()] }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="equipment page-container">
            <div class="equipment-wrap">
                <div class="page-intro"  data-category="{{$rootParent->slug}}">
                    <div class="page-breadcrumbs">
                        <ul class="breadcrumbs">
                            <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{ url('/')}}">Головна</a></li>
                            @foreach($breadcrumbs as $item)
                                @if($item['id'] == $lastElement['id'])
                                    <li class="breadcrumbs-item__current--color breadcrumbs-item">{{$item['name'][App::currentLocale()]}}</li>
                                @else
                                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="{{$item['url']}}">{{$item['name'][App::currentLocale()]}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <h2 class="page-title text-title"><?=$category['name'][App::currentLocale()]?></h2>
                </div>
                <div class="equipment-list-wrap">
                    <div class="catalog-single-btn-mobile-wrap active">
                        <button class="catalog-single-btn-mobile btn">
                            <svg class="icon--equipment-btn" role="presentation">
                                <use xlink:href="#icon-equipment-btn"></use>
                            </svg><span>{{ __('show.Обладнання') }}</span>
                        </button>
                    </div>
                    <div class="catalog-single-filters-wrap">
                        @foreach($menu as $item)
                            <div class="catalog-single-filter">

                                <!--тут додати посилання на категорію-->

                                <a class="catalog-single-filter__title text-s" href="{{ route('catalog.show', $item['slug']) }}"> <?=$item['name']?></a>
                                @if(!empty($item['children']))
                                    @foreach($item['children'] as $underItem)
                                        <div class="catalog-single-filter-card">
                                            <div class="catalog-single-filter-card__title text-14"><?=$underItem['name']?></div>
                                            <div class="catalog-single-filter-card-list">
                                                @if(!empty($underItem['children']))
                                                    @foreach($underItem['children'] as $underUnderItem)
                                                        <a class="catalog-single-filter-card-list-item text-14" href="{{ route('catalog.show', $underUnderItem['slug']) }}"><?=$underUnderItem['name']?></a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach

                    </div>
                    <div class="equipment-list">

                        @foreach($childrens as $item)
                            <div class="equipment-card">
                                {{--                    <a href="{{ route('catalog.show', $item->slug) }}">--}}
                                <div class="equipment-card__img-wrap">
                                    @if($item->thumbnail != null)
                                        <img src="{{$item->thumbnailUrl}}" alt="">
                                    @else
                                        <img src="{{asset('/assets/images/equipment/default.jpg')}}" alt="">
                                    @endif
                                    <span class="equipment-card-list-item__title text-14 text-black"><?=$item['description'][App::currentLocale()]?></span>


                                </div>
                                <div class="equipment-card-intro"> <span class="equipment-card__title text-24"> <?=$item['name'][App::currentLocale()]?></span>
                                    <div class="equipment-card-list">
                                        @foreach($childrensOfChildrens[$item->id] as $children)
                                            <a class="equipment-card-list-item" href="{{ route('catalog.show', $children->slug) }}">
                                                <span class="equipment-card-list-item__title text-14 text-black"><?=$children['name'][App::currentLocale()]?></span>
                                                <svg class="icon--arrow-item" role="presentation">
                                                    <use xlink:href="#icon-arrow-item"></use>
                                                </svg>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>

                                {{--                    </a>--}}
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="equipment-info-wrap">
                    <div class="equipment-info__title text-m"> @if(isset($category) && is_array($category->post_title) && array_key_exists(App::currentLocale(), $category->post_title))
                            {{ $category->post_title[App::currentLocale()] }}
                        @endif</div>
                    <div class="equipment-info">
                        <div class="equipment-info__descr-wrap">
                            <p class="equipment-info__descr text-14">
                                @if(isset($category) && is_array($category->description_l) && array_key_exists(App::currentLocale(), $category->description_l))
                                    {{ $category->description_l[App::currentLocale()] }}
                                @endif
                            </p>
                        </div>
                        <div class="equipment-info__descr-wrap">
                            <p class="equipment-info__descr text-14">
                                @if(isset($category) && is_array($category->description_r) && array_key_exists(App::currentLocale(), $category->description_r))
                                    {{ $category->description_r[App::currentLocale()] }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/libs.js')}}"></script> -->
    <!-- <script defer src="{{asset('/assets/scripts/singleCatalog.bundle.js')}}"></script> -->
@endsection

@push('footer-scripts')
    @vite(['resources/js/common.js', 'resources/js/catalogSingle.js'])
@endpush
