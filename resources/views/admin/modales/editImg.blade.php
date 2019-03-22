<!-- Modal -->
<div class="modal fade" id="ModalVer-{{$pregunta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cabecera">
        <h5 class="modal-title text-white" id="exampleModalLabel">Editar imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="color: #fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('editPreguntaImg',$pregunta->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-row">
            <div class="col-md-12">
               <label for="exampleInputPregunta"><small id="Nombre" class="form-text text-muted">Opcional</small></label><br>
                 <div class="custom-file">                      
                   <input type="file" accept="image/*" class="custom-file-input" id="cargarImgE" name="cargarImgE" required>
                   <label class="custom-file-label">Selecciona una imagen</label>
                 </div>
            </div>
          </div>
          <div class="col-md-12">        
              <div class="container">
                <img src="{{ asset('img/'.$pregunta->imagen) }}" width="300" height="200">
              </div>
          </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">actualizar ➤</button>
          </div>
        </form> 
    </div>
  </div>
</div>
