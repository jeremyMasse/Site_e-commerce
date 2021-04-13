

<?php $__env->startSection('contenu'); ?>

    <?php if($user->admin): ?>
        <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Les membres</h1>
        </div>
    </section>
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Nom</th>
                                    <th scope="col" class="text-center">email</th>
                                    <th scope="col" class="text-right">statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                                        <td><?php echo e($u->nom); ?> </td>
                                        <!-- Pour ajuster la quantité <td><input class="form-control" type="number"  value="1" min="1" max="5" /></td> -->
                                        <td class="text-center"><?php echo e($u->email); ?></td>
                                        <td class="text-right">
                                        <?php if($u->admin): ?>
                                            admin
                                        <?php else: ?>
                                            membre
                                        <?php endif; ?></td>
                                        <td class="text-right">
                                        <?php if(!$u->admin): ?>
                                            <form action="<?php echo '/profil/sup/'.$u->id ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> 
                                            </form>
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Nombre membres:</strong></td>
                                    <td class="text-right"><strong><?php echo e($nbr_user); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    <?php else: ?>   
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8 mx-auto">
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
        <h2 class="h3 mb-4 page-title">Vos coordonnées</h2>
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Profile</a>
                </li>
            </ul>
            <form method="Post" action="/profil/update">
                <?php echo e(csrf_field()); ?>

                <input type="hidden", name="user", value="<?php echo e($user->id); ?>">
                <div class="row mt-5 align-items-center">
                    <div class="col-md-3 text-center mb-5">
                        <div class="avatar avatar-xl">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="avatar-img rounded-circle" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h4 class="mb-1"><?php echo e($user->prenom); ?> <?php echo e($user->nom); ?></h4>
                                <?php if($user->ville != ""): ?>
                                    <p class="small mb-3"><span class="badge badge-dark"><?php echo e($user->ville); ?></span></p>
                                <?php else: ?>
                                    <p class="small mb-3"><span class="badge badge-dark">New York, USA</span></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prenom">Prenom</label>
                        <input type="texte" class="form-control" id="prenom" name="prenom" value="<?php echo e($user->prenom); ?>"/>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                        <input type="texte" class="form-control" id="prenom" name="nom" value="<?php echo e($user->nom); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="texte" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                </div>
                <div class="form-group">
                    <label for="dtn">Date de naissance</label>
                    <input type="date" name="dtn" value="<?php echo e($user->dtn); ?>">
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="texte" class="form-control" id="adresse" name="adresse" value="<?php echo e($user->adresse); ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="<?php echo e($user->ville); ?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pays">Pays</label>
                        <input type="text" class="form-control" id="pays" name="pays" value="<?php echo e($user->pays); ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cp">Code postal</label>
                        <input type="text" class="form-control" id="cp" name="cp" value="<?php echo e($user->code_postal); ?>" />
                    </div>
                </div>
                <!-- <hr class="my-4" /> pour la fonctionnalité de changement de mdp
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ancien_mdp">Ancien mot de passe</label>
                            <input type="password" class="form-control" id="ancien_mdp" />
                        </div>
                        <div class="form-group">
                            <label for="nouv_mdp">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="nouv_mdp" />
                        </div>
                        <div class="form-group">
                            <label for="conf_mdp">Confirmation </label>
                            <input type="password" class="form-control" id="conf_mdp" name="conf_mdp" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Condition de mot de passe</p>
                        <p class="small text-muted mb-2">Pour créer un nouveau mot de passe, vous devez remplir les conditions suivantes:</p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Minimum 8 caractères</li>
                            <li>Au moins un caractère</li>
                            <li>Au moins un chiffre</li>
                            <li>Ne doit pas être similaire à l'ancien mot de passe</li>
                        </ul>
                    </div>
                </div>-->
                <button type="submit" class="btn btn-primary">Sauvegarder</button> 
            </form>
        </div>
    </div>
</div>

</div>  

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\site_e-commerce\G3A\resources\views/profil.blade.php ENDPATH**/ ?>