<?php
/** @var \App\Models\Category[] $categories */
$categories = !empty($categories) ? $categories : [];
?>
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Все категории</span>
                    </div>
                    <ul>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('catalogue', ['category' => $category->getCode()])); ?>"><?php echo e($category->getName()); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form method="GET" action="<?php echo e(route('search')); ?>">
                            <input type="text" placeholder="Что хотите найти?" name="q">
                            <button type="submit" class="site-btn">Поиск</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5><?php echo e($phone); ?></h5>
                            <span>Звонок оператору</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<?php /**PATH /var/www/html/resources/views/blocks/hero.blade.php ENDPATH**/ ?>