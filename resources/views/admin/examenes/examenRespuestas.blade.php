@extends('layouts.app')

@section('botonNavUsuarios')
{{ 'active' }}
@endsection

@section('content')
<div class="" id="contenedor">

  <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
              <h1>{{ $examen->nombre }}</h1>

              <!--<a href="{{ route('examenesAdmin.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Descargar PDF</a>-->
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
                      <tbody>@forelse($consulta as $key=>$con)
                        @php
                          @$cont++
                        @endphp
                          <tr>
                            @if($key <= $n_preguntas)
                              @if($con->PREGUNTA_RES == $con->RES)
                              <td class="incorrectasFondo incorrecto" onMouseOver="entrar();" onMouseOut="salir();" id="incorrecto">{{ $cont }}.- {{ $con->pregunta }}</td>
                              <td class="correctas">Opción {{ $con->RES }}</td>
                              <td class="correctas">Opción {{ $con->PREGUNTA_RES }}</td>
                              @endif
                              @if($con->PREGUNTA_RES != $con->RES)
                              <td class="correctasFondo correcto" onMouseOver="sobre();" onMouseOut="fuera();" id="correcto">{{ $cont }}.- {{ $con->pregunta }}</td>
                              <td class="incorrectas">Opción {{ $con->RES }}</td>
                              <td class="incorrectas">Opción {{ $con->PREGUNTA_RES }}</td>
                              @endif
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
              @forelse($calification as $calification)
                  <div class="mt-4 text-center small">
                    @if($calification->resultado < 6 )                    
                      <span class="mr-2">
                        <i class="fas fa-circle text-danger" style="font-size: 20px">Calificación {{$calification->resultado}}</i> <h5 class="text-danger"></h5>
                      </span>                                                    
                    @endif
                    @if($calification->resultado >= 6 && $calification->resultado < 8)
                      <span class="mr-2">
                        <i class="fas fa-circle text-warning" style="font-size: 20px">Calificación {{$calification->resultado}}</i> <h5 class="text-warning"></h5>
                      </span>                                                    
                    @endif
                    @if($calification->resultado >= 8)
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary" style="font-size: 20px">Calificación {{$calification->resultado}}</i> <h5 class="text-primary"></h5>
                      </span>                                                        
                    @endif               
                  </div>
              @empty
              <h4 class="alert alert-info"><i class="fas fa-info-circle"></i> No existen registros</h4>
              @endforelse
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
