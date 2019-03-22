<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}"/>
</head>
<body id="page-top" onload="inicio()" onbeforeunload="salir(event)">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Si quiero menu lateral ponerlo aquí -->

      <!-- Si quiero menu lateral ponerlo aquí -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <!-- Just an image -->
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
          <!-- End of Topbar -->
    <div id="app">
        <main>
            <div class="container">
          @if(Session::has('message'))
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('message') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif
        </div>
        <div class="container">
          @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('error') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif
        </div>
          <!-- Page Wrapper -->
          <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

              <!-- Main Content -->
              <div id="content">

                <!-- End of Topbar -->
               <div class="container">
                  <div class="row card-header">
                      <div class="col-xl-8">
                        <h1>Examen: {{ $examen->nombre }}</h1>
                        <input id="horas" type="text" value="{{ $horas }}" hidden>
                        <input id="minutos" type="text" value="{{ $minutos }}" hidden>
                        <input id="segundos" type="text" value="{{ $segundos }}" hidden>
                      </div>
                      <div class="col-xl-4">
                        <div class="row float-right">
                          <figure class="figure">
                            <button class="btn btn-primary" type="button" disabled>
                              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                              <div class="container">
                                <div class="row">
                                    <h5 class="tiempo">Tiempo: </h5><h5 id="Horas">00</h5><h5 id="Minutos">:00</h5><h5 id="Segundos">:00</h5><h5 id="Centesimas" hidden>:00</h5>
                                </div>
                              </div>
                            </button>
                            <figcaption class="figure-caption text-right">
                              <p>Tiempo limite: {{ $examen->tiempo }}</p>
                            </figcaption>
                          </figure>
                        </div>
                      </div>
                  </div>      
                  @if(auth()->user()->id_tipoUsuario != 1)
                    @include('user.preguntas')
                  @endif
               </div>
                <br><hr>

              </div>
              <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

          </div>
          <!-- End of Page Wrapper -->
            
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
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- plugin para la app-->
    <script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
    <!-- plugin para las graficas-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <!-- FIN del plugin para las graficas-->

    <!-- script para iniciar el plugin de la tabla -->
    <script type="text/javascript" src="{{ asset('DataTables/js/jquery.datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/js/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>