

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
        <input type="string" name="prenom" placeholder="Prenom">
        <?php if($errors->has('prenom')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('name')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="string" name="nom" placeholder="Nom">
        <?php if($errors->has('nom')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('nom')); ?></small>
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
        <input type="date" name="dtn" placeholder="Date de naissance">
        <?php if($errors->has('dtn')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('dtn')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="string" name="adresse" placeholder="Adresse">
        <?php if($errors->has('adresse')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('adresse')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="string" name="ville" placeholder="Ville">
        <?php if($errors->has('ville')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('ville')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="string" name="pays" placeholder="Pays">
        <?php if($errors->has('pays')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('pays')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="string" name="code_postal" placeholder="Code postal">
        <?php if($errors->has('code_postal')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('code_postal')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="password" name="mdp" placeholder="Mot de passe">
        <?php if($errors->has('mdp')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('mdp')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="password" name="mdp_confirmation" placeholder="Confirmation mot de passe">
        <?php if($errors->has('mdp_confirmation')): ?>
        <small id="emailHelp" class="form-text text-muted"><?php echo e($errors->first('mdp_confirmation')); ?></small>
        <?php endif; ?>
    </div>

    <div>
        <input type="submit" value="Inscription">
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/inscription.blade.php ENDPATH**/ ?>