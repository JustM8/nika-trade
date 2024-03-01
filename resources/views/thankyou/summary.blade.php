@extends('layouts.theme')

@section('content')
{{--    @dd($order->products);--}}
    <div class="col-12 text-center">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Thank you  {{ $order->user->fullName }}!</h3>
                <h4 class="card-subtitle mb-2 text-muted">Currently your order in process</h4>
                <h4 class="card-subtitle mb-2 text-muted">Order total: <strong>{{ $order->total }}$</strong></h4>
{{--                <a href="{{ route('orders.generate.invoice', $order) }}" class="btn btn-outline-primary">Download Invoice</a>--}}
{{--                <a href="{{ route('orders.getPath.invoice', $order) }}" class="btn btn-outline-primary">Get Invoice</a>--}}
{{--                <a href="{{ route('account.orders.show', $order) }}"--}}
{{--                   class="btn btn-outline-primary">Order details</a>--}}
            </div>
        </div>
    </div>
    <section class="thank-page page-container">
        <div class="thank-page-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item">
                            <a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{url('/')}}">Головна</a>
                        </li>
                        <li class="breadcrumbs-item__current--color breadcrumbs-item">Замовлення # {{ $order->id }}</li>
                    </ul>
                </div>
                <h2 class="page-title text-title">Дякуємо за ваше замовлення</h2>
            </div>
            <div class="thank-page-main">
                <div class="thank-page-content">
                    <div class="thank-page__title-wrap">
                        <span class="thank-page__title text-m text-black-100">Найближчим часом з вами зв’яжуться наші менеджери для уточнень деталей замовлення!</span>
                    </div>
                    <div class="thank-page-list-wrap">
                        <div class="thank-page-list__title-wrap">
                            <span class="thank-page-list__title text-24 text-black-100">Інформація про замовлення:</span>
                        </div>
                            @foreach($order->products as $product)
                        <div class="thank-page-list-item">
                            <div class="thank-page-list-item-row">
                                <span class="thank-page-list-item__key text-14 text-black"> Товар: </span>
                                <span class="thank-page-list-item__value text-14 text-black">{{$product->title[App::currentLocale()]}}</span>
                            </div>
{{--                            <div class="thank-page-list-item-row">--}}
{{--                                <span class="thank-page-list-item__key text-14 text-black">Розмір товару: </span>--}}
{{--                                <span class="thank-page-list-item__value text-14 text-black">450 мм</span>--}}
{{--                            </div>--}}
                            <div class="thank-page-list-item-row">
                                <span class="thank-page-list-item__key text-14 text-black">Артикул:<span></span> </span>
                                <span class="thank-page-list-item__value text-14 text-black">{{$product->SKU}}</span>
                            </div>
                            <div class="thank-page-list-item-row">
                                <span class="thank-page-list-item__key text-14 text-black">Ціна товару: </span>
                                <span class="thank-page-list-item__value text-14 text-black">{{$product->pivot->single_price}}</span>
                            </div>
                        </div>
                            @endforeach
                        <div class="thank-page-list-item thank-page-list-item-details">
                            <div class="thank-page-list-item-row">
                                <span class="thank-page-list-item__key text-14 text-black">Номер замовлення: </span>
                                <span class="thank-page-list-item__value text-14 text-black">{{ $order->id }}</span>
                            </div>
                            <div class="thank-page-list-item-row">
                                <span class="thank-page-list-item__key text-14 text-black">Усього до сплати: </span>
                                <span class="thank-page-list-item__value text-14 text-black">{{ $order->total }} грн.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('footer-scripts')
    <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/libs.js')}}"></script>
{{--    <script defer src="{{asset('/assets/scripts/thankYouPAge.bundle.js')}}"></script>--}}

@endpush
