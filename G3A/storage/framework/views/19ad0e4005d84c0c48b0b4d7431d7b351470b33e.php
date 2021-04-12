

<?php $__env->startSection('contenu'); ?>
<?php
    $rempli = "★";
    $vide = "☆";
    $i = 0;?> 
  <?php if(session('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session('success')); ?>

    </div>
  <?php endif; ?>
<div class="container_prod">
  <div class="col-lg-9">
    <?php if(!empty($produit)): ?>
      <div class="card mt-4 card-flex">
        <img src="<?php echo "images/".$produit->photo;?>" alt="test" class=" card-img-top img-fluid image_produit">
        <div class="card-body">
          <h3 class="card-title"> <?php echo e($produit->nom); ?> </h3>
          <p class="card-text espace-prod"><?php echo e($produit->description); ?></p>
          <span class="text-warning">
            <?php while($i < 5): ?>
              <?php if($i < $produit->note): ?>
                <?php echo e($rempli); ?>

              <?php else: ?>
                <?php echo e($vide); ?>

              <?php endif; ?>
              <?php $i = $i + 1; ?>
            <?php endwhile; ?>
          </span>
          <h4 class="prix-prod">Prix : <?php echo e($produit->prix); ?>€</h4>
        </div>
      </div>
    <?php endif; ?>
      <form class="card mt-4 paiement_prod" action="/panier/ajouter" method="post">
          <?php echo e(csrf_field()); ?>

          <?php echo e(method_field('post')); ?>

          <?php if($produit->quantite > 0): ?>
            <input type="hidden", name="produit", value="<?php echo e($produit->id); ?>">
            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
          <?php else: ?>
            <button type="button" class="btn btn-primary" disabled="disabled">Produit indisponible</button>
          <?php endif; ?>
      </form>    
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Avis acheteur
      </div>
      <div class="card-body">
        <?php if(!empty($avis)): ?>
          <?php $__currentLoopData = $avis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> <?php echo e($avi->note); ?>

            <p><?php echo e($avi->description); ?></p>
            <small class="text-muted">Posté le <?php echo e($avi->date_avi); ?> </small>
            <hr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          <p>Il n'y a aucun avi pour ce jeu</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/produit.blade.php ENDPATH**/ ?>