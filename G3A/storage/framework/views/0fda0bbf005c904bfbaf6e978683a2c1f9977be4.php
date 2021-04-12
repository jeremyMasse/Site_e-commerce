

<?php $__env->startSection('contenu'); ?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Mon Panier</h1>
        </div>
    </section>
    <?php if(Cart::count() > 0): ?>
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Produit</th>
                                    <th scope="col" class="text-center">Quantité</th>
                                    <th scope="col" class="text-right">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                                        <td><?php echo e($produit->model->nom); ?> </td>
                                        <!-- Pour ajuster la quantité <td><input class="form-control" type="number"  value="1" min="1" max="5" /></td> -->
                                        <td class="text-center">1</td>
                                        <td class="text-right"><?php echo e($produit->model->prix); ?> €</td>
                                        <td class="text-right">
                                        <form action="<?php echo e('/panier/'.$produit->rowId); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> 
                                        </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong><?php echo e(Cart::subtotal()); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row container-btn">
                        <div class="col-sm-12  col-md-6">
                        <a class="continuer" href="/catalogue"><button class="btn btn-block btn-light btn-lg">Continuer mes achats</button></a>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <input class="btn btn-lg btn-block btn-success text-uppercase" type="button" value="Paiement" onclick="window.location.href='<?php echo e(url('/card')); ?>'" />
                        </div>
                        <form action="<?php echo e('/paniervider'); ?>" method="get" class="form-panier">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-lg btn-danger">Vider le panier</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class=" alert alert-success"> votre panier est vide</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/panier.blade.php ENDPATH**/ ?>