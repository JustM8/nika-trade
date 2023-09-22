@extends('layouts.theme')
@section('content')

{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-12">--}}
{{--                <h3 class="text-center">{{ __('Cart') }}</h3>--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                @if(Cart::instance('cart')->count() > 0)--}}
{{--                    <table class="table table-light">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th colspan="2">Product</th>--}}
{{--                            <th>Qty</th>--}}
{{--                            <th>Price</th>--}}
{{--                            <th>Subtotal</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}

{{--                        @each('cart.parts.product_view', Cart::instance('cart')->content(), 'row')--}}

{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                @else--}}
{{--                    <h3 class="text-center">There are no products in cart</h3>--}}
{{--                @endif--}}
{{--                <hr>--}}
{{--                <table class="table table-dark" style="width: 50%; float: right;">--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td colspan="2">&nbsp</td>--}}
{{--                        <td>Subtotal</td>--}}
{{--                        <td>{{ Cart::subtotal() }}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td colspan="2">&nbsp</td>--}}
{{--                        <td>Tax</td>--}}
{{--                        <td>{{ Cart::tax() }}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td colspan="2">&nbsp</td>--}}
{{--                        <td>Total</td>--}}
{{--                        <td>{{ Cart::total() }}</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            @auth--}}
{{--                <div class="col-md-12 text-right">--}}
{{--                    <a href="{{ route('checkout') }}" class="btn btn-outline-success">{{ __('Proceed to checkout') }}</a>--}}
{{--                </div>--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--    </div>--}}

<section class="cart-page page-container">
    <div class="cart-page-wrap">
        <div class="page-intro">
            <div class="page-breadcrumbs">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{url('/')}}">Homepage</a></li>
                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">cartPage</a></li>
                    <li class="breadcrumbs-item__current--color breadcrumbs-item">cart-page</li>
                </ul>
            </div>
            <h2 class="page-title text-title">Корзина</h2>
        </div>
        <div class="cart-page-main">
            <form data-cart-popup id="cart-page-form">
                <div class="cart-page-items cart-page-card"><span class="cart-page-card-title text-m text-balck-100">Товарів у кошику:</span>
                    <div class="cart-page-card-content">
                        <div class="cart-list"> </div>
                        <div class="cart-descr"> <span class="cart-descr-title text-14 text-black-100">Діючі ціни можуть не збігатися з вказаними на сайті. Уточнюйте, будь ласка.</span><span class="cart-descr-price text-18 text-black-100"> Разом</span><span class="cart-descr-price-sum text-18 text-black-100"> </span></div>
                    </div>
                </div>
                <div class="cart-page-checkup cart-page-card"> <span class="cart-page-card-title text-m text-balck-100">Оформлення товару:</span>
                    <div class="cart-page-card-content cart-page-card-form-container">
                        <p class="cart-page-form__hint text-14">Назва установи:</p>
                        <div class="cart-page-form-field form-field-input" data-field-input data-field-name data-status="field--inactive">
                            <input class="cart-page-form__input" type="text" name="companyName" placeholder="Введіть назву вашої установи">
                            <div class="cart-input-message text-14" data-input-message></div>
                        </div>
                        <p class="cart-page-form__hint text-14">Контактний телефон:</p>
                        <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-phone data-status="field--inactive">
                            <input class="cart-page-form__input" type="text" name="companyPhone" placeholder="+380________">
                            <div class="cart-input-message text-14" data-input-message></div>
                        </div>
                        <p class="cart-page-form__hint text-14">Email:</p>
                        <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                            <input class="cart-page-form__input" type="text" name="companyEmail" placeholder="Введіть ваш email">
                            <div class="cart-input-message text-14" data-input-message></div>
                        </div>
                    </div>
                </div>
                <div class="cart-page-delivery cart-page-card"><span class="cart-page-card-title text-m text-balck-100">Виберіть спосіб доставки:</span>
                    <div class="cart-page-card-content">
                        <div class="cart-page-delivery-options">
                            <div class="cart-page-delivery-options-list">
                                <div class="cart-page-delivery-options-item">
                                    <input type="checkbox" name="vivyz" id="Mikhailivka" value="Mikhailivka"><span class="text-14 text-black-100">Самовивіз - Михайлівка-Рубежівка (виробнича база)</span><a class="cart-page-delivery-options-item-pin" href="https://goo.gl/maps/7b7UdYfLZfUctv2e9" target="_blank">
                                        <svg class="icon--cart-map" role="presentation">
                                            <use xlink:href="#icon-cart-map"></use>
                                        </svg><span class="text-14 text-black">вул. Шкільна,30</span></a>
                                </div>
                                <div class="cart-page-delivery-options-item">
                                    <input type="checkbox" name="vivyz" id="Khvoiky" value="Khvoiky"><span class="text-14 text-black--100">Доставка в офіс м. Київ</span><a class="cart-page-delivery-options-item-pin" href="https://goo.gl/maps/EArR9F5i9yEfW9MU6" target="_blank">
                                        <svg class="icon--cart-map" role="presentation">
                                            <use xlink:href="#icon-cart-map"></use>
                                        </svg><span class="text-14 text-black">вул. Вікентія Хвойки, 15/15</span></a>
                                </div>
                                <div class="cart-page-delivery-options-item">
                                    <input type="checkbox" name="vivyz" id="Plekhanova" value="Plekhanova"><span class="text-14 text-black--100">Доставка в офіс м. Дніпро</span><a class="cart-page-delivery-options-item-pin" href="https://goo.gl/maps/LQsipjuHV9Rnqnev6" target="_blank">
                                        <svg class="icon--cart-map" role="presentation">
                                            <use xlink:href="#icon-cart-map"></use>
                                        </svg><span class="text-14 text-black">вул. Князя Володимира Великого (кол. Плеханова), 18, 1 поверх</span></a>
                                </div>
                                <div class="cart-page-delivery-options-item">
                                    <input type="checkbox" name="PostalDelivery" id="PostalDelivery" value="PostalDelivery"><span class="text-14 text-black--100">Доставка перевізником (по Україні)</span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-page-delivery-ukraine cart-page-card-form-container">
                            <p class="cart-page-form__hint text-14">Отримувач:</p>
                            <div class="cart-page-form-field form-field-input" data-field-input data-field-name data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientName" placeholder="Введіть ім’я отримувача">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Телефон отримувача:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-phone data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientPhone">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Місто:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientCity" placeholder="Введіть ваше місто">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                            <p class="cart-page-form__hint text-14">Адреса:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientAddress" placeholder="Введіть вашу адресу">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                            <p class="cart-page-form__hint text-14">Перевізник:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientCarrier" placeholder="Наприклад Нова Пошта, Укрпошта і т. д.">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                            <p class="cart-page-form__hint text-14">Номер відділення:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientPostalOffice" placeholder="Введіть номер відділення обраного перевізника">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                        </div>
                        <div class="cart-page-delivery-options-city">
                            <input type="checkbox" name="KyivTakeAway" id="Kyiv" value="Kyiv">
                            <p class="cart-page-delivery-options-city-descr text-14 text-black--100">Доставка по Києву </p><span class="text-14 text-non-active">(послуги вантажників не надаються)</span>
                        </div>
                        <div class="cart-page-delivery-city cart-page-card-form-container">
                            <p class="cart-page-form__hint text-14">Отримувач:</p>
                            <div class="cart-page-form-field form-field-input" data-field-input data-field-name data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientNameKyiv" placeholder="Введіть ім’я отримувача">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Телефон отримувача:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-phone data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientPhoneKyiv">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Адреса:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="recipientAddressKyiv" placeholder="Введіть вашу адресу">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-page-working-hours cart-page-card"><span class="cart-page-card-title text-m text-balck-100">Режим роботи нашої компанії:</span>
                    <div class="cart-page-card-content">
                        <ul class="cart-page-working-hours-list">
                            <li class="cart-page-working-hours-item text-14 text-black"> Офіс: з 900 до 1730 (без обіду)</li>
                            <li class="cart-page-working-hours-item text-14 text-black"> Виробництво: видача заказів с 900 до 1600, обід с 1230 до 1300</li>
                            <li class="cart-page-working-hours-item text-14 text-black"> Вихідні дні: субота, неділя.</li>
                        </ul>
                    </div>
                </div>
                <div class="cart-page-comment cart-page-card"> <span class="cart-page-card-title text-m text-balck-100">Залишити коментар:</span>
                    <div class="cart-page-card-content">
                        <p class="cart-page-form__hint text-14">Коментар:</p>
                        <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                            <input class="cart-page-form__input" type="textarea" name="comment" placeholder="Введіть текст коментаря">
                            <div class="cart-input-message text-14" data-input-message> </div>
                        </div>
                        <div class="btn-container btn-container-border">
                            <button class="btn" type="submit" data-btn-submit onClick="window.location.href='https://nika-verstka.smarto.com.ua/thank-you-page.html';"><span class="link__text usn" data-btn-submit-text>Підтвердити замовлення </span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('footer-scripts')
    <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script>
    <script defer src="{{asset('/assets/scripts/cartPage.bundle.js')}}"></script>
@endpush
