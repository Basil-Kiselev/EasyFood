<?php if(!empty($recCategories)): ?>
    <?php
        /** @var \App\Services\DTO\GetProductCategoryDTO $recCategory */
    ?><!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Рекомендуемые товары</h3>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Все</li>
                            <?php $__currentLoopData = $recCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-filter=".<?php echo e($recCategory->getCode()); ?>"><?php echo e($recCategory->getName()); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php $__currentLoopData = $recCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $recCategory->getProducts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo e($recCategory->getCode()); ?>">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="<?php echo e(asset($product->getImg())); ?>">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="<?php echo e(route('add-favorite', $product->getArticle())); ?>"><i
                                                        class="fa fa-heart"></i></a></li>
                                        <li><a href="<?php echo e(route('addToCart', $product->getArticle())); ?>"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6>
                                        <a href="<?php echo e(route('product', $product->getArticle())); ?>"><?php echo e($product->getName()); ?></a>
                                    </h6>
                                    <h5><?php echo e($product->getPrice()); ?> ₸</h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Featured Section End -->
<?php /**PATH /var/www/html/resources/views/blocks/featured.blade.php ENDPATH**/ ?>