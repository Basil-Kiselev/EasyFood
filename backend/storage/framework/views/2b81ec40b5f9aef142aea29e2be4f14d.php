<?php
/** @var \App\Services\DTO\GetArticlesDTO $article */

$articles = !empty($articles) ? $articles : [];
?>
<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Статьи из блога</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?php echo e(asset($article->getImg())); ?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> <?php echo e($article->getDateCreated()); ?></li>
                            </ul>
                            <h5><a href="<?php echo e(route('blog-details', $article->getAlias())); ?>"><?php echo e($article->getHeader()); ?></a></h5>
                            <p><?php echo e(mb_substr($article->getText(), 0, 100)); ?>...</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->
<?php /**PATH /var/www/html/resources/views/blocks/blog.blade.php ENDPATH**/ ?>