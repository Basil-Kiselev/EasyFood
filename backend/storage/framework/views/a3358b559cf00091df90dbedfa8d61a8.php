<ul>
    <li class="active"><a href="<?php echo e(route('home')); ?>">Главная</a></li>
    <li><a href="<?php echo e(route('catalogue')); ?>">Каталог</a></li>
    <li><a href="#">Страницы</a>
        <ul class="header__menu__dropdown">
            <li><a href="<?php echo e(route('cart')); ?>">Корзина</a></li>
            <li><a href="<?php echo e(route('checkout')); ?>">Оформление заказа</a></li>
        </ul>
    </li>
    <li><a href="<?php echo e(route('blog')); ?>">Блог</a></li>
    <li><a href="<?php echo e(route('contact')); ?>">Контакты</a></li>
</ul>
<?php /**PATH /var/www/html/resources/views/blocks/header/main-menu.blade.php ENDPATH**/ ?>