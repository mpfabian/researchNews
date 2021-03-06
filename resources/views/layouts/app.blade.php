<!DOCTYPE html>
@php
    use App\Project;
    use App\Product;
    use App\Researcher;
    use App\Unit;
    use App\Publication;


    $projects = Project::orderBy('id','DESC')->get();
    $products = Product::orderBy('id','DESC')->get();
    $researchers = Researcher::orderBy('id','DESC')->get();
    $units = Unit::orderBy('id','DESC')->get();
    $publications = Publication::orderBy('id','DESC')->get();

@endphp

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  <!-- Bootstrap select styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

</head>

<body>
  <div id="app">
    <style>
      .dropdown:hover>.dropdown-menu {
        display: block;
      }
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
      <a class="navbar-brand" href="http://www.ucn.cl/">
        <img class="img-responsive" src="{{ asset('systemImages/Escudo-UCN-Full-Color.png') }}" width="50" height="50"
          alt="Logo UCN">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link text-white font-weight-bold btn-lg" href="{{ url('/') }}">Inicio</a>
          </li>

          @auth
          @if(Auth::user()->userType == "Administrador")
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('users.create') }}">Crear usuario</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Grupos de investigaci&oacute;n
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('investigationGroups.create') }}">Crear grupo de investigaci&oacute;n</a>
            </div>
          </li>
          @endif
          @endauth

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Proyectos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @auth

              @if (Auth::user()->researcher_id == null && Auth::user()->userType == "Investigador")
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_associate_researcher_modal">Crear Proyecto</a>
              @else
                <a class="dropdown-item" href="{{ route('projects.create') }}">Crear Proyecto</a>
              @endif
              <div class="dropdown-divider"></div>
              @endauth
              @if ($projects->isNotEmpty())
                <a class="dropdown-item" href="{{ route('projects.index')}}">Lista de Proyectos</a>
              @else
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_projects_layout_modal">Lista de Proyectos</a>
              @endif
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Productos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @auth
              @if (Auth::user()->researcher_id == null && Auth::user()->userType == "Investigador")
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_associate_researcher_modal">Crear Producto</a>
              @else
                <a class="dropdown-item" href="{{ route('products.create') }}">Crear Producto</a>
              @endif
              <div class="dropdown-divider"></div>
              @endauth
              @if ($products->isNotEmpty())
                <a class="dropdown-item" href="{{ route('products.index') }}">Lista de Productos</a>
              @else
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_products_layout_modal">Lista de Productos</a>
              @endif
            </div>

          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Investigadores
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @auth
              @if (Auth::user()->researcher_id == null && Auth::user()->userType == "Investigador")
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_associate_researcher_modal">Crear Investigador</a>
              @else
                <a class="dropdown-item" href="{{ route('researchers.create') }}">Crear Investigador</a>
              @endif
              <div class="dropdown-divider"></div>
              @endauth
              @if ($researchers->isNotEmpty())
                <a class="dropdown-item" href="{{ route('researchers.index') }}">Lista de Investigadores</a>
              @else
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_researchers_layout_modal">Lista de Investigadores</a>
              @endif
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Unidades
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @auth
              <a class="dropdown-item" href="{{ route('units.create') }}">Crear Unidad</a>
              <div class="dropdown-divider"></div>
              @endauth
              @if ($units->isNotEmpty())
                <a class="dropdown-item" href="{{ route('units.index') }}">Lista de Unidades</a>
              @else
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_units_layout_modal">Lista de Unidades</a>
              @endif
            </div>
          </li>

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Publicaciones
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @auth
              @if (Auth::user()->researcher_id == null && Auth::user()->userType == "Investigador")
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_associate_researcher_modal">Crear Publicación</a>
              @else
                <a class="dropdown-item" href="{{ route('publications.create') }}">Crear Publicación</a>
              @endif
              <div class="dropdown-divider"></div>
              @endauth
              @if ($publications->isNotEmpty())
                <a class="dropdown-item" href="{{ route('publications.index') }}">Lista de Publicaciones</a>
              @else
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#no_publications_layout_modal">Lista de Publicaciones</a>
              @endif
            </div>
          </li>

        </ul>

        <ul class="navbar-nav ml-auto">
          @auth
          <li class="nav-item pr-4">
            @if (Auth::user()->researcher_id == null)
            <span class="navbar-text text-white">Bienvenido, {{ Auth::user()->userType }}</span>
            @else
                @php
                $researcher = Researcher::find(Auth::user()->researcher_id);
                @endphp
                <span class="navbar-text text-white">Bienvenido, {{ $researcher->researcher_name }}</span>
            @endif
          </li>

          @if (Auth::user()->userType == "Investigador")
            <li class="nav-item">
                @if(Auth::user()->researcher_id == null)
                  <a href="{{ route('researchers_users.create', Auth::user()->id) }}" class="navbar-text text-white pr-4 pl-4 font-weight-bold border-left"> Editar Perfil </a>
                @else
                  <a href="{{ route('researchers_users.edit', Auth::user()->researcher_id) }}" class="navbar-text text-white pr-4 pl-4 font-weight-bold border-left"> Editar Perfil </a>
                @endif
            </li>
          @endif
          @endauth

          @if (Route::has('login'))
          @auth
          <a class="text-white navbar-text pl-4 border-left" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @else
          <a href="{{ route('login') }}" class="text-white">Login <span class="sr-only">(current)</span></a>
          @endauth
          @endif
        </ul>


      </div>
    </nav>

    @if (session('info'))
    <section class="container">
      <div class="row">
        <div class="col-md-8 offset-2">
          <div class="alert alert-success">
            {{ session('info') }}
          </div>
        </div>
      </div>
    </section>
    @endif

    @if (count($errors))
    <section class="container">
      <div class="row">
        <div class="col-md-8 offset-2">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>
                {{ $error }}
              </li>
              @endforeach
            </ul>

          </div>
        </div>
      </div>
    </section>
    @endif

    <main class="py-4">
      @yield('content')
    </main>

    <footer class="page-footer font-small bg-primary">

      <div class="container-fluid text-center text-md-left">
        <h4 class="text-white mb-3">Informaci&oacute;n adicional</h4>
        <div class="row">

          <div class="col-12 col-md-1 mb-3 mb-md-0">
          <a class="text-white d-flex" href="{{ route('ShowAbout_us') }}">Qui&eacute;nes somos</a>
          </div>

          <div class="col-12 col-md-2 mb-3 mb-md-0">
            <a class="text-white d-flex" href="{{ route('HelpVideos') }}">¿Necesitas ayuda?</a>
          </div>

        </div>
      </div>
    </footer>

  </div>


  <!--Archivos JS-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

  <!-- Bootstrap Dropdown Hover JS -->
  <script src="js/bootstrap-dropdownhover.min.js"></script>

  <!--Bootstrap Select JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

  @yield('scripts')

  @include("\layouts\partials\\no_projects_layout_modal")
  @include("\layouts\partials\\no_products_layout_modal")
  @include("\layouts\partials\\no_researchers_layout_modal")
  @include("\layouts\partials\\no_units_layout_modal")
  @include("\layouts\partials\\no_associate_researcher_modal")
  @include("\layouts\partials\\no_publications_layout_modal")
</body>

</html>
