@php
$countFavoriteProducts = !empty($countFavoriteProducts) ? $countFavoriteProducts : '';
@endphp
<ul>
    <li><a href="{{ route('favorites') }}"><i class="fa fa-heart"></i> <span>{{ $countFavoriteProducts }}</span></a></li>
    <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
</ul>
<div class="header__cart__price">Сумма: <span>150.00 ₸</span></div>
