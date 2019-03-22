<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="ModalVer-{{ $pregunta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header cabecera">
        <h5 class="modal-title text-white" id="exampleModalLabel">Pregunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="color: #fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Pregunta: <pre>{{ $pregunta->pregunta }}</pre></h6>
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            @if($pregunta->imagen != "")
              <div class="container">
                <img src="{{ asset('img/'.$pregunta->imagen) }}" width="300" height="200">
              </div>
            @endif
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <p class="datos">Opción 1:</p>
            <strong class="datos"><pre>{{ $pregunta->opcion1 }}</pre></strong>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="datos">Opción 2:</p>
            <strong class="datos"><pre>{{ $pregunta->opcion2 }}</pre></strong>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="datos">Opción 3:</p>
            <strong class="datos"><pre>{{ $pregunta->opcion3 }}</pre></strong>
          </div>
        </div>
        @if($pregunta->opcion4 != "")
        <div class="row">
          <div class="col-md-12">
            <p class="datos">Opción 4:</p>
            <strong class="datos"><pre>{{ $pregunta->opcion4 }}</pre></strong>
          </div>
        </div>
        @endif
         @if($pregunta->opcion5 != "")
        <div class="row">
          <div class="col-md-12">
            <p class="datos">Opción 5:</p>
            <strong class="datos"><pre>{{ $pregunta->opcion5 }}</pre></strong>
          </div>
        </div>
        @endif
         @if($pregunta->opcion6 != "")
        <div class="row">
          <div class="col-md-12">
            <p class="datos">Opción 6:</p>
            <strong class="datos"><pre>{{ $pregunta->opcion6 }}</pre></strong>
          </div>
        </div>
        @endif
        <div class="row">
          <div class="col-md-m4"></div>
          <div class="col-md-4">            
          </div>
          <div class="col-md-4">
            <p class="datos">Respuesta: <strong class="correctas">Opción {{ $pregunta->respuesta }}</strong></p>            
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <center>
              <div class="row">
                  <div class="col-md-6">
                      <a href="{{ route('preguntasAdmin.edit',$pregunta->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i> Editar</a>
                  </div>
                  <div class="col-md-6">
                      <form id="preguntaEliminar{{$pregunta->id}}" action="{{ Route('preguntasAdmin.destroy', $pregunta->id) }}" method="POST">
                        {{ csrf_field() }}
                          @method('DELETE')
                      </form>
                      <button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm eliminarPregunta" type="submit" data-id="{{$pregunta->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i> Eliminar</button>
                  </div>
              </div>
              
          </center>
      </div>
    </div>
  </div>
</div>