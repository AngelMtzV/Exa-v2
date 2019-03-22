@extends('layouts.app')

@section('botonNavUsuarios')
{{ 'active' }}
@endsection

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
      <h1><img src="{{ asset('imagenes/admin3.png') }}" width="70" height="60"> Calificaciones de: <span style="color: #000;">{{$usuario->usuario}}</span></h1>

      <a class="d-none d-sm-inline-block  btn-primary shadow-sm"></a>
      
    </div>
    <!-- Main Content -->
    <div id="content">
      <!-- End of Topbar -->
      <div class="container">
        <strong><h3></h3></strong>
        <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <!--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
                <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Examen</th>
                                <th>Calificación</th>
                                <th>Aciertos</th>
                                <th>Errores</th>
                                <th>Descargar</th>
                            </tr>
                        </thead>
                        <tbody>@forelse($consulta as $con)
                            <tr>
                                <td>{{ $con->nombre }}</td>
                                <td class="calificacion">{{ $con->resultado }}</td>
                                <td class="aciertos">{{ $con->aciertos }}</td>
                                <td class="errores">{{ $con->errores }}</td>
                                <td> 
                                  <a href="{{ route('mostrarExamen',[Crypt::encrypt($con->id_examen),Crypt::encrypt($con->id_usuario)]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Examen</a>
                                </td>
                                @empty
                                <h4 class="alert alert-danger"><i class="fas fa-info-circle"></i> El usuario no ha realizado ningún examen</h4>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div><br>
<!-- End of Page Wrapper -->
@endsection
