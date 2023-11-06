<?php
    /** @var \App\Services\DTO\GetCartHeaderInfoDTO $cartInfo */
    $countFavoriteProducts = !empty($countFavoriteProducts) ? $countFavoriteProducts : 0;
?>
<ul>
    <li><a href="<?php echo e(route('favorites')); ?>"><i class="fa fa-heart"></i> <span><?php echo e($countFavoriteProducts); ?></span></a>
    </li>
    <li><a href="<?php echo e(route('cart')); ?>"><i class="fa fa-shopping-bag"></i>
            <span><?php echo e($cartInfo->getCountProducts()); ?></span></a></li>
</ul>
<?php if($cartInfo->getFinalPrice() != 0): ?>
    <div class="header__cart__price">Сумма: <span><?php echo e($cartInfo->getFinalPrice()); ?> ₸</span></div>
<?php else: ?>
    <div class="header__cart__price">Корзина пуста</div>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/blocks/header/cart.blade.php ENDPATH**/ ?>