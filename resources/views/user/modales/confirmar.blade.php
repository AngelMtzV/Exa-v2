<!-- Modal -->
<div class="modal fade" id="modal-{{ $examen[0]->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h5 class="modal-title" id="exampleModalLabel">Comenzar examen de {{ $examen[0]->nombre }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="color: #fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <pre>{{ $examen[0]->descripcion }}</pre>
        <hr>
        <ul>
          <li>
            <p>Fecha limite para realizar el examen: <strong>{{ $examen[0]->fecha }}</strong></p>
          </li>
          <li>
            <p>Tendrá <strong>{{ $examen[0]->tiempo }}</strong> de tiempo para finalizar las preguntas.</p>
          </li>
          <li>
            <p>Una vez comenzado el examen no podrá abandonar la página hasta finalizar las preguntas o que su tiempo se agote.</p>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="/examen/{{$examen[0]->id}}"><button type="button" class="btn btn-primary">Confirmar</button></a>
      </div>
    </div>
  </div>
</div>