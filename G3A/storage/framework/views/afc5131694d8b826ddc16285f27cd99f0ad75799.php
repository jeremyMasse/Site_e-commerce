


<?php $__env->startSection('contenu'); ?>
<?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
<div class="container-fluid mt-3">
    <div class="d-flex flex-column align-items-center mt-3 mb-3">
        <h1>Bienvenue sur la référence gaming</h1>
        <h3 class="mt-2 col-xl-4">Toutes les infos dont vous pourriez avoir besoin sur vos jeux préférés ! Ainsi que la possibilité de les acheter grâce à nos partenariats !</h3>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/index.blade.php ENDPATH**/ ?>