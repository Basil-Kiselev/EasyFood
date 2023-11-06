<?php
/**
 * @var \App\Models\Category $categories
 * @var \App\Models\Product $product
*/
$categories = !empty($categories) ? $categories : [];
$products = !empty($products) ? $products : [];
?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('blocks.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <h5>Категория</h5>
                <form>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected value="all">Все категории</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->getCode()); ?>"><?php echo e($category->getName()); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Минимальная цена</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price_min" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label <?php $__errorArgs = ['price_max'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php else: ?> is-valid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">Максимальная цена</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price_max">
                        <?php $__errorArgs = ['price_max'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_vegan" value="1">
                        <label class="form-check-label" for="exampleCheck1">Вегетерианская еда</label>
                    </div>
                    <button type="submit" class="btn btn-success">Применить</button>
                </form>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo e($product->getImg()); ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="<?php echo e(route('add-favorite', $product->getArticle())); ?>"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="<?php echo e(route('addToCart', $product->getArticle())); ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="<?php echo e(route('product', $product->getArticle())); ?>"><?php echo e($product->getName()); ?></a></h6>
                                    <h5><?php echo e($product->getPrice()); ?> ₸</h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="product__pagination">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/catalogue.blade.php ENDPATH**/ ?>