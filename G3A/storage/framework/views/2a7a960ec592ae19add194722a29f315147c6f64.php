

<?php $__env->startSection('contenu'); ?>
<form action="/connexion" method="post" class="mt-3 mb-3">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input type="email" class="form-control" id="InputEmail" name="email" value="<?php echo e(old('email')); ?>" aria-describedby="emailHelp">
        <?php if($errors->has('email')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('email')); ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="InputPassword" name="password" label="password">
        <?php if($errors->has('password')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('password')); ?></small>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Log in</button>
</form>
<br>
<br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ynov\B2\Projet B2\Projet Dev Web\projet_dev_web_b2\G3A\resources\views/Connexion/connexion.blade.php ENDPATH**/ ?>