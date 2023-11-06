<?php
/**
 * @var \App\Models\ArticleCategory $category
 * @var \App\Models\Article $article
 */

$recentArticles = !empty($recentArticles) ? $recentArticles : [];
?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('blocks.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="<?php echo e(route('blog-search')); ?>" method="GET">
                            <input type="text" placeholder="Поиск..." name="q">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Категории</h4>
                            <?php $__currentLoopData = $articleCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul>
                                    <li><a href="<?php echo e(route('blog-category', $category->getCode())); ?>"><?php echo e($category->getName()); ?> (<?php echo e($category->articles()->count()); ?>)</a></li>
                                </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Недавние статьи</h4>
                        <div class="blog__sidebar__recent">
                            <?php $__currentLoopData = $recentArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('blog-details', $recentArticle->getAlias())); ?>" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img style="width: 80px" src="<?php echo e(asset($recentArticle->getImg())); ?>" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?php echo e($recentArticle->getHeader()); ?></h6>
                                        <span><?php echo e($recentArticle->getDateCreated()); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?php echo e(asset($article->getImg())); ?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?php echo e(date_format($article->getCreatedAt(), 'o-F-d')); ?></li>
                                    </ul>
                                    <h5><a href="<?php echo e(route('blog-details', $article->getAlias())); ?>"><?php echo e($article->getHeader()); ?></a></h5>
                                    <p><?php echo e(mb_substr($article->getText(), 0, 100)); ?>...</p>
                                    <a href="<?php echo e(route('blog-details', $article->getAlias())); ?>" class="blog__btn">Читать полностью <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <?php echo e($articles->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/blog.blade.php ENDPATH**/ ?>