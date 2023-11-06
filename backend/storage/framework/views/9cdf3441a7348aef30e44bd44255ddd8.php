<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="<?php echo e(asset('img/logo2.png')); ?>" alt=""></a>
                    </div>
                    <ul>
                        <li>Адрес: <?php echo e($address); ?></li>
                        <li>Телефон: <?php echo e($phone); ?></li>
                        <li>Почта: <?php echo e($email); ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Полезные ссылки</h6>
                    <ul>
                        <li><a href="<?php echo e(route ('home')); ?>">Главная</a></li>
                        <li><a href="<?php echo e(route ('catalogue')); ?>">Каталог</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Контакты</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo e(route('cart')); ?>">Корзина</a></li>
                        <li><a href="<?php echo e(route('blog')); ?>">Блог</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Подпишитесь на рассылку новостей</h6>
                    <p>Получайте письма об акциях и выгодных предложениях.</p>
                    <form action="#" class="js-subscribe-form">
                        <?php echo csrf_field(); ?>
                        <input type="text" class="js-subscribe-email-input" name="subscribeEmail" placeholder="Введите email">
                        <button type="submit" class="site-btn js-subscribe-btn">Подписаться</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment" style="width: 8%;"><img src="<?php echo e(asset('img/kaspi-img.png')); ?>" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
<?php /**PATH /var/www/html/resources/views/blocks/footer.blade.php ENDPATH**/ ?>