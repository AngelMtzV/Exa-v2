@extends('layouts.app')

@section('botonNavExamenes')
{{ 'active' }}
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar pregunta</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('preguntasAdmin.update',$pregunta->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-row">
                <div class="col-md-8">
                  <label for="exampleInputPregunta">Pregunta:</label>
                  <!--<input type="text" class="form-control" name="inpPregunta" aria-describedby="Nombre" placeholder="¿Pregunta...?">-->
                  <textarea class="form-control" name="inpPregunta" id="exampleFormControlTextarea1" rows="3">{{$pregunta->pregunta}}</textarea>
                  <small id="Nombre" class="form-text text-muted">Debes introducir una pregunta para el examen (*)</small>
                </div>
                <!---->
                @if($pregunta->imagen != "")
                <div class="col-md-4">        
                    <div class="container">
                      <img src="{{ asset('img/'.$pregunta->imagen) }}" width="300" height="200">
                      <a href="" style="margin-left: 28%;" data-target="#ModalVer-{{$pregunta->id}}" data-toggle="modal"  data-toggle="tooltip" data-placement="top" title="Mostrar"> Cambiar imagen</a>
                    </div>
                </div>
                @else
                <div class="col-md-4">
                  <label for="exampleInputPregunta">Puede agregar una imagen a la pregunta. <small id="Nombre" class="form-text text-muted">Opcional</small></label><br>
                    <div class="custom-file">                      
                      <input type="file" accept="image/*" class="custom-file-input" id="cargarImg" name="cargarImg">
                      <label class="custom-file-label">Selecciona una imagen</label>
                    </div>
                </div>
                @endif
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-1">
                  <label for="exampleInputOpcion1">Opción 1:</label>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="inpOpcion1" aria-describedby="NumeroPreguntas" placeholder="1)" max="100" value="{{$pregunta->opcion1}}">
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
                  <input type="text" class="form-control" name="inpOpcion2" aria-describedby="Fecha" placeholder="2)" value="{{$pregunta->opcion2}}">
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
                  <input type="text" class="form-control" name="inpOpcion3" aria-describedby="Tiempo" max="10" placeholder="3)" value="{{$pregunta->opcion3}}">
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
                    <input type="text" class="form-control" id="opcion4" name="inpOpcion4" aria-describedby="Tiempo" max="10" placeholder="4)" value="{{$pregunta->opcion4}}">
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
                    <input type="text" class="form-control" id="opcion5" name="inpOpcion5" aria-describedby="Tiempo" max="10" placeholder="5)" value="{{$pregunta->opcion5}}">
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
                      <input type="text" class="form-control" id="opcion6" name="inpOpcion6" aria-describedby="Tiempo" max="10" placeholder="6)" value="{{$pregunta->opcion6}}">
                    </div>
                    <div class="col-md-1">
                      <small id="Tiempo" class="form-text text-muted">Opcional</small>
                    </div>
                  </div>
                  <br>
                <input type="text" class="form-control" id="inpIdExamen" name="inpIdExamen" value="{{$idExamen}}" hidden>
                <div class="form-row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <select class="form-control m-bot15" name="opcionid" id="opcionid" onclick="return validarOpc()">
                      <option selected value="{{$pregunta->respuesta}}">Opción {{$pregunta->respuesta}}</option>
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
                <button type="submit" class="btn btn-primary">actualizar ➤</button><hr>
              </div>
            </form>        
        </div>
    </div>
</div>
@include('admin.modales.editImg')

<script>
  function validarOpc () {
    $('#opcionid').click(function(){
       var campo4 = $('#opcion4').val();
       var campo5 = $('#opcion5').val();
       var campo6 = $('#opcion6').val();
       if(campo4 != ''){
        document.getElementById("opc4").removeAttribute('hidden');
       }else{
        $("#opc4").attr("hidden","true");
       }
       if(campo5 != ''){
        document.getElementById("opc5").removeAttribute('hidden');
       }else{
        $("#opc5").attr("hidden","true");
       }
       if(campo6 != ''){
        document.getElementById("opc6").removeAttribute('hidden');
       }else{
        $("#opc6").attr("hidden","true");
       }
    });        
   } 

</script>
@endsection
