@php
    /**
     * @var \App\Services\DTO\GetCartProductDTO $cartProduct
     * @var \App\Services\DTO\GetCartDTO $cart
     */

    $cart = !empty($cart) ? $cart : null;
    $cartProducts = $cart?->getProducts() ?? [];
@endphp
@extends('index')
@section('content')
    @include('blocks.breadcrumbs')
    <!-- Checkout Section Begin -->
    <section class="checkout spad js-checkout" data-cart-id="{{ $cart->getId() }}">
        <div class="container">
            <div class="row">
                @if(empty($cart->getDiscount()))
                    <div class="col-lg-12 js-tag-coupon">
                        <h6><span class="icon_tag_alt "></span> У вас есть купон? Нажмите сюда для ввода
                            промокода
                        </h6>
                    </div>
                @endif
            </div>
            <div class="checkout__form">
                <h4>Детали заказа</h4>
                <form class="checkout-form" action="{{ route('createOrder') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Имя<span>*</span></p>
                                        <input name="name" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Адрес<span>*</span></p>
                                <input type="text" name="street" placeholder="Улица" class="checkout__input__add">
                                <input type="text" name="building" placeholder="Номер дома"
                                       class="checkout__input__add">
                                <input type="text" name="apartment" placeholder="Квартира\офис">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Номер телефона<span>*</span></p>
                                        <input name="phone" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Комментарий к заказу</p>
                                <input name="order_notes" type="text"
                                       placeholder="Уточните детали заказа или напишите ваши пожелания.">
                            </div>
                            @if(!\Illuminate\Support\Facades\Auth::check())
                                <div class="checkout__input__checkbox">
                                    <label for="acc">
                                        Хотите создать аккаунт или войти?
                                        <input name="create_acc" type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input">
                                    <p>Email</p>
                                    <input name="email" type="text">
                                </div>
                                <div class="checkout__input">
                                    <p>Пароль</p>
                                    <input name="password" type="password">
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-8">
                            <div class="checkout__order">
                                <h4 style="border-bottom: 0">Ваш заказ</h4>
                                <table class="table">
                                    <tbody>
                                    @if(!empty($cartProducts))
                                        @foreach($cartProducts as $cartProduct)
                                            <tr>
                                                <td>{{ $cartProduct->getName() }}</td>
                                                <td>{{ $cartProduct->getQuantity() }} шт</td>
                                                <td>{{ $cartProduct->getPrice() }} ₸</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <div class="checkout__order__subtotal">Итого<span>{{ $cart->getPrice() }} ₸</span></div>
                                @if(!empty($cart->getDiscount()))
                                    <div class="checkout__order__total">Скидка<span>{{ $cart->getDiscount() }} %</span>
                                    </div>
                                @endif
                                <div class="checkout__order__total">К оплате<span>{{ $cart->getFinalPrice() }} ₸</span>
                                </div>
                                <button type="submit" class="site-btn checkout-btn">Заказать</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
