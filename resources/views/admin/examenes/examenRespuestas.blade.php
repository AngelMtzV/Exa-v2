@extends('layouts.app')

@section('botonNavUsuarios')
{{ 'active' }}
@endsection

@section('content')
<div class="container">

  <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
              <h1>Examen {{ $examen->nombre }}</h1>

              <a href="{{ route('examenesAdmin.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Descargar PDF</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Preguntas</th>
                              <th>Respuesta correcta</th>
                              <th>Respuesta del usuario</th>
                          </tr>
                      </thead>
                      <tbody>@forelse($consulta as $con)
                        @php
                          @$cont++
                        @endphp
                          <tr>
                              @if($con->res_pregunta == $con->res_User)
                              <td class="incorrectasFondo incorrecto" onMouseOver="entrar();" onMouseOut="salir();" id="incorrecto">{{ $cont }}.- {{ $con->pregunta }}</td>
                              <td class="correctas">Opción {{ $con->res_pregunta }}</td>
                              <td class="correctas">Opción {{ $con->res_User }}</td>
                              @endif
                              @if($con->res_pregunta != $con->res_User)
                              <td class="correctasFondo correcto" onMouseOver="sobre();" onMouseOut="fuera();" id="correcto">{{ $cont }}.- {{ $con->pregunta }}</td>
                              <td class="incorrectas">Opción {{ $con->res_pregunta }}</td>
                              <td class="incorrectas">Opción {{ $con->res_User }}</td>
                              @endif
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
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h1>Gráfica</h1>
          </div>
          <div class="card-body">              
              <div id="app">
                {!! $chart->container() !!}
              </div>
              <canvas id="miGrafico"></canvas>
          </div>
        </div>            
      </div>
  </div>
</div>
{!! $chart->script() !!}
<script>
  function sobre() {
    $("#example").find("tbody").find("td").each(function(){ 
       if ($(this).attr("id") == "correcto") {
       $(".correcto").css("background-color", "#e02d1b");
      }
    }); 
  }

  function fuera() {
    $("#example").find("tbody").find("td").each(function(){ 
       if ($(this).attr("id") == "correcto") {
       $(".correcto").css("background-color", "#f5b7b1");
      }
    }); 
  }

  function entrar() {
    $("#example").find("tbody").find("td").each(function(){ 
       if ($(this).attr("id") == "incorrecto") {
       $(".incorrecto").css("background-color", "#105084");
      }
    }); 
  }

  function salir() {
    $("#example").find("tbody").find("td").each(function(){ 
       if ($(this).attr("id") == "incorrecto") {
       $(".incorrecto").css("background-color", "#b7c7f2");
      }
    }); 
  }
</script>

@endsection
