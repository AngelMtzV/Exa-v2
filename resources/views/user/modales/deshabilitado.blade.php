<!-- Modal -->
<div class="modal fade" id="modalP-{{ $examen[0]->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h5 class="modal-title" id="exampleModalLabel">Examen {{ $examen[0]->nombre }} no diponible.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="color: #fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Este examen no esta disponible en este momento. Conuslte con el administrador.</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>