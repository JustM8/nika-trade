@extends('layouts.theme')

@section('content')
    @php($lastElement = end($breadcrumbs))
    @if($childrens->isEmpty())
        <section class="catalog-single page-container">
            <div class="catalog-single-wrap">
                <div class="page-intro" data-category="{{$rootParent->slug}}">
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
                <div class="catalog-single-main">
                    <div class="catalog-single-btn-mobile-wrap">
                        <button class="catalog-single-btn-mobile btn">
                        <svg class="icon--equipment-btn" role="presentation">
                            <use xlink:href="#icon-equipment-btn"></use>
                        </svg><span>Обладнання</span>
                        </button>
                    </div>
                    <div class="catalog-single-filters-wrap">

                    @foreach($menu as $item)
                        <div class="catalog-single-filter">

                            <!--тут додати посилання на категорію-->

                            <a class="catalog-single-filter__title text-s" href=""> <?=$item['name']?></a>
                            @if(!empty($item['children']))
                            @foreach($item['children'] as $underItem)
                            <div class="catalog-single-filter-card">
                                <div class="catalog-single-filter-card__title text-14 {{ in_array($category->slug, array_column($underItem['children'], 'slug')) ? 'active' : '' }}"><?=$underItem['name']?></div>
                                <div class="catalog-single-filter-card-list {{ in_array($category->slug, array_column($underItem['children'], 'slug')) ? 'active' : '' }}" >
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
                            <p class="catalog-single-info__text text-14">Стійки та стяжки є базовими елементами системи «Універсал», вони утворюють каркас для встановлення навісного обладнання. Стандартні просвіти системи (650 мм, 1000 мм і 1200 мм) забезпечуються за рахунок довжини стяжок.</p>
                            <p class="catalog-single-info__text text-14">До складу системи входять 4 види стійок: настінні планки (працюють самостійно, без стяжок), пристінні стійки, які кріпляться до стіни, а також L-подібні стійки для пристінної забудови і Т-подібні стійки для острівної забудови магазинів.</p>
                        </div>
                        <div class="catalog-single-info__text-wrap">
                            <p class="catalog-single-info__text text-14">Всі види стійок дозволяють встановлювати в просторі між ними панелі з ДСП, дзеркала або перфорованого металу. L-стійки і Т-стійки передбачають також установку подіумів.</p>
                            <p class="catalog-single-info__text text-14">Вузли планок не є складовою частиною каркасу, за своєю суттю це навісне обладнання. Однак вони є основою для встановлення різноманітних кронштейнів, гачків тощо. Система «Універсал» включає два види вузлів планок (посилені та полегшені) для різних груп товарів. В наявності вузли планок для всіх стандартних прольотів системи.</p>
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
            <div class="catalog-single-btn-mobile-wrap">
                        <button class="catalog-single-btn-mobile btn">
                        <svg class="icon--equipment-btn" role="presentation">
                            <use xlink:href="#icon-equipment-btn"></use>
                        </svg><span>Обладнання</span>
                        </button>
                    </div>
                    <div class="catalog-single-filters-wrap">
                    @foreach($menu as $item)
                        <div class="catalog-single-filter">

                            <!--тут додати посилання на категорію-->

                            <a class="catalog-single-filter__title text-s" href=""> <?=$item['name']?></a>
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
                    <div class="equipment-card__img-wrap">
                        @if($item->thumbnail != null)
                            <img src="{{$item->thumbnailUrl}}" alt="">
                        @else
                            <img src="{{asset('/assets/images/equipment/default.jpg')}}" alt="">
                        @endif

                    </div>
{{--                    </a>--}}
                </div>
                @endforeach
            </div>
            </div>


            <div class="equipment-info-wrap">
                <div class="equipment-info__title text-m">Торгівельне обладнання, обладнання для магазинів</div>
                <div class="equipment-info">
                    <div class="equipment-info__descr-wrap">
                        <p class="equipment-info__descr text-14">Торгове обладнання  є профілюючим напрямком діяльності компанії «Ніка». Ми спеціалізуємося на магазинах групи "non food" і пропонуємо практично все, що необхідно для торгового відділу.</p>
                        <p class="equipment-info__descr text-14">Основу нашої продукції складають збірно-розбірні металеві каркаси  для магазинів, які можуть використовуватися для пристінної та острівної забудови торгових залів. Вони служать базою для установки полиць, вішалок, штанг і інших навісних елементів, що дозволяють експонувати будь-які товари промислової групи. Крім того, у нас Ви знайдете різні прилавки і вітрини, спеціальні каркаси для конкретних груп товарів, рекламні стійки, столи та рецепції, інше обладнання для торгівлі. Модульні просторові конструкції можуть також використовуватися для встановлення рекламних банерів або освітлення.</p>
                        <p class="equipment-info__descr text-14">У даному розділі ви зможете отримати повне уявлення про наше обладнання. У розділі «Галерея» можна побачити фотографії реалізованих проектів, обладнання для магазинів так би мовити “у роботі”. Наші конструкції зрозумілі і функціональні, легкі в збірці, побудовані за модульним принципом. Вони універсальні і можуть легко трансформуватися при переорієнтації відділу на іншу групу товарів.</p>
                        <p class="equipment-info__descr text-14">Особливість нашої компанії полягає ще й у тому, що ми не тільки виробляємо меблі для торгівлі, але і проектуємо їх, а також здійснюємо забудову торгових залів. Ми здійснюємо повний супровід проекту від створення дизайну відділу або магазину до монтажу обладнання в приміщенні замовника.</p>
                    </div>
                    <div class="equipment-info__descr-wrap">
                        <p class="equipment-info__descr text-14">Наші дизайнери допоможуть вам не лише правильно підібрати і розставити обладнання, а й активно посприяють створенню неповторного стилю вашого магазину. Наша продукція не обмежується представленим в каталозі набором елементів. Ми орієнтуємося на клієнта, до дизайн-проектів кожного магазину застосовуємо новітні ідеї сучасних тенденцій і технологій.</p>
                        <p class="equipment-info__descr text-14">Три наших основних напрямки діяльності: «Торговельне обладнання», «Виставкове обладнання», «Офісні меблі» не існують відірвано один від одного. Напрацювання кожного з них активно використовуються у всіх наших проектах і допомагають у їх найбільш повній і яскравій реалізації.</p>
                        <p class="equipment-info__descr text-14">Ми постійно розширюємо, доповнюємо й удосконалюємо асортимент продукції, що випускається, намагаємося йти в ногу з часом. Поціновувачам якості та краси слід звернути увагу на торгове обладнання з нержавіючої сталі і обладнання для торгових залів з застосуванням фарбованого МДФ</p>
                        <p class="equipment-info__descr text-14">В якості зразка обладнання торгових мереж «НІКА» може запропонувати варіант забудови відділів дитячих товарів в гіпермаркетах «Епіцентр».</p>
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
