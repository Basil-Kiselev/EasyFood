<?php
    /**
     * @var \App\Services\DTO\GetCartProductDTO $cartProduct
     * @var \App\Services\DTO\GetCartDTO $cart
     */

    $cart = !empty($cart) ? $cart : null;
    $cartProducts = $cart?->getProducts() ?? [];
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('blocks.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad js-shoping-cart" data-cart-id="<?php echo e($cart->getId()); ?>">
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
                            <?php if(!empty($cartProducts)): ?>
                                <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img style="width: 100px" src="<?php echo e(asset($cartProduct->getImg())); ?>" alt="">
                                            <h5><?php echo e($cartProduct->getName()); ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <?php echo e($cartProduct->getPrice()); ?> ₸
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty js-value-qty"
                                                     data-article="<?php echo e($cartProduct->getArticle()); ?>">
                                                    <input type="text" disabled
                                                           value="<?php echo e($cartProduct->getQuantity()); ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <?php echo e($cartProduct->getTotalPrice()); ?> ₸
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close js-delete-cart-item"
                                                  data-product-article="<?php echo e($cartProduct->getArticle()); ?>"></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tbody>
                                <tr>
                                    <td>
                                        <h4 class="pb-5 my-5" style="justify-content: center;">Корзина пуста</h4>
                                    </td>
                                </tr>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?php echo e(route('catalogue')); ?>" class="primary-btn cart-btn">Продолжить покупки</a>
                        <a href="<?php echo e(route('cart')); ?>" class="primary-btn cart-btn cart-btn-right"><span
                                class="icon_loading"></span>
                            Обновить корзину</a>
                    </div>
                </div>
                <?php if(!empty($cartProducts)): ?>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Скидочный купон</h5>
                                <form action="#" class="js-coupon-form">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" placeholder="Введите код купона" name="promoCode"
                                           class="form-control <?php $__errorArgs = ['promoCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php else: ?> is-valid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['promoCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <button type="submit" class="site-btn js-coupon-btn">Применить купон</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Стоимость</h5>
                            <ul>
                                <li>Сумма <span><?php echo e($cart->getPrice()); ?> ₸</span></li>
                                <?php if(!empty($cart->getDiscount())): ?>
                                    <li>Купон на скидку <span><?php echo e($cart->getDiscount()); ?> %</span></li>
                                <?php endif; ?>
                                <li>К оплате <span><?php echo e($cart->getFinalPrice()); ?> ₸</span></li>
                            </ul>
                            <a href="<?php echo e(route('checkout')); ?>" class="primary-btn">Перейти к оформлению</a>
                        </div>
                    </div>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/cart.blade.php ENDPATH**/ ?>