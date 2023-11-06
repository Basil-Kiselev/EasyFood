<?php
$breadcrumbs = !empty($breadcrumbs) ? $breadcrumbs : null;
$breadcrumbsName = !empty($breadcrumbsName) ? $breadcrumbsName : $breadcrumbs['name'];
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?php echo e($breadcrumbsName); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo e(route('home')); ?>">Главная</a>
                        <a href="<?php echo e($breadcrumbs['url']); ?>"><?php echo e($breadcrumbs['name']); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<?php /**PATH /var/www/html/resources/views/blocks/breadcrumbs.blade.php ENDPATH**/ ?>