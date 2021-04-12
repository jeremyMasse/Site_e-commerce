<style>
    header.page-header>h1 {
        margin-left: 37%;
    }
</style>

<header class="page-header">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <select class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <option>All</option>
                                        <option>Action</option>
                                        <option>Sport</option>
                                        <option>Multijoueur</option>
                                    </select>
                                </div>

                                <input type="hidden" name="search_param" value="all" id="search_param">
                                <input type="text" class="form-control" name="x" placeholder="Search term...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search">Rechercher</span></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="form-inline">
            <?php if(!auth()->check()): ?>
            <ul>
                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/')); ?>">Accueil</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/catalogue')); ?>">Tout les articles</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/inscription')); ?>">Inscription</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/connexion')); ?>">Connexion</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/contact')); ?>">Contact</a></button>

            </ul>
            <?php else: ?>
            <ul>
                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/password_modification')); ?>">Change Password</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/users')); ?>">Users</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/catalogue')); ?>">Tout les articles</a></button>

                <button class="btn btn-outline-success" type="button"><a href="<?php echo e(url('/signout')); ?>">Sign out</a></button>

            </ul>
            <?php endif; ?>
        </form>
    </nav>

</header><?php /**PATH D:\Ynov\B2\Projet B2\Projet Dev Web\projet_dev_web_b2\G3A\resources\views/header.blade.php ENDPATH**/ ?>