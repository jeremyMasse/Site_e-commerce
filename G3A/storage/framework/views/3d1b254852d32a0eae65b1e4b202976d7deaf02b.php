

<?php $__env->startSection('contenu'); ?>

    <div class="container bootstrap snipets">
    <h1 class="text-center text-muted">Catalogue Jeux</h1>
    <div class="row flow-offset-1">
    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="col-xs-6 col-md-4 produit">
       <div class="product tumbnail thumbnail-3">
          <a href="<?php echo e(route('produit', [$produit->id])); ?>">
            <img src="<?php echo "images/".$produit->photo;?>" alt="" class="image_produit">
          </a>
         <div class="caption">
           <h6><a href="<?php echo e(route('produit', [$produit->id])); ?>"><?php echo e($produit->nom); ?></a> 
           <span class="plateforme"><?php echo e($produit->plateforme); ?></span></h6>
           <?php if($produit->quantite > 0): ?>
            <span class="price"><?php echo e($produit->prix); ?>€</span>
          <?php else: ?>
            <span class="price" style="color: red">Rupture de stock</span>
          <?php endif; ?>
         </div>
       </div>
     </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/catalogue.blade.php ENDPATH**/ ?>