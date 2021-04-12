

<?php $__env->startSection('contenu'); ?>
<div class="contain">
    <form action="/connexion" method="post" class="mt-3 mb-3 form_connect">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label for="InputEmail">Adresse mail :</label>
            <input type="email" class="form-control" id="InputEmail" name="email" value="<?php echo e(old('email')); ?>" aria-describedby="emailHelp">
            <?php if($errors->has('email')): ?>
            <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('email')); ?></small>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="InputPassword">Mot de passe : </label>
            <input type="password" class="form-control" id="InputPassword" name="password" label="password">
            <?php if($errors->has('password')): ?>
            <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('password')); ?></small>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
</div>
<br>
<br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/connexion.blade.php ENDPATH**/ ?>