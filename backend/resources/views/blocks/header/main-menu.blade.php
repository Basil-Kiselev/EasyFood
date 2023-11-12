<ul>
    <li class="active"><a href="{{ route('home') }}">Главная</a></li>
    <li><a href="{{ route('catalogue') }}">Каталог</a></li>
    <li><a href="#">Страницы</a>
        <ul class="header__menu__dropdown">
            <li><a href="{{ route('cart') }}">Корзина</a></li>
            <li><a href="{{ route('checkout') }}">Оформление заказа</a></li>
        </ul>
    </li>
    <li><a href="{{ route('blog') }}">Блог</a></li>
    <li><a href="{{ route('contact') }}">Контакты</a></li>
</ul>
