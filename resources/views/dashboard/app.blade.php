<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CMS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('dashboard/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('dashboard/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="#">
            CMS
          </a>
          <a class="navbar-brand brand-logo-mini" href="#">

          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Panel administrador</h1>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            @guest @if (Route::has('login'))  @endif @else {{ Auth::user()->name }} @endguest <img class="img-xs rounded-circle" src="{{asset('dashboard/images/user.png')}}" alt="Profile image"> </a>
            @guest @if (Route::has('login')) @endif @else
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Cerrar Sesión

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

              </a>
            </div>
            @endguest
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <!-- MENU -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">

            @guest
            @if (Route::has('login'))
            <a class="nav-link" href="#">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Iniciar Sesión</span>
            </a>
            @endif
            @endguest

            @auth
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
            @endauth

        </li>

          <li class="nav-item nav-category">UI Elementos</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Estilo Web</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                @guest
                @if (Route::has('login'))
                <li class="nav-item"> <a class="nav-link" href="#">Iniciar Sesión</a></li>
                @endif
                @endguest

                @auth
                <li class="nav-item"> <a class="nav-link" href="#">Estilo base</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Estilo login</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Logotipos</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Banner</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Redes Sociales</a></li>
                @endauth

              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Publicidad</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Contenido</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                @guest
                @if (Route::has('login'))
                <li class="nav-item"> <a class="nav-link" href="#">Iniciar Sesión</a></li>
                @endif
                @endguest

                @auth
                <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Post</a></li>
                @endauth

              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Gestión de usuarios</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Usuarios</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                @guest
                @if (Route::has('login'))
                <li class="nav-item"> <a class="nav-link" href="#">Iniciar Sesión</a></li>
                @endif
                @endguest

                @auth
                <li class="nav-item"> <a class="nav-link" href="{{ route('administrators') }}"> Administradores </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> Clientes </a></li>
                @endauth
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Ayuda</li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">

          <!--CONTENTS -->
          @yield('content')

        </div>

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">B-Pro Innovaciones de SA DE CV</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. Todos los derechos reservados. </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('sweetalert::alert')
  <!-- plugins:js -->
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{asset('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('dashboard/js/template.js')}}"></script>
  <script src="{{asset('dashboard/js/settings.js')}}"></script>
  <script src="{{asset('dashboard/js/todolist.js')}}"></script>

  <script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('dashboard/js/dataTables.bootstrap5.min.js')}}"></script>

  <script>
    
    $(document).ready(function() {
    $('#datatable').DataTable( {
        "language": {
            "url": "{{asset('dashboard/json/esdatatable.json')}}"
        }
    } );
} );
  </script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  
 

</body>

</html>