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
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad js-shoping-cart" data-cart-id="{{ $cart->getId() }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Товары</th>
                                <th>Стоимость</th>
                                <th>Количество</th>
                                <th>Общая стоимость</th>
                                <th></th>
                            </tr>
                            </thead>
                            @if (!empty($cartProducts))
                                @foreach($cartProducts as $cartProduct)
                                    <tbody>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img style="width: 100px" src="{{ asset($cartProduct->getImg()) }}" alt="">
                                            <h5>{{ $cartProduct->getName() }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $cartProduct->getPrice() }} ₸
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty js-value-qty"
                                                     data-article="{{ $cartProduct->getArticle() }}">
                                                    <input type="text" disabled
                                                           value="{{ $cartProduct->getQuantity() }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ $cartProduct->getTotalPrice() }} ₸
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close js-delete-cart-item"
                                                  data-product-article="{{ $cartProduct->getArticle() }}"></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <tbody>
                                <tr>
                                    <td>
                                        <h4 class="pb-5 my-5" style="justify-content: center;">Корзина пуста</h4>
                                    </td>
                                </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('catalogue') }}" class="primary-btn cart-btn">Продолжить покупки</a>
                        <a href="{{ route('cart') }}" class="primary-btn cart-btn cart-btn-right"><span
                                class="icon_loading"></span>
                            Обновить корзину</a>
                    </div>
                </div>
                @if (!empty($cartProducts))
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Скидочный купон</h5>
                                <form action="#" class="js-coupon-form">
                                    @csrf
                                    <input type="text" placeholder="Введите код купона" name="promoCode"
                                           class="form-control @error('promoCode') is-invalid @else is-valid @enderror">
                                    @error('promoCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="site-btn js-coupon-btn">Применить купон</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Стоимость</h5>
                            <ul>
                                <li>Сумма <span>{{ $cart->getPrice() }} ₸</span></li>
                                @if(!empty($cart->getDiscount()))
                                    <li>Купон на скидку <span>{{ $cart->getDiscount() }} %</span></li>
                                @endif
                                <li>К оплате <span>{{ $cart->getFinalPrice() }} ₸</span></li>
                            </ul>
                            <a href="{{ route('checkout') }}" class="primary-btn">Перейти к оформлению</a>
                        </div>
                    </div>
                @else
                @endif
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
