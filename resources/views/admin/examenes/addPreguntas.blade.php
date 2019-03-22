@extends('layouts.app')

@section('botonNavExamenes')
{{ 'active' }}
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Agregar preguntas</h2><p>Preguntas agregadas: {{ $totalPreguntas }} de un total de: {{ $allPreguntas }}</p>
        </div>
        @if($totalPreguntas != $allPreguntas)
        <div class="card-body">
            <form method="POST" action="{{ route('preguntasAdmin.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="col-md-8">
                  <label for="exampleInputPregunta">Pregunta:</label>
                  <!--<input type="text" class="form-control" name="inpPregunta" aria-describedby="Nombre" placeholder="¿Pregunta...?">-->
                  <textarea class="form-control" name="inpPregunta" id="exampleFormControlTextarea1" rows="3"></textarea>
                  <small id="Nombre" class="form-text text-muted">Debes introducir una pregunta para el examen (*)</small>
                </div>
                <div class="col-md-4">
                  <label for="exampleInputPregunta">Puede agregar una imagen a la pregunta. <small id="Nombre" class="form-text text-muted">Opcional</small></label><br>
                    <div class="custom-file">
                      <input type="file" accept="image/*" class="custom-file-input" id="cargarImg" name="cargarImg">
                      <label class="custom-file-label">Selecciona una imagen</label>
                    </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-1">
                  <label for="exampleInputOpcion1">Opción 1:</label>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="inpOpcion1" aria-describedby="NumeroPreguntas" placeholder="1)" max="100">
                </div>
                <div class="col-md-1">
                  <small class="form-text text-muted">(*)</small>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-1">
                  <label for="exampleInputOpcion2">Opción 2:</label>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="inpOpcion2" aria-describedby="Fecha" placeholder="2)">
                </div>
                <div class="col-md-1"><small id="Fecha" class="form-text text-muted">(*)</small>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-1">
                  <label for="exampleInputOpcion3">Opción 3:</label>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="inpOpcion3" aria-describedby="Tiempo" max="10" placeholder="3)">
                </div>
                <div class="col-md-1">
                  <small id="Tiempo" class="form-text text-muted">(*)</small>
                </div>
              </div>
              <br>
                <div class="form-row">
                  <div class="col-md-1">
                    <label for="exampleInputOpcion4">Opción 4:</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="opcion4" name="inpOpcion4" aria-describedby="Tiempo" max="10" placeholder="4)">
                  </div>
                  <div class="col-md-1">
                    <small id="Tiempo" class="form-text text-muted">Opcional</small>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-1">
                    <label for="exampleInputOpcion5">Opción 5:</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="opcion5" name="inpOpcion5" aria-describedby="Tiempo" max="10" placeholder="5)">
                  </div>
                  <div class="col-md-1">
                    <small id="Tiempo" class="form-text text-muted">Opcional</small>
                  </div>
                </div>
                <br>
                  <div class="form-row">
                    <div class="col-md-1">
                      <label for="exampleInputOpcion6">Opción 6:</label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="opcion6" name="inpOpcion6" aria-describedby="Tiempo" max="10" placeholder="6)">
                    </div>
                    <div class="col-md-1">
                      <small id="Tiempo" class="form-text text-muted">Opcional</small>
                    </div>
                  </div>
                  <br>
                <input type="text" class="form-control" name="inpIdExamen" value="{{ $idExamen }}" hidden>
                <div class="form-row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <select class="form-control m-bot15" name="opcionid">
                      <option selected value="" disabled>Seleccione la opción correcta</option>
                     <option value="1" >Opcion 1</option>
                     <option value="2" >Opcion 2</option>
                     <option value="3" >Opcion 3</option>
                     <option value="4" id="opc4" hidden>Opcion 4</option>
                     <option value="5" id="opc5" hidden>Opcion 5</option>
                     <option value="6" id="opc6" hidden>Opcion 6</option>
                    </select><br>
                  </div>
                  <div class="col-md-4">
                     <small id="Tiempo" class="form-text text-muted">(*)</small>
                  </div>
                </div>
              <div class="float-right">
                <button type="submit" class="btn btn-primary">Enviar ➤</button><hr>
              </div>
            </form>        
        </div>
        @endif
    </div>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de preguntas</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>pregunta</th>
                          <th>Respuesta</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                  <tbody>@forelse($preguntas as $pregunta)
                    @php
                      @$cont++
                    @endphp
                      <tr>
                          <td>{{ $cont }}.- {{ $pregunta->pregunta }}</td>
                          <td>Opción ({{ $pregunta->respuesta }})</td>
                          <td style="align-content: center;">
                            <a data-target="#ModalVer-{{ $pregunta->id }}" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-white"><i class="fas fa-eye"></i> Ver</a>
                          </td>
                          @include('admin.modales.verPregunta')
                          @empty
                          <h4 class="alert alert-info"><i class="fas fa-info-circle"></i> Aún no existen registros</h4>
                      </tr>
                      @endforelse
                  </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
