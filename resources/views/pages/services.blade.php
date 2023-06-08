@extends('layouts.theme')
@php
    $title = $page['title'];
@endphp

@section('content')
    <section class="services page-container">
        <div class="services-wrap">
            <div class="page-intro">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link breadcrumbs-item__link-home" href="index.html">Homepage</a></li>
                        <li class="breadcrumbs-item"><a class="breadcrumbs-item__link" href="#">servicesPage</a></li>
                        <li class="breadcrumbs-item__current--color breadcrumbs-item">Services</li>
                    </ul>
                </div>
                <h2 class="page-title text-title">Послуги</h2>
            </div>
            <div class="services-list">
{{--                start item--}}
                <div class="services-item">
                    <h3 class="services-item__title text-m">Консультації</h3>
                    <div class="services-item__img-wrap"> <img class="services-item__img" src="./assets/images/services/1.jpg" alt="">
                        <div class="services-item__img-descr-wrap">
                            <p class="services-item__img-descr text-s">Будь-які консультації щодо характеру та номенклатури випускається нами, а також послуг, що надаються ви можете отримати у наших менеджерів у центральному офісі в Києві або в регіональних представництвах.</p>
                        </div>
                    </div>
                    <div class="services-item__descr-wrap">
                        <h4 class="services-item__descr-title text-s">Наші менеджери:</h4>
                        <ul class="services-item__descr-list">
                            <li class="services-item__descr-item text-14">Допоможуть вам правильно зорієнтуватися в характері і номенклатурі нашої продукції, її характеристиках та особливостях, області застосування; </li>
                            <li class="services-item__descr-item text-14">Нададуть вичерпну інформацію про те, які послуги надає компанія; </li>
                            <li class="services-item__descr-item text-14">Нададуть інформацію про ціни на нашу продукцію; </li>
                            <li class="services-item__descr-item text-14">Допоможуть оформити замовлення або з'єднають вас з одним з наших дизайнерів для розробки проекту магазину, офісу, виставкового стенду тощо; </li>
                            <li class="services-item__descr-item text-14">Нададуть інформацію про наявність готових виробів на складі та терміни виконання замовлення; </li>
                            <li class="services-item__descr-item text-14">Оформлять послугу доставки по місту або в інші міста України; </li>
                            <li class="services-item__descr-item text-14">Оформлять послугу монтажу обладнання в приміщенні замовника;</li>
                            <li class="services-item__descr-item text-14">Нададуть інформацію про готовність ваших замовлень;</li>
                            <li class="services-item__descr-item text-14">Узгодять терміни монтажу обладнання; </li>
                            <li class="services-item__descr-item text-14">Нададуть необхідні консультації щодо особливостей монтажу і збирання нашого обладнання;</li>
                            <li class="services-item__descr-item text-14">Організують виправлення поломок і несправностей протягом гарантійного терміну експлуатації обладнання.</li>
                        </ul>
                    </div>
                    <div class="services-btn-wrap">
                        <button class="btn btn--full">Замовити індивідуальний проєкт</button>
                    </div>
                </div>
{{--                end item --}}
                <div class="services-item">
                    <h3 class="services-item__title text-m">Консультації</h3>
                    <div class="services-item__img-wrap"> <img class="services-item__img" src="./assets/images/services/2.jpg" alt="">
                        <div class="services-item__img-descr-wrap">
                            <p class="services-item__img-descr text-s">Будь-які консультації щодо характеру та номенклатури випускається нами, а також послуг, що надаються ви можете отримати у наших менеджерів у центральному офісі в Києві або в регіональних представництвах.</p>
                        </div>
                    </div>
                    <div class="services-item__descr-wrap">
                        <p class="services-item__descr text-14">Багатьом доводиться стикатися з дилемою як краще вчинити: купити типове, надійне і гарне обладнання або ж замовити щось оригінальне, неповторне, таке, чого немає в інших. У нас Ви знайдете і те, й інше. Не дарма кажуть наші клієнти: «На «Ніці» творять дива».</p>
                        <p class="services-item__descr text-14">Скориставшись послугами нашої дизайн-студії, Ви зможете створити власний фірмовий стиль, настрій і колорит Вашого торгового відділу або бутіка. Досягається це використанням грамотного поєднання форми і кольору, правильним розташуванням і функціональністю конструкцій. Ми допоможемо Вам з наших стандартних елементів побудувати ніяк не стандартний виставковий стенд. Він буде доповнений оригінальними стійками і рецепцією, обладнанням для демонстрації товарів, освітлювальною апаратурою. </p>
                        <p class="services-item__descr text-14">Ми допоможемо при відкритті нового офісу або реконструкції старого, організації робочих залів. Ми не копіюємо провідних виробників офісних меблів, а використовуємо власні напрацювання. Наші меблі, що мають в основі металеві каркаси, відрізняються свіжістю і оригінальністю рішень, широким використанням скла, нержавіючої сталі.</p>
                        <p class="services-item__descr text-14">З роботами наших дизайнерів Ви можете ознайомитися в розділі «Галерея». Знаходиться наша дизайн-студія в Києві , в центральному офісі компанії «Ніка».</p>
                        <div class="services-item__alert">
                            <svg class="icon--alert services-item__alert-svg" role="presentation">
                                <use xlink:href="#icon-alert"></use>
                            </svg><span class="services-item__alert-text text-14">Виїзд дизайнера по м. Києву на об'єкт: </span><span class="services-item__alert-text--red text-14">150 грн.</span>
                        </div>
                    </div>
                    <div class="services-btn-wrap">
                        <button class="btn btn--full">Замовити індивідуальний проєкт</button>
                    </div>
                </div>
                <div class="services-item">
                    <h3 class="services-item__title text-m">Гарантійне обслуговування</h3>
                    <div class="services-item__img-wrap"> <img class="services-item__img" src="./assets/images/services/3.jpg" alt="">
                        <div class="services-item__img-descr-wrap">
                            <p class="services-item__img-descr text-s">Устаткування під маркою «Ніка» відрізняється гідною якістю, яке визначається якістю використовуваних матеріалів і комплектуючих, а також технологіями, діючими на нашому виробництві.</p>
                        </div>
                    </div>
                    <div class="services-item__descr-wrap">
                        <p class="services-item__descr text-14">Обладнання під маркою «Ніка» відрізняє гідна якість, яка визначається якістю матеріалів і комплектуючих, а також технологіями, що діють на нашому виробництві. На наше обладнання ми даємо гарантію 12 місяців з моменту його отримання замовником.</p>
                        <p class="services-item__descr text-14">Протягом гарантійного терміну експлуатації ми безкоштовно усуваємо всі неполадки, якщо вони не пов'язані з порушеннями правил експлуатації обладнання. Час усунення неполадки залежить від її характеру, але не перевищує 10 робочих днів.  </p>
                        <p class="services-item__descr text-14">В принципі, не залишаємо ми без уваги клієнта й у випадках, якщо якісь елементи були зламані або пошкоджені з необережності або внаслідок перевантаження. Ми виправляємо і такі неполадки, але послуга в цьому випадку буде платною. </p>
                        <p class="services-item__descr text-14">Ми надаємо клієнтам також консультативну підтримку, в разі необхідності, робимо демонтаж або реконструкцію обладнання. </p>
                        <p class="services-item__descr text-14">З питань гарантійного обслуговування і усунення інших неполадок Вам потрібно звертатися до свого менеджера в центральному офісі або офісі одного з регіональних представництв.</p>
                    </div>
                    <div class="services-btn-wrap">
                        <button class="btn btn--full">Замовити індивідуальний проєкт</button>
                    </div>
                </div>
                <div class="services-item">
                    <h3 class="services-item__title text-m">Доставка та монтаж</h3>
                    <div class="services-item__img-wrap"> <img class="services-item__img" src="./assets/images/services/4.jpg" alt="">
                        <div class="services-item__img-descr-wrap">
                            <p class="services-item__img-descr text-s">За бажанням клієнта, ми здійснюємо доставку і монтаж виготовленого нами обладнання.</p>
                        </div>
                    </div>
                    <div class="services-item__descr-wrap">
                        <p class="services-item__descr text-14">Як правило, ми здійснюємо повну реалізацію проекту від розробки дизайну до монтажу обладнання в приміщенні замовника. Переваги такого варіанту очевидні. Клієнт не витрачає часу на супровід проекту, не дбає про дрібниці, пов'язаних з комплектацією і стикуванням обладнання. Все, що йому залишається, - це звірити дизайн-проект на папері з обладнанням в реальному житті. </p>
                        <p class="services-item__descr text-14">Така послуга називається «Збирання». До її складу входить і доставка обладнання до приміщення замовника. Терміни монтажу узгоджуються з клієнтом шляхом консультацій. </p>
                        <p class="services-item__descr text-14">Ми здійснюємо також окремо доставку обладнання як по Києву, так і в інші міста України. Доставка здійснюється перевізником або власним транспортом. </p>
                        <p class="services-item__descr text-14">Ці послуги платні. Їх можна замовити у менеджера при оформленні замовлення.</p>
                    </div>
                    <div class="services-btn-wrap">
                        <button class="btn btn--full">Замовити індивідуальний проєкт</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
