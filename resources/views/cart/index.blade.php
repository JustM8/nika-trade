@extends('layouts.theme')
@section('content')
<section class="cart-page page-container">
    <div class="cart-page-wrap">
        <div class="page-intro">
            <!-- <div class="page-breadcrumbs">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="{{url('/')}}">Головна</a></li>
                    <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">Кошик</a></li>
                </ul>
            </div> -->
            <h2 class="page-title text-title">Кошик</h2>
        </div>
        <div class="cart-page-main">
        <div class="cart-page-items cart-page-card">
            <span class="cart-page-card-title text-m text-balck-100">Товари в кошику:</span>
                    <div class="cart-page-card-content">
                        <div class="cart-list" id="cart-popup">
                            @php($cart_id = Cookie::get('cart_id'))
                            @if(Cart::instance($cart_id)->count() > 0)
                                @each('cart.parts.product_view', Cart::instance($cart_id)->content(), 'row')

                            @endif
                        </div>
                        <div class="cart-descr"> <span class="cart-descr-title text-14 text-black-100">Ціни вказано з ПДВ за умови самовивозу з виробництва. Діючі ціни можуть не збігатися із вказаними на сайті. Уточнюйте, будь ласка.</span>
                            <span class="cart-descr-price text-18 text-black-100"> Разом</span>
                            <span class="cart-descr-price-sum text-18 text-black-100" id="cart-total" >{{Cart::total()}}</span></div>
                    </div>
                </div>
            <form data-cart-popup id="cart-page-form" action="{{ route('order.create') }}" method="POST" autocomplete="on">
                @csrf
                <div class="cart-page-checkout cart-page-card"> <span class="cart-page-card-title text-m text-balck-100">Оформлення товару:</span>
                    <div class="cart-page-card-content cart-page-card-form-container">
                        <p class="cart-page-form__hint text-14">Замовник:</p>
                        <div class="cart-page-form-field form-field-input" data-field-input data-field-company-name data-status="field--inactive">
                            <input class="cart-page-form__input" type="text" name="company_name" placeholder="Введіть ім’я або назву установи" data-common>
                            <div class="cart-input-message text-14" data-input-message></div>
                        </div>
                        <p class="cart-page-form__hint text-14">Контактний телефон:</p>
                        <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-company-phone data-status="field--inactive" data-common>
                            <input class="cart-page-form__input" type="text" name="phone" placeholder="Номер у форматі: +380970000000">
                            <div class="cart-input-message text-14" data-input-message></div>
                        </div>
                        <p class="cart-page-form__hint text-14">Email:</p>
                        <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-company-email data-status="field--inactive" data-common>
                            <input class="cart-page-form__input" type="text" name="email" placeholder="Введіть ваш email">
                            <div class="cart-input-message text-14" data-input-message></div>
                        </div>
                    </div>
                </div>
                <div class="cart-page-delivery cart-page-card">
                    <span class="cart-page-card-title text-m text-balck-100">Виберіть спосіб доставки:</span>
                    <div class="cart-page-card-content">
                        <div class="cart-page-delivery-options">
                            <div class="cart-page-delivery-options-list">
                                <div class="cart-page-delivery-options-item">
                                    <input type="checkbox" name="delivery_type" id="Mikhailivka" value="1">
                                    <span class="text-14 text-black-100">Самовивіз - Михайлівка-Рубежівка (виробнича база)</span>
                                    <a class="cart-page-delivery-options-item-pin" href="https://maps.app.goo.gl/1Hcv3tzDJFkP5yTAA" target="_blank">
                                        <svg class="icon--cart-map" role="presentation">
                                            <use xlink:href="#icon-cart-map"></use>
                                        </svg>
                                        <span class="text-14 text-black">вул. Шкільна,30</span>
                                    </a>
                                </div>
                                <div class="cart-page-delivery-options-item">
                                    <label for="Khvoiky">
                                    <input type="checkbox" name="delivery_type" id="Khvoiky" value="2">
                                    </label>
                                    <span class="text-14 text-black--100">Доставка в офіс м. Київ</span>
                                    <a class="cart-page-delivery-options-item-pin" href="https://maps.app.goo.gl/g35oTvRxtNgf3Sy76" target="_blank">
                                        <svg class="icon--cart-map" role="presentation">
                                            <use xlink:href="#icon-cart-map"></use>
                                        </svg>
                                        <span class="text-14 text-black">вул. Новоконстянтинівська, 15/15</span>
                                    </a>
                                </div>
                                <div class="cart-page-delivery-options-item">
                                    <input type="checkbox" name="delivery_type" id="Plekhanova" value="3">
                                    <span class="text-14 text-black--100">Доставка в офіс м. Дніпро</span>
                                    <a class="cart-page-delivery-options-item-pin" href="https://goo.gl/maps/LQsipjuHV9Rnqnev6" target="_blank">
                                        <svg class="icon--cart-map" role="presentation">
                                            <use xlink:href="#icon-cart-map"></use>
                                        </svg>
                                        <span class="text-14 text-black">вул. Князя Володимира Великого (кол. Плеханова), 18, 1 поверх</span>
                                    </a>
                                </div>
                                <div class="cart-page-delivery-options-item">
                                    <input type="checkbox" name="delivery_type" id="PostalDelivery" value="4">
                                    <span class="text-14 text-black--100">Доставка перевізником (по Україні)</span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-page-delivery-ukraine cart-page-card-form-container">
                            <p class="cart-page-form__hint text-14">Отримувач:</p>
                            <div class="cart-page-form-field form-field-input" data-field-input data-field-recipient-name data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="name" placeholder="Введіть ім’я отримувача">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Телефон отримувача:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-recipient-phone data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="phone_delivery" placeholder="Номер у форматі: +380970000000">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Місто:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-recipient-city data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="city" placeholder="Введіть ваше місто">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                            <p class="cart-page-form__hint text-14">Адреса:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-recipient-address data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="address" placeholder="Введіть вашу адресу">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                            <p class="cart-page-form__hint text-14">Перевізник:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-carrier data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="delivery_info[carrier]" placeholder="Наприклад Нова Пошта, Укрпошта і т. д.">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                            <p class="cart-page-form__hint text-14">Номер відділення:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-carrier-unit data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="delivery_info[branch_number]" placeholder="Введіть номер відділення обраного перевізника">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                        </div>
                        <div class="cart-page-delivery-options-city">
                            <input type="checkbox" name="delivery_type" id="Kyiv" value="5">
                            <p class="cart-page-delivery-options-city-descr text-14 text-black--100">Доставка по Києву </p><span class="text-14 text-non-active">(послуги вантажників не надаються)</span>
                        </div>
                        <div class="cart-page-delivery-city cart-page-card-form-container">
                            <p class="cart-page-form__hint text-14">Отримувач:</p>
                            <div class="cart-page-form-field form-field-input" data-field-input data-field-kyiv-name data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="nameKyiv" placeholder="Введіть ім’я отримувача">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Телефон отримувача:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-kyiv-phone data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="phoneKyiv" placeholder="Номер у форматі: +380970000000">
                                <div class="cart-input-message text-14" data-input-message></div>
                            </div>
                            <p class="cart-page-form__hint text-14">Адреса:</p>
                            <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-kyiv-address data-status="field--inactive">
                                <input class="cart-page-form__input" type="text" name="addressKyiv" placeholder="Введіть вашу адресу">
                                <div class="cart-input-message text-14" data-input-message> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-page-working-hours cart-page-card"><span class="cart-page-card-title text-m text-balck-100">Режим роботи:</span>
                    <div class="cart-page-card-content">
                        <ul class="cart-page-working-hours-list">
                            <li class="cart-page-working-hours-item text-14 text-black"> Офіс: з 9:00 до 17:00 (без обіду)</li>
                            <li class="cart-page-working-hours-item text-14 text-black"> Виробництво: видача заказів с 9:00 до 16:00, обід с 12:30 до 13:00</li>
                            <li class="cart-page-working-hours-item text-14 text-black"> Вихідні дні: субота, неділя.</li>
                        </ul>
                    </div>
                </div>
                <div class="cart-page-comment cart-page-card"> <span class="cart-page-card-title text-m text-balck-100">Залишити коментар:</span>
                    <div class="cart-page-card-content">
                        <p class="cart-page-form__hint text-14">Коментар:</p>
                        <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                            <textarea class="cart-page-form__input" type="textarea" rows="5" name="comment" placeholder="Введіть текст коментаря"></textarea>
                            <div class="cart-input-message text-14" data-input-message> </div>
                        </div>
                        <p class="cart-page-form__hint text-14">Вкажіть бажаний колір обладнання:</p>
                        <div class="cart-page-form-field disabled form-field-input" data-field-input data-field-email data-status="field--inactive">
                            <textarea class="cart-page-form__input" type="textarea" rows="5" name="comment_color" placeholder="Стандартні кольори: Метал — сріблястий металік (RAL 7149 SPX), ДСП — попелястий (U112 PE)"></textarea>
                            <div class="cart-input-message text-14" data-input-message></div>
                        </div>
                        <div class="btn-container btn-container-border">
{{--                            <button class="btn" type="submit" data-btn-submit>
    <span class="link__text usn" data-btn-submit-text>Підтвердити замовлення </span></button>--}}
                            <button type="submit"  data-btn-submit class="btn">
                                <span class="link__text usn" data-btn-submit-text> Підтвердити замовлення </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('footer-scripts')
    @vite(['resources/js/cart.js', 'resources/js/common.js', 'resources/js/cartPage.js'])
    <!-- <script defer src="{{asset('/assets/scripts/vendors.bundle.js')}}"></script> -->
    <!-- <script defer src="{{asset('/assets/scripts/index.bundle.js')}}"></script> -->
    <!-- <script defer src="{{asset('/assets/scripts/cartPage.bundle.js')}}"></script> -->
@endpush
