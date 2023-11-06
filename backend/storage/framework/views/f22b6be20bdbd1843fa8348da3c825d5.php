<?php if(\Illuminate\Support\Facades\Auth::check()): ?>
    <div class="header__top__right__auth">
        <a href="<?php echo e(route('login')); ?>"><i class="fa fa-user"></i> <?php echo e(\Illuminate\Support\Facades\Auth::user()->email); ?></a>
    </div>
    <a href="<?php echo e(route('logout')); ?>" class="btn btn-outline-secondary btn-sm">Выйти</a>
<?php else: ?>
    <div class="header__top__right__auth">
        <a href="<?php echo e(route('login')); ?>"><i class="fa fa-user"></i> Вход</a>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/blocks/header/auth.blade.php ENDPATH**/ ?>