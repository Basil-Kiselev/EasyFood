@php
    /** @var \App\Services\DTO\CartHeaderInfoDTO $cartInfo */
    $countFavoriteProducts = !empty($countFavoriteProducts) ? $countFavoriteProducts : 0;
@endphp
<ul>
    <li><a href="{{ route('favorites') }}"><i class="fa fa-heart"></i> <span>{{ $countFavoriteProducts }}</span></a>
    </li>
    <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i>
            <span>{{ $cartInfo->getCountProducts() }}</span></a></li>
</ul>
@if($cartInfo->getFinalPrice() != 0)
    <div class="header__cart__price">Сумма: <span>{{ $cartInfo->getFinalPrice() }} ₸</span></div>
@else
    <div class="header__cart__price">Корзина пуста</div>
@endif
