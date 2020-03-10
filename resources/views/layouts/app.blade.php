<!DOCTYPE html>
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

  <!-- Styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  <!-- Bootstrap select styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

  <!-- Bootstrap datetime-picker -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

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
        <ul class="nav navbar-nav mr-auto">
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
              Grupos de investigacion
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('investigationGroups.create') }}">Crear grupo de investigacion</a>
            </div>
          </li>
          @endif

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Proyectos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('projects.create') }}">Crear Proyecto</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Editar Proyecto</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Productos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('products.create') }}">Crear producto</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white btn-lg" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Investigadores
              <!--Cuando este listo vista grupo se cambiara pa alla-->
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('researchers.create') }}">Crear Investigador</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('researchers.index') }}">Lista Investigadores</a>
            </div>
          </li>
          @endauth


        </ul>

        @auth
        <p class="navbar-text text-white pt-4 pr-4">Bienvenido, {{ Auth::user()->userType }}</p>
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

    <footer class="page-footer font-small bg-primary pt-4 mt-4">

      <div class="container-fluid text-center text-md-left">
        <h4 class="text-white mb-3">Informacion adicional</h4>
        <div class="row">

          <div class="col-1">
            <a class="text-white d-flex" href="#">Quiénes somos</a>
          </div>

          <div class="col-2">
            <a class="text-white d-flex" href="#">¿Necesitas ayuda?</a>
          </div>

        </div>
      </div>
    </footer>

  </div>

  <!--Archivos JS-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
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

  <!-- Bootstrap datetime-picker JS -->
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js">
  </script>

</body>

</html>