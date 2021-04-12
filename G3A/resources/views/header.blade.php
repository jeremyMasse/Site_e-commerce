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
        <a class="nav-link" href="{{url('/')}}">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{url('/catalogue')}}">Catalogue</a>
      </li>
      @if(!auth()->check())
        <li class="nav-item">
            <a class="nav-link" href="{{url('/inscription')}}">Inscription</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/connexion')}}">Connexion</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{url('/profil')}}">Profil</a>
        </li>
      <li class="nav-item">
            <a class="nav-link" href="{{url('/panier')}}">Panier <span class=" badge badge-pill badge-dark"> {{ Cart::count() }}</span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/contact')}}">Contact</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="{{url('/deconnexion')}}">Deconnexion</a>
        </li>
      @endif
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0"> pour faire une barre de recherche 
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
</header>