

<?php $__env->startSection('contenu'); ?>

<style>
    .form_inscription {
        /* Uniquement centrer le formulaire sur la page */
        margin: 1em auto 2em;
        width: 400px;
        /* Encadré pour voir les limites du formulaire */
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
    }

    form div+div {
        margin-top: 1em;
    }

    input {
        /* Pour s'assurer que tous les champs texte ont la même police.
     Par défaut, les textarea ont une police monospace */
        font: 1em sans-serif;

        /* Pour que tous les champs texte aient la même dimension */
        width: 365px;
        box-sizing: border-box;

        /* Pour harmoniser le look & feel des bordures des champs texte */
        border: 1px solid #999;
    }

    input:focus {
        /* Pour souligner légèrement les éléments actifs */
        border-color: #000;
    }
</style>

<form class="form_inscription" action="/inscription" method="post">

    <?php echo e(csrf_field()); ?>


    <div>
        <input type="string" name="name" placeholder="Name">
        <?php if($errors->has('name')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('name')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="email" name="email" placeholder="Email">
        <?php if($errors->has('email')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('email')); ?></small>
        <!-- <p>Email is mandatory</p> ou <p><?php echo e($errors->first('email')); ?></p> -->
        <?php endif; ?>
    </div>

    <div>
        <input type="password" name="password" placeholder="Password">
        <?php if($errors->has('password')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('password')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="password" name="password_confirmation" placeholder="Confirmation password">
        <?php if($errors->has('password_confirmation')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('password_confirmation')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="submit" value="Valider">
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ynov\B2\Projet B2\Projet Dev Web\projet_dev_web_b2\G3A\resources\views/inscription.blade.php ENDPATH**/ ?>