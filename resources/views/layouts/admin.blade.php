<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ @$title.' - '.config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre="">
                                {{ __('admin.Lang') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" data-bs-popper="static">
                                <a class="dropdown-item @if(App::currentLocale()=='ua'){{'active'}}@endif" href="{{ url('/locale/ua') }}">
                                    UA
                                </a>
                                <a class="dropdown-item @if(App::currentLocale()=='en'){{'active'}}@endif" href="{{ url('/locale/en') }}">
                                    EN
                                </a>
                                <a class="dropdown-item @if(App::currentLocale()=='ru'){{'active'}}@endif" href="{{ url('/locale/ru') }}">
                                    RU
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('cart') }}" class="nav-link">--}}
{{--                                {{ __('cart.Title') }}--}}
{{--                                @if (Cart::instance('cart')->count() > 0)--}}
{{--                                    ({{ Cart::instance('cart')->content()->count() }})--}}
{{--                                @endif--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a class="nav-link"  href="{{ route('admin.orders.index') }}">
                                {{ __('order.OrderList') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('admin.main.index') }}">
                                {{ __('main.Main page') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ __('admin.Service') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.services.index') }}">
                                     {{ __('admin.All services') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.services.create') }}">
                                     {{ __('admin.Create service') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('gallery.Gallery') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.galleries.index') }}">
                                    {{ __('gallery.All galleries') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.galleries.create') }}">
                                    {{ __('gallery.Create gallery') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('admin.News') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.news.index') }}">
                                    {{ __('admin.All news') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.news.create') }}">
                                    {{ __('admin.Create new') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('product.m Products') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.products.index', request()->query()) }}">
                                    {{ __('product.All products') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.products.create', request()->query()) }}">
                                    {{ __('product.Create product') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('admin.Categories') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.categories.index', request()->query()) }}">
                                    {{ __('admin.All categories') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.categories.create', request()->query()) }}">
                                    {{ __('admin.Create category') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
{{--                            <a class="dropdown-item" href="{{ route('admin.orders.index') }}">--}}
{{--                                {{ __('All orders') }}--}}
{{--                            </a>--}}
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->role->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ url('/') }}" class="dropdown-item">{{ __('admin.Back to website') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('admin.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 product-main">
            @yield('content')
        </main>
    </div>

{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}

<script src="{{ asset('js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')
@stack('footer-scripts')
</body>
</html>
