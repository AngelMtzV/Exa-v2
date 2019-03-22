<!-- Modal -->
<div class="modal fade" id="ModalVer-{{$examen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cabecera">
        <h5 class="modal-title text-white" id="exampleModalLabel">Examen de {{ $examen->nombre }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="color: #fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>{{ $examen->descripcion }}</h6>
        <hr>
        <ul>
          <li>
            <p>Fecha limite para realizar el examen: <strong class="datos">{{ $examen->fecha }}</strong></p>
          </li>
          <li>
            <p>Tiempo: <strong class="datos">{{ $examen->tiempo }}</strong></p>
          </li>
          <li>
            <p>Total de preguntas: <strong class="datos">{{ $examen->no_preguntas }}</strong></p>
          </li>
          <li>
            <p>Estado: <strong class="datos">{{ $examen->id_estado == 1 ? 'Habilitado' : 'Deshabilidado' }}</strong></p>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="{{ route('preguntasAdmin',Crypt::encrypt($examen->id)) }}"><button type="button" class="btn btn-primary">Preguntas</button></a>
      </div>
    </div>
  </div>
</div>
