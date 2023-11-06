<?php
/**
 * @var \App\Models\Product $favoriteProduct
*/
$favoriteProducts = !empty($favoriteProducts) ? $favoriteProducts : [];

?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('blocks.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <?php $__currentLoopData = $favoriteProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favoriteProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo e($favoriteProduct->getImg()); ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="<?php echo e(route('addToCart', $favoriteProduct->getArticle())); ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="<?php echo e(route('product', $favoriteProduct->getArticle())); ?>"><?php echo e($favoriteProduct->getName()); ?></a></h6>
                                    <h5><?php echo e($favoriteProduct->getPrice()); ?> ₸</h5>
                                    <form action="<?php echo e(route('delete-favorite', $favoriteProduct->getArticle())); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn-info" type="submit">Убрать из избранного</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/favorites.blade.php ENDPATH**/ ?>