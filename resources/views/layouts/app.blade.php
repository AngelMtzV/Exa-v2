<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('imagenes/logocbtm.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Consulting & B-T</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Style para el diseño del index-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Style para la app-->
    
    <!-- Style para el plugin de las tablas-->
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/dataTables.bootstrap4.min.css') }}"/>
    <!-- Style para la aplicacions-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}"/>
    <!-- Style para los mensajes-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.css') }}">
    <link rel=”stylesheet” href="{{ asset('sweetalert/sweetalert2.min.css') }}">
    
</head>
<body id="page-top">
    <div id="wrapper">
      <!-- Si quiero menu lateral ponerlo aquí -->
      <!-- Si quiero menu lateral ponerlo aquí -->
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <nav id="navegador" class="navbar navbar-expand-lg navbar-dark " style="background: #0b385d;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand" href="{{ route('home')}}"><img src="{{ asset('imagenes/logo.png') }}"></a>
              @if(Auth::user()->id_tipoUsuario == 1)
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!--Opciones para los USUARIOS-->
                <li class="nav-item dropdown @yield('botonNavUsuarios')">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('home') }}">Listado de Usuarios</a>
                    <a class="dropdown-item" href="{{ route('register') }}">Agregar</a>
                  </div>
                </li>
                <!--Opciones para los EXAMENES-->
                <li class="nav-item dropdown @yield('botonNavExamenes')">
                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Examenes</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a  class="dropdown-item" href="{{ route('examenesAdmin.index') }}">Listado de Examenes</a>
                    <a class="dropdown-item" href="{{ route('examenesAdmin.create') }}">Agregar</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Resultados generales</a>
                </li>
                <!--<li class="nav-item @yield('botonNavExamenes')">
                  <a class="nav-link" href="{{ route('examenesAdmin.create') }}">Examenes</a>
                </li>
                <li class="nav-item @yield('botonNavUsuarios')"> 
                  <a class="nav-link" href="{{ route('register') }}">Usuarios</a>
                </li>-->
                @endif
              </ul>
              <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto" style="padding-left: 10%;">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown no-arrow">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong class="caret" style="color: #fff">{{ Auth::user()->usuario }} <i class="fas fa-user-tie"></i></strong>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }} "
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();" style="color: #FD0505; background-color: #fff;">
                                      {{ __('Cerrar sesión  ') }}<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
            </div>
          </nav><br>
    <div id="app">
        <main>
            @include('layouts.mensajes')
            @yield('content')
        </main>
    </div>
        <footer class="sticky-footer bg-dark" style="margin-top: 30%;">
          <div class="container">
            <div class="row">
              <div class="col">
                <address class="text-white">
                  <p>
                    Ofrecemos soluciones de tecnología de la información, enfocadas a satisfacer las necesidades de desarrollo, implantación y soporte de su empresa, para garantizar que nuestro equipo sabrá entender y ofrecer la mejor solución tecnológica en JAVA y .NET, para su empresa.
                  </p>
                </address>
              </div>
              <div class="col">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item text-white">Colonia el Carmen. Puebla, Puebla. </li>
                  <li class="nav-item text-white">15 Poniente No. 120, Despacho 103, 104 </li>
                  <li class="nav-item text-white">Telefono: 222 - 7986359 </li>
                  <li class="nav-item text-white"><a href="/drinks">Email: capitalhumano@candbt.com</a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>

      </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!--Scripts de bootstrap-ajax y jquery-->
    @include('layouts.scripts')
</body>
</html>
