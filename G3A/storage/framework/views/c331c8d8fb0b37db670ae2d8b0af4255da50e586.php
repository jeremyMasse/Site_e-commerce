<style>
    header.page-header>h1 {
        margin-left: 37%;
    }
</style>

<header class="page-header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">G3A</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(url('/')); ?>">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('/catalogue')); ?>">Catalogue</a>
      </li>
      <?php if(!auth()->check()): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/inscription')); ?>">Inscription</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/connexion')); ?>">Connexion</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/profil')); ?>">Profil</a>
        </li>
      <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/panier')); ?>">Panier <span class=" badge badge-pill badge-dark"> <?php echo e(Cart::count()); ?></span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('/contact')); ?>">Contact</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/deconnexion')); ?>">Deconnexion</a>
        </li>
      <?php endif; ?>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0"> pour faire une barre de recherche 
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
</header><?php /**PATH C:\Users\jerem\Documents\CoursYnov\2020_2021\Projet web\projet_dev_web_b2\G3A\resources\views/header.blade.php ENDPATH**/ ?>